<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" type="text/css" href="<?= $this->assetUrl('css/cssBack/cssBack.css') ?>">
</head>
<body>
	<main>
		<div class="container">
			<header>
				<nav>
					<ul>
						<li><a href="<?= $this->url('slider') ?>" title="">Slider</a></li>
						<li><a href="<?= $this->url('lookbook') ?>" title="">Lookbook</a></li>
						<li><a href="<?= $this->url('images') ?>" title="">Images de presentation du site</a></li>
						<li><a href="<?= $this->url('produits') ?>" title="">Images des produits</a></li>
						<li><a href="<?= $this->url('tarifs') ?>" title="">Grille des tarifs</a></li>
						<li><a href="<?= $this->url('commentaires') ?>" title="">Livre d'or</a></li>
					</ul>
				</nav>
				<h1>W :: <?= $this->e($title) ?></h1>
			</header>

			<section>
				<?= $this->section('main_content') ?>
			</section>

			<footer>
			</footer>
		</div>	
	</main>
</body>
</html>