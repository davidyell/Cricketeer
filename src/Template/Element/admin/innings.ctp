<div class="innings <?php echo $this->NumbersToWords->spell($innings);?>">
	<h3><?php echo $this->NumbersToWords->ordinal($innings);?> Innings | <?php echo $teamsInnings->team->name;?></h3>

	<?php
	echo "<fieldset class='extras'><legend>Extras</legend>";
		echo "<div class='extra'>";
			if (isset($teamsInnings->id)) {
				echo $this->Form->input("innings.$inningNum.id");
			}
			echo $this->Form->input("innings.$inningNum.team_id", ['type' => 'hidden', 'value' => $teamsInnings->team->id]);
			echo $this->Form->input("innings.$inningNum.wides", ['value' => $teamsInnings->wides]);
			echo $this->Form->input("innings.$inningNum.byes", ['value' => $teamsInnings->byes]);
			echo $this->Form->input("innings.$inningNum.leg_byes", ['value' => $teamsInnings->leg_byes]);
			echo $this->Form->input("innings.$inningNum.no_balls", ['value' => $teamsInnings->no_balls]);
			echo $this->Form->input("innings.$inningNum.penalty_runs", ['value' => $teamsInnings->penalty_runs]);
			echo "<div class='clearfix'><!-- blank --></div>";
			echo $this->Form->checkbox("innings.$inningNum.declared", ['checked' => $teamsInnings->declared]) . ' Declared?';
			echo $this->Form->input("innings.$inningNum.innings_type_id", ['type' => 'hidden', 'value' => $inningsTypes->toArray()[$innings - 1]['id']]);
			echo "<div class='clearfix'><!-- blank --></div>";
		echo "</div>";
	echo "</fieldset>";

	echo "<fieldset class='batting'><legend>Batting</legend>";
		$num = 0;
		for ($i = 0; $i < 11; $i++) {
			$playerNum = $num + 1;

			echo "<div class='batsman'>";
				echo $this->Form->input("innings.$inningNum.batsmen.$i.player_id", ['type' => 'select', 'options' => $players, 'label' => 'Player ' . $playerNum, 'default' => $teamsInnings['team']['squads'][$i]['player_id']]);
				echo $this->Form->input("innings.$inningNum.batsmen.$i.runs", ['type' => 'number']);
				echo $this->Form->input("innings.$inningNum.batsmen.$i.balls", ['type' => 'number']);
				echo $this->Form->input("innings.$inningNum.batsmen.$i.fours", ['type' => 'number']);
				echo $this->Form->input("innings.$inningNum.batsmen.$i.sixes", ['type' => 'number']);
				echo "<div class='clearfix'><!-- blank --></div>";
			echo "</div>";
			$num++;
		}
	echo "</fieldset>";

	$i++;

	echo "<fieldset class='bowling'><legend>Bowling</legend>";
		if (isset($teamsInnings->bowlers) && !empty($teamsInnings->bowlers)) {
			foreach ($teamsInnings->bowlers as $k => $bowler) {
				echo "<div class='bowler'>";
					$num = $i + $k;
					echo $this->Form->input("innings.$inningNum.bowlers.$num.id", ['type' => 'select', 'options' => $players, 'label' => 'Bowler', 'default' => $bowler->player_id]);
					echo $this->Form->input("innings.$inningNum.bowlers.$num.overs", ['type' => 'number', 'value' => $bowler->overs]);
					echo $this->Form->input("innings.$inningNum.bowlers.$num.runs", ['type' => 'number', 'value' => $bowler->runs]);
					echo $this->Form->input("innings.$inningNum.bowlers.$num.maidens", ['type' => 'number', 'value' => $bowler->maidens]);
					echo "<div class='clearfix'><!-- blank --></div>";
				echo "</div>";
			}
		} else {
			echo "<div class='bowler'>";
				echo $this->Form->input("innings.$inningNum.bowlers.$i.id", ['type' => 'select', 'options' => $players, 'label' => 'Bowler']);
				echo $this->Form->input("innings.$inningNum.bowlers.$i.overs", ['type' => 'number']);
				echo $this->Form->input("innings.$inningNum.bowlers.$i.runs", ['type' => 'number']);
				echo $this->Form->input("innings.$inningNum.bowlers.$i.maidens", ['type' => 'number']);
				echo "<div class='clearfix'><!-- blank --></div>";
			echo "</div>";
		}
		echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Add another bowler', '#', ['class' => 'btn btn-default add', 'data-action' => 'add-bowler', 'data-innings' => $innings, 'escape' => false]);
	echo "</fieldset>";

	$i++;

	echo "<fieldset class='wickets'><legend>Wickets</legend>";
		if (isset($teamsInnings->wickets) && !empty($teamsInnings->wickets)) {
			foreach ($teamsInnings->wickets as $k => $wicket) {
				echo "<div class='wicket'>";
					$num = $i + $k;
					echo $this->Form->input("innings.$inningNum.wickets.$num.lost_wicket_player_id", ['options' => $players, 'label' => 'Lost their wicket', 'default' => $wicket->lost_wicket_player_id]);
					echo $this->Form->input("innings.$inningNum.wickets.$num.took_wicket_player_id", ['options' => $players, 'label' => 'Took the wicket', 'default' => $wicket->took_wicket_player_id]);
					echo $this->Form->input("innings.$inningNum.wickets.$num.bowler_player_id", ['options' => $players, 'label' => 'Bowler', 'default' => $wicket->bowler_player_id]);
					echo $this->Form->input("innings.$inningNum.wickets.$num.dismissal_id", ['options' => $dismissals, 'default' => $wicket->dismissal_id]);
					echo $this->Form->input("innings.$inningNum.wickets.$num.fall_of_wicket", ['value' => $wicket->fall_of_wicket]);
					echo "<div class='clearfix'><!-- blank --></div>";
				echo "</div>";
			}
		} else {
			echo "<div class='wicket'>";
				echo $this->Form->input("innings.$inningNum.wickets.$i.lost_wicket_player_id", ['options' => $players, 'label' => 'Lost their wicket']);
				echo $this->Form->input("innings.$inningNum.wickets.$i.took_wicket_player_id", ['options' => $players, 'label' => 'Took the wicket']);
				echo $this->Form->input("innings.$inningNum.wickets.$i.bowler_player_id", ['options' => $players, 'label' => 'Bowler']);
				echo $this->Form->input("innings.$inningNum.wickets.$i.dismissal_id", ['options' => $dismissals]);
				echo $this->Form->input("innings.$inningNum.wickets.$i.fall_of_wicket");
				echo "<div class='clearfix'><!-- blank --></div>";
			echo "</div>";
		}
	echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Add another wicket', '#', ['class' => 'btn btn-default add', 'data-action' => 'add-wicket', 'data-innings' => $innings, 'escape' => false]);
	echo "</fieldset>";
?>
</div>