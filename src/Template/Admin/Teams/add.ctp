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
	</ul>
</div>
<div class="teams form col-md-10">
<?= $this->Form->create($team) ?>
	<fieldset>
		<legend><?= __('Add Team'); ?></legend>
	<?php
		echo $this->Form->input('name');
		echo $this->Form->input('club_id', ['options' => $clubs]);
		echo $this->Form->input('match_id', ['options' => $matches]);

		for ($i = 0; $i < 11; $i++) {
			$playerNum = $i + 1;

			$idOptions = ['type' => 'hidden', 'value' => \Cake\Utility\String::uuid()];
			if (isset($team->squads[$i]['id'])) {
				$idOptions['value'] = $team->squads[$i]['id'];
			}
			echo $this->Form->input("squads.$i.id", $idOptions);
			echo $this->Form->input("squads.$i.player_id", ['type' => 'select', 'options' => $players, 'label' => "Player $playerNum",'empty' => 'Pick player']);
			echo $this->Form->checkbox("squads.$i.captain") . ' Captain?';
			echo "<hr>";
		}
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
