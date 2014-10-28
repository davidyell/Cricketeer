<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('List Innings'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List InningsTypes'), ['controller' => 'InningsTypes', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings Type'), ['controller' => 'InningsTypes', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Batsmen'), ['controller' => 'Batsmen', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Batsman'), ['controller' => 'Batsmen', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Bowlers'), ['controller' => 'Bowlers', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bowler'), ['controller' => 'Bowlers', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Wickets'), ['controller' => 'Wickets', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Wicket'), ['controller' => 'Wickets', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="innings form col-md-10">
<?= $this->Form->create($innings) ?>
	<fieldset>
		<legend><?= __('Add Innings') ?></legend>
	<?php
		echo $this->Form->input('innings_type_id', ['options' => $inningsTypes]);
		echo $this->Form->input('match_id', ['options' => $matches]);
		echo $this->Form->input('team_id', ['options' => $teams]);
		echo $this->Form->input('wides');
		echo $this->Form->input('byes');
		echo $this->Form->input('leg_byes');
		echo $this->Form->input('no_balls');
		echo $this->Form->input('declared');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
