<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SquadsFixture
 *
 */
class SquadsFixture extends TestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'player_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'team_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'_indexes' => [
			'fk_squads_player_id_idx' => ['type' => 'index', 'columns' => ['player_id'], 'length' => []],
			'fk_squads_team_id_idx' => ['type' => 'index', 'columns' => ['team_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['player_id', 'team_id'], 'length' => []],
			'fk_squads_player_id' => ['type' => 'foreign', 'columns' => ['player_id'], 'references' => ['players', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'fk_squads_team_id' => ['type' => 'foreign', 'columns' => ['team_id'], 'references' => ['teams', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
		],
		'_options' => [
'engine' => 'InnoDB', 'collation' => 'utf8_general_ci'
		],
	];

/**
 * Records
 *
 * @var array
 */
	public $records = [
		[
			'player_id' => '',
			'team_id' => ''
		],
	];

}
