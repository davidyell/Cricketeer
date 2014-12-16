<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Venues Controller
 *
 * @property App\Model\Table\VenuesTable $Venues
 */
class VenuesController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->set('venues', $this->paginate($this->Venues));
    }

    /**
     * View method
     *
     * @param string $id
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function view($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => ['Matches']
        ]);
        $this->set('venue', $venue);
    }

    /**
     * Add method
     *
     * @return void
     */
    public function add()
    {
        $venue = $this->Venues->newEntity($this->request->data);
        if ($this->request->is('post')) {
            if ($this->Venues->save($venue)) {
                $this->Flash->success('The venue has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The venue could not be saved. Please, try again.');
            }
        }
        $this->set(compact('venue'));
    }

    /**
     * Edit method
     *
     * @param string $id
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function edit($id = null)
    {
        $venue = $this->Venues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $venue = $this->Venues->patchEntity($venue, $this->request->data);
            if ($this->Venues->save($venue)) {
                $this->Flash->success('The venue has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The venue could not be saved. Please, try again.');
            }
        }
        $this->set(compact('venue'));
    }

    /**
     * Delete method
     *
     * @param string $id
     * @return void
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function delete($id = null)
    {
        $venue = $this->Venues->get($id);
        $this->request->allowMethod('post', 'delete');
        if ($this->Venues->delete($venue)) {
            $this->Flash->success('The venue has been deleted.');
        } else {
            $this->Flash->error('The venue could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
