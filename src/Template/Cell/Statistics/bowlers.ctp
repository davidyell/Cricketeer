<?php foreach ($bowlers as $bowler):?>
	<div class="player bowlers">
		<table summary="Bowling figures">
			<tr>
				<th rowspan="4" class="portrait"><?php
					if (!empty($bowler->player->photo)) {
						echo $this->Html->image('../files/players/photo/' . $bowler->player->photo_dir . '/portrait_' . $bowler->player->photo, ['alt' => $bowler->player->FullName]);
					}
				?></th>
				<th colspan="5"><?php echo $this->Html->link($bowler->player->FullName, ['controller' => 'players', 'action' => 'view', $bowler->player->slug], ['title' => 'View ' . $bowler->player->FullName . ' profile']);?></th>
			</tr>
			<tr>
				<th>Overs</th>
				<th>Runs</th>
				<th>Wickets</th>
				<th>Economy</th>
				<th>Maidens</th>
			</tr>
			<tr>
				<td><?php echo $bowler->overs;?></td>
				<td><?php echo $bowler->runs;?></td>
				<td><?php echo $bowler->wickets_taken;?></td>
				<td><?php echo $bowler->economy;?></td>
				<td><?php echo $bowler->maidens;?></td>
			</tr>
			<tr>
				<td colspan="5" class="meta">
					<p><?php echo $this->Html->link($bowler->innings->match->name, ['controller' => 'matches', 'action' => 'view', $bowler->innings->match->id], ['title' => 'View match']);?></p>
					<p>
						<?php echo $this->Html->link($bowler->innings->match->format->name, ['controller' => 'formats', 'action' => 'view', $bowler->innings->match->format->id], ['title' => 'View all ' . $bowler->innings->match->format->name . ' matches']);?>
						match played <?php echo $bowler->innings->match->when_played->timeAgoInWords();?>
						at <?php echo $this->Html->link($bowler->innings->match->venue->name, ['controller' => 'venues', 'action' => 'view', $bowler->innings->match->venue->id], ['title' => 'View matches at ' . $bowler->innings->match->venue->name]);?>
					</p>
				</td>
			</tr>
		</table>
	</div>

<?php endforeach; ?>