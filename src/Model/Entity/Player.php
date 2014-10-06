<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Player Entity.
 */
class Player extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'first_name' => true,
		'initials' => true,
		'last_name' => true,
		'slug' => true,
		'photo' => true,
		'photo_dir' => true,
		'number' => true,
		'nationality' => true,
		'bats' => true,
		'bowls' => true,
		'player_specialisation_id' => true,
		'club_id' => true,
		'player_specialisation' => true,
		'club' => true,
		'batsmen' => true,
		'bowlers' => true,
		'innings' => true,
		'squads' => true,
	];

}
