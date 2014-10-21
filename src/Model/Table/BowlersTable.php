<?php
namespace App\Model\Table;

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

}
