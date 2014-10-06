<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Leagues Controller
 *
 * @property App\Model\Table\LeaguesTable $Leagues
 */
class LeaguesController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('leagues', $this->paginate($this->Leagues));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$league = $this->Leagues->get($id, [
			'contain' => ['Clubs']
		]);
		$this->set('league', $league);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$league = $this->Leagues->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Leagues->save($league)) {
				$this->Flash->success('The league has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The league could not be saved. Please, try again.');
			}
		}
		$this->set(compact('league'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$league = $this->Leagues->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$league = $this->Leagues->patchEntity($league, $this->request->data);
			if ($this->Leagues->save($league)) {
				$this->Flash->success('The league has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The league could not be saved. Please, try again.');
			}
		}
		$this->set(compact('league'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$league = $this->Leagues->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Leagues->delete($league)) {
			$this->Flash->success('The league has been deleted.');
		} else {
			$this->Flash->error('The league could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
