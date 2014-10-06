<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Formats Controller
 *
 * @property App\Model\Table\FormatsTable $Formats
 */
class FormatsController extends AppController {

/**
 * Index method
 *
 * @return void
 */
	public function index() {
		$this->set('formats', $this->paginate($this->Formats));
	}

/**
 * View method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function view($id = null) {
		$format = $this->Formats->get($id, [
			'contain' => ['Matches']
		]);
		$this->set('format', $format);
	}

/**
 * Add method
 *
 * @return void
 */
	public function add() {
		$format = $this->Formats->newEntity($this->request->data);
		if ($this->request->is('post')) {
			if ($this->Formats->save($format)) {
				$this->Flash->success('The format has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The format could not be saved. Please, try again.');
			}
		}
		$this->set(compact('format'));
	}

/**
 * Edit method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function edit($id = null) {
		$format = $this->Formats->get($id, [
			'contain' => []
		]);
		if ($this->request->is(['patch', 'post', 'put'])) {
			$format = $this->Formats->patchEntity($format, $this->request->data);
			if ($this->Formats->save($format)) {
				$this->Flash->success('The format has been saved.');
				return $this->redirect(['action' => 'index']);
			} else {
				$this->Flash->error('The format could not be saved. Please, try again.');
			}
		}
		$this->set(compact('format'));
	}

/**
 * Delete method
 *
 * @param string $id
 * @return void
 * @throws \Cake\Network\Exception\NotFoundException
 */
	public function delete($id = null) {
		$format = $this->Formats->get($id);
		$this->request->allowMethod('post', 'delete');
		if ($this->Formats->delete($format)) {
			$this->Flash->success('The format has been deleted.');
		} else {
			$this->Flash->error('The format could not be deleted. Please, try again.');
		}
		return $this->redirect(['action' => 'index']);
	}
}
