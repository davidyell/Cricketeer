<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Team'), ['action' => 'edit', $team->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Team'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # %s?', $team->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Squads'), ['controller' => 'Squads', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Squad'), ['controller' => 'Squads', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="teams view large-10 medium-9 columns">
	<h2><?= h($team->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($team->id) ?></p>
			<h6 class="subheader"><?= __('Club') ?></h6>
			<p><?= $team->has('club') ? $this->Html->link($team->club->name, ['controller' => 'Clubs', 'action' => 'view', $team->club->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Match') ?></h6>
			<p><?= $team->has('match') ? $this->Html->link($team->match->id, ['controller' => 'Matches', 'action' => 'view', $team->match->id]) : '' ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Captain') ?></h6>
			<p><?= $this->Number->format($team->captain) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($team->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($team->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Innings') ?></h4>
	<?php if (!empty($team->innings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Match Id') ?></th>
			<th><?= __('Player Id') ?></th>
			<th><?= __('Team Id') ?></th>
			<th><?= __('Wicket Id') ?></th>
			<th><?= __('Declared') ?></th>
			<th><?= __('No Ball') ?></th>
			<th><?= __('Wide') ?></th>
			<th><?= __('Bye') ?></th>
			<th><?= __('Leg Bye') ?></th>
			<th><?= __('Penalty Runs') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($team->innings as $innings): ?>
		<tr>
			<td><?= h($innings->id) ?></td>
			<td><?= h($innings->match_id) ?></td>
			<td><?= h($innings->player_id) ?></td>
			<td><?= h($innings->team_id) ?></td>
			<td><?= h($innings->wicket_id) ?></td>
			<td><?= h($innings->declared) ?></td>
			<td><?= h($innings->no_ball) ?></td>
			<td><?= h($innings->wide) ?></td>
			<td><?= h($innings->bye) ?></td>
			<td><?= h($innings->leg_bye) ?></td>
			<td><?= h($innings->penalty_runs) ?></td>
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
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Squads') ?></h4>
	<?php if (!empty($team->squads)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Player Id') ?></th>
			<th><?= __('Team Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($team->squads as $squads): ?>
		<tr>
			<td><?= h($squads->player_id) ?></td>
			<td><?= h($squads->team_id) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Squads', 'action' => 'view', $squads->player_id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Squads', 'action' => 'edit', $squads->player_id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Squads', 'action' => 'delete', $squads->player_id], ['confirm' => __('Are you sure you want to delete # %s?', $squads->player_id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
