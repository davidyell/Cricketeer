<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $innings->id], ['confirm' => __('Are you sure you want to delete # %s?', $innings->id)]) ?></li>
		<li><?= $this->Html->link(__('List Innings'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Matches'), ['controller' => 'Matches', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Match'), ['controller' => 'Matches', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
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
		<legend><?= __('Edit Innings'); ?></legend>
	<?php
		echo $this->Form->input('match_id', ['options' => $matches]);
		echo $this->Form->input('player_id', ['options' => $players]);
		echo $this->Form->input('team_id', ['options' => $teams]);

		echo "<h3>" . __('Batting') . "</h3>";
		echo $this->Form->input('batsmen.0.id');
		echo $this->Form->input('batsmen.0.runs');
		echo $this->Form->input('batsmen.0.balls');
		echo $this->Form->input('batsmen.0.fours');
		echo $this->Form->input('batsmen.0.sixes');

		echo "<h3>" . __('Lost wicket') . "</h3>";
		echo $this->Form->input('wickets.0.id');
		echo $this->Form->input('wickets.0.took_wicket_player_id', ['options' => $wicketPlayers, 'label' => 'Player who took the wicket']);
		echo $this->Form->input('wickets.0.bowler_player_id', ['options' => $wicketPlayers, 'label' => 'Bowler']);
		echo $this->Form->input('wickets.0.dismissal_id', ['options' => $dismissals]);
		echo $this->Form->input('wickets.0.fall_of_wicket', ['label' => 'Score when the wicket fell']);

		echo "<h3>" . __('Bowling') . "</h3>";
		echo $this->Form->input('bowlers.0.id');
		echo $this->Form->input('bowlers.0.overs');
		echo $this->Form->input('bowlers.0.runs');
		echo $this->Form->input('bowlers.0.wickets', ['type' => 'number']);
		echo $this->Form->input('bowlers.0.maidens');

	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
