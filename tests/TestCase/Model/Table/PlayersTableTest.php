<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PlayersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayersTable Test Case
 */
class PlayersTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Players') ? [] : ['className' => 'App\Model\Table\PlayersTable'];
		$this->Players = TableRegistry::get('Players', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Players);

		parent::tearDown();
	}

}
