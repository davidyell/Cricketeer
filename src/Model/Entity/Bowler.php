<?php
namespace App\Model\Entity;

use BadMethodCallException;
use Cake\ORM\Entity;

/**
 * Bowler Entity.
 */
class Bowler extends Entity {

	protected function _getWicketCount() {
		if (isset($this->_properties['innings']['wickets'])) {
			return count($this->_properties['innings']['wickets']);
		}

		throw new BadMethodCallException('Your data must include Innings => Wickets tables.');
	}

}
