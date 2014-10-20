<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Venue'), ['action' => 'edit', $venue->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Venue'), ['action' => 'delete', $venue->id], ['confirm' => __('Are you sure you want to delete # %s?', $venue->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Venue'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="venues view col-md-10">
	<h2><?= h($venue->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($venue->id) ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($venue->name) ?></p>
			<h6 class="subheader"><?= __('Location') ?></h6>
			<p><?= h($venue->location) ?></p>
			<h6 class="subheader"><?= __('Image') ?></h6>
			<p><?= h($venue->image) ?></p>
			<h6 class="subheader"><?= __('Image Dir') ?></h6>
			<p><?= h($venue->image_dir) ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Capacity') ?></h6>
			<p><?= $this->Number->format($venue->capacity) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($venue->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($venue->modified) ?></p>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column large-12">
		<h4 class="subheader"><?= __('Related Matches') ?></h4>
		<?php if (!empty($venue->matches)): ?>
			<table cellpadding="0" cellspacing="0">
				<tr>
					<th><?= __('Id') ?></th>
					<th><?= __('When Played') ?></th>
					<th><?= __('Venue Id') ?></th>
					<th><?= __('Format Id') ?></th>
					<th><?= __('Wides') ?></th>
					<th><?= __('Byes') ?></th>
					<th><?= __('Leg Byes') ?></th>
					<th><?= __('No Balls') ?></th>
					<th><?= __('Created') ?></th>
					<th><?= __('Modified') ?></th>
					<th class="actions"><?= __('Actions') ?></th>
				</tr>
				<?php foreach ($venue->matches as $matches): ?>
					<tr>
						<td><?= h($matches->id) ?></td>
						<td><?= h($matches->when_played) ?></td>
						<td><?= h($matches->venue_id) ?></td>
						<td><?= h($matches->format_id) ?></td>
						<td><?= h($matches->wides) ?></td>
						<td><?= h($matches->byes) ?></td>
						<td><?= h($matches->leg_byes) ?></td>
						<td><?= h($matches->no_balls) ?></td>
						<td><?= h($matches->created) ?></td>
						<td><?= h($matches->modified) ?></td>
						<td class="actions">
							<?= $this->Html->link(__('View'), ['controller' => 'Matches', 'action' => 'view', $matches->id]) ?>
							<?= $this->Html->link(__('Edit'), ['controller' => 'Matches', 'action' => 'edit', $matches->id]) ?>
							<?= $this->Form->postLink(__('Delete'), ['controller' => 'Matches', 'action' => 'delete', $matches->id], ['confirm' => __('Are you sure you want to delete # %s?', $matches->id)]) ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</table>
		<?php endif; ?>
	</div>
</div>
