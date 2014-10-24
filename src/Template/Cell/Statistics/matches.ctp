<?php foreach ($matches as $match):
	var_dump($match);?>
	<div class="match">
		<table summary="Match">
			<tr class="teams">
				<td>
					<?php echo $this->Html->image('http://lorempixel.com/100/100/sports', ['title' => $match->teams[0]->name]);?>
					<?php echo $match->teams[0]->name;?>
				</td>
				<td>
					<?php echo $match->format->name;?><br>
					<?php echo $match->venue->name;?><br>
					<?php echo $match->when_played->timeAgoInWords();?>
				</td>
				<td>
					<?php echo $this->Html->image('http://lorempixel.com/100/100/sports', ['title' => $match->teams[1]->name]);?>
					<?php echo $match->teams[1]->name;?>
				</td>
			</tr>
			<tr class="scores">
				<td colspan="3">
					<table summary="Score summary">
						<tr>
							<td></td>
							<td></td>
						</tr>
						<tr>
							<td></td>
							<td></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	</div>
<?php endforeach; ?>