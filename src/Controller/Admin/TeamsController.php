<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Collection\Collection;

/**
 * Teams Controller
 *
 * @property App\Model\Table\TeamsTable $Teams
 */
class TeamsController extends AppController
{

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Clubs', 'Matches']
        ];
        $this->set('teams', $this->paginate($this->Teams));
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
        $team = $this->Teams->get($id, [
            'contain' => [
                'Clubs',
                'Matches',
                'Innings',
                'Squads' => [
                    'Players' => function ($q) {
                        return $q->contain(['PlayerSpecialisations'])
                            ->select(['id', 'first_name', 'initials', 'last_name', 'slug']);
                    }
                ]
            ]
        ]);
        $this->set('team', $team);
    }

    /**
     * Add method
     *
     * @return void
     */
    public function add()
    {
        $team = $this->Teams->newEntity($this->request->data);
        if ($this->request->is('post')) {
            if ($this->Teams->save($team)) {
                $this->Flash->success('The team has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The team could not be saved. Please, try again.');
            }
        }

        $players = $this->Teams->Squads->Players->find('PlayerListByTeam');
        $clubs = $this->Teams->Clubs->find('list');
        $matches = $this->Teams->Matches->find('list');
        $this->set(compact('team', 'clubs', 'matches', 'players'));
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
        $team = $this->Teams->get($id, [
            'contain' => 'Squads'
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $team = $this->Teams->patchEntity($team, $this->request->data);
            if ($this->Teams->save($team)) {
                $this->Flash->success('The team has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The team could not be saved. Please, try again.');
            }
        }
        $clubs = $this->Teams->Clubs->find('list');
        $matches = $this->Teams->Matches->find('list');
        $players = $this->Teams->Clubs->Players->find('PlayerListByTeam');

        $this->set(compact('team', 'clubs', 'matches', 'players'));
    }

    /**
     * Delete method
     *
     * @param string $id
     * @return \Cake\Controller\Controller::redirect
     * @throws \Cake\Network\Exception\NotFoundException
     */
    public function delete($id = null)
    {
        $team = $this->Teams->get($id);
        $this->request->allowMethod('post', 'delete');
        if ($this->Teams->delete($team)) {
            $this->Flash->success('The team has been deleted.');
        } else {
            $this->Flash->error('The team could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }

    /**
     * Find an opposition team in a match given the 'home' side.
     */
    public function opposition()
    {
        if (!$this->request->is('ajax') || empty($this->request->query['team'])) {
            return $this->render(false);
        }

        $homeTeamId = $this->request->query['team'];

        $homeTeam = $this->Teams->get($homeTeamId);
        $match = $this->Teams->Matches->get($homeTeam->match_id);

        /* @var \Cake\ORM\Query $opposition */
        $opposition = $this->Teams->find()
            ->contain([
                'Squads' => [
                    'Players' => [
                        'PlayerSpecialisations'
                    ]
                ]
            ])
            ->where([
                'match_id' => $match->id,
                'id !=' => $homeTeam->id
            ])
            ->first();


        $opposition = new Collection($opposition->squads);
        $result = $opposition->combine('player_id', function ($entity) {
            return $entity->player->get('FullDetail');
        });

        $this->set('opposition', $result);
        $this->set('_serialize', ['opposition']);
    }
}
