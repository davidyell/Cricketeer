<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Bowler'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="bowlers index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('player_id') ?></th>
			<th><?= $this->Paginator->sort('innings_id') ?></th>
			<th><?= $this->Paginator->sort('overs') ?></th>
			<th><?= $this->Paginator->sort('runs') ?></th>
			<th><?= $this->Paginator->sort('wickets') ?></th>
			<th><?= $this->Paginator->sort('economy') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($bowlers as $bowler): ?>
		<tr>
			<td><?= h($bowler->id) ?></td>
			<td>
				<?= $bowler->has('player') ? $this->Html->link($bowler->player->FullName, ['controller' => 'Players', 'action' => 'view', $bowler->player->id]) : '' ?>
			</td>
			<td>
				<?= $bowler->has('innings') ? $this->Html->link($bowler->innings->id, ['controller' => 'Innings', 'action' => 'view', $bowler->innings->id]) : '' ?>
			</td>
			<td><?= $this->Number->format($bowler->overs) ?></td>
			<td><?= $this->Number->format($bowler->runs) ?></td>
			<td><?= $this->Number->format($bowler->wickets) ?></td>
			<td><?= $this->Number->format($bowler->economy) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $bowler->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $bowler->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bowler->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bowler->id)]) ?>
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
