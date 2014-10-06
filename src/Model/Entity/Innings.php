<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Innings Entity.
 */
class Innings extends Entity {

/**
 * Fields that can be mass assigned using newEntity() or patchEntity().
 *
 * @var array
 */
	protected $_accessible = [
		'match_id' => true,
		'player_id' => true,
		'team_id' => true,
		'wicket_id' => true,
		'declared' => true,
		'no_ball' => true,
		'wide' => true,
		'bye' => true,
		'leg_bye' => true,
		'penalty_runs' => true,
		'match' => true,
		'player' => true,
		'team' => true,
		'wicket' => true,
		'batsmen' => true,
		'bowlers' => true,
	];

}
