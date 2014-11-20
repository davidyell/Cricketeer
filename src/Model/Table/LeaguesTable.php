<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Leagues Model
 */
class LeaguesTable extends Table {

/**
 * Initialize method
 *
 * @param array $config The configuration for the Table.
 * @return void
 */
	public function initialize(array $config) {
		$this->table('leagues');
		$this->displayField('name');
		$this->primaryKey('id');
		$this->addBehavior('Timestamp');

		$this->hasMany('Clubs', [
			'foreignKey' => 'league_id',
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

			->requirePresence('name', 'create')
			->notEmpty('name', 'Must name the league.')

			->allowEmpty('description')

			->add('image', 'extension', ['rule' => ['extension', ['gif', 'jpeg', 'png', 'jpg']], 'message' => 'Please only upload images, gif, png, jpg'])
			->add('image', 'noErrors', ['rule' => 'uploadError', 'message' => 'Something went wrong with the upload.'])
			->add('image', 'isUploaded', ['rule' => ['uploadedFile', ['types' => ['image/gif', 'image/jpeg', 'image/png'], 'maxSize' => '2000000']], 'message' => 'File is not correct MIME type.'])

			->add('image', [
				'extension' => [
					'rule' => ['extension', ['gif', 'jpeg', 'png', 'jpg']],
					'message' => 'Please only upload images, gif, png, jpg'
				],
				'noErrors' => [
					'rule' => 'uploadError',
					'message' => 'Something went wrong with the upload.'
				],
				'isUploaded' => [
					'rule' => ['uploadedFile', ['types' => ['image/gif', 'image/jpeg', 'image/png'], 'maxSize' => '2000000']],
					'message' => 'File is not correct MIME type.'
				]
			])

			->allowEmpty('image')

			->allowEmpty('image_dir');

		return $validator;
	}

}
