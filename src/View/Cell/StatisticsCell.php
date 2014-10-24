<?php
/**
 * Mini stat blocks view cell
 *
 * User: David Yell <neon1024@gmail.com>
 * Date: 24/10/2014
 * Time: 14:42
 */

namespace App\View\Cell;

use Cake\View\Cell;

class StatisticsCell extends Cell {

	public function batsmen($limit = 3) {
		$this->loadModel('Batsmen');
		$this->set('batsmen', $this->Batsmen->find('TopBatters', ['limit' => $limit]));
	}

	public function bowlers($limit = 3) {
		$this->loadModel('Bowlers');
		$this->set('bowlers', $this->Bowlers->find('TopBowlers', ['limit' => $limit]));
	}

	public function matches($limit = 3) {
		$this->loadModel('Matches');
		$this->set('matches', $this->Matches->find('LatestMatches', ['limit' => $limit]));
	}

} 