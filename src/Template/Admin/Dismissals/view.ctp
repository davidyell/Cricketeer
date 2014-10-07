<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Dismissal'), ['action' => 'edit', $dismissal->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Dismissal'), ['action' => 'delete', $dismissal->id], ['confirm' => __('Are you sure you want to delete # %s?', $dismissal->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Dismissals'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Dismissal'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Wickets'), ['controller' => 'Wickets', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Wicket'), ['controller' => 'Wickets', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="dismissals view col-md-10">
	<h2><?= h($dismissal->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($dismissal->id) ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($dismissal->name) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($dismissal->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($dismissal->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Wickets') ?></h4>
	<?php if (!empty($dismissal->wickets)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Lost Wicket Player Id') ?></th>
			<th><?= __('Took Wicket Player Id') ?></th>
			<th><?= __('Bowler Player Id') ?></th>
			<th><?= __('Dismissal Id') ?></th>
			<th><?= __('Fall Of Wicket') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($dismissal->wickets as $wickets): ?>
		<tr>
			<td><?= h($wickets->id) ?></td>
			<td><?= h($wickets->lost_wicket_player_id) ?></td>
			<td><?= h($wickets->took_wicket_player_id) ?></td>
			<td><?= h($wickets->bowler_player_id) ?></td>
			<td><?= h($wickets->dismissal_id) ?></td>
			<td><?= h($wickets->fall_of_wicket) ?></td>
			<td><?= h($wickets->created) ?></td>
			<td><?= h($wickets->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Wickets', 'action' => 'view', $wickets->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Wickets', 'action' => 'edit', $wickets->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Wickets', 'action' => 'delete', $wickets->id], ['confirm' => __('Are you sure you want to delete # %s?', $wickets->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
