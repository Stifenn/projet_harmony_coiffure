<?php
	
	require_once '../../inc/connexion.php';
	require_once '../../inc/functions.php';
	
	//fichier index du front


$avatar = getAvatar($pdo);
$oldLastname = recupLastname($pdo);
$oldFirstname = recupFirstname($pdo);

$resulat = recupLatLon($pdo);
$Lat = $resulat[0]['value'];
$Lon = $resulat[1]['value'];

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Mon site vitrine</title>
	<!-- style -->
	<link rel="stylesheet" href="../../css/style_front.css">
	<link rel="stylesheet" href="../../css/flexslider.css">
	<link rel="stylesheet" href="../../css/style1.css">
	<!-- sript -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js" type="text/javascript"></script>
 	<script src="../../js/jquery.flexslider-min.js" type="text/javascript"></script>

	
	<script src="../../js/jquery-ui.min.js" type="text/javascript" charset="utf-8" ></script>
	<script src="../../js/javascript.js" type="text/javascript" charset="utf-8" ></script>

	<script src="http://maps.googleapis.com/maps/api/js"></script>
  	<script src="../../js/map.js" async-defer></script>
  	<script>
  		google.maps.event.addDomListener(window, 'load',
        function(){initMap(<?php echo $Lat . ',' . $Lon ?>)});
        // $(document).ready(function(){inistMap()
        // });</script>
</head>
<body>
	<main>
	<div>
		<nav class="container_nav">
		<div>

			<img src="<?php echo $avatar['value']; ?>" alt="avatar"  width="100px" height="100px" />
			<p><?php echo $oldLastname['value']." ".$oldFirstname['value'];?></p>
		</div>
			<ul>
				<li><a href ="index.php?page=home">Accueil</a></li>
				<li><a href="index.php?page=folio" title="">Portfolio</a></li>
				<li><a href="index.php?page=projets" title="">Projets</a></li>
				<li><a href="index.php?page=blog" title="">Blog</a></li>
				<li><a href="index.php?page=contact" title="">Contact</a></li>

			</ul>

		</nav>
	</div>
		<section class="container_section">
		<div>Javascript est requis pour faire afficher ce script</div>
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
				include_once '../../inc/home.php';
			}
		?>
		<div class='clearfix'></div>
		</section>
		
	<?php 
		include_once '../../inc/footer.php';
	?>
	</main>
