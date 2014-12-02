<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bowlers Model
 */
class BowlersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('bowlers');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Players', [
			'foreignKey' => 'player_id',
		]);
		$this->belongsTo('Innings', [
			'foreignKey' => 'innings_id',
		]);
	}

/**
 * Default validation rules.
 *
 * @param \Cake\Validation\Validator $validator
 * @return \Cake\Validation\Validator
 */
//	public function validationDefault(Validator $validator) {
//		$validator
//			->add('id', 'valid', ['rule' => 'uuid'])
//			->allowEmpty('id', 'create')
//			->add('player_id', 'valid', ['rule' => 'uuid'])
//			->requirePresence('player_id', 'create')
//			->notEmpty('player_id')
//			->add('innings_id', 'valid', ['rule' => 'uuid'])
//			->requirePresence('innings_id', 'create')
//			->notEmpty('innings_id')
//			->add('overs', 'valid', ['rule' => 'numeric'])
//			->requirePresence('overs', 'create')
//			->notEmpty('overs')
//			->add('runs', 'valid', ['rule' => 'numeric'])
//			->requirePresence('runs', 'create')
//			->notEmpty('runs')
//			->add('wickets', 'valid', ['rule' => 'numeric'])
//			->requirePresence('wickets', 'create')
//			->notEmpty('wickets')
//			->add('economy', 'valid', ['rule' => 'numeric'])
//			->requirePresence('economy', 'create')
//			->notEmpty('economy')
//
//			->add('maidens', 'valid', ['rule' => 'numeric'])
//			->requirePresence('maidens', 'create');
//
//		return $validator;
//	}

/**
 * @param Event $event
 * @param Entity $entity
 * @param ArrayObject $options
 * @return bool
 */
	public function beforeSave(Event $event, Entity $entity, ArrayObject $options) {
		$entity->set('economy', $this->economy($entity->runs, $entity->overs));
		return true;
	}

/**
 * Find a list of top bowlers
 *
 * @param Query $query
 * @param array $options
 * @return $this
 */
	public function findTopBowlers(Query $query, array $options) {
		return $query->contain([
				'Players' => [
					'fields' => ['id', 'first_name', 'initials', 'last_name', 'slug', 'photo', 'photo_dir']
				],
				'Innings' => [
					'Matches' => [
						'Formats',
						'Venues'
					],
					'Wickets' => [
						'PlayerBowledWicket'
					]
				]
			])
			->select(['totalWickets' => $query->func()->count('*')])
			->matching('Innings.Wickets', function ($q) {
				return $q->where([
					'AND' => [
						'Wickets.bowler_player_id = Bowlers.player_id',
						'Wickets.innings_id = Innings.id'
					]
				]);
			})
			->group(['Bowlers.player_id'])
			->order(['economy' => 'DESC'])
			->autoFields(true);
	}

	public function findBowlersWickets(Query $query, array $options) {
		return $query->contain([
			'Innings' => [
				'Wickets' => [
					'PlayerBowledWicket',
				]
			]
		])
		->select(['totalWickets' => $query->func()->count('*')])
		->matching('Innings.Wickets.PlayerBowledWicket', function ($q) {
			return $q->where([
				'AND' => [
					'Wickets.bowler_player_id = Bowlers.player_id',
					'Wickets.innings_id = Innings.id'
				]
			]);
		})
		->group(['Bowlers.player_id'])
		->order(['totalWickets' => 'DESC'])
		->autoFields(true);
	}

/**
 * Work out a bowlers economy
 *
 * @param $runs Number of runs scored off the bowler
 * @param $overs Number of over bowled
 * @return float
 */
	public function economy($runs, $overs) {
		if ($overs > 0) {
			return (float)number_format($runs / $overs, 2);
		}

		return (float)0.0;
	}
}
