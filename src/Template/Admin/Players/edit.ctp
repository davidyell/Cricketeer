<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $player->id], ['confirm' => __('Are you sure you want to delete # %s?', $player->id)]) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List PlayerSpecialisations'), ['controller' => 'PlayerSpecialisations', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player Specialisation'), ['controller' => 'PlayerSpecialisations', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Clubs'), ['controller' => 'Clubs', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Club'), ['controller' => 'Clubs', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Batsmen'), ['controller' => 'Batsmen', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Batsman'), ['controller' => 'Batsmen', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bowlers'), ['controller' => 'Bowlers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bowler'), ['controller' => 'Bowlers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="players form col-md-10">
<?= $this->Form->create($player) ?>
	<fieldset>
		<legend><?= __('Edit Player'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('initials');
		echo $this->Form->input('last_name');
		echo $this->Form->input('slug');
		echo $this->Form->input('photo');
		echo $this->Form->input('photo_dir');
		echo $this->Form->input('number');
		echo $this->Form->input('nationality');
		echo $this->Form->input('bats');
		echo $this->Form->input('bowls');
		echo $this->Form->input('player_specialisation_id', ['options' => $playerSpecialisations]);
		echo $this->Form->input('club_id', ['options' => $clubs]);
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
