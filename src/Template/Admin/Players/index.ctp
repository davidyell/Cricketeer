<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List PlayerSpecialisations'), ['controller' => 'PlayerSpecialisations', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player Specialisation'), ['controller' => 'PlayerSpecialisations', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Batsmen'), ['controller' => 'Batsmen', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Batsman'), ['controller' => 'Batsmen', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bowlers'), ['controller' => 'Bowlers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bowler'), ['controller' => 'Bowlers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="players index col-md-10">
	<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th><?= $this->Paginator->sort('id') ?></th>
			<th><?= $this->Paginator->sort('first_name') ?></th>
			<th><?= $this->Paginator->sort('last_name') ?></th>
			<th><?= $this->Paginator->sort('slug') ?></th>
			<th><?= $this->Paginator->sort('photo') ?></th>
			<th><?= $this->Paginator->sort('photo_dir') ?></th>
			<th><?= $this->Paginator->sort('number') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($players as $player): ?>
		<tr>
			<td><?= h($player->id) ?></td>
			<td><?= h($player->first_name) ?></td>
			<td><?= h($player->last_name) ?></td>
			<td><?= h($player->slug) ?></td>
			<td><?= h($player->photo) ?></td>
			<td><?= h($player->photo_dir) ?></td>
			<td><?= $this->Number->format($player->number) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['action' => 'view', $player->id]) ?>
				<?= $this->Html->link(__('Edit'), ['action' => 'edit', $player->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # {0}?', $player->id)]) ?>
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
