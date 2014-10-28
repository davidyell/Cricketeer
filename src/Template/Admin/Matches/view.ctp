<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Match'), ['action' => 'edit', $match->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Match'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # %s?', $match->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="matches view col-md-10">
	<h2><?= h($match->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($match->id) ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($match->name) ?></p>
			<h6 class="subheader"><?= __('Venue') ?></h6>
			<p><?= $match->has('venue') ? $this->Html->link($match->venue->name, ['controller' => 'Venues', 'action' => 'view', $match->venue->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Format') ?></h6>
			<p><?= $match->has('format') ? $this->Html->link($match->format->name, ['controller' => 'Formats', 'action' => 'view', $match->format->id]) : '' ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('When Played') ?></h6>
			<p><?= h($match->when_played) ?></p>
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($match->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($match->modified) ?></p>
		</div>
	</div>
</div>
<div class="related">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Innings') ?></h4>
	<?php if (!empty($match->innings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Match') ?></th>
			<th><?= __('Team') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($match->innings as $innings): ?>
		<tr>
			<td><?= h($innings->id) ?></td>
			<td><?= h($match->name) ?></td>
			<td><?= h($innings->team->name) ?></td>
			<td><?= h($innings->created) ?></td>
			<td><?= h($innings->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Innings', 'action' => 'view', $innings->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Innings', 'action' => 'edit', $innings->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Innings', 'action' => 'delete', $innings->id], ['confirm' => __('Are you sure you want to delete # %s?', $innings->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Teams') ?></h4>
	<?php if (!empty($match->teams)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Name') ?></th>
			<th><?= __('Club Id') ?></th>
			<th><?= __('Match Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($match->teams as $teams): ?>
		<tr>
			<td><?= h($teams->id) ?></td>
			<td><?= h($teams->name) ?></td>
			<td><?= h($teams->club_id) ?></td>
			<td><?= h($teams->match_id) ?></td>
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
