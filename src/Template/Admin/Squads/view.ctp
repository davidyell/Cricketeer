<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Squad'), ['action' => 'edit', $squad->player_id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Squad'), ['action' => 'delete', $squad->player_id], ['confirm' => __('Are you sure you want to delete # %s?', $squad->player_id)]) ?> </li>
		<li><?= $this->Html->link(__('List Squads'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Squad'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Teams'), ['controller' => 'Teams', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Team'), ['controller' => 'Teams', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="squads view col-md-10">
	<h2><?= h($squad->player_id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Player') ?></h6>
			<p><?= $squad->has('player') ? $this->Html->link($squad->player->id, ['controller' => 'Players', 'action' => 'view', $squad->player->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Team') ?></h6>
			<p><?= $squad->has('team') ? $this->Html->link($squad->team->id, ['controller' => 'Teams', 'action' => 'view', $squad->team->id]) : '' ?></p>
		</div>
	</div>
</div>
