<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Wickets Controller
 *
 * @property App\Model\Table\WicketsTable $Wickets
 */
class WicketsController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [
                'PlayerLostWicket',
                'PlayerTookWicket',
                'PlayerBowledWicket',
                'Dismissals',
                'Innings'
            ]
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
    public function view($id = null)
    {
        $wicket = $this->Wickets->get($id, [
            'contain' => [
                'PlayerLostWicket',
                'PlayerTookWicket',
                'PlayerBowledWicket',
                'Dismissals',
                'Innings'
            ]
        ]);
        $this->set('wicket', $wicket);
    }

    /**
     * Add method
     *
     * @return void
     */
    public function add()
    {
        $wicket = $this->Wickets->newEntity($this->request->data);
        if ($this->request->is('post')) {
            if ($this->Wickets->save($wicket)) {
                $this->Flash->success('The wicket has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The wicket could not be saved. Please, try again.');
            }
        }
        $players = $this->Wickets->Players->find('PlayerListByTeam');
        $dismissals = $this->Wickets->Dismissals->find('list');
        $innings = $this->Wickets->Innings->find('list');
        $this->set(compact('wicket', 'players', 'dismissals', 'innings'));
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
        $players = $this->Wickets->Players->find('PlayerListByTeam');
        $dismissals = $this->Wickets->Dismissals->find('list');
        $innings = $this->Wickets->Innings->find('list');
        $this->set(compact('wicket', 'players', 'dismissals', 'innings'));
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
        $this->request->allowMethod('post', 'delete');
        $wicket = $this->Wickets->get($id);
        if ($result = $this->Wickets->delete($wicket)) {
            $this->Flash->success('The wicket has been deleted.');
        } else {
            $this->Flash->error('The wicket could not be deleted. Please, try again.');
        }

        if ($this->request->is('ajax')) {
            $this->set('result', $result);
            $this->set('_serialize', ['result']);
        } else {
            return $this->redirect($this->referer());
        }
    }
}
