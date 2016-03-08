<div class="players index">
	<h2>Players</h2>

	<table summary="players">
		<thead>
			<tr>
				<th>Name</th>
				<th>Club</th>
				<th>Specialisation</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($players as $player):?>
				<tr>
					<td><?php echo $this->Html->link($player->get('full_name'), ['controller' => 'Players', 'action' => 'view', $player->slug]);?></td>
					<td><?php echo $player->club->name;?></td>
					<td><?php echo $player->player_specialisation->name;?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>

	<ul class="pagination">
		<?php echo $this->Paginator->numbers();?>
	</ul>
</div>