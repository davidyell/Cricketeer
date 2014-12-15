<div class="matches view">
	<h1><?php echo $match->get('name');?></h1>
	<p><?php echo $match->teams[0]->name;?> v <?php echo $match->teams[1]->name;?></p>
	<p>Played on <b><?php echo $match->when_played;?></b> at <b><?php echo $match->venue->name;?></b></p>


	<?php $this->Scorecard->display($match);?>
</div>