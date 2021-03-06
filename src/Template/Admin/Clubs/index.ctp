<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="clubs index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('alt_name') ?></th>
			<th><?= $this->Paginator->sort('image') ?></th>
			<th><?= $this->Paginator->sort('league_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($clubs as $club): ?>
		<tr>
			<td><?= h($club->id) ?></td>
			<td><?= h($club->name) ?></td>
			<td><?= h($club->alt_name) ?></td>
			<td><?php
				if (!empty($club->image)) {
					echo $this->Html->image('../files/clubs/image/' . $club->image_dir . '/square_' . $club->image, ['height' => 50]);
				}
			?></td>
			<td>
				<?= $club->has('league') ? $this->Html->link($club->league->name, ['controller' => 'Leagues', 'action' => 'view', $club->league->id]) : '' ?>
			</td>
			<td><?= h($club->created) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $club->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $club->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # {0}?', $club->id)]) ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</tbody>
	</table>
	<div class="paginator">
		<ul class="pagination">
		<?php echo $this->Paginator->numbers();?>
		</ul>
		<p><?= $this->Paginator->counter() ?></p>
	</div>
</div>
