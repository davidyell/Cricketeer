<?php
namespace App\Model\Table;

use Cake\Database\Query;
use Cake\Datasource\ResultSetInterface;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Proffer\Model\Validation\ProfferRules;

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
		$this->displayField('FullName');
		$this->primaryKey('id');
		
		$this->addBehavior('Timestamp');
		$this->addBehavior('Sluggable', ['field' => 'FullName']);
		$this->addBehavior('Proffer.Proffer', [
			'photo' => [
				'dir' => 'photo_dir',
				'thumbnailSizes' => [
					'square' => ['w' => 200, 'h' => 200],
					'portrait' => ['w' => 100, 'h' => 300],
				],
				'thumbnailMethod' => 'imagick'
			]
		]);

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
		$this->hasMany('Squads', [
			'foreignKey' => 'player_id',
		]);
		$this->hasMany('Wickets', [
			'foreignKey' => 'lost_wicket_player_id'
		]);
		$this->hasMany('Wickets', [
			'foreignKey' => 'took_wicket_player_id'
		]);
		$this->hasMany('Wickets', [
			'foreignKey' => 'bowler_player_id'
		]);
	}

/**
 * Default validation rules.
 *
 * @param Validator $validator
 * @return Validator
 */
	public function validationDefault(Validator $validator) {
		$validator->provider('proffer', 'Proffer\Model\Validation\ProfferRules');

		$validator
			->add('id', 'valid', ['rule' => 'uuid'])
			->allowEmpty('id', 'create')

			->notEmpty('first_name')

			->notEmpty('last_name')

			->add('photo', 'proffer', [
				'rule' => ['filesize', 2000000],
				'provider' => 'proffer'
			])
			->add('photo', 'proffer', [
				'rule' => ['extension', ['jpg', 'jpeg', 'png']],
				'message' => 'Invalid extension',
				'provider' => 'proffer'
			])
			->add('photo', 'proffer', [
				'rule' => ['mimetype', ['image/jpeg', 'image/png']],
				'message' => 'Not the correct mime type',
				'provider' => 'proffer'
			])
			->add('photo', 'proffer', [
				'rule' => ['dimensions', [
					'min' => ['w' => 100, 'h' => 100],
					'max' => ['w' => 500, 'h' => 500]
				]],
				'message' => 'Image is not correct dimensions.',
				'provider' => 'proffer'
			])
			->allowEmpty('photo')

			->allowEmpty('photo_dir')

			->add('number', 'valid', ['rule' => 'numeric'])
			->allowEmpty('number')

			->allowEmpty('nationality')

			->allowEmpty('bats')

			->allowEmpty('bowls')

			->add('player_specialisation_id', 'valid', ['rule' => 'uuid'])
			->notEmpty('player_specialisation_id')

			->add('club_id', 'valid', ['rule' => 'uuid'])
			->notEmpty('club_id');

		return $validator;
	}

/**
 * Find a list of players along with their associated club and specialisation
 * 
 * @param Query $query
 * @return Query
 */
	public function findPlayerListByTeam(Query $query) {
		$query->contain(['Clubs', 'PlayerSpecialisations'])
			->select([
				'Players.id', 'Players.first_name', 'Players.initials', 'Players.last_name',
				'Clubs.id', 'Clubs.name',
				'PlayerSpecialisations.name'
			]);

		// Function to concatenate the value field for the combine()
		$player = function($entity) {
			return $entity->first_name . ' ' . $entity->initials . ' ' . $entity->last_name . ' (' . $entity->player_specialisation->name . ')';
		};

		// Use a result formatter to run combine on the results to build a list
		$query->formatResults(function(ResultSetInterface $results, Query $query) use ($player) {
			return $results->combine('id', $player, 'club.name');
		});

		return $query;
	}
}
