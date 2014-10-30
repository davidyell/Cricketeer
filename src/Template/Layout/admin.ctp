<!DOCTYPE html>
<html>
<head>
	<?= $this->Html->charset() ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $this->fetch('title') ?></title>
	<?= $this->Html->meta('icon') ?>

	<?= $this->Html->css([
		'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css', 
		'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css',
		'Admin'
	]) ?>

	<?= $this->fetch('meta') ?>
	<?= $this->fetch('css') ?>
</head>
<body>
	<div class="container-fluid">
		<header class="row">
			<div class="col-md-12">
				<h1>Cricketeer: <?= $this->fetch('title') ?></h1>
			</div>
		</header>
		
		<?php echo $this->element('Admin/navigation');?>
		
		<div id="content" class="row">
			<div class="col-md-12">
				<?= $this->Flash->render() ?>
				<div class="row">
					<?= $this->fetch('content') ?>
				</div>
			</div>
		</div>
		
		<footer class="row">
			<div class="col-md-12">
				Cricketeer <?= date('Y');?>
			</div>
		</footer>
	</div>
	
<?php
echo $this->Html->script([
	'https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js', 
	'https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js', 
	'common'
]);
echo $this->fetch('script');
?>
</body>
</html>
