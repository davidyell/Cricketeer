<?php
$batsmen0 = new \Cake\Collection\Collection($inningsTeam1->batsmen);
$bowlers0 = new \Cake\Collection\Collection($inningsTeam1->bowlers);

$batsmen1 = new \Cake\Collection\Collection($inningsTeam2->batsmen);
$bowlers1 = new \Cake\Collection\Collection($inningsTeam2->bowlers);

?>

<tr class="teams">
	<td>
		<?php echo $this->Html->image('../files/clubs/image/' . $inningsTeam1->team->club->image_dir . '/squareSmall_' . $inningsTeam1->team->club->image, ['title' => $inningsTeam1->team->name]); ?>
		<p class='teamName'><?php
			echo $inningsTeam1->team->name;
			if ($matchType === 'Test Match') {
				echo "<br>" . $inningsTeam1->innings_type->name;
			}
		?></p>
		<p class="score">
			<?php
			$total = $batsmen0->sumOf('runs');
			$total += $inningsTeam1->wides + $inningsTeam1->byes + $inningsTeam1->leg_byes + $inningsTeam1->no_balls;
			echo $total;

			if (count($inningsTeam1->wickets) < 10) {
				echo ' for ' . count($inningsTeam1->wickets);
			}
			?>
		</p>
		<p class="extras">
			Wides: <?php echo $inningsTeam1->wides; ?>
			Byes: <?php echo $inningsTeam1->byes; ?>
			Leg byes: <?php echo $inningsTeam1->leg_byes; ?>
			No balls: <?php echo $inningsTeam1->no_balls; ?>
			<?php
			if ($inningsTeam1->penalty_runs > 0) {
				?> No balls: <?php echo $inningsTeam1->no_balls;
			}
			?>
		</p>
	</td>
	<td>
		<?php echo $this->Html->image('../files/clubs/image/' . $inningsTeam2->team->club->image_dir . '/squareSmall_' . $inningsTeam2->team->club->image, ['title' => $inningsTeam2->team->name]); ?>
		<p class='teamName'><?php
			echo $inningsTeam2->team->name;
			if ($matchType === 'Test Match') {
				echo "<br>" . $inningsTeam2->innings_type->name;
			}
			?></p>
		<p class="score">
			<?php
			$total = $batsmen1->sumOf('runs');
			$total += $inningsTeam2->wides + $inningsTeam2->byes + $inningsTeam2->leg_byes + $inningsTeam2->no_balls;
			echo $total;

			if (count($inningsTeam2->wickets) < 10) {
				echo ' for ' . count($inningsTeam2->wickets);
			}
			?>
		</p>
		<p class="extras">
			Wides: <?php echo $inningsTeam2->wides; ?>
			Byes: <?php echo $inningsTeam2->byes; ?>
			Leg byes: <?php echo $inningsTeam2->leg_byes; ?>
			No balls: <?php echo $inningsTeam2->no_balls; ?>
			<?php
			if ($inningsTeam2->penalty_runs > 0) {
				?> No balls: <?php echo $inningsTeam2->no_balls;
			}
			?>
		</p>
	</td>
</tr>

<?php if (!empty($batsmen0) && !empty($batsmen1)):?>
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
<?php endif;?>

<?php if (!empty($inningsTeam1->bowlers) && !empty($inningsTeam2->bowlers)): ?>
	<tr>
		<td><?php
			$bestBowling = $bowlers0->max('totalWickets');
			if (!empty($bestBowling)) {
				if (isset($bestBowling->_matchingData['PlayerBowledWicket'])) {
					echo $this->Html->image('icons/cricket-ball.png', ['width' => 16]) . ' <b>' . $bestBowling->_matchingData['PlayerBowledWicket']->get('FullName') . '</b> ' . $bestBowling->totalWickets . '-' . $bestBowling->runs;
				}
			}
		?></td>
		<td><?php
			$bestBowling = $bowlers1->max('totalWickets');
			if (!empty($bestBowling)) {
				if (isset($bestBowling->_matchingData['PlayerBowledWicket'])) {
					echo $this->Html->image('icons/cricket-ball.png', ['width' => 16]) . ' <b>' . $bestBowling->_matchingData['PlayerBowledWicket']->get('FullName') . '</b> ' . $bestBowling->totalWickets . '-' . $bestBowling->runs;
				}
			}
		?></td>
</tr>
<?php endif; ?>