<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Batsmen'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="batsmen form large-10 medium-9 columns">
<?= $this->Form->create($batsman) ?>
	<fieldset>
		<legend><?= __('Add Batsman'); ?></legend>
	<?php
		echo $this->Form->input('player_id', ['options' => $players]);
		echo $this->Form->input('innings_id', ['options' => $innings]);
		echo $this->Form->input('runs');
		echo $this->Form->input('balls');
		echo $this->Form->input('strike_rate');
		echo $this->Form->input('fours');
		echo $this->Form->input('sixes');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
