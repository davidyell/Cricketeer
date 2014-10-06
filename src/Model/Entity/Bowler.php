<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bowler Entity.
 */
class Bowler extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'player_id' => true,
		'innings_id' => true,
		'overs' => true,
		'runs' => true,
		'wickets' => true,
		'economy' => true,
		'maidens' => true,
		'player' => true,
		'innings' => true,
	];

}
