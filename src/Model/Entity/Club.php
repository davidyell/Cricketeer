<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Club Entity.
 */
class Club extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'alt_name' => true,
		'image' => true,
		'image_dir' => true,
		'league_id' => true,
		'league' => true,
		'players' => true,
		'teams' => true,
	];

}
