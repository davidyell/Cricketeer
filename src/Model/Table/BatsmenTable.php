<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Batsmen Model
 */
class BatsmenTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('batsmen');
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
//
//			->add('player_id', 'valid', ['rule' => 'uuid'])
//			->validatePresence('player_id', 'create')
//			->notEmpty('player_id')
//
//			->add('innings_id', 'valid', ['rule' => 'uuid'])
//			->validatePresence('innings_id', 'create')
//			->notEmpty('innings_id')
//
//			->add('runs', 'valid', ['rule' => 'numeric'])
//			->validatePresence('runs', 'create')
//			->notEmpty('runs')
//
//			->add('balls', 'valid', ['rule' => 'numeric'])
//			->validatePresence('balls', 'create')
//			->notEmpty('balls')
//
//			->add('strike_rate', 'valid', ['rule' => 'numeric'])
//			->validatePresence('strike_rate', 'create')
//			->notEmpty('strike_rate')
//
//			->add('fours', 'valid', ['rule' => 'numeric'])
//			->validatePresence('fours', 'create')
//			->notEmpty('fours')
//
//			->add('sixes', 'valid', ['rule' => 'numeric'])
//			->validatePresence('sixes', 'create')
//			->notEmpty('sixes');
//
//		return $validator;
//	}

	public function findTopBatters(Query $query, array $options) {
		return $query->contain([
				'Players',
				'Innings' => [
					'Matches' => [
						'Formats',
						'Venues'
					]
				]
			])
			->order(['runs' => 'DESC', 'strike_rate' => 'DESC']);
	}

}
