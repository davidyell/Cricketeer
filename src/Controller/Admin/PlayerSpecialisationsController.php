<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * PlayerSpecialisations Controller
 *
 * @property App\Model\Table\PlayerSpecialisationsTable $PlayerSpecialisations
 */
class PlayerSpecialisationsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('playerSpecialisations', $this->paginate($this->PlayerSpecialisations));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$playerSpecialisation = $this->PlayerSpecialisations->get($id, [
			'contain' => ['Players']
		]);
		$this->set('playerSpecialisation', $playerSpecialisation);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$playerSpecialisation = $this->PlayerSpecialisations->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->PlayerSpecialisations->save($playerSpecialisation)) {
				$this->Flash->success('The player specialisation has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The player specialisation could not be saved. Please, try again.');
			}
		}
		$this->set(compact('playerSpecialisation'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$playerSpecialisation = $this->PlayerSpecialisations->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$playerSpecialisation = $this->PlayerSpecialisations->patchEntity($playerSpecialisation, $this->request->data);
			if ($this->PlayerSpecialisations->save($playerSpecialisation)) {
				$this->Flash->success('The player specialisation has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The player specialisation could not be saved. Please, try again.');
			}
		}
		$this->set(compact('playerSpecialisation'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$playerSpecialisation = $this->PlayerSpecialisations->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->PlayerSpecialisations->delete($playerSpecialisation)) {
			$this->Flash->success('The player specialisation has been deleted.');
		} else {
			$this->Flash->error('The player specialisation could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
