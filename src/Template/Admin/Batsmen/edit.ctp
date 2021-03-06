<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $batsman->id], ['confirm' => __('Are you sure you want to delete # {0}?', $batsman->id)]) ?></li>
		<li><?= $this->Html->link(__('List Batsmen'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="batsmen form col-md-10">
<?= $this->Form->create($batsman) ?>
	<fieldset>
		<legend><?= __('Edit Batsman') ?></legend>
	<?php
		echo $this->Form->input('player_id', ['options' => $players]);
		echo $this->Form->input('innings_id', ['options' => $innings]);
		echo $this->Form->input('runs');
		echo $this->Form->input('balls');
		echo $this->Form->input('fours');
		echo $this->Form->input('sixes');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
