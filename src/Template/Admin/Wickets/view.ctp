<div class="actions col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Wicket'), ['action' => 'edit', $wicket->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Wicket'), ['action' => 'delete', $wicket->id], ['confirm' => __('Are you sure you want to delete # %s?', $wicket->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Wickets'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Wicket'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Dismissals'), ['controller' => 'Dismissals', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Dismissal'), ['controller' => 'Dismissals', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="wickets view col-md-10">
	<h2><?= h($wicket->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($wicket->id) ?></p>
			<h6 class="subheader"><?= __('Lost Wicket Player') ?></h6>
			<p><?= $wicket->has('player_lost_wicket') ? $this->Html->link($wicket->player_lost_wicket->FullName, ['controller' => 'players', 'action' => 'view', $wicket->player_lost_wicket->id]) : '' ?></p>

			<h6 class="subheader"><?= __('Took Wicket Player') ?></h6>
			<p><?= $wicket->has('player_lost_wicket') ? $this->Html->link($wicket->player_took_wicket->FullName, ['controller' => 'players', 'action' => 'view', $wicket->player_took_wicket->id]) : '' ?></p>

			<h6 class="subheader"><?= __('Bowled Wicket Player') ?></h6>
			<p><?= $wicket->has('player_bowled_wicket') ? $this->Html->link($wicket->player_bowled_wicket->FullName, ['controller' => 'Players', 'action' => 'view', $wicket->player_bowled_wicket->id]) : '' ?></p>

			<h6 class="subheader"><?= __('Dismissal') ?></h6>
			<p><?= $wicket->has('dismissal') ? $this->Html->link($wicket->dismissal->name, ['controller' => 'Dismissals', 'action' => 'view', $wicket->dismissal->id]) : '' ?></p>

			<h6 class="subheader"><?= __('Fall Of Wicket') ?></h6>
			<p><?= h($wicket->fall_of_wicket) ?></p>

			<h6 class="subheader"><?= __('Innings') ?></h6>
			<p><?= $wicket->has('innings') ? $this->Html->link($wicket->innings->id, ['controller' => 'Innings', 'action' => 'view', $wicket->innings->id]) : '' ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($wicket->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($wicket->modified) ?></p>
		</div>
	</div>
</div>
