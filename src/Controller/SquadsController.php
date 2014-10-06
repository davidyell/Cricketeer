<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Squads Controller
 *
 * @property App\Model\Table\SquadsTable $Squads
 */
class SquadsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['Players', 'Teams']
		];
		$this->set('squads', $this->paginate($this->Squads));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$squad = $this->Squads->get($id, [
			'contain' => ['Players', 'Teams']
		]);
		$this->set('squad', $squad);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$squad = $this->Squads->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Squads->save($squad)) {
				$this->Flash->success('The squad has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The squad could not be saved. Please, try again.');
			}
		}
		$players = $this->Squads->Players->find('list');
		$teams = $this->Squads->Teams->find('list');
		$this->set(compact('squad', 'players', 'teams'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$squad = $this->Squads->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$squad = $this->Squads->patchEntity($squad, $this->request->data);
			if ($this->Squads->save($squad)) {
				$this->Flash->success('The squad has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The squad could not be saved. Please, try again.');
			}
		}
		$players = $this->Squads->Players->find('list');
		$teams = $this->Squads->Teams->find('list');
		$this->set(compact('squad', 'players', 'teams'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$squad = $this->Squads->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Squads->delete($squad)) {
			$this->Flash->success('The squad has been deleted.');
		} else {
			$this->Flash->error('The squad could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
