<div class="matches view">
	<h1><?php echo $match->get('name');?></h1>
	<p><?php echo $match->teams[0]->name;?> v <?php echo $match->teams[1]->name;?></p>
	<p>Played on <b><?php echo $match->when_played;?></b> at <b><?php echo $this->Html->link(h($match->venue->name), ['controller' => 'Venues', 'action' => 'view', $match->venue->id]);?></b></p>

	<?php $this->Scorecard->display($match);?>
</div>