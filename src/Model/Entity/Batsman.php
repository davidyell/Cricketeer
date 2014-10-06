<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Batsman Entity.
 */
class Batsman extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'player_id' => true,
		'innings_id' => true,
		'runs' => true,
		'balls' => true,
		'strike_rate' => true,
		'fours' => true,
		'sixes' => true,
		'player' => true,
		'innings' => true,
	];

}
