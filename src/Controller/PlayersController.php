<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/12/14
 * Time: 09:32
 */

namespace App\Controller;

use App\Controller\AppController;

class PlayersController extends AppController
{

    public $components = ['Paginator'];

    public function index()
    {
        $players = $this->Paginator->paginate($this->Players, [
            'contain' => [
                'Clubs',
                'PlayerSpecialisations'
            ]
        ]);
        $this->set('players', $players);
    }

    public function view($slug)
    {
        $player = $this->Players->find()
            ->contain([
                'Clubs',
                'PlayerSpecialisations'
            ])
            ->where(['slug' => $slug])
            ->first();

        $this->set('player', $player);
    }

}