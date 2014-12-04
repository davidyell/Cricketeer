<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Bowlers Controller
 *
 * @property App\Model\Table\BowlersTable $Bowlers
 */
class BowlersController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => [
				'Players',
				'Innings' => [
					'Wickets'
				]
			]
		];
		$bowlers = $this->paginate($this->Bowlers);
		$this->set('bowlers', $bowlers);
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$bowler = $this->Bowlers->get($id, [
			'contain' => ['Players', 'Innings']
		]);
		$this->set('bowler', $bowler);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$bowler = $this->Bowlers->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Bowlers->save($bowler)) {
				$this->Flash->success('The bowler has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The bowler could not be saved. Please, try again.');
			}
		}
		$players = $this->Bowlers->Players->find('PlayerListByTeam');
		$innings = $this->Bowlers->Innings->find('list');
		$this->set(compact('bowler', 'players', 'innings'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$bowler = $this->Bowlers->get($id);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$bowler = $this->Bowlers->patchEntity($bowler, $this->request->data);
			if ($this->Bowlers->save($bowler)) {
				$this->Flash->success('The bowler has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The bowler could not be saved. Please, try again.');
			}
		}
		$players = $this->Bowlers->Players->find('PlayerListByTeam');
		$innings = $this->Bowlers->Innings->find('list');
		$this->set(compact('bowler', 'players', 'innings'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$bowler = $this->Bowlers->get($id);
		$this->request->allowMethod(['post', 'delete', 'get']);
		if ($this->Bowlers->delete($bowler)) {
			$this->Flash->success('The bowler has been deleted.');
		} else {
			$this->Flash->error('The bowler could not be deleted. Please, try again.');
		}

		return $this->redirect($this->referer());
	}
}
