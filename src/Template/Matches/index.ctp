<div class="matches index">
	<table summary="matches">
		<thead>
			<tr>
				<th>Name</th>
				<th>Format</th>
				<th>Played</th>
				<th>Venue</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($matches as $match):?>
				<tr>
					<td><?php echo $match->get('name');?></td>
					<td><?php echo $match->format->get('name');?></td>
					<td><?php echo $match->get('created');?></td>
					<td><?php echo $match->venue->get('name');?></td>
					<td class="actions">
						<?php echo $this->Html->link('View', ['controller' => 'matches', 'action' => 'view', $match->get('id')], ['class' => 'btn btn-primary']);?>
					</td>
				</tr>
			<?php endforeach;?>
		</tbody>
	</table>
</div>