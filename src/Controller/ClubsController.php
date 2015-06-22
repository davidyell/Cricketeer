<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/12/14
 * Time: 16:38
 */

namespace App\Controller;

class ClubsController extends AppController {

    public function index()
    {
        $clubs = $this->Paginator->paginate($this->Clubs, [
            'contain' => [
                'Players'
            ]
        ]);
        $this->set('clubs', $clubs);
    }

    public function view($id)
    {
        $club = $this->Clubs->find()
            ->contain([
                'Players' => function ($q) {
                    return $q->contain([
                        'PlayerSpecialisations',
                        'BattingStyles' => ['fields' => ['id', 'name']],
                        'BowlingStyles' => ['fields' => ['id', 'name', 'shorthand']]
                    ]);
                }
            ])
            ->where(['id' => $id])
            ->first();

        $this->set('club', $club);
    }
}
