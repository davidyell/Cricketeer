<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\BowlersTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BowlersTable Test Case
 */
class BowlersTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Bowlers') ? [] : ['className' => 'App\Model\Table\BowlersTable'];
		$this->Bowlers = TableRegistry::get('Bowlers', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Bowlers);

		parent::tearDown();
	}

}
