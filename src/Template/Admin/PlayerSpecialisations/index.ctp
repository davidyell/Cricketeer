<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Player Specialisation'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="playerSpecialisations index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($playerSpecialisations as $playerSpecialisation): ?>
		<tr>
			<td><?= h($playerSpecialisation->id) ?></td>
			<td><?= h($playerSpecialisation->name) ?></td>
			<td><?= h($playerSpecialisation->created) ?></td>
			<td><?= h($playerSpecialisation->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $playerSpecialisation->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $playerSpecialisation->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playerSpecialisation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $playerSpecialisation->id)]) ?>
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
