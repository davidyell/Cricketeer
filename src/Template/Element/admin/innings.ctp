<div class="innings <?php echo $this->NumbersToWords->spell($innings);?>">
	<h3><?php echo $this->NumbersToWords->ordinal($innings);?> Innings | <?php echo $team->name;?></h3>

	<?php
	echo "<fieldset class='batting'><legend>Batting</legend>";
		$num = 0;
		for ($i = $count; $i < $count + 11; $i++) {
			$playerNum = $num + 1;

			echo "<div class='batsman'>";
				echo $this->Form->input("batsmen.$i.player_id", ['type' => 'select', 'options' => $players, 'label' => 'Player ' . $playerNum, 'default' => $team['squads'][$num]['player_id']]);
				echo $this->Form->input("batsmen.$i.runs", ['type' => 'number']);
				echo $this->Form->input("batsmen.$i.balls", ['type' => 'number']);
				echo $this->Form->input("batsmen.$i.fours", ['type' => 'number']);
				echo $this->Form->input("batsmen.$i.sixes", ['type' => 'number']);
				echo "<div class='clearfix'><!-- blank --></div>";
			echo "</div>";
			$num++;
		}
	echo "</fieldset>";

	$i++;

	echo "<fieldset class='bowling'><legend>Bowling</legend>";
		echo "<div class='bowler'>";
			echo $this->Form->input("bowlers.$i.id", ['type' => 'select', 'options' => $players, 'label' => 'Bowler']);
			echo $this->Form->input("bowlers.$i.overs", ['type' => 'number']);
			echo $this->Form->input("bowlers.$i.runs", ['type' => 'number']);
			echo $this->Form->input("bowlers.$i.maidens", ['type' => 'number']);
			echo "<div class='clearfix'><!-- blank --></div>";
		echo "</div>";
		echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Add another bowler', '#', ['class' => 'btn btn-default add', 'data-action' => 'add-bowler', 'data-innings' => $innings, 'escape' => false]);
	echo "</fieldset>";

	$i++;

	echo "<fieldset class='wickets'><legend>Wickets</legend>";
		echo "<div class='wicket'>";
			echo $this->Form->input("wickets.$i.lost_wicket_player_id", ['options' => $players, 'label' => 'Lost their wicket']);
			echo $this->Form->input("wickets.$i.took_wicket_player_id", ['options' => $players, 'label' => 'Took the wicket']);
			echo $this->Form->input("wickets.$i.bowler_player_id", ['options' => $players, 'label' => 'Bowler']);
			echo $this->Form->input("wickets.$i.dismissal_id", ['options' => $dismissals]);
			echo $this->Form->input("wickets.$i.fall_of_wicket");
			echo "<div class='clearfix'><!-- blank --></div>";
		echo "</div>";
	echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Add another wicket', '#', ['class' => 'btn btn-default add', 'data-action' => 'add-wicket', 'data-innings' => $innings, 'escape' => false]);
	echo "</fieldset>";

	$i++;

	echo "<fieldset class='extras'><legend>Extras</legend>";
		echo "<div class='extra'>";
			echo $this->Form->input("innings.$i.team_id", ['type' => 'hidden', 'value' => $team['id']]);
			echo $this->Form->input("innings.$i.wides");
			echo $this->Form->input("innings.$i.byes");
			echo $this->Form->input("innings.$i.leg_byes");
			echo $this->Form->input("innings.$i.no_balls");
			echo $this->Form->input("innings.$i.penalty_runs");
			echo "<div class='clearfix'><!-- blank --></div>";
			echo $this->Form->checkbox("innings.$i.declared") . ' Declared?';
			echo $this->Form->input("innings.$i.innings_type_id", ['type' => 'hidden', 'value' => $inningsTypes->toArray()[$innings - 1]['id']]);
			echo "<div class='clearfix'><!-- blank --></div>";
		echo "</div>";
	echo "</fieldset>";
?>
</div>