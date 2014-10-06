<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Match Entity.
 */
class Match extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'when_played' => true,
		'venue_id' => true,
		'format_id' => true,
		'wides' => true,
		'byes' => true,
		'leg_byes' => true,
		'no_balls' => true,
		'venue' => true,
		'format' => true,
		'innings' => true,
		'teams' => true,
	];

}
