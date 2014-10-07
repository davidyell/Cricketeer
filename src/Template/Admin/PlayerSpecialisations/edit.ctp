<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $playerSpecialisation->id], ['confirm' => __('Are you sure you want to delete # %s?', $playerSpecialisation->id)]) ?></li>
		<li><?= $this->Html->link(__('List Player Specialisations'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="playerSpecialisations form col-md-10">
<?= $this->Form->create($playerSpecialisation) ?>
	<fieldset>
		<legend><?= __('Edit Player Specialisation'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('description');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
