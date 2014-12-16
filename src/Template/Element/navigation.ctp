<nav class="navbar">
	<ul class="nav nav-pills" role="tablist">
		<li class="<?php echo ($this->request->here === '/')? 'active' : '';?>"><?php echo $this->Html->link('Home', '/');?></li>
		<li class="<?php echo ($this->request->params['controller'] === 'matches')? 'active' : '';?>"><?php echo $this->Html->link('Matches', ['controller' => 'matches', 'action' => 'index']);?></li>
		<li class="<?php echo ($this->request->params['controller'] === 'players')? 'active' : '';?>"><?php echo $this->Html->link('Players', ['controller' => 'players', 'action' => 'index']);?></li>
	</ul>
</nav>