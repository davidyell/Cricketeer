<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teams Model
 */
class TeamsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('teams');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Clubs', [
			'foreignKey' => 'club_id',
		]);
		$this->belongsTo('Matches', [
			'foreignKey' => 'match_id',
		]);
		$this->hasMany('Innings', [
			'foreignKey' => 'team_id',
		]);
		$this->hasMany('Squads', [
			'foreignKey' => 'team_id',
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
			->add('club_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('club_id', 'create')
			->notEmpty('club_id')
			->add('match_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('match_id', 'create')
			->notEmpty('match_id')
			->add('captain', 'valid', ['rule' => 'numeric'])
			->validatePresence('captain', 'create')
			->notEmpty('captain');

		return $validator;
	}

}
