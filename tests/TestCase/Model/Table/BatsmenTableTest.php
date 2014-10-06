<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\BatsmenTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BatsmenTable Test Case
 */
class BatsmenTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Batsmen') ? [] : ['className' => 'App\Model\Table\BatsmenTable'];
		$this->Batsmen = TableRegistry::get('Batsmen', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Batsmen);

		parent::tearDown();
	}

}
