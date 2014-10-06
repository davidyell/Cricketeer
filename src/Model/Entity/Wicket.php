<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Wicket Entity.
 */
class Wicket extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'lost_wicket_player_id' => true,
		'took_wicket_player_id' => true,
		'bowler_player_id' => true,
		'dismissal_id' => true,
		'fall_of_wicket' => true,
		'lost_wicket_player' => true,
		'took_wicket_player' => true,
		'bowler_player' => true,
		'dismissal' => true,
		'innings' => true,
	];

}
