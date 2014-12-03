<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Matches Controller
 *
 * @property App\Model\Table\MatchesTable $Matches
 */
class MatchesController extends AppController {

	public $helpers = [
		'NumbersToWords.NumbersToWords' => [
			'locale' => 'en_US'
		]
	];

	public $components = [
		'Prg'
	];

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Venues', 'Formats']
		];
		$this->set('matches', $this->paginate($this->Matches));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$match = $this->Matches->get($id, [
			'contain' => [
				'Venues',
				'Formats',
				'Innings' => [
					'Teams'
				],
				'Teams'
			]
		]);
		$this->set('match', $match);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$match = $this->Matches->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Matches->save($match)) {
				$this->Flash->success('The match has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The match could not be saved. Please, try again.');
			}
		}
		$venues = $this->Matches->Venues->find('list');
		$formats = $this->Matches->Formats->find('list');
		$this->set(compact('match', 'venues', 'formats'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$match = $this->Matches->get($id, [
			'contain' => [
				'Teams'
			]
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$match = $this->Matches->patchEntity($match, $this->request->data);
			if ($this->Matches->save($match)) {
				$this->Flash->success('The match has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The match could not be saved. Please, try again.');
			}
		}
		$venues = $this->Matches->Venues->find('list');
		$formats = $this->Matches->Formats->find('list');
		$teams = $this->Matches->Teams->find('list');
		$this->set(compact('match', 'venues', 'formats', 'teams'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$match = $this->Matches->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Matches->delete($match)) {
			$this->Flash->success('The match has been deleted.');
		} else {
			$this->Flash->error('The match could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}

/**
 * Input all the scores for a whole match
 *
 * @param $id string The match id
 * @return void
 */
	public function score_card($id) {
		$match = $this->Matches->get($id, [
			'contain' => [
				'Venues',
				'Formats',
				'Teams' => [
					'fields' => ['id', 'name', 'match_id'],
					'Squads' => [
						'Players' => [
							'fields' => ['id', 'first_name', 'initials', 'last_name']
						]
					]
				],
				'Innings' => [
					'Bowlers',
					'Batsmen',
					'Wickets' => function ($q) {
						// Order the Wickets by the fall of wicket, so they are in the correct order
						return $q->order(["LENGTH(SUBSTRING_INDEX(fall_of_wicket, '-', -1))", "SUBSTRING_INDEX(fall_of_wicket, '-', -1)"]);
					},
					'InningsTypes',
					'Teams' => [
						'Squads'
					]
				]
			]
		]);

		if (empty($match->teams)) {
			throw new \BadMethodCallException('No team sheet has been created for this match.');
		}
//		if (empty($match->innings)) {
//			throw new \BadMethodCallException('No innings created for this match.');
//		}

		if ($this->request->is(['patch', 'post', 'put'])) {
			$match = $this->Matches->patchEntity($match, $this->request->data(), ['associated' => [
				'Innings' => [
					'associated' => [
						'Bowlers',
						'Batsmen',
						'Wickets'
					]
				]
			]]);

			if ($this->Matches->save($match)) {
				$this->Flash->success('Match score card has been updated');
			} else {
				$this->Flash->error('Match score card could not be updated');
			}
		}

		$venues = $this->Matches->Venues->find('list');
		$formats = $this->Matches->Formats->find('list');
		$players = $this->Matches->Teams->Clubs->Players->find('PlayerListByTeam');
		$dismissals = $this->Matches->Innings->Wickets->Dismissals->find('list');
		$inningsTypes = $this->Matches->Innings->InningsTypes->find();
		$this->set(compact('match', 'venues', 'formats', 'players', 'dismissals', 'inningsTypes'));
	}
}
