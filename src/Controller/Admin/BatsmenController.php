<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Batsmen Controller
 *
 * @property App\Model\Table\BatsmenTable $Batsmen
 */
class BatsmenController extends AppController
{

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Players', 'Innings']
        ];
        $this->set('batsmen', $this->paginate($this->Batsmen));
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
        $batsman = $this->Batsmen->get($id, [
            'contain' => ['Players', 'Innings']
        ]);
        $this->set('batsman', $batsman);
    }

    /**
     * Add method
     *
     * @return void
     */
    public function add()
    {
        $batsman = $this->Batsmen->newEntity($this->request->data);
        if ($this->request->is('post')) {
            if ($this->Batsmen->save($batsman)) {
                $this->Flash->success('The batsman has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The batsman could not be saved. Please, try again.');
            }
        }
        $players = $this->Batsmen->Players->find('list');
        $innings = $this->Batsmen->Innings->find('list');
        $this->set(compact('batsman', 'players', 'innings'));
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
        $batsman = $this->Batsmen->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $batsman = $this->Batsmen->patchEntity($batsman, $this->request->data);
            if ($this->Batsmen->save($batsman)) {
                $this->Flash->success('The batsman has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The batsman could not be saved. Please, try again.');
            }
        }
        $players = $this->Batsmen->Players->find('list');
        $innings = $this->Batsmen->Innings->find('list');
        $this->set(compact('batsman', 'players', 'innings'));
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
        $batsman = $this->Batsmen->get($id);

        // Find out if there is a wicket and delete it
        $wicket = $this->Batsmen->Players->Wickets->find()
            ->where([
                'innings_id' => $batsman->innings_id,
                'lost_wicket_player_id' => $batsman->player_id
            ])
            ->first();

        if ($this->Batsmen->delete($batsman)) {
            if ($wicket) {
                $this->Batsmen->Players->Wickets->delete($wicket);
            }

            $this->Flash->success('The batsman has been deleted.');
        } else {
            $this->Flash->error('The batsman could not be deleted. Please, try again.');
        }
        return $this->redirect($this->referer());
    }
}
