<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

<!-- 	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>"> -->

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/cssBack/cssBack.css') ?>">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<main>
		<div class="container">
			<header>
			<nav>
				<div class="logo"></div>
				<div class="btn-group">
					<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				    	Images <span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a href="<?= $this->url('slider') ?>" title="">Slider</a></li>
						<li><a href="<?= $this->url('lookbook') ?>" title="">Lookbook</a></li>
						<li><a href="<?= $this->url('images') ?>" title="">Images de presentation du site</a></li>
						<li><a href="<?= $this->url('produits') ?>" title="">Images des produits</a></li>
					</ul>
				</div>
					<ul>
						<li><a class="btn btn-default" href="<?= $this->url('administration_tarifs') ?>">Tarifs</a></li>
						<li><a class="btn btn-default"href="<?= $this->url('administration_commentaires') ?>">Commentaires</a></li>
						<li><a class="btn btn-default"href="<?= $this->url('manage') ?>">Gestion des comptes utilisateurs</a></li>
					</ul>
			</nav>
				<div class="clearfix"></div>
				
			</header>

			<section>
				<h2><?= $this->e($title) ?></h1>
				<?= $this->section('main_content') ?>
			</section>

			<footer>
			</footer>
		</div>	
	</main>
</body>
</html>