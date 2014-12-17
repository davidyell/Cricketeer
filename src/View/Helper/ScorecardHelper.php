<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 15/12/14
 * Time: 11:42
 */

namespace App\View\Helper;

use App\Model\Entity\Match;
use Cake\View\Helper;

class ScorecardHelper extends Helper
{

    public $helpers = ['Form'];

    /**
     * Display a whole match score card as either a form or a view
     *
     * @param mixed $match
     * @param string $type
     */
    public function display($match, $type = 'view')
    {
        var_dump($match);

        if ($type === 'edit') {
            echo $this->Form->create($match);
        }

        if ($match->format->name === 'One Day' || $match->format->name === 'T20') {
            for ($i = 0; $i < 2; $i++) {

                if ($i % 2 === 0) {
                    $innings = 1;
                    $team = 0;
                    $opponent = 1;
                } else {
                    $innings = 1;
                    $team = 1;
                    $opponent = 0;
                }

                $teamsInnings = collection($match->innings)
                    ->match(['team_id' => $match->teams[$team]['id']])
                    ->toArray();

                if ($type === 'edit') {
                    $opposition = [];
                    foreach ($match->teams[$opponent]['squads'] as $squad) {
                        $opposition[$squad->player_id] = $squad->player->get('FullName')
                            . " ({$squad->player->player_specialisation->name})";
                    }
                } else {
                    $opposition = $match->teams[$opponent]['squads'];
                }


                if (is_array($teamsInnings) && !empty($teamsInnings)) {
                    $teamsInnings = $teamsInnings[key($teamsInnings)];
                } else {
                    $teamsInnings = [];
                }

                $options = [
                    'innings' => $innings,
                    'teamsInnings' => $teamsInnings,
                    'inningNum' => $i + 1,
                    'team' => $match->teams[$team],
                    'opposition' => $opposition
                ];

                if ($type === 'edit') {
                    echo $this->_View->element('Admin/innings-edit', $options);
                } else {
                    echo $this->_View->element('innings-view', $options);
                }

            }
        } elseif ($match->format->name === 'Test Match') {
            for ($i = 0; $i < 4; $i++) {

                switch ($i) {
                    case 0:
                        $innings = 1;
                        $team = 0;
                        $opponent = 1;
                        break;
                    case 1:
                        $innings = 1;
                        $team = 1;
                        $opponent = 0;
                        break;
                    case 2:
                        $innings = 2;
                        $team = 0;
                        $opponent = 1;
                        break;
                    case 3:
                        $innings = 2;
                        $team = 1;
                        $opponent = 0;
                        break;
                }

                $teamsInnings = collection($match->innings)
                    ->match(['team_id' => $match->teams[$team]['id']])
                    ->toArray();

                if ($type === 'edit') {
                    $opposition = [];
                    foreach ($match->teams[$opponent]['squads'] as $squad) {
                        $opposition[$squad->player_id] = $squad->player->get('FullName')
                            . " ({$squad->player->player_specialisation->name})";
                    }
                } else {
                    $opposition = $match->teams[$opponent]['squads'];
                }

                if (is_array($teamsInnings) && !empty($teamsInnings)) {
                    $teamsInnings = $teamsInnings[key($teamsInnings)];
                } else {
                    $teamsInnings = [];
                }
                $options = [
                    'innings' => $innings,
                    'teamsInnings' => $teamsInnings,
                    'inningNum' => $i + 1,
                    'team' => $match->teams[$team],
                    'opposition' => $opposition
                ];

                if ($type === 'edit') {
                    echo $this->_View->element('Admin/innings-edit', $options);
                } else {
                    echo $this->_View->element('innings-view', $options);
                }
            }
        }

        if ($type === 'edit') {
            echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']);
            echo $this->Form->end();
        }
    }
}
