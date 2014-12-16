<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 16/12/14
 * Time: 14:05
 */

namespace App\Controller;

class LeaguesController extends AppController {

    /**
     * Paginate a list of leagues
     */
    public function index()
    {
        $leagues = $this->Paginator->paginate($this->Leagues);
        $this->set('leagues', $leagues);
    }

    public function view($id)
    {
        $league = $this->Leagues->find()
            ->contain(['Clubs'])
            ->where(['id' => $id])
            ->first();

        $this->set('league', $league);
    }

}