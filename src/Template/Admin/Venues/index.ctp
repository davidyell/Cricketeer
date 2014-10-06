<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="venues index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('location') ?></th>
			<th><?= $this->Paginator->sort('capacity') ?></th>
			<th><?= $this->Paginator->sort('image') ?></th>
			<th><?= $this->Paginator->sort('image_dir') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($venues as $venue): ?>
		<tr>
			<td><?= h($venue->id) ?></td>
			<td><?= h($venue->name) ?></td>
			<td><?= h($venue->location) ?></td>
			<td><?= $this->Number->format($venue->capacity) ?></td>
			<td><?= h($venue->image) ?></td>
			<td><?= h($venue->image_dir) ?></td>
			<td><?= h($venue->created) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $venue->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $venue->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venue->id)]) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
		<?php
			echo $this->Paginator->prev('< ' . __('previous'));
			echo $this->Paginator->numbers();
			echo $this->Paginator->next(__('next') . ' >');
		?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
