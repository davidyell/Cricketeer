<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit League'), ['action' => 'edit', $league->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete League'), ['action' => 'delete', $league->id], ['confirm' => __('Are you sure you want to delete # %s?', $league->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New League'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="leagues view col-md-10">
	<h2><?= h($league->name) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($league->id) ?></p>
			<h6 class="subheader"><?= __('Name') ?></h6>
			<p><?= h($league->name) ?></p>
			<h6 class="subheader"><?= __('Image') ?></h6>
			<p><?= h($league->image) ?></p>
			<h6 class="subheader"><?= __('Image Dir') ?></h6>
			<p><?= h($league->image_dir) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($league->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($league->modified) ?></p>
		</div>
	</div>
	<div class="row texts">
		<div class="columns large-9">
			<h6 class="subheader"><?= __('Description') ?></h6>
			<?= $this->Text->autoParagraph(h($league->description)); ?>
		</div>
	</div>
</div>
<div class="related row">
	<div class="column col-md-12">
	<h4 class="subheader"><?= __('Related Clubs') ?></h4>
	<?php if (!empty($league->clubs)): ?>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?= __('Id') ?></th>
			<th><?= __('Name') ?></th>
			<th><?= __('Alt Name') ?></th>
			<th><?= __('Image') ?></th>
			<th><?= __('Image Dir') ?></th>
			<th><?= __('League Id') ?></th>
			<th><?= __('Created') ?></th>
			<th><?= __('Modified') ?></th>
			<th class="actions"><?= __('Actions') ?></th>
		</tr>
		<?php foreach ($league->clubs as $clubs): ?>
		<tr>
			<td><?= h($clubs->id) ?></td>
			<td><?= h($clubs->name) ?></td>
			<td><?= h($clubs->alt_name) ?></td>
			<td><?= h($clubs->image) ?></td>
			<td><?= h($clubs->image_dir) ?></td>
			<td><?= h($clubs->league_id) ?></td>
			<td><?= h($clubs->created) ?></td>
			<td><?= h($clubs->modified) ?></td>
			<td class="actions">
				<?= $this->Html->link(__('View'), ['controller' => 'Clubs', 'action' => 'view', $clubs->id]) ?>
				<?= $this->Html->link(__('Edit'), ['controller' => 'Clubs', 'action' => 'edit', $clubs->id]) ?>
				<?= $this->Form->postLink(__('Delete'), ['controller' => 'Clubs', 'action' => 'delete', $clubs->id], ['confirm' => __('Are you sure you want to delete # %s?', $clubs->id)]) ?>
			</td>
		</tr>
		<?php endforeach; ?>
	</table>
	<?php endif; ?>
	</div>
</div>
