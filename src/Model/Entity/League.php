<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * League Entity.
 */
class League extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'name' => true,
		'description' => true,
		'image' => true,
		'image_dir' => true,
		'clubs' => true,
	];

}
