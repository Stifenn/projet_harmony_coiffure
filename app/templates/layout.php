<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjS2ZDG_eOKlXNUeGob9gvoxe3EdMRXVA&signed_in=true&callback=initMap"
        async defer></script>
	<script src="<?= $this->assetUrl('js/jquery-2.2.0.min.js') ?>" type="text/javascript" charset="utf-8"></script>
	<script src="<?= $this->assetUrl('js/script.js') ?>" type="text/javascript" charset="utf-8" async defer></script>
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