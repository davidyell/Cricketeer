<?php foreach ($matches as $match):

//	var_dump($match);
//	var_dump($bowlingWickets->toArray());

	$batsmen0 = new \Cake\Collection\Collection($match->innings[0]->batsmen);
	$bowlers0 = new \Cake\Collection\Collection($match->innings[0]->bowlers);

	$batsmen1 = new \Cake\Collection\Collection($match->innings[1]->batsmen);
	$bowlers1 = new \Cake\Collection\Collection($match->innings[1]->bowlers);

	?>
	<div class="match">
		<table summary="Match">
			<tr>
				<td colspan="2">
					<h3><?php echo $match->name; ?></h3>
					<p><?php echo $match->format->name; ?> at <?php echo $match->venue->name; ?> on <?php echo $match->when_played->nice(); ?></p>
				</td>
			</tr>
			<tr class="teams">
				<td>
					<?php echo $this->Html->image('../files/clubs/image/' . $match->innings[0]->team->club->image_dir . '/squareSmall_' . $match->innings[0]->team->club->image, ['title' => $match->innings[0]->team->name]); ?>
					<p class='teamName'><?php echo $match->innings[0]->team->name; ?></p>
					<p class="score">
						<?php
						$total = $batsmen0->sumOf('runs');
						$total += $match->innings[0]->wides + $match->innings[0]->byes + $match->innings[0]->leg_byes + $match->innings[0]->no_balls;
						echo $total;

						if (count($match->innings[0]->wickets) < 10) {
							echo ' for ' . count($match->innings[0]->wickets);
						}
						?>
					</p>
					<p class="extras">
						Wides: <?php echo $match->innings[0]->wides; ?>
						Byes: <?php echo $match->innings[0]->byes; ?>
						Leg byes: <?php echo $match->innings[0]->leg_byes; ?>
						No balls: <?php echo $match->innings[0]->no_balls; ?>
						<?php
						if ($match->innings[0]->penalty_runs > 0) {
							?> No balls: <?php echo $match->innings[0]->no_balls;
						}
						?>
					</p>
				</td>
				<td>
					<?php echo $this->Html->image('../files/clubs/image/' . $match->innings[1]->team->club->image_dir . '/squareSmall_' . $match->innings[1]->team->club->image, ['title' => $match->innings[1]->team->name]); ?>
					<p class='teamName'><?php echo $match->innings[1]->team->name; ?></p>
					<p class="score">
						<?php
						$total = $batsmen1->sumOf('runs');
						$total += $match->innings[1]->wides + $match->innings[1]->byes + $match->innings[1]->leg_byes + $match->innings[1]->no_balls;
						echo $total;

						if (count($match->innings[1]->wickets) < 10) {
							echo ' for ' . count($match->innings[1]->wickets);
						}
						?>
					</p>
					<p class="extras">
						Wides: <?php echo $match->innings[1]->wides; ?>
						Byes: <?php echo $match->innings[1]->byes; ?>
						Leg byes: <?php echo $match->innings[1]->leg_byes; ?>
						No balls: <?php echo $match->innings[1]->no_balls; ?>
						<?php
						if ($match->innings[1]->penalty_runs > 0) {
							?> No balls: <?php echo $match->innings[1]->no_balls;
						}
						?>
					</p>
				</td>
			</tr>
			<tr>
				<td><?php
					$bestBatting = $batsmen0->max('runs');
					echo $this->Html->image('icons/batsman.png', ['width' => 16]) . ' <b>' . $bestBatting->player->get('FullName') . "</b> {$bestBatting->runs}";
				?></td>
				<td><?php
					$bestBatting = $batsmen1->max('runs');
					echo $this->Html->image('icons/batsman.png', ['width' => 16]) . ' <b>' . $bestBatting->player->get('FullName') . "</b> {$bestBatting->runs}";
				?></td>
			</tr>
			<tr>
				<td><?php
					$bestBowling = $bowlers1->max('totalWickets');
					if (!empty($bestBowling)) {
						echo $this->Html->image('icons/cricket-ball.png', ['width' => 16]) . ' <b>' . $bestBowling->innings->wickets->player_bowled_wicket->get('FullName') . '</b> ' . $bestBowling->totalWickets . '-' . $bestBowling->runs;
					}
				?></td>
				<td><?php
					$bestBowling = $bowlers0->max('totalWickets');
					if (!empty($bestBowling)) {
						echo $this->Html->image('icons/cricket-ball.png', ['width' => 16]) . ' <b>' . $bestBowling->innings->wickets->player_bowled_wicket->get('FullName') . '</b> ' . $bestBowling->totalWickets . '-' . $bestBowling->runs;
					}
				?></td>
			</tr>
		</table>
	</div>
<?php endforeach; ?>