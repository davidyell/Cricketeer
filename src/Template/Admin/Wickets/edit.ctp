<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $wicket->id], ['confirm' => __('Are you sure you want to delete # %s?', $wicket->id)]) ?></li>
		<li><?= $this->Html->link(__('List Wickets'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dismissals'), ['controller' => 'Dismissals', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Dismissal'), ['controller' => 'Dismissals', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="wickets form col-md-9">
<?= $this->Form->create($wicket) ?>
	<fieldset>
		<legend><?= __('Edit Wicket'); ?></legend>
	<?php
		echo $this->Form->input('lost_wicket_player_id');
		echo $this->Form->input('took_wicket_player_id');
		echo $this->Form->input('bowler_player_id', ['options' => $players]);
		echo $this->Form->input('dismissal_id', ['options' => $dismissals]);
		echo $this->Form->input('fall_of_wicket');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
