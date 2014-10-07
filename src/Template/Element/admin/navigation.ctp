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
      <a class="navbar-brand" href="#">Brand</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        
		<li><?php echo $this->Html->link('Leagues', ['controller' => 'leagues', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Clubs', ['controller' => 'clubs', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Players', ['controller' => 'players', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Teams', ['controller' => 'teams', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Matches', ['controller' => 'matches', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Venues', ['controller' => 'venues', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Formats', ['controller' => 'formats', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Innings', ['controller' => 'innings', 'action' => 'index']);?></li>
		<li><?php echo $this->Html->link('Dismissals', ['controller' => 'dismissals', 'action' => 'index']);?></li>
		
	  </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>