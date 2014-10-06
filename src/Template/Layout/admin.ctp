<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $this->fetch('title') ?></title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->Html->css('base.css') ?>
	<?= $this->Html->css('cake.css') ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
	
</head>
<body>
	<header>
		<div class="header-title">
			<span><?= $this->fetch('title') ?></span>
		</div>
		<div class="header-help">
			<span><?php echo $this->Html->link('Home', '/');?></span>
			<span><?php echo $this->Html->link('Logout', ['controller' => 'users', 'action' => 'logout', 'admin' => false]);?></span>
		</div>
	</header>
	<div id="container">
		
		<div id="content">
			<?= $this->Flash->render() ?>

			<div class="row">
				<?= $this->fetch('content') ?>
			</div>
		</div>
		<footer>
		</footer>
		<?= $this->fetch('script') ?>
	</div>
</body>
</html>
