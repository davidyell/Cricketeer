<?php
namespace App\Model\Table;

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
			->validatePresence('when_played', 'create')
			->notEmpty('when_played')

			->add('venue_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('venue_id', 'create')
			->notEmpty('venue_id')

			->add('format_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('format_id', 'create')
			->notEmpty('format_id')

			->add('wides', 'valid', ['rule' => 'numeric'])
			->validatePresence('wides', 'create')
			->notEmpty('wides')

			->add('byes', 'valid', ['rule' => 'numeric'])
			->validatePresence('byes', 'create')
			->notEmpty('byes')

			->add('leg_byes', 'valid', ['rule' => 'numeric'])
			->validatePresence('leg_byes', 'create')
			->notEmpty('leg_byes')

			->add('no_balls', 'valid', ['rule' => 'numeric'])
			->validatePresence('no_balls', 'create')
			->notEmpty('no_balls');

		return $validator;
	}

	public function findLatestMatches(Query $query, array $options) {
		return $query->contain([
				'Venues',
				'Formats',
				'Teams'
			])
			->order(['when_played' => 'DESC']);
	}

}
