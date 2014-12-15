<div class="actions columns col-md-2">
	<h3><?= __('Actions') ?></h3>
	<ul class="side-nav">

	</ul>
</div>
<div class="matches form score_card col-md-10">
	<h2>Match scorecard</h2>

	<h6 class="subheader"><?= __('Name') ?></h6>
	<p><?= h($match->name) ?></p>
	<h6 class="subheader"><?= __('Venue') ?></h6>
	<p><?= $match->has('venue') ? $this->Html->link($match->venue->name, ['controller' => 'Venues', 'action' => 'view', $match->venue->id]) : '' ?></p>
	<h6 class="subheader"><?= __('Format') ?></h6>
	<p><?= $match->has('format') ? $this->Html->link($match->format->name, ['controller' => 'Formats', 'action' => 'view', $match->format->id]) : '' ?></p>

	<h6 class="subheader"><?= __('Teams') ?></h6>

	<?php
	if ($match->has('teams')) {
		echo "<p>" .
			$this->Html->link($match->teams[0]->name, ['controller' => 'teams', 'action' => 'view', $match->teams[0]->id]) .
			"&nbsp;vs&nbsp;" .
			$this->Html->link($match->teams[1]->name, ['controller' => 'teams', 'action' => 'view', $match->teams[1]->id]) .
		"</p>";
	}

	$this->Scorecard->display($match, 'edit');
	?>
</div>