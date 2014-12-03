<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Player Entity.
 */
class Player extends Entity {

/**
 * Mutator method for getting the players full name
 *
 * @return string
 */
	protected function _getFullName() {
		$name = $this->_properties['first_name'];
		if (!empty($this->_properties['initials'])) {
			$name .= ' ' . $this->_properties['initials'];
		}
		$name .= ' ' . $this->_properties['last_name'];

		return $name;
	}
}
