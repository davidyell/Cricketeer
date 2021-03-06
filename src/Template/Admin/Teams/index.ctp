<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="teams index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('name') ?></th>
			<th><?= $this->Paginator->sort('club_id') ?></th>
			<th><?= $this->Paginator->sort('match_id') ?></th>
			<th><?= $this->Paginator->sort('created') ?></th>
			<th><?= $this->Paginator->sort('modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($teams as $team): ?>
		<tr>
			<td><?= h($team->id) ?></td>
			<td><?= h($team->name) ?></td>
			<td>
				<?= $team->has('club') ? $this->Html->link($team->club->name, ['controller' => 'Clubs', 'action' => 'view', $team->club->id]) : '' ?>
			</td>
			<td>
				<?= $team->has('match') ? $this->Html->link($team->match->name, ['controller' => 'Matches', 'action' => 'view', $team->match->id]) : '' ?>
			</td>
			<td><?= h($team->created) ?></td>
			<td><?= h($team->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $team->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $team->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # {0}?', $team->id)]) ?>
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
