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
	</ul>
</div>
<div class="teams form col-md-10">
<?= $this->Form->create($team) ?>
	<fieldset>
		<legend><?= __('Edit Team'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('club_id', ['options' => $clubs, 'disabled' => true]);
		echo $this->Form->input('match_id', ['options' => $matches, 'disabled' => true]);
		
		for ($i = 0; $i < 11; $i++) {
			$idOptions = ['type' => 'hidden', 'value' => \Cake\Utility\String::uuid()];
			if (isset($team->squads[$i]['id'])) {
				$idOptions['value'] = $team->squads[$i]['id'];
			}
			echo $this->Form->input("squads.$i.id", $idOptions);
			echo $this->Form->input("squads.$i.player_id", ['type' => 'select', 'options' => $players, 'label' => "Player $i", 'empty' => 'Pick player']);
			echo $this->Form->input("squads.$i.captain", ['type' => 'checkbox', 'label' => 'Is captain?']);
		}
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
