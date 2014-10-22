<?php
namespace App\Model\Table;

use ArrayObject;
use Cake\Event\Event;
use Cake\ORM\Entity;
use Cake\ORM\Table;
use Cake\Validation\Validator;


/**
 * Innings Model
 */
class InningsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('innings');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Matches', [
			'foreignKey' => 'match_id',
		]);
		$this->belongsTo('Players', [
			'foreignKey' => 'player_id',
		]);
		$this->belongsTo('Teams', [
			'foreignKey' => 'team_id',
		]);
		$this->hasMany('Batsmen', [
			'foreignKey' => 'innings_id',
		]);
		$this->hasMany('Bowlers', [
			'foreignKey' => 'innings_id',
		]);
		$this->hasMany('Wickets', [
			'foreignKey' => 'innings_id',
		]);
	}

/**
 * beforeSave method
 * Executed before the entity is persisted
 *
 * @param Event $event
 * @param Entity $entity
 * @param ArrayObject $options
 */
	public function beforeSave(Event $event, Entity $entity, ArrayObject $options) {
		$entity->batsmen[0]->set('strike_rate', $this->strikeRate($entity->batsmen[0]->get('runs'), $entity->batsmen[0]->get('balls')));
		$entity->batsmen[0]->set('player_id', $entity->player_id);

		if (isset($entity->bowlers)) {
			$entity->bowlers[0]->set('economy', $this->economy($entity->bowlers[0]->get('runs'), $entity->bowlers[0]->get('overs')));
			$entity->bowlers[0]->set('player_id', $entity->player_id);
		}

		$entity->wickets[0]->set('lost_wicket_player_id', $entity->player_id);
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
//			->add('match_id', 'valid', ['rule' => 'uuid'])
//			->validatePresence('match_id', 'create')
//			->notEmpty('match_id')
//			->add('player_id', 'valid', ['rule' => 'uuid'])
//			->validatePresence('player_id', 'create')
//			->notEmpty('player_id')
//			->add('team_id', 'valid', ['rule' => 'uuid'])
//			->validatePresence('team_id', 'create')
//			->notEmpty('team_id');
//
//		return $validator;
//	}

/**
 * Work out the batsmen strike rate
 *
 * @param $runs Number of runs scored
 * @param $balls Number of balls faced
 * @return float
 */
	public function strikeRate($runs, $balls) {
		if ($balls > 0) {
			return (float)number_format(($runs / $balls) * 100, 2);
		}

		return (float)0.0;
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
