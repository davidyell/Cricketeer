<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\WicketsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WicketsTable Test Case
 */
class WicketsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Wickets') ? [] : ['className' => 'App\Model\Table\WicketsTable'];
		$this->Wickets = TableRegistry::get('Wickets', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Wickets);

		parent::tearDown();
	}

}
