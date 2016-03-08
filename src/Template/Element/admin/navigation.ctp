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
        
		<li <?php echo ($this->request->controller === 'Leagues')? 'class="active"' : '';?>><?php echo $this->Html->link('Leagues', ['controller' => 'leagues', 'action' => 'index']);?></li>
		<li <?php echo ($this->request->controller === 'Clubs')? 'class="active"' : '';?>><?php echo $this->Html->link('Clubs', ['controller' => 'clubs', 'action' => 'index']);?></li>
		
		<li class="dropdown <?php echo ($this->request->controller === 'Players' || $this->request->controller === 'Teams')? 'active' : '';?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Players <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'Players')? 'class="active"' : '';?>><?php echo $this->Html->link('Players', ['controller' => 'players', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'Teams')? 'class="active"' : '';?>><?php echo $this->Html->link('Teams', ['controller' => 'teams', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li class="dropdown <?php echo ($this->request->controller === 'Matches' || $this->request->controller === 'Venues' || $this->request->controller === 'Formats')? 'active' : '';?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Matches <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'Matches')? 'class="active"' : '';?>><?php echo $this->Html->link('Matches', ['controller' => 'matches', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'Venues')? 'class="active"' : '';?>><?php echo $this->Html->link('Venues', ['controller' => 'venues', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'Formats')? 'class="active"' : '';?>><?php echo $this->Html->link('Formats', ['controller' => 'formats', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li class="dropdown <?php echo ($this->request->controller === 'Innings' || $this->request->controller === 'Batsmen' || $this->request->controller === 'Bowlers' || $this->request->controller === 'Wickets')? 'active' : '';?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">Scores <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'Innings')? 'class="active"' : '';?>><?php echo $this->Html->link('Innings', ['controller' => 'innings', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'Batsmen')? 'class="active"' : '';?>><?php echo $this->Html->link('Batting', ['controller' => 'batsmen', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'Bowlers')? 'class="active"' : '';?>><?php echo $this->Html->link('Bowling', ['controller' => 'bowlers', 'action' => 'index']);?></li>
				<li <?php echo ($this->request->controller === 'Wickets')? 'class="active"' : '';?>><?php echo $this->Html->link('Wickets', ['controller' => 'wickets', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li class="dropdown <?php echo ($this->request->controller === 'Dismissals')? 'active' : '';?>">
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">System <span class="caret"></span></a>
			<ul class="dropdown-menu" role="menu">
				<li <?php echo ($this->request->controller === 'Dismissals')? 'class="active"' : '';?>><?php echo $this->Html->link('Dismissals', ['controller' => 'dismissals', 'action' => 'index']);?></li>
			</ul>
		</li>
		
		<li><?php echo $this->Html->link('<span class="glyphicon glyphicon-off"></span> Logout', ['controller' => 'users', 'action' => 'logout', 'prefix' => false], ['escape' => false]);?></li>
	  </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>