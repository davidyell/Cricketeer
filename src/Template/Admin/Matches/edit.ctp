<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $match->id], ['confirm' => __('Are you sure you want to delete # %s?', $match->id)]) ?></li>
		<li><?= $this->Html->link(__('List Matches'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Venues'), ['controller' => 'Venues', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Venue'), ['controller' => 'Venues', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Formats'), ['controller' => 'Formats', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Format'), ['controller' => 'Formats', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="matches form col-md-10">
<?= $this->Form->create($match) ?>
	<fieldset>
		<legend><?= __('Edit Match'); ?></legend>
	<?php
		echo $this->Form->input('when_played');
		echo $this->Form->input('venue_id', ['options' => $venues]);
		echo $this->Form->input('format_id', ['options' => $formats]);
		echo $this->Form->input('wides');
		echo $this->Form->input('byes');
		echo $this->Form->input('leg_byes');
		echo $this->Form->input('no_balls');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
