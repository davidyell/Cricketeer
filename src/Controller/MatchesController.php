<?php
/**
 * Matches Controller
 *
 * User: David Yell <neon1024@gmail.com>
 * Date: 24/10/2014
 * Time: 12:00
 */

namespace App\Controller;

class MatchesController extends AppController {

	public function index() {
		$matches = $this->Matches->find()
			->contain([
				'Venues',
				'Formats',
				'Innings',
				'Teams'
			])
			->order(['Matches.modified' => 'DESC']);

		$this->set('matches', $matches);
	}

} 