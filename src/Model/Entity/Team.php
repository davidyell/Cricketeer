<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Team Entity.
 */
class Team extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'club_id' => true,
		'match_id' => true,
		'club' => true,
		'match' => true,
		'innings' => true,
		'squads' => true,
	];

}
