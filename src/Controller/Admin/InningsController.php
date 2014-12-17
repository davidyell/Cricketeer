<?php
namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Innings Controller
 *
 * @property App\Model\Table\InningsTable $Innings
 */
class InningsController extends AppController
{

    public $helpers = [
        'NumbersToWords.NumbersToWords',
        'Scorecard'
    ];

    /**
     * Index method
     *
     * @return void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [
                'Matches',
                'Teams',
                'InningsTypes'
            ]
        ];
        $this->set('innings', $this->paginate($this->Innings));
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
        $innings = $this->Innings->get($id, [
            'contain' => [
                'Matches',
                'Teams',
                'Wickets' => [
                    'PlayerLostWicket',
                    'PlayerTookWicket',
                    'PlayerBowledWicket',
                    'Dismissals'
                ],
                'Batsmen' => [
                    'Players'
                ],
                'Bowlers' => [
                    'Players',
                    'Innings' => [
                        'fields' => ['id'],
                        'Wickets' => [
                            'fields' => ['id', 'innings_id']
                        ]
                    ]
                ],
                'InningsTypes'
            ]
        ]);
        $this->set('innings', $innings);
    }

    /**
     * Add method
     *
     * @return void
     */
    public function add()
    {
        $innings = $this->Innings->newEntity($this->request->data);
        if ($this->request->is('post')) {

            // Clear up empty fields
            if (empty($innings->bowlers[0]['overs'])) {
                $innings->__unset('bowlers');
            }

            if ($this->Innings->save($innings)) {
                $this->Flash->success('The innings has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The innings could not be saved. Please, try again.');
            }
        }

        $matches = $this->Innings->Matches->find('list');
        $teams = $this->Innings->Teams->find('list');
        $wickets = $this->Innings->Wickets->find('list');
        $dismissals = $this->Innings->Wickets->Dismissals->find('list');
        $inningsTypes = $this->Innings->InningsTypes->find('list');
        $this->set(compact('innings', 'matches', 'teams', 'wickets', 'dismissals', 'inningsTypes'));
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
        $innings = $this->Innings->get($id, [
            'contain' => [
                'Bowlers',
                'Batsmen',
                'Wickets' => function ($q) {
                    // Order the Wickets by the fall of wicket, so they are in the correct order
                    return $q->order([
                        "LENGTH(SUBSTRING_INDEX(fall_of_wicket, '-', -1))",
                        "SUBSTRING_INDEX(fall_of_wicket, '-', -1)"
                    ]);
                },
                'InningsTypes',
                'Teams' => [
                    'Squads' => [
                        'Players'
                    ]
                ]
            ]
        ]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $innings = $this->Innings->patchEntity($innings, $this->request->data(), [
                'associated' => [
                    'Bowlers', 'Batsmen', 'Wickets'
                ]
            ]);

            if ($this->Innings->save($innings, ['associated' => ['Bowlers', 'Batsmen', 'Wickets']])) {
                $this->Flash->success('The innings has been saved.');
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error('The innings could not be saved. Please, try again.');
            }
        }

        $oppositionData = $this->Innings->Matches->find()
            ->contain([
                'Teams' => function ($q) use ($innings) {
                    return $q->contain([
                        'Squads' => [
                            'Players' => function ($q) {
                                return $q->contain(['PlayerSpecialisations'])
                                    ->select(['id', 'first_name', 'initials', 'last_name', 'photo_dir', 'photo']);
                            }
                        ]
                    ])
                        ->where(['Teams.id !=' => $innings->team->id]);
                }
            ])
            ->where(['Matches.id' => $innings->match_id])
            ->first();

        foreach ($oppositionData['teams'][0]['squads'] as $member) {
            $opposition[$member['player_id']] = $member->player->get('FullDetail');
        }

        $matches = $this->Innings->Matches->find('list');
        $teams = $this->Innings->Teams->find('list');
        $wickets = $this->Innings->Wickets->find('list');
        $dismissals = $this->Innings->Wickets->Dismissals->find('list');
        $inningsTypes = $this->Innings->InningsTypes->find();
        $this->set(compact('innings', 'matches', 'teams', 'wickets', 'dismissals', 'inningsTypes', 'opposition'));
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
        $innings = $this->Innings->get($id);
        $this->request->allowMethod('post', 'delete');
        if ($this->Innings->delete($innings)) {
            $this->Flash->success('The innings has been deleted.');
        } else {
            $this->Flash->error('The innings could not be deleted. Please, try again.');
        }
        return $this->redirect(['action' => 'index']);
    }
}
