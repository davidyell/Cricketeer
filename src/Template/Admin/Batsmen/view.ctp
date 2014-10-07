<div class="actions columns col-md-2">
	<h3><?= __('Actions'); ?></h3>
	<ul class="side-nav">
		<li><?= $this->Html->link(__('Edit Batsman'), ['action' => 'edit', $batsman->id]) ?> </li>
		<li><?= $this->Form->postLink(__('Delete Batsman'), ['action' => 'delete', $batsman->id], ['confirm' => __('Are you sure you want to delete # %s?', $batsman->id)]) ?> </li>
		<li><?= $this->Html->link(__('List Batsmen'), ['action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Batsman'), ['action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Players'), ['controller' => 'Players', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Player'), ['controller' => 'Players', 'action' => 'add']) ?> </li>
		<li><?= $this->Html->link(__('List Innings'), ['controller' => 'Innings', 'action' => 'index']) ?> </li>
		<li><?= $this->Html->link(__('New Innings'), ['controller' => 'Innings', 'action' => 'add']) ?> </li>
	</ul>
</div>
<div class="batsmen view col-md-10">
	<h2><?= h($batsman->id) ?></h2>
	<div class="row">
		<div class="large-5 columns strings">
			<h6 class="subheader"><?= __('Id') ?></h6>
			<p><?= h($batsman->id) ?></p>
			<h6 class="subheader"><?= __('Player') ?></h6>
			<p><?= $batsman->has('player') ? $this->Html->link($batsman->player->id, ['controller' => 'Players', 'action' => 'view', $batsman->player->id]) : '' ?></p>
			<h6 class="subheader"><?= __('Innings') ?></h6>
			<p><?= $batsman->has('innings') ? $this->Html->link($batsman->innings->id, ['controller' => 'Innings', 'action' => 'view', $batsman->innings->id]) : '' ?></p>
		</div>
		<div class="large-2 larege-offset-1 columns numbers end">
			<h6 class="subheader"><?= __('Runs') ?></h6>
			<p><?= $this->Number->format($batsman->runs) ?></p>
			<h6 class="subheader"><?= __('Balls') ?></h6>
			<p><?= $this->Number->format($batsman->balls) ?></p>
			<h6 class="subheader"><?= __('Strike Rate') ?></h6>
			<p><?= $this->Number->format($batsman->strike_rate) ?></p>
			<h6 class="subheader"><?= __('Fours') ?></h6>
			<p><?= $this->Number->format($batsman->fours) ?></p>
			<h6 class="subheader"><?= __('Sixes') ?></h6>
			<p><?= $this->Number->format($batsman->sixes) ?></p>
		</div>
		<div class="large-2 columns dates end">
			<h6 class="subheader"><?= __('Created') ?></h6>
			<p><?= h($batsman->created) ?></p>
			<h6 class="subheader"><?= __('Modified') ?></h6>
			<p><?= h($batsman->modified) ?></p>
		</div>
	</div>
</div>
