<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $team->id], ['confirm' => __('Are you sure you want to delete # %s?', $team->id)]) ?></li>
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
		<legend><?= __('Edit Team'); ?></legend>
	<?php
		echo $this->Form->input('club_id', ['options' => $clubs, 'disabled' => true]);
		echo $this->Form->input('match_id', ['options' => $matches, 'disabled' => true]);
		
		for ($i = 1; $i <= 11; $i++) {
			echo $this->Form->input("squads.$i.id", ['type' => 'hidden', 'value' => \Cake\Utility\String::uuid()]);
			echo $this->Form->input("squads.$i.player_id", ['type' => 'select', 'options' => $players, 'label' => "Player $i", 'empty' => 'Pick player']);
			echo $this->Form->checkbox("squads.$i.captain") . ' Captain?';
		}
	?>
	</fieldset>
<?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
<?= $this->Form->end() ?>
</div>
