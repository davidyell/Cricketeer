<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Bowler'), ['action' => 'edit', $bowler->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Bowler'), ['action' => 'delete', $bowler->id], ['confirm' => __('Are you sure you want to delete # %s?', $bowler->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Bowlers'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Bowler'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="bowlers view col-md-10">
	<h2><?= h($bowler->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($bowler->id) ?></p>
			<h6 class="subheader"><?= __('Player') ?></h6>
			<p><?= $bowler->has('player') ? $this->Html->link($bowler->player->id, ['controller' => 'Players', 'action' => 'view', $bowler->player->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Innings') ?></h6>
			<p><?= $bowler->has('innings') ? $this->Html->link($bowler->innings->id, ['controller' => 'Innings', 'action' => 'view', $bowler->innings->id]) : '' ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Overs') ?></h6>
			<p><?= $this->Number->format($bowler->overs) ?></p>
			<h6 class="subheader"><?= __('Runs') ?></h6>
			<p><?= $this->Number->format($bowler->runs) ?></p>
			<h6 class="subheader"><?= __('Wickets') ?></h6>
			<p><?= $this->Number->format($bowler->wickets) ?></p>
			<h6 class="subheader"><?= __('Economy') ?></h6>
			<p><?= $this->Number->format($bowler->economy) ?></p>
			<h6 class="subheader"><?= __('Maidens') ?></h6>
			<p><?= $this->Number->format($bowler->maidens) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($bowler->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($bowler->modified) ?></p>
		</div>
	</div>
</div>
