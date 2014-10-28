<div class="users login">
	<?php
	echo $this->Flash->render('auth');
	echo $this->Form->create();
	echo $this->Form->input('email');
	echo $this->Form->input('password');
	echo $this->Form->submit('Submit', ['class' => 'btn btn-success']);
	echo $this->Form->end();
	?>
</div>