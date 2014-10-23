<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Wicket'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dismissals'), ['controller' => 'Dismissals', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Dismissal'), ['controller' => 'Dismissals', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="wickets index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('lost_wicket_player_id') ?></th>
			<th><?= $this->Paginator->sort('took_wicket_player_id') ?></th>
			<th><?= $this->Paginator->sort('bowler_player_id') ?></th>
			<th><?= $this->Paginator->sort('dismissal_id') ?></th>
			<th><?= $this->Paginator->sort('fall_of_wicket') ?></th>
			<th><?= $this->Paginator->sort('innings_id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($wickets as $wicket): ?>
		<tr>
			<td><?= h($wicket->id) ?></td>
			<td><?= $this->Html->link(h($wicket->player_lost_wicket->FullName), ['controller' => 'players', 'action' => 'view', $wicket->player_lost_wicket->id]) ?></td>
			<td><?= $this->Html->link(h($wicket->player_took_wicket->FullName), ['controller' => 'players', 'action' => 'view', $wicket->player_took_wicket->id]) ?></td>
			<td><?= $this->Html->link(h($wicket->player_bowled_wicket->FullName), ['controller' => 'players', 'action' => 'view', $wicket->player_bowled_wicket->id]) ?></td>
			<td>
				<?= $wicket->has('dismissal') ? $this->Html->link($wicket->dismissal->name, ['controller' => 'Dismissals', 'action' => 'view', $wicket->dismissal->id]) : '' ?>
			</td>
			<td><?= h($wicket->fall_of_wicket) ?></td>
			<td>
				<?= $wicket->has('innings') ? $this->Html->link($wicket->innings->id, ['controller' => 'Innings', 'action' => 'view', $wicket->innings->id]) : '' ?>
			</td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $wicket->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $wicket->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wicket->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wicket->id)]) ?>
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
