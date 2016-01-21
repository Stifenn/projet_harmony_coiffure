<?php

if(isset( $_POST['content'])){
$content = $_POST['content'];
$homeContent = strip_tags($content,'<h1><h2><h3><h4><h5><h6><p><ul><li><em>');
inserContent($pdo,$homeContent);
}
$getcont = getContent($pdo);

?>

<h1>Contenu de la page d'acceuil</h1>

<form action="#" method="post" accept-charset="utf-8">
	<textarea name="content"><?php echo $getcont['value'];?></textarea>
	<button name="sent" type="submit" >Mettre a jour</button>	
</form> 
