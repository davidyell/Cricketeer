<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Teams Controller
 *
 * @property App\Model\Table\TeamsTable $Teams
 */
class TeamsController extends AppController {
	
/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Clubs', 'Matches']
		];
		$this->set('teams', $this->paginate($this->Teams));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$team = $this->Teams->get($id, [
			'contain' => ['Clubs', 'Matches', 'Innings', 'Squads']
		]);
		$this->set('team', $team);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$team = $this->Teams->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Teams->save($team)) {
				$this->Flash->success('The team has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The team could not be saved. Please, try again.');
			}
		}
		$clubs = $this->Teams->Clubs->find('list');
		$matches = $this->Teams->Matches->find('list');
		$this->set(compact('team', 'clubs', 'matches'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$team = $this->Teams->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$team = $this->Teams->patchEntity($team, $this->request->data);
			if ($this->Teams->save($team)) {
				$this->Flash->success('The team has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The team could not be saved. Please, try again.');
			}
		}
		$clubs = $this->Teams->Clubs->find('list');
		$matches = $this->Teams->Matches->find('list');
		$this->set(compact('team', 'clubs', 'matches'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$team = $this->Teams->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Teams->delete($team)) {
			$this->Flash->success('The team has been deleted.');
		} else {
			$this->Flash->error('The team could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
