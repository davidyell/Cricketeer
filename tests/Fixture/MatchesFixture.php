<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * MatchesFixture
 *
 */
class MatchesFixture extends TestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'when_played' => ['type' => 'datetime', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'venue_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'format_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'wides' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'byes' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'leg_byes' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'no_balls' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => '0', 'comment' => '', 'precision' => null, 'autoIncrement' => null],
		'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'_indexes' => [
			'fk_matches_venue_id_idx' => ['type' => 'index', 'columns' => ['venue_id'], 'length' => []],
			'fk_matches_format_id_idx' => ['type' => 'index', 'columns' => ['format_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
			'fk_matches_venue_id' => ['type' => 'foreign', 'columns' => ['venue_id'], 'references' => ['venues', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'fk_matches_format_id' => ['type' => 'foreign', 'columns' => ['format_id'], 'references' => ['formats', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
			'when_played' => '2014-10-06 11:37:31',
			'venue_id' => '',
			'format_id' => '',
			'wides' => 1,
			'byes' => 1,
			'leg_byes' => 1,
			'no_balls' => 1,
			'created' => '2014-10-06 11:37:31',
			'modified' => '2014-10-06 11:37:31'
		],
	];

}
