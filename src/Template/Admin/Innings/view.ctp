<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Innings'), ['action' => 'edit', $innings->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Innings'), ['action' => 'delete', $innings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $innings->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['action' => 'add']) ?> </li>
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
<div class="innings view col-md-10">
	<h2><?= h($innings->id) ?></h2>
	<div class="">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($innings->id) ?></p>
			<h6 class="subheader"><?= __('Match') ?></h6>
			<p><?= $innings->has('match') ? $this->Html->link($innings->match->name, ['controller' => 'Matches', 'action' => 'view', $innings->match->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Team') ?></h6>
			<p><?= $innings->has('team') ? $this->Html->link($innings->team->name, ['controller' => 'Teams', 'action' => 'view', $innings->team->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Innings Type') ?></h6>
			<p><?= $innings->has('innings_type') ? $this->Html->link($innings->innings_type->name, ['controller' => 'InningsTypes', 'action' => 'view', $innings->innings_type->id]) : '' ?></p>
		</div>
		<div class="large-2 large-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Wides') ?></h6>
			<p><?= $this->Number->format($innings->wides) ?></p>
			<h6 class="subheader"><?= __('Byes') ?></h6>
			<p><?= $this->Number->format($innings->byes) ?></p>
			<h6 class="subheader"><?= __('Leg Byes') ?></h6>
			<p><?= $this->Number->format($innings->leg_byes) ?></p>
			<h6 class="subheader"><?= __('No Balls') ?></h6>
			<p><?= $this->Number->format($innings->no_balls) ?></p>
			<h6 class="subheader"><?= __('Penalty Runs') ?></h6>
			<p><?= $this->Number->format($innings->penalty_runs) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($innings->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($innings->modified) ?></p>
		</div>
		<div class="large-2 columns booleans end">
			<h6 class="subheader"><?= __('Declared') ?></h6>
			<p><?= $innings->declared ? __('Yes') : __('No'); ?></p>
		</div>
	</div>
</div>
<div class="related ">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Batsmen') ?></h4>
	<?php if (!empty($innings->batsmen)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Player') ?></th>
			<th><?= __('Runs') ?></th>
			<th><?= __('Balls') ?></th>
			<th><?= __('Strike Rate') ?></th>
			<th><?= __('Fours') ?></th>
			<th><?= __('Sixes') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($innings->batsmen as $batsmen): ?>
		<tr>
			<td><?= h($batsmen->id) ?></td>
			<td><?= $this->Html->link(h($batsmen->player->FullName), ['controller' => 'players', 'action' => 'view', $batsmen->player->id]) ?></td>
			<td><?= h($batsmen->runs) ?></td>
			<td><?= h($batsmen->balls) ?></td>
			<td><?= h($batsmen->strike_rate) ?></td>
			<td><?= h($batsmen->fours) ?></td>
			<td><?= h($batsmen->sixes) ?></td>
			<td><?= h($batsmen->created) ?></td>
			<td><?= h($batsmen->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Batsmen', 'action' => 'view', $batsmen->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Batsmen', 'action' => 'edit', $batsmen->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Batsmen', 'action' => 'delete', $batsmen->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batsmen->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related ">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Bowlers') ?></h4>
	<?php if (!empty($innings->bowlers)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Player') ?></th>
			<th><?= __('Overs') ?></th>
			<th><?= __('Runs') ?></th>
			<th><?= __('Wickets') ?></th>
			<th><?= __('Economy') ?></th>
			<th><?= __('Maidens') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($innings->bowlers as $bowlers): ?>
		<tr>
			<td><?= h($bowlers->id) ?></td>
			<td><?= $this->Html->link(h($bowlers->player->FullName), ['controller' => 'players', 'action' => 'view', $bowlers->player->id]) ?></td>
			<td><?= h($bowlers->overs) ?></td>
			<td><?= h($bowlers->runs) ?></td>
			<td><?= h($bowlers->WicketCount); ?></td>
			<td><?= h($bowlers->economy) ?></td>
			<td><?= h($bowlers->maidens) ?></td>
			<td><?= h($bowlers->created) ?></td>
			<td><?= h($bowlers->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Bowlers', 'action' => 'view', $bowlers->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Bowlers', 'action' => 'edit', $bowlers->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Bowlers', 'action' => 'delete', $bowlers->id], ['confirm' => __('Are you sure you want to delete # {0}?', $bowlers->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Wickets') ?></h4>
	<?php if (!empty($innings->wickets)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Lost Wicket Player Id') ?></th>
			<th><?= __('Took Wicket Player Id') ?></th>
			<th><?= __('Bowler Player Id') ?></th>
			<th><?= __('Dismissal Id') ?></th>
			<th><?= __('Fall Of Wicket') ?></th>
			<th><?= __('Innings Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($innings->wickets as $wickets): ?>
		<tr>
			<td><?= h($wickets->id) ?></td>
			<td><?= h($wickets->lost_wicket_player_id) ?></td>
			<td><?= h($wickets->took_wicket_player_id) ?></td>
			<td><?= h($wickets->bowler_player_id) ?></td>
			<td><?= h($wickets->dismissal_id) ?></td>
			<td><?= h($wickets->fall_of_wicket) ?></td>
			<td><?= h($wickets->innings_id) ?></td>
			<td><?= h($wickets->created) ?></td>
			<td><?= h($wickets->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Wickets', 'action' => 'view', $wickets->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Wickets', 'action' => 'edit', $wickets->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Wickets', 'action' => 'delete', $wickets->id], ['confirm' => __('Are you sure you want to delete # {0}?', $wickets->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
