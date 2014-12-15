<nav class="navbar">
	<ul class="nav nav-pills" role="tablist">
		<li class="<?php echo ($this->request->here === '/')? 'active' : '';?>"><?php echo $this->Html->link('Home', '/');?></li>
		<li class="<?php echo ($this->request->params['controller'] === 'matches')? 'active' : '';?>"><?php echo $this->Html->link('Matches', ['controller' => 'matches', 'action' => 'index']);?></li>
	</ul>
</nav>