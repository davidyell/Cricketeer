<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matches Model
 */
class MatchesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('matches');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Venues', [
			'foreignKey' => 'venue_id',
		]);
		$this->belongsTo('Formats', [
			'foreignKey' => 'format_id',
		]);
		$this->hasMany('Innings', [
			'foreignKey' => 'match_id',
		]);
		$this->hasMany('Teams', [
			'foreignKey' => 'match_id',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
	public function validationDefault(Validator $validator) {
		$validator
			->add('id', 'valid', ['rule' => 'uuid'])
			->allowEmpty('id', 'create')

			->add('when_played', 'valid', ['rule' => 'datetime'])
			->requirePresence('when_played', 'create')
			->notEmpty('when_played')

			->add('venue_id', 'valid', ['rule' => 'uuid'])
			->requirePresence('venue_id', 'create')
			->notEmpty('venue_id')

			->add('format_id', 'valid', ['rule' => 'uuid'])
			->requirePresence('format_id', 'create')
			->notEmpty('format_id');

		return $validator;
	}

/**
 * Custom finder to find the latest matches played
 *
 * @param Query $query
 * @param array $options
 * @return $this
 */
	public function findLatestMatches(Query $query, array $options) {
		return $query->contain([
				'Venues' => function ($q) {
					return $q->select(['id', 'name', 'location']);
				},
				'Formats' => function ($q) {
					return $q->select(['id', 'name']);
				},
				'Teams' => [
					'Clubs' => function ($q) {
						return $q->select(['id', 'image', 'image_dir']);
					}
				],
				'Innings' => [
					'InningsTypes',
					'Batsmen' => [
						'Players' => function ($q) {
							return $q->select(['id', 'first_name', 'initials', 'last_name']);
						}
					],
					'Bowlers' => [
						'Players' => function ($q) {
							return $q->select(['id', 'first_name', 'initials', 'last_name']);
						}
					],
					'Wickets'
				]
			])
			->order(['when_played' => 'DESC']);
	}

/**
 * @param Event $event
 * @param Entity $entity
 * @param ArrayObject $options
 * @return bool
 */
	public function beforeSave(Event $event, Entity &$entity, ArrayObject $options) {

		if ($entity->has('innings') && is_array($entity->innings)) {
			foreach ($entity->innings as $k => $inning) {
				/* @var \App\Model\Entity\Innings $inning */

				// Clear out any related Innings->Batsmen who have not faced any balls and not made any runs
				foreach($inning->batsmen as $j => $batsman) {
					/* @var \App\Model\Entity\Batsman $batsman */
					if ($batsman->runs === null && $batsman->balls === null) {
						unset($entity->innings[$k]['batsmen'][$j]);
					}
				}

				// Clear out any related Innings->Bowlers who have not bowled any overs
				foreach ($inning->bowlers as $j => $bowler) {
					/* @var \App\Model\Entity\Bowler $bowler */
					if ($bowler->overs === null) {
						unset($entity->innings[$k]['bowlers'][$j]);
					}
				}

				// Clear out any related Innings->Wickets which have not been set
				foreach ($inning->wickets as $j => $wicket) {
					/* @var \App\Model\Entity\Wicket $wicket */
					if ($wicket->lost_wicket_player_id === null) {
						unset($entity->innings[$k]['wickets'][$j]);
					}
				}
			}
		}

		return true;
	}
}
