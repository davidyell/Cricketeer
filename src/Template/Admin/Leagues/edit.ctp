<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $league->id], ['confirm' => __('Are you sure you want to delete # %s?', $league->id)]) ?></li>
		<li><?= $this->Html->link(__('List Leagues'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="leagues form col-md-10">
<?= $this->Form->create($league, ['type' => 'file']) ?>
	<fieldset>
		<legend><?= __('Edit League'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
		echo $this->Form->input('image', ['type' => 'file', 'required' => false]);
		echo $this->Form->input('image_dir', ['type' => 'hidden']);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
