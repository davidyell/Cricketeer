<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Squad Entity.
 */
class Squad extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'player' => true,
		'team' => true,
	];

}
