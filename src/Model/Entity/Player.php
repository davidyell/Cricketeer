<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Player Entity.
 */
class Player extends Entity {

	protected function _getFullName() {
		return $this->_properties['first_name'] . ' ' . $this->_properties['last_name'];
	}
}
