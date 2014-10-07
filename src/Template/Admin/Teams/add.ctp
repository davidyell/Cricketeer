<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Teams'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Squads'), ['controller' => 'Squads', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Squad'), ['controller' => 'Squads', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="teams form col-md-10">
<?= $this->Form->create($team) ?>
	<fieldset>
		<legend><?= __('Add Team'); ?></legend>
	<?php
		echo $this->Form->input('club_id', ['options' => $clubs]);
		echo $this->Form->input('match_id', ['options' => $matches]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
