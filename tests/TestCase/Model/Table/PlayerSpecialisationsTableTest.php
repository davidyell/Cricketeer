<?php
namespace App\Test\TestCase\Model\Table;

use Cake\ORM\TableRegistry;
use App\Model\Table\PlayerSpecialisationsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PlayerSpecialisationsTable Test Case
 */
class PlayerSpecialisationsTableTest extends TestCase {

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$config = TableRegistry::exists('PlayerSpecialisations') ? [] : ['className' => 'App\Model\Table\PlayerSpecialisationsTable'];
		$this->PlayerSpecialisations = TableRegistry::get('PlayerSpecialisations', $config);
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->PlayerSpecialisations);

		parent::tearDown();
	}

}
