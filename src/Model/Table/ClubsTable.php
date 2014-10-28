<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clubs Model
 */
class ClubsTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('clubs');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->belongsTo('Leagues', [
			'foreignKey' => 'league_id',
		]);
		$this->hasMany('Players', [
			'foreignKey' => 'club_id',
		]);
		$this->hasMany('Teams', [
			'foreignKey' => 'club_id',
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

			->validatePresence('name', 'create')
			->notEmpty('name', 'Please name this club')

			->allowEmpty('alt_name')

			->allowEmpty('image')
			->add('image', ['rule' => ['extension', ['gif', 'jpeg', 'png', 'jpg']]])

			->allowEmpty('image_dir')

			->add('league_id', 'valid', ['rule' => 'uuid'])
			->validatePresence('league_id', 'create')
			->notEmpty('league_id');

		return $validator;
	}



}
