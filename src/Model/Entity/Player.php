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

/**
 * Mutator method for getting a players name and their specialisation if it exists
 *
 * @return string
 */
	protected function _getFullDetail() {
		$name = $this->_getFullName();

		if ($this->has('player_specialisation')) {
			$name .= "(" . $this->_properties['player_specialisation']['name'] . ")";
		}

		return $name;
	}

/**
 * Mutator method for getting a players initial and surname
 *
 * @return string
 */
	protected function _getInitialLastName() {
		$name = substr($this->_properties['first_name'], 0, 1) . ' ' . $this->_properties['last_name'];

		return $name;
	}
}
