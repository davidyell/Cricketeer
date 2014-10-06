<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\LeaguesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\LeaguesTable Test Case
 */
class LeaguesTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Leagues') ? [] : ['className' => 'App\Model\Table\LeaguesTable'];
		$this->Leagues = TableRegistry::get('Leagues', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Leagues);

		parent::tearDown();
	}

}
