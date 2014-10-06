<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BowlersFixture
 *
 */
class BowlersFixture extends TestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'player_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'innings_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'overs' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'runs' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'wickets' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'economy' => ['type' => 'float', 'length' => 3, 'precision' => 2, 'unsigned' => false, 'null' => false, 'default' => '0.00', 'comment' => ''],
		'maidens' => ['type' => 'float', 'length' => 3, 'precision' => 1, 'unsigned' => false, 'null' => false, 'default' => '0.0', 'comment' => ''],
		'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'_indexes' => [
			'fk_bowlers_player_id_idx' => ['type' => 'index', 'columns' => ['player_id'], 'length' => []],
			'fk_bowlers_innings_id_idx' => ['type' => 'index', 'columns' => ['innings_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
			'fk_bowlers_player_id' => ['type' => 'foreign', 'columns' => ['player_id'], 'references' => ['players', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'fk_bowlers_innings_id' => ['type' => 'foreign', 'columns' => ['innings_id'], 'references' => ['innings', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
			'id' => '',
			'player_id' => '',
			'innings_id' => '',
			'overs' => 1,
			'runs' => 1,
			'wickets' => 1,
			'economy' => 1,
			'maidens' => 1,
			'created' => '2014-10-06 11:36:59',
			'modified' => '2014-10-06 11:36:59'
		],
	];

}
