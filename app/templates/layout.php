<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjS2ZDG_eOKlXNUeGob9gvoxe3EdMRXVA&signed_in=true&callback=initMap"
        async defer></script>
	<script src="<?= $this->assetUrl('js/script.js') ?>"async defer></script>
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
	<!-- <link rel="stylesheet" href="<?= $this->assetUrl('css/reset.css') ?>"> -->
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