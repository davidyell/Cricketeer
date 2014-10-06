<?php
namespace App\Model\Table;

use Cake\ORM\Query;
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
		$this->belongsTo('Wickets', [
			'foreignKey' => 'wicket_id',
		]);
		$this->hasMany('Batsmen', [
			'foreignKey' => 'innings_id',
		]);
		$this->hasMany('Bowlers', [
			'foreignKey' => 'innings_id',
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
			->add('match_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('match_id', 'create')
			->notEmpty('match_id')
			->add('player_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('player_id', 'create')
			->notEmpty('player_id')
			->add('team_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('team_id', 'create')
			->notEmpty('team_id')
			->add('wicket_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('wicket_id', 'create')
			->notEmpty('wicket_id')
			->add('declared', 'valid', ['rule' => 'numeric'])
			->validatePresence('declared', 'create')
			->notEmpty('declared')
			->add('no_ball', 'valid', ['rule' => 'numeric'])
			->validatePresence('no_ball', 'create')
			->notEmpty('no_ball')
			->add('wide', 'valid', ['rule' => 'numeric'])
			->validatePresence('wide', 'create')
			->notEmpty('wide')
			->add('bye', 'valid', ['rule' => 'numeric'])
			->validatePresence('bye', 'create')
			->notEmpty('bye')
			->add('leg_bye', 'valid', ['rule' => 'numeric'])
			->validatePresence('leg_bye', 'create')
			->notEmpty('leg_bye')
			->add('penalty_runs', 'valid', ['rule' => 'numeric'])
			->validatePresence('penalty_runs', 'create')
			->notEmpty('penalty_runs');

		return $validator;
	}

}
