<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Wicket'), ['action' => 'edit', $wicket->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Wicket'), ['action' => 'delete', $wicket->id], ['confirm' => __('Are you sure you want to delete # %s?', $wicket->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Wickets'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Wicket'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dismissals'), ['controller' => 'Dismissals', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Dismissal'), ['controller' => 'Dismissals', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="wickets view col-md-9">
	<h2><?= h($wicket->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($wicket->id) ?></p>
			<h6 class="subheader"><?= __('Lost Wicket Player Id') ?></h6>
			<p><?= h($wicket->lost_wicket_player_id) ?></p>
			<h6 class="subheader"><?= __('Took Wicket Player Id') ?></h6>
			<p><?= h($wicket->took_wicket_player_id) ?></p>
			<h6 class="subheader"><?= __('Player') ?></h6>
			<p><?= $wicket->has('player') ? $this->Html->link($wicket->player->FullName, ['controller' => 'Players', 'action' => 'view', $wicket->player->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Dismissal') ?></h6>
			<p><?= $wicket->has('dismissal') ? $this->Html->link($wicket->dismissal->name, ['controller' => 'Dismissals', 'action' => 'view', $wicket->dismissal->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Fall Of Wicket') ?></h6>
			<p><?= h($wicket->fall_of_wicket) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($wicket->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($wicket->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
	<h4 class="subheader"><?= __('Related Innings') ?></h4>
	<?php if (!empty($wicket->innings)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Match Id') ?></th>
			<th><?= __('Player Id') ?></th>
			<th><?= __('Team Id') ?></th>
			<th><?= __('Wicket Id') ?></th>
			<th><?= __('Declared') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($wicket->innings as $innings): ?>
		<tr>
			<td><?= h($innings->id) ?></td>
			<td><?= h($innings->match_id) ?></td>
			<td><?= h($innings->player_id) ?></td>
			<td><?= h($innings->team_id) ?></td>
			<td><?= h($innings->wicket_id) ?></td>
			<td><?= h($innings->declared) ?></td>
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
