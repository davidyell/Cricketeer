<div class="users login">
	<?php
	echo $this->Form->create();
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->submit('Submit', ['class' => 'btn']);
	echo $this->Form->end();
	?>
</div>