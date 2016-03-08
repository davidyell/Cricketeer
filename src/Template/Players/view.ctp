<div class="players view">
	<h2><?php echo $player->get('full_name');?></h2>
	<?php echo $this->Html->image('../files/players/photo/' . $player->photo_dir . '/portrait_' . $player->photo);?>

	<ul>
		<li><b><?php echo $player->player_specialisation->name;?></b></li>
		<li>Bats: <?php echo $player->bats;?></li>
		<?php if (!empty($player->bowls)): ?>
			<li>Bowls: <?php echo $player->bowls;?></li>
		<?php endif; ?>
		<li>Shirt number: <?php echo $player->number;?></li>
	</ul>

	<div class="clearfix">&nbsp;</div>

	<?php echo $this->Html->image('../files/clubs/image/' . $player->club->image_dir . '/squareSmall_' . $player->club->image);?>
	<h2><?php echo $this->Html->link($player->club->name, ['controller' => 'Clubs', 'action' => 'view', $player->club->id]);?></h2>
</div>