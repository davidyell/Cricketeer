<div class="actions col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $innings->id], ['confirm' => __('Are you sure you want to delete # {0}?', $innings->id)]) ?></li>
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
<div class="matches form col-md-10 score_card">
	<?php
	echo $this->Form->create($innings);
	echo $this->element('Admin/innings-edit', [
		'innings' => 1,
		'teamsInnings' => $innings,
		'inningNum' => 1,
		'team' => $innings->team,
		'opposition' => $opposition
	]);
	echo $this->Form->button(__('Submit'), ['class' => 'btn btn-success']);
	echo $this->Form->end();
	?>
</div>
