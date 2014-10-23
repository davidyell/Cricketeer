<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New League'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="leagues index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('image') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($leagues as $league): ?>
		<tr>
			<td><?= h($league->id) ?></td>
			<td><?= h($league->name) ?></td>
			<td><?= h($league->image) ?></td>
			<td><?= h($league->created) ?></td>
			<td><?= h($league->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $league->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $league->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $league->id], ['confirm' => __('Are you sure you want to delete # {0}?', $league->id)]) ?>
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
