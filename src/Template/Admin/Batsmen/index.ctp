<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Batsman'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="batsmen index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('player_id') ?></th>
			<th><?= $this->Paginator->sort('innings_id') ?></th>
			<th><?= $this->Paginator->sort('runs') ?></th>
			<th><?= $this->Paginator->sort('balls') ?></th>
			<th><?= $this->Paginator->sort('strike_rate') ?></th>
			<th><?= $this->Paginator->sort('fours') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($batsmen as $batsman): ?>
		<tr>
			<td><?= h($batsman->id) ?></td>
			<td>
				<?= $batsman->has('player') ? $this->Html->link($batsman->player->get('full_name'), ['controller' => 'Players', 'action' => 'view', $batsman->player->id]) : '' ?>
			</td>
			<td>
				<?= $batsman->has('innings') ? $this->Html->link($batsman->innings->id, ['controller' => 'Innings', 'action' => 'view', $batsman->innings->id]) : '' ?>
			</td>
			<td><?= $this->Number->format($batsman->runs) ?></td>
			<td><?= $this->Number->format($batsman->balls) ?></td>
			<td><?= $this->Number->format($batsman->strike_rate) ?></td>
			<td><?= $this->Number->format($batsman->fours) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $batsman->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $batsman->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batsman->id)]) ?>
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
