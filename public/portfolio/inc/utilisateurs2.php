<fieldset>
	<legend>Utilisateur</legend>
	<ul >
		<?php 
		$emailUser = getUtilisateur($pdo);
		$i = 1;
		foreach ($emailUser as $currentEmailUser ) {
			echo '<li>Utilisateur '.$i.': '. $currentEmailUser['email']. '</li>' ;
			$i++;
		} ?>
	</ul>
</fieldset>
<?php 
	if(isset($_POST['send'])) {
		if(isset($_POST['email']) && isset($_POST['password1']) && isset($_POST['password2'])) {
			$email = filter_var($_POST['email'], FILTER_SANITIZE_SPECIAL_CHARS);
			$password = $_POST['password1'];
			$password2 = $_POST['password2'];
			if($password == $password2) {
				insertUtilisateur($pdo, $email, $password);
			}else{
				echo "Merci de rentrer le même mot de passe";
			}
		}
	}
 ?>
<fieldset>
	<legend>Ajout d'un utilisateur</legend>
	 <form action="#" method="post" accept-charset="utf-8">
		 <input type="text" name="email" value="" placeholder="email">
		 <input type="password" name="password1" value="" placeholder="password">
		 <input type="password" name="password2" value="" placeholder="retaper votre password">
		 <input type="submit" name="send" value="Envoyer">
	 </form>
</fieldset>

