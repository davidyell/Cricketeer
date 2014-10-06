<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Club'), ['action' => 'edit', $club->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Club'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # %s?', $club->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="clubs view large-10 medium-9 columns">
	<h2><?= h($club->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($club->id) ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($club->name) ?></p>
			<h6 class="subheader"><?= __('Alt Name') ?></h6>
			<p><?= h($club->alt_name) ?></p>
			<h6 class="subheader"><?= __('Image') ?></h6>
			<p><?= h($club->image) ?></p>
			<h6 class="subheader"><?= __('Image Dir') ?></h6>
			<p><?= h($club->image_dir) ?></p>
			<h6 class="subheader"><?= __('League') ?></h6>
			<p><?= $club->has('league') ? $this->Html->link($club->league->name, ['controller' => 'Leagues', 'action' => 'view', $club->league->id]) : '' ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($club->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($club->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Players') ?></h4>
	<?php if (!empty($club->players)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('First Name') ?></th>
			<th><?= __('Last Name') ?></th>
			<th><?= __('Slug') ?></th>
			<th><?= __('Photo') ?></th>
			<th><?= __('Photo Dir') ?></th>
			<th><?= __('Number') ?></th>
			<th><?= __('Nationality') ?></th>
			<th><?= __('Bats') ?></th>
			<th><?= __('Bowls') ?></th>
			<th><?= __('Player Specialisation Id') ?></th>
			<th><?= __('Club Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($club->players as $players): ?>
		<tr>
			<td><?= h($players->id) ?></td>
			<td><?= h($players->first_name) ?></td>
			<td><?= h($players->last_name) ?></td>
			<td><?= h($players->slug) ?></td>
			<td><?= h($players->photo) ?></td>
			<td><?= h($players->photo_dir) ?></td>
			<td><?= h($players->number) ?></td>
			<td><?= h($players->nationality) ?></td>
			<td><?= h($players->bats) ?></td>
			<td><?= h($players->bowls) ?></td>
			<td><?= h($players->player_specialisation_id) ?></td>
			<td><?= h($players->club_id) ?></td>
			<td><?= h($players->created) ?></td>
			<td><?= h($players->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Players', 'action' => 'view', $players->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Players', 'action' => 'edit', $players->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Players', 'action' => 'delete', $players->id], ['confirm' => __('Are you sure you want to delete # %s?', $players->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Teams') ?></h4>
	<?php if (!empty($club->teams)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Club Id') ?></th>
			<th><?= __('Match Id') ?></th>
			<th><?= __('Captain') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($club->teams as $teams): ?>
		<tr>
			<td><?= h($teams->id) ?></td>
			<td><?= h($teams->club_id) ?></td>
			<td><?= h($teams->match_id) ?></td>
			<td><?= h($teams->captain) ?></td>
			<td><?= h($teams->created) ?></td>
			<td><?= h($teams->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Teams', 'action' => 'view', $teams->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Teams', 'action' => 'edit', $teams->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Teams', 'action' => 'delete', $teams->id], ['confirm' => __('Are you sure you want to delete # %s?', $teams->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
