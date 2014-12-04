<div class="innings <?php echo $this->NumbersToWords->spell($innings);?>" data-inningNum="<?php echo $inningNum;?>">
	<h3><?php echo $this->NumbersToWords->ordinal($innings);?> Innings | <?php echo $team->name;?></h3>

	<?php
	echo "<fieldset class='extras'><legend>Extras</legend>";
		echo "<div class='extra'>";
			if (isset($teamsInnings->id)) {
				echo $this->Form->input("innings.$inningNum.id", ['value' => $teamsInnings->id]);
			}
			echo $this->Form->input("innings.$inningNum.team_id", ['type' => 'hidden', 'value' => $team->id]);
			echo $this->Form->input("innings.$inningNum.wides", ['value' => (isset($teamsInnings->wides))? $teamsInnings->wides : null]);
			echo $this->Form->input("innings.$inningNum.byes", ['value' => (isset($teamsInnings->byes))? $teamsInnings->byes : null]);
			echo $this->Form->input("innings.$inningNum.leg_byes", ['value' => (isset($teamsInnings->leg_byes))? $teamsInnings->leg_byes : null]);
			echo $this->Form->input("innings.$inningNum.no_balls", ['value' => (isset($teamsInnings->no_balls))? $teamsInnings->no_balls : null]);
			echo $this->Form->input("innings.$inningNum.penalty_runs", ['value' => (isset($teamsInnings->penalty_runs))? $teamsInnings->penalty_runs : null]);
			echo "<div class='clearfix'><!-- blank --></div>";
			echo $this->Form->checkbox("innings.$inningNum.declared", ['checked' => (isset($teamsInnings->declared))? $teamsInnings->declared : false]) . ' Did the team declare?';
			echo $this->Form->input("innings.$inningNum.innings_type_id", ['type' => 'hidden', 'value' => $inningsTypes->toArray()[$innings - 1]['id']]);
			echo "<div class='clearfix'><!-- blank --></div>";
		echo "</div>";
	echo "</fieldset>";

	echo "<fieldset class='batting'><legend>Batting</legend>";

		echo $this->element('Admin/running-total', ['innings' => $inningNum]);

		foreach ($team->squads as $i => $squad) {

			// Find the correct batsman data for this player
			$batting = [];
			if (!empty($teamsInnings->batsmen)) {
				$batting = collection($teamsInnings->batsmen)->match(['player_id' => $squad->player_id])->toArray();
			}

			$playerNum = $i + 1;
			echo "<div class='batsman {$this->NumbersToWords->spell($playerNum)}'>";
				if (isset($batting[key($batting)]->id)) {
					echo $this->Form->input("innings.$inningNum.batsmen.$i.id", ['value' => $batting[key($batting)]->id]);
				}
				echo $this->Form->input("innings.$inningNum.batsmen.$i.player_id", ['type' => 'hidden', 'value' => $squad->player_id]);
				echo "<span class='form-label'>" . $squad->player->get('FullName') . "</span>";
				echo "<div class='runs-input'>" . $this->Form->input("innings.$inningNum.batsmen.$i.runs", ['type' => 'number', 'value' => (isset($batting[key($batting)]->runs)) ? $batting[key($batting)]->runs : null]) . "</div>";
				echo $this->Form->input("innings.$inningNum.batsmen.$i.balls", ['type' => 'number', 'value' => (isset($batting[key($batting)]->balls)) ? $batting[key($batting)]->balls : null]);
				echo $this->Form->input("innings.$inningNum.batsmen.$i.fours", ['type' => 'number', 'value' => (isset($batting[key($batting)]->fours)) ? $batting[key($batting)]->fours : null]);
				echo $this->Form->input("innings.$inningNum.batsmen.$i.sixes", ['type' => 'number', 'value' => (isset($batting[key($batting)]->sixes)) ? $batting[key($batting)]->sixes : null]);

				echo "<div class='clearfix'><!-- blank --></div>";
				echo "<div class='wicket'>";
					// Find the batsmans wicket
					$wicket = [];
					if (!empty($teamsInnings->wickets)) {
						$wicket = collection($teamsInnings->wickets)->match(['lost_wicket_player_id' => $squad->player_id])->toArray();
					}

					echo $this->Form->input("innings.$inningNum.wickets.$i.id", ['value' => (isset($wicket[key($wicket)]['id']) ? $wicket[key($wicket)]['id'] : null)]);
					echo $this->Form->input("innings.$inningNum.wickets.$i.lost_wicket_player_id", ['type' => 'hidden', 'value' => $squad->player->id]);
					echo $this->Form->input("innings.$inningNum.wickets.$i.took_wicket_player_id", ['options' => $opposition, 'label' => 'Took the wicket', 'default' => (isset($wicket[key($wicket)]['took_wicket_player_id'])) ? $wicket[key($wicket)]['took_wicket_player_id'] : null]);
					echo $this->Form->input("innings.$inningNum.wickets.$i.bowler_player_id", ['options' => $opposition, 'label' => 'Bowler', 'default' => (isset($wicket[key($wicket)]['bowler_player_id'])) ? $wicket[key($wicket)]['bowler_player_id'] : null]);
					echo $this->Form->input("innings.$inningNum.wickets.$i.dismissal_id", ['options' => $dismissals, 'default' => (isset($wicket[key($wicket)]['dismissal_id'])) ? $wicket[key($wicket)]['dismissal_id'] : null]);
					echo $this->Form->input("innings.$inningNum.wickets.$i.fall_of_wicket", ['value' => (isset($wicket[key($wicket)]['fall_of_wicket'])) ? $wicket[key($wicket)]['fall_of_wicket'] : null]);
				echo "</div>";
				echo "<div class='clearfix'><!-- blank --></div>";
				echo "<span class='number'>{$playerNum}</span>";
			echo "</div>";
		}
	echo "</fieldset>";

	$i++;

	echo "<fieldset class='bowling'><legend>Bowling</legend>";
		if (isset($teamsInnings->bowlers) && !empty($teamsInnings->bowlers)) {
			foreach ($teamsInnings->bowlers as $k => $bowler) {
				echo "<div class='bowler'>";
					$num = $i + $k;
					echo $this->Form->input("innings.$inningNum.bowlers.$num.id", ['type' => 'hidden', 'value' => $bowler->id]);
					echo $this->Form->input("innings.$inningNum.bowlers.$num.player_id", ['type' => 'select', 'options' => $opposition, 'label' => 'Bowler', 'default' => $bowler->player_id]);
					echo $this->Form->input("innings.$inningNum.bowlers.$num.overs", ['type' => 'number', 'value' => $bowler->overs]);
					echo $this->Form->input("innings.$inningNum.bowlers.$num.runs", ['type' => 'number', 'value' => $bowler->runs]);
					echo $this->Form->input("innings.$inningNum.bowlers.$num.maidens", ['type' => 'number', 'value' => $bowler->maidens]);
					echo $this->Html->link('Delete', ['controller' => 'bowlers', 'action' => 'delete', $bowler->id], ['class' => 'btn btn-danger']);
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