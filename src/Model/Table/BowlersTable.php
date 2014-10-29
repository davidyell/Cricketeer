<?php
namespace App\Model\Table;

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
//			->validatePresence('player_id', 'create')
//			->notEmpty('player_id')
//			->add('innings_id', 'valid', ['rule' => 'uuid'])
//			->validatePresence('innings_id', 'create')
//			->notEmpty('innings_id')
//			->add('overs', 'valid', ['rule' => 'numeric'])
//			->validatePresence('overs', 'create')
//			->notEmpty('overs')
//			->add('runs', 'valid', ['rule' => 'numeric'])
//			->validatePresence('runs', 'create')
//			->notEmpty('runs')
//			->add('wickets', 'valid', ['rule' => 'numeric'])
//			->validatePresence('wickets', 'create')
//			->notEmpty('wickets')
//			->add('economy', 'valid', ['rule' => 'numeric'])
//			->validatePresence('economy', 'create')
//			->notEmpty('economy')
//
//			->add('maidens', 'valid', ['rule' => 'numeric'])
//			->validatePresence('maidens', 'create');
//
//		return $validator;
//	}

/**
 * @param Event $event
 * @param Entity $entity
 * @param \ArrayObject $options
 * @return bool
 */


	public function beforeSave(Event $event, Entity $entity, \ArrayObject $options) {
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
				'Players',
				'Innings' => [
					'Matches' => [
						'Formats',
						'Venues'
					],
				]
			])
			// Use a sub-query to calculate the number of wickets taken in this innings
			->select(['wickets_taken' => $this->Innings->Wickets->find()->select($query->func()->count('*'))->where(['Wickets.innings_id = Innings.id'])])
			->order([
				'wickets_taken' => 'DESC',
				'economy' => 'DESC'
			])
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
