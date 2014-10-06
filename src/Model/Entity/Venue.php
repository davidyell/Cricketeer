<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Venue Entity.
 */
class Venue extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'location' => true,
		'capacity' => true,
		'image' => true,
		'image_dir' => true,
		'matches' => true,
	];

}
