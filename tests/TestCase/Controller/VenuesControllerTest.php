<?php
namespace App\Test\TestCase\Controller;

use App\Controller\VenuesController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\VenuesController Test Case
 */
class VenuesControllerTest extends IntegrationTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = [
		'app.venues',
		'app.matches',
		'app.formats',
		'app.innings',
		'app.players',
		'app.player_specialisations',
		'app.clubs',
		'app.leagues',
		'app.teams',
		'app.squads',
		'app.batsmen',
		'app.bowlers',
		'app.wickets'
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
