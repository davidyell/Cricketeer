<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $bowler->id], ['confirm' => __('Are you sure you want to delete # %s?', $bowler->id)]) ?></li>
		<li><?= $this->Html->link(__('List Bowlers'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="bowlers form large-10 medium-9 columns">
<?= $this->Form->create($bowler) ?>
	<fieldset>
		<legend><?= __('Edit Bowler'); ?></legend>
	<?php
		echo $this->Form->input('player_id', ['options' => $players]);
		echo $this->Form->input('innings_id', ['options' => $innings]);
		echo $this->Form->input('overs');
		echo $this->Form->input('runs');
		echo $this->Form->input('wickets');
		echo $this->Form->input('economy');
		echo $this->Form->input('maidens');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
