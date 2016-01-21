<?php
	
	require_once '../../inc/connexion.php';
	require_once '../../inc/functions.php';
	

	
?>

<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Administration</title>
	<link rel="stylesheet" href="../../css/style_back.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
</head>
<body>
	<main>
		<nav class="container_nav">
			<ul>
				<li><p>Administration</p></li>
				<li><a href="index.php?page=general" title="">Géneral</a></li>
				<li><a href="index.php?page=slider" title="">Slider</a></li>
				<li><a href="index.php?page=content" title="">Contenu de la Home page</a></li>
				<li><a href="index.php?page=portfolio" title="">Portfolio</a></li>
				<li><a href="index.php?page=utilisateurs" title="">Utilisateurs</a></li>
				<li><a href="../front/index.php">Retour</a></li>
			</ul>
		</nav>
		<div id="java">Javascript est requis pour faire afficher ce site</div>
		<section class="container_section">
		
		<?php  
			// on regarde sur quel type de page on se trouve
			if ( isset($_GET['page']) && !empty($_GET['page'])) {
				// on appelle la fonction get_page() qui récupère le type de la page
				$type_page = get_page();
				// on regarde si le fichier existe
				if (file_exists ('../../inc/'. $type_page .'.php' )) {
					// si le fichier existe on l'inclus
					include_once '../../inc/'. $type_page.'.php';
				} else { // si le fichier n'existe pas on va sur l'accueil
					include_once '../../inc/404.php';
				}
			} else {
				include_once '../../inc/general.php';
			}
		?>
		<div class="clearfix"></div>
		</section>

	</main>
</body>
</html>