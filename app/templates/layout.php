<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap.min.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styleUser.css') ?>">
</head>
<body>
	<div class="container">
		<header>
			<h1><?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
	<script src="<?= $this->assetUrl('js/jquery-2.2.0.min.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/bootstrap.min.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/script.js') ?>" type="text/javascript" charset="utf-8"></script>
</body>
</html>