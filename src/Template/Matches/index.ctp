<div class="matches index">
	<table summary="matches">
		<thead>
			<tr>
				<th>Name</th>
				<th>Format</th>
				<th>Played</th>
				<th>Venue</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($matches as $match):?>
				<tr>
					<td><?php echo $this->Html->link($match->get('name'), ['controller' => 'Matches', 'action' => 'view', $match->get('id')]);?></td>
					<td><?php echo $match->format->get('name');?></td>
					<td><?php echo $match->get('when_played');?></td>
					<td><?php echo $match->venue->get('name');?></td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>

	<ul class="pagination">
		<?php
		echo $this->Paginator->prev('&laquo;', ['escape' => false]);
		echo $this->Paginator->numbers();
		echo $this->Paginator->next('&raquo;', ['escape' => false]);
		?>
	</ul>
</div>