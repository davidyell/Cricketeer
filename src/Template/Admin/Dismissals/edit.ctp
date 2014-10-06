<div class="actions columns large-2 medium-3">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">
		<li><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $dismissal->id], ['confirm' => __('Are you sure you want to delete # %s?', $dismissal->id)]) ?></li>
		<li><?= $this->Html->link(__('List Dismissals'), ['action' => 'index']) ?></li>
		<li><?= $this->Html->link(__('List Wickets'), ['controller' => 'Wickets', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Wicket'), ['controller' => 'Wickets', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="dismissals form large-10 medium-9 columns">
<?= $this->Form->create($dismissal) ?>
	<fieldset>
		<legend><?= __('Edit Dismissal'); ?></legend>
	<?php
		echo $this->Form->input('name');
	?>
	</fieldset>
<?= $this->Form->button(__('Submit')) ?>
<?= $this->Form->end() ?>
</div>
