<?php
$batsmen = new \Cake\Collection\Collection($teamsInnings->batsmen);
$bowlers = new \Cake\Collection\Collection($teamsInnings->bowlers);
$wickets = new \Cake\Collection\Collection($teamsInnings->wickets);
$squad = new \Cake\Collection\Collection($team->squads);
$opponents = new \Cake\Collection\Collection($opposition);
?>
<div class="innings <?php echo $this->NumbersToWords->spell($innings);?>" data-inningNum="<?php echo $inningNum;?>">
	<h3><?php echo $this->NumbersToWords->ordinal($innings);?> Innings | <?php echo $team->name;?></h3>

	<table summary="batting">
		<tr>
			<th colspan="7">
				<?php
				$total = $batsmen->sumOf('runs');
				$total += $teamsInnings->wides + $teamsInnings->byes + $teamsInnings->leg_byes + $teamsInnings->no_balls + $teamsInnings->penalty_runs;

				$totalOvers = $bowlers->sumOf('overs');

				echo "{$team->name} {$total} for " . count($teamsInnings->wickets) . " ({$totalOvers} overs)";
				?>
			</th>
		</tr>
		<tr>
			<th colspan="3">&nbsp;</th>
			<th>Runs</th>
			<th>Balls</th>
			<th>4s</th>
			<th>6s</th>
		</tr>
		<?php foreach ($team->squads as $squadPlayer):
			$batting = $batsmen->match(['player_id' => $squadPlayer->player->id])->first();
			?>
			<tr>
				<td><?php echo $this->Html->link($squadPlayer->player->get('FullName'), ['controller' => 'players', 'action' => 'view', $squadPlayer->player->slug]);?></td>
				<td><?php
					$wicket = $wickets->match(['lost_wicket_player_id' => $squadPlayer->player->id])->first();
					if ($wicket) {
						$tookWicket = $opponents->match(['player_id' => $wicket->took_wicket_player_id])->first();
						$bowledWicket = $opponents->match(['player_id' => $wicket->bowler_player_id])->first();

						$cnb = false;
						if ($tookWicket->player->id === $bowledWicket->player->id && $wicket->dismissal->name === 'Bowled') {
							echo "c and b " . $bowledWicket->player->last_name;
							$cnb = true;
						} else {
							switch ($wicket->dismissal->name) {
								case "Hit wicket":
									break;
								case "Run out":
								case "Stumped":
									echo $wicket->dismissal->name . ' (' . $tookWicket->player->last_name . ')';
									break;
								case "Bowled":
									break;
								case "Caught":
									echo 'c ' . $tookWicket->player->last_name;
									break;
								case "Hit the ball twice":
								case "Retired":
								case "Handled the ball":
								case "Obstructing the field":
								case "Timed out":
									echo strtolower($wicket->dismissal->name);
									break;
								case "Leg before":
									echo "lbw";
									break;
							}
						}
					} else {
						echo 'Not out';
					}
				?></td>
				<td><?php
					if ($wicket && !$cnb) {
						echo "b " . $bowledWicket->player->last_name;
					}
				?></td>
				<td><?php echo $batting->runs;?></td>
				<td><?php echo $batting->balls;?></td>
				<td><?php echo $batting->fours;?></td>
				<td><?php echo $batting->sixes;?></td>
			</tr>
		<?php endforeach; ?>
		<tr>
			<td>Extras</td>
			<td colspan="2"><?php
				if ($teamsInnings->wides > 0) {
					echo $teamsInnings->wides . "w ";
				}
				if ($teamsInnings->byes > 0) {
					echo $teamsInnings->byes . "b ";
				}
				if ($teamsInnings->leg_byes > 0) {
					echo $teamsInnings->leg_byes . "lb ";
				}
				if ($teamsInnings->no_balls > 0) {
					echo $teamsInnings->no_balls . "nb ";
				}
				if ($teamsInnings->penalty_runs > 0) {
					echo $teamsInnings->penalty_runs . "pr ";
				}
				?></td>
			<td><?php echo $teamsInnings->wides + $teamsInnings->byes + $teamsInnings->leg_byes + $teamsInnings->no_balls + $teamsInnings->penalty_runs;?></td>
			<td colspan="3">&nbsp;</td>
		</tr>
	</table>

	<div class="row">
		<div class="col-md-6">
			<table summary="bowling">
				<tr>
					<th>Bowler</th>
					<th>Overs</th>
					<th>Maidens</th>
					<th>Runs</th>
					<th>Wickets</th>
				</tr>
				<?php foreach ($bowlers as $bowler):
					$player = $opponents->match(['player_id' => $bowler->player_id])->first();
					?>
					<tr>
						<td><?php echo $player->player->last_name;?></td>
						<td><?php echo $bowler->overs;?></td>
						<td><?php echo $bowler->maidens;?></td>
						<td><?php echo $bowler->runs;?></td>
						<td><?php
							$bowlersWickets = $wickets->match(['bowler_player_id' => $bowler->player_id]);
							echo count($bowlersWickets->toArray());
						?></td>
					</tr>
				<?php endforeach;?>
			</table>
		</div>
		<div class="col-md-6">
			<table summary="fall-of-wicket">
				<tr>
					<th colspan="2">Fall of Wicket</th>
				</tr>
				<?php foreach ($wickets as $wicket):
					$player = $squad->match(['player_id' => $wicket->lost_wicket_player_id])->first();
					?>
					<tr>
						<td><?php echo explode('-', $wicket->fall_of_wicket)[0];?></td>
						<td><?php echo $player->player->get('InitialLastName');?></td>
					</tr>
				<?php endforeach;?>
			</table>
		</div>
	</div>
</div>