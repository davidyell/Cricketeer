<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Innings'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List InningsTypes'), ['controller' => 'InningsTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings Type'), ['controller' => 'InningsTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Batsmen'), ['controller' => 'Batsmen', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Batsman'), ['controller' => 'Batsmen', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bowlers'), ['controller' => 'Bowlers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bowler'), ['controller' => 'Bowlers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Wickets'), ['controller' => 'Wickets', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Wicket'), ['controller' => 'Wickets', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="innings index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('match_id') ?></th>
			<th><?= $this->Paginator->sort('team_id') ?></th>
			<th><?= $this->Paginator->sort('innings_type_id') ?></th>
			<th><?= $this->Paginator->sort('wides') ?></th>
			<th><?= $this->Paginator->sort('byes') ?></th>
			<th><?= $this->Paginator->sort('leg_byes') ?></th>
			<th><?= $this->Paginator->sort('penalty_runs') ?></th>
			<th><?= $this->Paginator->sort('declared') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($innings as $innings): ?>
		<tr>
			<td><?= h($innings->id) ?></td>
			<td><?= $innings->has('match') ? $this->Html->link($innings->match->name, ['controller' => 'Matches', 'action' => 'view', $innings->match->id]) : '' ?></td>
			<td><?= $innings->has('team') ? $this->Html->link($innings->team->name, ['controller' => 'Teams', 'action' => 'view', $innings->team->id]) : '' ?></td>
			<td><?= $innings->has('innings_type') ? $this->Html->link($innings->innings_type->name, ['controller' => 'InningsTypes', 'action' => 'view', $innings->innings_type->id]) : '' ?></td>
			<td><?= $this->Number->format($innings->wides) ?></td>
			<td><?= $this->Number->format($innings->byes) ?></td>
			<td><?= $this->Number->format($innings->leg_byes) ?></td>
			<td><?= $this->Number->format($innings->penalty_runs) ?></td>
			<td><?= $innings->declared ? __('Yes') : __('No') ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $innings->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $innings->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $innings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $innings->id)]) ?>
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
