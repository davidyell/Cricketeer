<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Squad'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="squads index large-10 medium-9 columns">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('player_id') ?></th>
			<th><?= $this->Paginator->sort('team_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($squads as $squad): ?>
		<tr>
			<td>
				<?= $squad->has('player') ? $this->Html->link($squad->player->id, ['controller' => 'Players', 'action' => 'view', $squad->player->id]) : '' ?>
			</td>
			<td>
				<?= $squad->has('team') ? $this->Html->link($squad->team->id, ['controller' => 'Teams', 'action' => 'view', $squad->team->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $squad->player_id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $squad->player_id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $squad->player_id], ['confirm' => __('Are you sure you want to delete # {0}?', $squad->player_id)]) ?>
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
