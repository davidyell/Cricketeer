<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\InningsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\InningsTable Test Case
 */
class InningsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('Innings') ? [] : ['className' => 'App\Model\Table\InningsTable'];
		$this->Innings = TableRegistry::get('Innings', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Innings);

		parent::tearDown();
	}

}
