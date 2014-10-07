<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Player'), ['action' => 'edit', $player->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Player'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # %s?', $player->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['action' => 'add']) ?> </li>
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
		<li><?= $this->Html->link(__('List Squads'), ['controller' => 'Squads', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Squad'), ['controller' => 'Squads', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="players view col-md-10">
	<h2><?= h($player->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($player->id) ?></p>
			<h6 class="subheader"><?= __('First Name') ?></h6>
			<p><?= h($player->first_name) ?></p>
			<h6 class="subheader"><?= __('Last Name') ?></h6>
			<p><?= h($player->last_name) ?></p>
			<h6 class="subheader"><?= __('Slug') ?></h6>
			<p><?= h($player->slug) ?></p>
			<h6 class="subheader"><?= __('Photo') ?></h6>
			<p><?= h($player->photo) ?></p>
			<h6 class="subheader"><?= __('Photo Dir') ?></h6>
			<p><?= h($player->photo_dir) ?></p>
			<h6 class="subheader"><?= __('Nationality') ?></h6>
			<p><?= h($player->nationality) ?></p>
			<h6 class="subheader"><?= __('Bats') ?></h6>
			<p><?= h($player->bats) ?></p>
			<h6 class="subheader"><?= __('Bowls') ?></h6>
			<p><?= h($player->bowls) ?></p>
			<h6 class="subheader"><?= __('Player Specialisation') ?></h6>
			<p><?= $player->has('player_specialisation') ? $this->Html->link($player->player_specialisation->name, ['controller' => 'PlayerSpecialisations', 'action' => 'view', $player->player_specialisation->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Club') ?></h6>
			<p><?= $player->has('club') ? $this->Html->link($player->club->name, ['controller' => 'Clubs', 'action' => 'view', $player->club->id]) : '' ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Number') ?></h6>
			<p><?= $this->Number->format($player->number) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($player->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($player->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Batsmen') ?></h4>
	<?php if (!empty($player->batsmen)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Player Id') ?></th>
			<th><?= __('Innings Id') ?></th>
			<th><?= __('Runs') ?></th>
			<th><?= __('Balls') ?></th>
			<th><?= __('Strike Rate') ?></th>
			<th><?= __('Fours') ?></th>
			<th><?= __('Sixes') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($player->batsmen as $batsmen): ?>
		<tr>
			<td><?= h($batsmen->id) ?></td>
			<td><?= h($batsmen->player_id) ?></td>
			<td><?= h($batsmen->innings_id) ?></td>
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
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Batsmen', 'action' => 'delete', $batsmen->id], ['confirm' => __('Are you sure you want to delete # %s?', $batsmen->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Bowlers') ?></h4>
	<?php if (!empty($player->bowlers)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Player Id') ?></th>
			<th><?= __('Innings Id') ?></th>
			<th><?= __('Overs') ?></th>
			<th><?= __('Runs') ?></th>
			<th><?= __('Wickets') ?></th>
			<th><?= __('Economy') ?></th>
			<th><?= __('Maidens') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($player->bowlers as $bowlers): ?>
		<tr>
			<td><?= h($bowlers->id) ?></td>
			<td><?= h($bowlers->player_id) ?></td>
			<td><?= h($bowlers->innings_id) ?></td>
			<td><?= h($bowlers->overs) ?></td>
			<td><?= h($bowlers->runs) ?></td>
			<td><?= h($bowlers->wickets) ?></td>
			<td><?= h($bowlers->economy) ?></td>
			<td><?= h($bowlers->maidens) ?></td>
			<td><?= h($bowlers->created) ?></td>
			<td><?= h($bowlers->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Bowlers', 'action' => 'view', $bowlers->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Bowlers', 'action' => 'edit', $bowlers->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Bowlers', 'action' => 'delete', $bowlers->id], ['confirm' => __('Are you sure you want to delete # %s?', $bowlers->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
<div class="related row">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Innings') ?></h4>
	<?php if (!empty($player->innings)): ?>
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
		<?php foreach ($player->innings as $innings): ?>
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
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Squads') ?></h4>
	<?php if (!empty($player->squads)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Player Id') ?></th>
			<th><?= __('Team Id') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($player->squads as $squads): ?>
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
