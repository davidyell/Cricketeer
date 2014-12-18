<div class="innings <?php echo $this->NumbersToWords->spell($innings); ?>" data-inningNum="<?php echo $inningNum; ?>">
    <h3><?php echo $this->NumbersToWords->ordinal($innings); ?> Innings | <?php echo $team->name; ?></h3>


    <fieldset class='extras'><legend>Extras</legend>
        <div class='extra'>
            <?php
            if (isset($teamsInnings->id)) {
                echo $this->Form->input("innings.$inningNum.id", ['value' => $teamsInnings->id]);
            }
            echo $this->Form->input("innings.$inningNum.team_id", ['type' => 'hidden', 'value' => $team->id]);
            echo $this->Form->input("innings.$inningNum.wides", ['value' => (isset($teamsInnings->wides)) ? $teamsInnings->wides : null]);
            echo $this->Form->input("innings.$inningNum.byes", ['value' => (isset($teamsInnings->byes)) ? $teamsInnings->byes : null]);
            echo $this->Form->input("innings.$inningNum.leg_byes", ['value' => (isset($teamsInnings->leg_byes)) ? $teamsInnings->leg_byes : null]);
            echo $this->Form->input("innings.$inningNum.no_balls", ['value' => (isset($teamsInnings->no_balls)) ? $teamsInnings->no_balls : null]);
            echo $this->Form->input("innings.$inningNum.penalty_runs", ['value' => (isset($teamsInnings->penalty_runs)) ? $teamsInnings->penalty_runs : null]);
            ?>
            <div class='clearfix'><!-- blank --></div>
            <?php
            echo $this->Form->checkbox("innings.$inningNum.declared", ['checked' => (isset($teamsInnings->declared)) ? $teamsInnings->declared : false]) . ' Did the team declare?';
            echo $this->Form->input("innings.$inningNum.innings_type_id", ['type' => 'hidden', 'value' => $inningsTypes->toArray()[$innings - 1]['id']]);
            ?>
            <div class='clearfix'><!-- blank --></div>
        </div>
    </fieldset>

    <fieldset class='batting'><legend>Batting</legend>

    <?php
    echo $this->element('Admin/running-total', ['innings' => $inningNum]);

    foreach ($team->squads as $i => $squad) {

        // Find the correct batsman data for this player
        $batting = [];
        if (!empty($teamsInnings->batsmen)) {
            $batting = collection($teamsInnings->batsmen)->match(['player_id' => $squad->player_id])->toArray();
        }

        $playerNum = $i + 1;
        ?>
        <div class='batsman <?php echo $this->NumbersToWords->spell($playerNum);?>' data-batsman='<?php echo $playerNum;?>'>
            <?php
            if (isset($batting[key($batting)]->id)) {
                echo $this->Form->input("innings.$inningNum.batsmen.$i.id", ['value' => $batting[key($batting)]->id]);
            }
            echo $this->Form->input("innings.$inningNum.batsmen.$i.player_id", ['type' => 'hidden', 'value' => $squad->player_id]);

            ?><span class='form-label'><?php
                echo $squad->player->get('FullName');
                echo $this->Html->image('../files/players/photo/' . $squad->player->photo_dir . '/portrait_' . $squad->player->photo);
            ?></span>

            <div class='batting-figures'>
                <?php
                $m = new Mustache_Engine([
                    'loader' => new Mustache_Loader_FilesystemLoader(WWW_ROOT . DS . 'mustache')
                ]);
                echo $m->render('batting.mustache', [
                    'inningNum' => $inningNum,
                    'i' => $i,
                    'runs' => isset($batting[key($batting)]->runs) ? $batting[key($batting)]->runs : 0,
                    'balls' => isset($batting[key($batting)]->balls) ? $batting[key($batting)]->balls : 0,
                    'fours' => isset($batting[key($batting)]->fours) ? $batting[key($batting)]->fours : 0,
                    'sixes' => isset($batting[key($batting)]->sixes) ? $batting[key($batting)]->sixes : 0,
                    'batsmanId' => $batting[key($batting)]->id
                ]);
                ?>
            </div>

            <div class='clearfix'><!-- blank --></div>

            <div class='wicket'>
                <?php
                // Find the batsmans wicket
                $wicket = [];
                if (!empty($teamsInnings->wickets)) {
                    $wicket = collection($teamsInnings->wickets)->match(['lost_wicket_player_id' => $squad->player_id])->toArray();
                }

                echo $m->render('wicket.mustache', [
                    'wicketId' => $wicket[key($wicket)]['id'],
                    'inningNum' => $inningNum,
                    'i' => $i,
                    'lostWicketPlayerId' => $squad->player->id,
                    'fallOfWicket' => (isset($wicket[key($wicket)]['fall_of_wicket'])) ? $wicket[key($wicket)]['fall_of_wicket'] : null,
                    'opposition' => $opposition,
                    'dismissals' => $dismissals,
                    'dismissalValue' => (isset($wicket[key($wicket)]['dismissal_id'])) ? $wicket[key($wicket)]['dismissal_id'] : null
                ]);
                ?>
            </div>

            <div class='clearfix'><!-- blank --></div>

            <span class='number'><?php echo $playerNum;?></span>
        </div> <!-- End of batsman -->
        <?php
    }
    echo "</fieldset>";

    $i++;
    ?>

    <fieldset class='bowling'><legend>Bowling</legend>
    <?php
    if (isset($teamsInnings->bowlers) && !empty($teamsInnings->bowlers)) {
        foreach ($teamsInnings->bowlers as $k => $bowler) {
            echo "<div class='bowler'>";
            $num = $i + $k;
            echo $this->Form->input("innings.$inningNum.bowlers.$num.id", ['type' => 'hidden', 'value' => $bowler->id]);
            echo $this->Form->input("innings.$inningNum.bowlers.$num.player_id", ['type' => 'select', 'options' => $opposition, 'label' => 'Bowler', 'default' => $bowler->player_id]);
            echo $this->Form->input("innings.$inningNum.bowlers.$num.overs", ['type' => 'number', 'value' => $bowler->overs]);
            echo $this->Form->input("innings.$inningNum.bowlers.$num.runs", ['type' => 'number', 'value' => $bowler->runs]);
            echo $this->Form->input("innings.$inningNum.bowlers.$num.maidens", ['type' => 'number', 'value' => $bowler->maidens]);
            echo $this->Html->link('Delete bowler', ['controller' => 'bowlers', 'action' => 'delete', $bowler->id], ['class' => 'btn btn-danger']);
            echo "<div class='clearfix'><!-- blank --></div>";
            echo "</div>";
        }
    } else {
        echo "<div class='bowler'>";
        echo $this->Form->input("innings.$inningNum.bowlers.$i.player_id", ['type' => 'select', 'options' => $opposition, 'label' => 'Bowler']);
        echo $this->Form->input("innings.$inningNum.bowlers.$i.overs", ['type' => 'number']);
        echo $this->Form->input("innings.$inningNum.bowlers.$i.runs", ['type' => 'number']);
        echo $this->Form->input("innings.$inningNum.bowlers.$i.maidens", ['type' => 'number']);
        echo "<div class='clearfix'><!-- blank --></div>";
        echo "</div>";
    }
    echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Add another bowler', '#', ['class' => 'btn btn-default add', 'data-action' => 'add-bowler', 'data-innings' => $inningNum, 'escape' => false]);
    echo "</fieldset>";

    ?>
</div>