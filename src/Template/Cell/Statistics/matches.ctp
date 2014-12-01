<?php foreach ($matches as $match): ?>
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
					<span class='teamName'><?php echo $match->teams[0]->name; ?></span>
					<span class="score">
						<?php
						echo (new \Cake\Collection\Collection($match->innings[0]->batsmen))->sumOf('runs');
						if (count($match->innings[0]->wickets) < 10) {
							echo ' for ' . count($match->innings[0]->wickets);
						}
						?>
					</span>
				</td>
				<td>
					<?php echo $this->Html->image('../files/clubs/image/' . $match->teams[1]->club->image_dir . '/squareSmall_' . $match->teams[1]->club->image, ['title' => $match->teams[1]->name]); ?>
					<span class='teamName'><?php echo $match->teams[1]->name; ?></span>
					<span class="score">
						<?php
						echo (new \Cake\Collection\Collection($match->innings[1]->batsmen))->sumOf('runs');
						if (count($match->innings[1]->wickets) < 10) {
							echo ' for ' . count($match->innings[1]->wickets);
						}
						?>
					</span>
				</td>
			</tr>
			<tr>
				<td class="extras">
					<p><b>Extras</b></p>
					<ul>
						<li>Wides: <?php echo $match->innings[0]->wides; ?></li>
						<li>Byes: <?php echo $match->innings[0]->byes; ?></li>
						<li>Leg byes: <?php echo $match->innings[0]->leg_byes; ?></li>
						<li>No balls: <?php echo $match->innings[0]->no_balls; ?></li>
						<?php
						if ($match->innings[0]->penalty_runs > 0) {
							?>
							<li>No balls: <?php echo $match->innings[0]->no_balls; ?></li><?php
						}
						?>
					</ul>
				</td>
				<td class="extras">
					<p><b>Extras</b></p>
					<ul>
						<li>Wides: <?php echo $match->innings[1]->wides; ?></li>
						<li>Byes: <?php echo $match->innings[1]->byes; ?></li>
						<li>Leg byes: <?php echo $match->innings[1]->leg_byes; ?></li>
						<li>No balls: <?php echo $match->innings[1]->no_balls; ?></li>
						<?php
						if ($match->innings[1]->penalty_runs > 0) {
							?>
							<li>No balls: <?php echo $match->innings[1]->no_balls; ?></li><?php
						}
						?>
					</ul>
				</td>
			</tr>
		</table>
	</div>
<?php endforeach; ?>