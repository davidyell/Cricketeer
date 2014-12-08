<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $innings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $innings->id)]) ?></li>
		<li><?= $this->Html->link(__('List Innings'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List InningsTypes'), ['controller' => 'InningsTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings Type'), ['controller' => 'InningsTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Batsmen'), ['controller' => 'Batsmen', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Batsman'), ['controller' => 'Batsmen', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bowlers'), ['controller' => 'Bowlers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bowler'), ['controller' => 'Bowlers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Wickets'), ['controller' => 'Wickets', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Wicket'), ['controller' => 'Wickets', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="matches form col-md-10 score_card">
	<?php
	$inningNum = 1;
	echo $this->Form->create($innings);
	?>

	<div class="innings <?php echo $this->NumbersToWords->spell($inningNum);?>" data-inningnum="<?php echo $inningNum;?>">
		<h3><?php echo $innings->innings_type->name;?> | <?php echo $innings->team->name;?></h3>

		<?php
		echo $this->Form->input('Innings.match_id', ['empty' => 'Select match']);
		echo $this->Form->input('Innings.innings_type_id', ['empty' => 'Select innings']);
		echo $this->Form->input('Innings.team_id', ['empty' => 'Select team']);

		echo "<fieldset class='extras'><legend>Extras</legend>";
		echo "<div class='extra'>";
		if (isset($innings->id)) {
			echo $this->Form->input("Innings.id");
		}
		echo $this->Form->input("Innings.wides");
		echo $this->Form->input("Innings.byes");
		echo $this->Form->input("Innings.leg_byes");
		echo $this->Form->input("Innings.no_balls");
		echo $this->Form->input("Innings.penalty_runs");
		echo "<div class='clearfix'><!-- blank --></div>";
		echo $this->Form->checkbox("Innings.declared") . ' Did the team declare?';
		echo $this->Form->input("Innings.innings_type_id", ['type' => 'hidden', 'value' => $innings->innings_type->id]);
		echo "<div class='clearfix'><!-- blank --></div>";
		echo "</div>";
		echo "</fieldset>";

		echo "<fieldset class='batting'><legend>Batting</legend>";

		echo $this->element('Admin/running-total', ['innings' => $inningNum]);

		foreach ($innings->team->squads as $i => $squad) {

			// Find the correct batsman data for this player
			$batting = [];
			if (!empty($innings->batsmen)) {
				$batting = collection($innings->batsmen)->match(['player_id' => $squad->player_id])->toArray();
			}

			$playerNum = $i + 1;
			echo "<div class='batsman {$this->NumbersToWords->spell($playerNum)}' data-batsman='$playerNum'>";
			if (isset($batting[key($batting)]->id)) {
				echo $this->Form->input("innings.batsmen.$i.id", ['value' => $batting[key($batting)]->id]);
			}
			echo $this->Form->input("innings.batsmen.$i.player_id", ['type' => 'hidden', 'value' => $squad->player_id]);
			echo "<span class='form-label'>";
			echo $squad->player->get('FullName');
			echo $this->Html->image('../files/players/photo/' . $squad->player->photo_dir . '/portrait_' . $squad->player->photo);
			echo "</span>";
			echo "<div class='runs-input'>" . $this->Form->input("innings.batsmen.$i.runs", ['type' => 'number', 'value' => (isset($batting[key($batting)]->runs)) ? $batting[key($batting)]->runs : null]) . "</div>";
			echo $this->Form->input("innings.batsmen.$i.balls", ['type' => 'number', 'value' => (isset($batting[key($batting)]->balls)) ? $batting[key($batting)]->balls : null]);
			echo $this->Form->input("innings.batsmen.$i.fours", ['type' => 'number', 'value' => (isset($batting[key($batting)]->fours)) ? $batting[key($batting)]->fours : null]);
			echo $this->Form->input("innings.batsmen.$i.sixes", ['type' => 'number', 'value' => (isset($batting[key($batting)]->sixes)) ? $batting[key($batting)]->sixes : null]);

			echo "<div class='clearfix'><!-- blank --></div>";

			echo "<div class='wicket'>";
			// Find the batsmans wicket
			$wicket = [];
			if (!empty($innings->wickets)) {
				$wicket = collection($innings->wickets)->match(['lost_wicket_player_id' => $squad->player_id])->toArray();
			}

			if (empty($innings) || !empty($wicket) && !empty($batting[key($batting)]->runs)) {
				if (isset($wicket[key($wicket)]['id'])) {
					echo $this->Form->input("innings.wickets.$i.id", ['value' => $wicket[key($wicket)]['id']]);
				}
				echo $this->Form->input("innings.wickets.$i.lost_wicket_player_id", ['type' => 'hidden', 'value' => $squad->player->id]);
				echo $this->Form->input("innings.wickets.$i.took_wicket_player_id", ['options' => $opposition, 'label' => 'Took the wicket', 'empty' => 'Select player', 'default' => (isset($wicket[key($wicket)]['took_wicket_player_id'])) ? $wicket[key($wicket)]['took_wicket_player_id'] : null]);
				echo $this->Form->input("innings.wickets.$i.bowler_player_id", ['options' => $opposition, 'label' => 'Bowler', 'empty' => 'Select player', 'default' => (isset($wicket[key($wicket)]['bowler_player_id'])) ? $wicket[key($wicket)]['bowler_player_id'] : null]);

				echo "<div class='clearfix'><!-- blank --></div>";

				echo $this->Form->input("innings.wickets.$i.dismissal_id", ['options' => $dismissals, 'default' => (isset($wicket[key($wicket)]['dismissal_id'])) ? $wicket[key($wicket)]['dismissal_id'] : null]);
				echo $this->Form->input("innings.wickets.$i.fall_of_wicket", ['value' => (isset($wicket[key($wicket)]['fall_of_wicket'])) ? $wicket[key($wicket)]['fall_of_wicket'] : null]);

				if (isset($wicket[key($wicket)]['id'])) {
					echo $this->Html->link('Delete', ['controller' => 'wickets', 'action' => 'delete', $wicket[key($wicket)]['id']], ['class' => 'btn btn-danger', 'title' => 'Delete this wicket']);
				} else {
					echo $this->Html->link('Not out', '#notout', ['class' => 'btn btn-primary', 'title' => 'Hide this wicket as batsman not out']);
				}
			} else {
				echo "<p>Not out</p>";
				echo $this->Html->link('Add wicket', '#add-wicket', ['class' => 'btn btn-primary']);
			}

			echo "</div>";

			echo "<div class='clearfix'><!-- blank --></div>";

			echo "<span class='number'>{$playerNum}</span>";
			echo "</div>";
		}
		echo "</fieldset>";

		$i++;

		echo "<fieldset class='bowling'><legend>Bowling</legend>";
		if (isset($innings->bowlers) && !empty($innings->bowlers)) {
			foreach ($innings->bowlers as $k => $bowler) {
				echo "<div class='bowler'>";
				$num = $i + $k;
				echo $this->Form->input("innings.bowlers.$num.id", ['type' => 'hidden', 'value' => $bowler->id]);
				echo $this->Form->input("innings.bowlers.$num.player_id", ['type' => 'select', 'options' => $opposition, 'label' => 'Bowler', 'default' => $bowler->player_id]);
				echo $this->Form->input("innings.bowlers.$num.overs", ['type' => 'number', 'value' => $bowler->overs]);
				echo $this->Form->input("innings.bowlers.$num.runs", ['type' => 'number', 'value' => $bowler->runs]);
				echo $this->Form->input("innings.bowlers.$num.maidens", ['type' => 'number', 'value' => $bowler->maidens]);
				echo $this->Html->link('Delete', ['controller' => 'bowlers', 'action' => 'delete', $bowler->id], ['class' => 'btn btn-danger']);
				echo "<div class='clearfix'><!-- blank --></div>";
				echo "</div>";
			}
		} else {
			echo "<div class='bowler'>";
			echo $this->Form->input("innings.bowlers.$i.player_id", ['type' => 'select', 'options' => $opposition, 'label' => 'Bowler']);
			echo $this->Form->input("innings.bowlers.$i.overs", ['type' => 'number']);
			echo $this->Form->input("innings.bowlers.$i.runs", ['type' => 'number']);
			echo $this->Form->input("innings.bowlers.$i.maidens", ['type' => 'number']);
			echo "<div class='clearfix'><!-- blank --></div>";
			echo "</div>";
		}
		echo $this->Html->link('<span class="glyphicon glyphicon-plus"></span> Add another bowler', '#', ['class' => 'btn btn-default add', 'data-action' => 'add-bowler', 'data-innings' => $inningNum, 'escape' => false]);
		echo "</fieldset>";

		?>
	</div>
	<?php
	echo $this->Form->submit('Save', ['class' => 'btn btn-success']);
	echo $this->Form->end();
	?>
</div>
