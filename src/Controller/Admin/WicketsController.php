<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Wickets Controller
 *
 * @property App\Model\Table\WicketsTable $Wickets
 */
class WicketsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->paginate = [
			'contain' => ['LostWicketPlayers', 'TookWicketPlayers', 'BowlerPlayers', 'Dismissals']
		];
		$this->set('wickets', $this->paginate($this->Wickets));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$wicket = $this->Wickets->get($id, [
			'contain' => ['LostWicketPlayers', 'TookWicketPlayers', 'BowlerPlayers', 'Dismissals', 'Innings']
		]);
		$this->set('wicket', $wicket);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$wicket = $this->Wickets->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Wickets->save($wicket)) {
				$this->Flash->success('The wicket has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The wicket could not be saved. Please, try again.');
			}
		}
		$lostWicketPlayers = $this->Wickets->LostWicketPlayers->find('list');
		$tookWicketPlayers = $this->Wickets->TookWicketPlayers->find('list');
		$bowlerPlayers = $this->Wickets->BowlerPlayers->find('list');
		$dismissals = $this->Wickets->Dismissals->find('list');
		$this->set(compact('wicket', 'lostWicketPlayers', 'tookWicketPlayers', 'bowlerPlayers', 'dismissals'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$wicket = $this->Wickets->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$wicket = $this->Wickets->patchEntity($wicket, $this->request->data);
			if ($this->Wickets->save($wicket)) {
				$this->Flash->success('The wicket has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The wicket could not be saved. Please, try again.');
			}
		}
		$lostWicketPlayers = $this->Wickets->LostWicketPlayers->find('list');
		$tookWicketPlayers = $this->Wickets->TookWicketPlayers->find('list');
		$bowlerPlayers = $this->Wickets->BowlerPlayers->find('list');
		$dismissals = $this->Wickets->Dismissals->find('list');
		$this->set(compact('wicket', 'lostWicketPlayers', 'tookWicketPlayers', 'bowlerPlayers', 'dismissals'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$wicket = $this->Wickets->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Wickets->delete($wicket)) {
			$this->Flash->success('The wicket has been deleted.');
		} else {
			$this->Flash->error('The wicket could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
