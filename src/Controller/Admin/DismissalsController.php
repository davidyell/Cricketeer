<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Dismissals Controller
 *
 * @property App\Model\Table\DismissalsTable $Dismissals
 */
class DismissalsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('dismissals', $this->paginate($this->Dismissals));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$dismissal = $this->Dismissals->get($id, [
			'contain' => ['Wickets']
		]);
		$this->set('dismissal', $dismissal);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$dismissal = $this->Dismissals->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Dismissals->save($dismissal)) {
				$this->Flash->success('The dismissal has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The dismissal could not be saved. Please, try again.');
			}
		}
		$this->set(compact('dismissal'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$dismissal = $this->Dismissals->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$dismissal = $this->Dismissals->patchEntity($dismissal, $this->request->data);
			if ($this->Dismissals->save($dismissal)) {
				$this->Flash->success('The dismissal has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The dismissal could not be saved. Please, try again.');
			}
		}
		$this->set(compact('dismissal'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$dismissal = $this->Dismissals->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Dismissals->delete($dismissal)) {
			$this->Flash->success('The dismissal has been deleted.');
		} else {
			$this->Flash->error('The dismissal could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
