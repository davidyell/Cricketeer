<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Clubs Controller
 *
 * @property App\Model\Table\ClubsTable $Clubs
 */
class ClubsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Leagues']
        ];
        $this->set('clubs', $this->paginate($this->Clubs));
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
        $club = $this->Clubs->get($id, [
            'contain' => ['Leagues', 'Players', 'Teams']
        ]);
        $this->set('club', $club);
    }

    /**
     * Add method
     *
     * @return void
     */
    public function add()
    {
        $club = $this->Clubs->newEntity($this->request->data);
        if ($this->request->is('post')) {
            if ($this->Clubs->save($club)) {
                $this->Flash->success('The club has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The club could not be saved. Please, try again.');
            }
        }
        $leagues = $this->Clubs->Leagues->find('list');
        $this->set(compact('club', 'leagues'));
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
        $club = $this->Clubs->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $club = $this->Clubs->patchEntity($club, $this->request->data);
            if ($this->Clubs->save($club)) {
                $this->Flash->success('The club has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The club could not be saved. Please, try again.');
            }
        }
        $leagues = $this->Clubs->Leagues->find('list');
        $this->set(compact('club', 'leagues'));
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
        $club = $this->Clubs->get($id);
        $this->request->allowMethod('post', 'delete');
        if ($this->Clubs->delete($club)) {
            $this->Flash->success('The club has been deleted.');
        } else {
            $this->Flash->error('The club could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
