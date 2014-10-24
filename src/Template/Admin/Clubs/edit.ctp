<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $club->id], ['confirm' => __('Are you sure you want to delete # %s?', $club->id)]) ?></li>
		<li><?= $this->Html->link(__('List Clubs'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Leagues'), ['controller' => 'Leagues', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New League'), ['controller' => 'Leagues', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="clubs form col-md-10">
<?= $this->Form->create($club) ?>
	<fieldset>
		<legend><?= __('Edit Club'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('alt_name', ['label' => 'Club nickname']);
		echo $this->Form->input('image', ['type' => 'file']);
		echo $this->Form->input('image_dir', ['type' => 'hidden']);
		echo $this->Form->input('league_id', ['options' => $leagues]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
