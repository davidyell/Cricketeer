<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\DismissalsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DismissalsTable Test Case
 */
class DismissalsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Dismissals') ? [] : ['className' => 'App\Model\Table\DismissalsTable'];
		$this->Dismissals = TableRegistry::get('Dismissals', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dismissals);

		parent::tearDown();
	}

}
