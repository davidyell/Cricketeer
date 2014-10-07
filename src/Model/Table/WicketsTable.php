<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Wickets Model
 */
class WicketsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('wickets');
		$this->displayField('id');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Players', [
			'foreignKey' => 'lost_wicket_player_id',
		]);
		$this->belongsTo('Players', [
			'foreignKey' => 'took_wicket_player_id',
		]);
		$this->belongsTo('Players', [
			'foreignKey' => 'bowler_player_id',
		]);
		$this->belongsTo('Dismissals', [
			'foreignKey' => 'dismissal_id',
		]);
		$this->hasMany('Innings', [
			'foreignKey' => 'wicket_id',
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
			->add('lost_wicket_player_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('lost_wicket_player_id', 'create')
			->notEmpty('lost_wicket_player_id')
			->add('took_wicket_player_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('took_wicket_player_id', 'create')
			->notEmpty('took_wicket_player_id')
			->add('bowler_player_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('bowler_player_id', 'create')
			->notEmpty('bowler_player_id')
			->add('dismissal_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('dismissal_id', 'create')
			->notEmpty('dismissal_id')
			->validatePresence('fall_of_wicket', 'create')
			->notEmpty('fall_of_wicket');

		return $validator;
	}

}