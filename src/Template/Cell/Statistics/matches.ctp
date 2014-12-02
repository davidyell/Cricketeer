<?php foreach ($matches as $match):
//	var_dump($match);
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
					<?php echo $this->Html->image('../files/clubs/image/' . $match->teams[0]->club->image_dir . '/squareSmall_' . $match->teams[0]->club->image, ['title' => $match->teams[0]->name]); ?>
					<p class='teamName'><?php echo $match->teams[0]->name; ?></p>
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
					<?php echo $this->Html->image('../files/clubs/image/' . $match->teams[1]->club->image_dir . '/squareSmall_' . $match->teams[1]->club->image, ['title' => $match->teams[1]->name]); ?>
					<p class='teamName'><?php echo $match->teams[1]->name; ?></p>
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
					echo $bestBatting->player->get('FullName') . ' ' . $bestBatting->runs;
				?></td>
				<td><?php
					$bestBatting = $batsmen1->max('runs');
					echo $bestBatting->player->get('FullName') . ' ' . $bestBatting->runs;
				?></td>
			</tr>
			<tr>
				<td></td>
				<td></td>
			</tr>
		</table>
	</div>
<?php endforeach; ?>