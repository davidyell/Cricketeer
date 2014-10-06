<?php
namespace App\Test\TestCase\Controller;

use App\Controller\WicketsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\WicketsController Test Case
 */
class WicketsControllerTest extends IntegrationTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.wickets',
		'app.lost_wicket_players',
		'app.took_wicket_players',
		'app.bowler_players',
		'app.dismissals',
		'app.innings',
		'app.matches',
		'app.venues',
		'app.formats',
		'app.teams',
		'app.clubs',
		'app.leagues',
		'app.players',
		'app.player_specialisations',
		'app.batsmen',
		'app.bowlers',
		'app.squads'
	];

/**
 * testIndex method
 *
 * @return void
 */
	public function testIndex() {
		$this->markTestIncomplete('testIndex not implemented.');
	}

/**
 * testView method
 *
 * @return void
 */
	public function testView() {
		$this->markTestIncomplete('testView not implemented.');
	}

/**
 * testAdd method
 *
 * @return void
 */
	public function testAdd() {
		$this->markTestIncomplete('testAdd not implemented.');
	}

/**
 * testEdit method
 *
 * @return void
 */
	public function testEdit() {
		$this->markTestIncomplete('testEdit not implemented.');
	}

/**
 * testDelete method
 *
 * @return void
 */
	public function testDelete() {
		$this->markTestIncomplete('testDelete not implemented.');
	}

}
