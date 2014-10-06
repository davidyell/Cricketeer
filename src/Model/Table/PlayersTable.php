<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Players Model
 */
class PlayersTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('players');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('PlayerSpecialisations', [
			'foreignKey' => 'player_specialisation_id',
		]);
		$this->belongsTo('Clubs', [
			'foreignKey' => 'club_id',
		]);
		$this->hasMany('Batsmen', [
			'foreignKey' => 'player_id',
		]);
		$this->hasMany('Bowlers', [
			'foreignKey' => 'player_id',
		]);
		$this->hasMany('Innings', [
			'foreignKey' => 'player_id',
		]);
		$this->hasMany('Squads', [
			'foreignKey' => 'player_id',
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
			->validatePresence('first_name', 'create')
			->notEmpty('first_name')
			->validatePresence('last_name', 'create')
			->notEmpty('last_name')
			->validatePresence('slug', 'create')
			->notEmpty('slug')
			->allowEmpty('photo')
			->allowEmpty('photo_dir')
			->add('number', 'valid', ['rule' => 'numeric'])
			->allowEmpty('number')
			->allowEmpty('nationality')
			->allowEmpty('bats')
			->allowEmpty('bowls')
			->add('player_specialisation_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('player_specialisation_id', 'create')
			->notEmpty('player_specialisation_id')
			->add('club_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('club_id', 'create')
			->notEmpty('club_id');

		return $validator;
	}

}
