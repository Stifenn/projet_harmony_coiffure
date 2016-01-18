<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/styleBack.css') ?>">
	<script src="<?= $this->assetUrl('js/jquery-2.2.0.min.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/scriptBack.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
</head>
<body>
	<div class="container">
		<header>
			<h1>W :: <?= $this->e($title) ?></h1>
		</header>

		<section>
			<?= $this->section('main_content') ?>
		</section>

		<footer>
		</footer>
	</div>
</body>
</html>