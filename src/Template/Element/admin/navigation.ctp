<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
		<li <?php echo ($this->request->controller === 'leagues')? 'class="active"' : '';?>><?php echo $this->Html->link('Leagues', ['controller' => 'Leagues', 'action' => 'index']);?></li>
		<li <?php echo ($this->request->controller === 'clubs')? 'class="active"' : '';?>><?php echo $this->Html->link('Clubs', ['controller' => 'Clubs', 'action' => 'index']);?></li>
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Players <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'players')? 'class="active"' : '';?>><?php echo $this->Html->link('Players', ['controller' => 'Players', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'teams')? 'class="active"' : '';?>><?php echo $this->Html->link('Teams', ['controller' => 'Teams', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'matches')? 'class="active"' : '';?>><?php echo $this->Html->link('Matches', ['controller' => 'Matches', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'venues')? 'class="active"' : '';?>><?php echo $this->Html->link('Venues', ['controller' => 'Venues', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'formats')? 'class="active"' : '';?>><?php echo $this->Html->link('Formats', ['controller' => 'Formats', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Scores <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'innings')? 'class="active"' : '';?>><?php echo $this->Html->link('Innings', ['controller' => 'Innings', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'batsmen')? 'class="active"' : '';?>><?php echo $this->Html->link('Batting', ['controller' => 'Batsmen', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'bowlers')? 'class="active"' : '';?>><?php echo $this->Html->link('Bowling', ['controller' => 'Bowlers', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'wickets')? 'class="active"' : '';?>><?php echo $this->Html->link('Wickets', ['controller' => 'Wickets', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li class="dropdown">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">System <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'dismissals')? 'class="active"' : '';?>><?php echo $this->Html->link('Dismissals', ['controller' => 'Dismissals', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-off"></span> Logout', ['controller' => 'Users', 'action' => 'logout', 'prefix' => false], ['escape' => false]);?></li>
	  </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>