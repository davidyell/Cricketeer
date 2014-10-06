<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Venues'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="venues form large-10 medium-9 columns">
<?= $this->Form->create($venue) ?>
	<fieldset>
		<legend><?= __('Add Venue'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('location');
		echo $this->Form->input('capacity');
		echo $this->Form->input('image');
		echo $this->Form->input('image_dir');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
