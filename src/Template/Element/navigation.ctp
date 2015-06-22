<nav class="navbar">
	<ul class="nav nav-pills" role="tablist">
		<li class="<?php echo ($this->request->here === '/')? 'active' : '';?>"><?php echo $this->Html->link('Home', '/');?></li>
		<li class="<?php echo ($this->request->params['controller'] === 'Leagues')? 'active' : '';?>"><?php echo $this->Html->link('Leagues', ['controller' => 'Leagues', 'action' => 'index']);?></li>
		<li class="<?php echo ($this->request->params['controller'] === 'Matches')? 'active' : '';?>"><?php echo $this->Html->link('Matches', ['controller' => 'Matches', 'action' => 'index']);?></li>
		<li class="<?php echo ($this->request->params['controller'] === 'Clubs')? 'active' : '';?>"><?php echo $this->Html->link('Clubs', ['controller' => 'Clubs', 'action' => 'index']);?></li>
		<li class="<?php echo ($this->request->params['controller'] === 'Players')? 'active' : '';?>"><?php echo $this->Html->link('Players', ['controller' => 'Players', 'action' => 'index']);?></li>
	</ul>
</nav>