<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\SquadsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SquadsTable Test Case
 */
class SquadsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Squads') ? [] : ['className' => 'App\Model\Table\SquadsTable'];
		$this->Squads = TableRegistry::get('Squads', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Squads);

		parent::tearDown();
	}

}
