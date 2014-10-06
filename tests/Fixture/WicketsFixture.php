<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WicketsFixture
 *
 */
class WicketsFixture extends TestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = [
		'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'lost_wicket_player_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'took_wicket_player_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'bowler_player_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'dismissal_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
		'fall_of_wicket' => ['type' => 'string', 'length' => 255, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'fixed' => null],
		'created' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'modified' => ['type' => 'datetime', 'length' => null, 'null' => true, 'default' => null, 'comment' => '', 'precision' => null],
		'_indexes' => [
			'fk_wickets_dismissal_id_idx' => ['type' => 'index', 'columns' => ['dismissal_id'], 'length' => []],
			'fk_wickets_lost_wicket_player_id_idx' => ['type' => 'index', 'columns' => ['lost_wicket_player_id'], 'length' => []],
			'fk_wickets_took_wicket_player_id_idx' => ['type' => 'index', 'columns' => ['took_wicket_player_id'], 'length' => []],
			'fk_wickets_bowler_player_id_idx' => ['type' => 'index', 'columns' => ['bowler_player_id'], 'length' => []],
		],
		'_constraints' => [
			'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
			'fk_wickets_dismissal_id' => ['type' => 'foreign', 'columns' => ['dismissal_id'], 'references' => ['dismissals', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'fk_wickets_lost_wicket_player_id' => ['type' => 'foreign', 'columns' => ['lost_wicket_player_id'], 'references' => ['players', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'fk_wickets_took_wicket_player_id' => ['type' => 'foreign', 'columns' => ['took_wicket_player_id'], 'references' => ['players', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
			'fk_wickets_bowler_player_id' => ['type' => 'foreign', 'columns' => ['bowler_player_id'], 'references' => ['players', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
			'lost_wicket_player_id' => '',
			'took_wicket_player_id' => '',
			'bowler_player_id' => '',
			'dismissal_id' => '',
			'fall_of_wicket' => 'Lorem ipsum dolor sit amet',
			'created' => '2014-10-06 11:38:07',
			'modified' => '2014-10-06 11:38:07'
		],
	];

}
