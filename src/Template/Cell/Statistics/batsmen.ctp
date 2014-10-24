<?php foreach ($batsmen as $batter): ?>
	<div class="player batsman">
		<table summary="Batting figures">
			<tr>
				<th rowspan="4" class="portrait"><?php echo $this->Html->image('http://lorempixel.com/100/130/people', ['alt' => $batter->player->FullName]);?></th>
				<th colspan="5"><?php echo $this->Html->link($batter->player->FullName, ['controller' => 'players', 'action' => 'view', $batter->player->slug], ['title' => 'View ' . $batter->player->FullName . ' profile']);?></th>
			</tr>
			<tr>
				<th>Runs</th>
				<th>Balls</th>
				<th>Strike rate</th>
				<th>Fours</th>
				<th>Sixes</th>
			</tr>
			<tr>
				<td><?php echo $batter->runs;?></td>
				<td><?php echo $batter->balls;?></td>
				<td><?php echo $batter->strike_rate;?></td>
				<td><?php echo $batter->fours;?></td>
				<td><?php echo $batter->sixes;?></td>
			</tr>
			<tr>
				<td colspan="5" class="meta">
					<p><?php echo $this->Html->link($batter->innings->match->name, ['controller' => 'matches', 'action' => 'view', $batter->innings->match->id], ['title' => 'View match']);?></p>
					<p>
						<?php echo $this->Html->link($batter->innings->match->format->name, ['controller' => 'formats', 'action' => 'view', $batter->innings->match->format->id], ['title' => 'View all ' . $batter->innings->match->format->name . ' matches']);?>
						match played <?php echo $batter->innings->match->when_played->timeAgoInWords();?>
						at <?php echo $this->Html->link($batter->innings->match->venue->name, ['controller' => 'venues', 'action' => 'view', $batter->innings->match->venue->id], ['title' => 'View matches at ' . $batter->innings->match->venue->name]);?>
					</p>
				</td>
			</tr>
		</table>
	</div>

<?php endforeach; ?>