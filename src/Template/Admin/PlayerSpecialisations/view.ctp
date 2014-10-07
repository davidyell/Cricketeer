<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Player Specialisation'), ['action' => 'edit', $playerSpecialisation->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Player Specialisation'), ['action' => 'delete', $playerSpecialisation->id], ['confirm' => __('Are you sure you want to delete # %s?', $playerSpecialisation->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Player Specialisations'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player Specialisation'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="playerSpecialisations view col-md-10">
	<h2><?= h($playerSpecialisation->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($playerSpecialisation->id) ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($playerSpecialisation->name) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($playerSpecialisation->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($playerSpecialisation->modified) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Description') ?></h6>
			<?= $this->Text->autoParagraph(h($playerSpecialisation->description)); ?>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Players') ?></h4>
	<?php if (!empty($playerSpecialisation->players)): ?>
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
		<?php foreach ($playerSpecialisation->players as $players): ?>
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
