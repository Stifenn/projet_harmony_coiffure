
<?php 

	// Fonction GENERAL.PHP

	//fonction qui insert le nom
	function insertName($pdo, $firstname, $lastname){

		$sql = 'INSERT INTO user (lastname, firstname) VALUES(:lastname, :firstname);';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':lastname', $lastname);
		$stmt->bindValue(':firstname', $firstname);
		$stmt->execute();
	}
	// fonction qui met à jour le nom 
	function updateLastname($pdo, $lastname){
		$sql = 'UPDATE options SET value = :lastname WHERE name = "lastname"' ;
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':lastname', $lastname);
		$stmt->execute();
	}
		// fonction qui met à jour le prenom 
	function updateFirstname($pdo, $firstname){
		$sql = 'UPDATE options SET value = :firstname WHERE name = "firstname"' ;
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':firstname', $firstname);
		$stmt->execute();
	}



	//fonction qui récupere le prenom 
	function recupFirstname($pdo) {
		$sql = 'SELECT value FROM options WHERE name ="firstname" ' ;
		$stmt = $pdo->prepare($sql);
		$stmt->execute();

		$users = $stmt->fetch();
		return $users;
	}

		//fonction qui récupere le nom 
	function recupLastname($pdo) {
		$sql = 'SELECT value FROM options WHERE name ="lastname" ' ;
		$stmt = $pdo->prepare($sql);
		$stmt->execute();

		$users = $stmt->fetch();
		return $users;
	}


	// function qui renvoi le type de la page
	function get_page(){
		 return $_GET['page'];
	}


	function getAvatar($pdo){
		$sql = 'SELECT value FROM options WHERE name LIKE "avatar"';
		$stmt = $pdo ->prepare($sql);
		$stmt->execute();
		$avatar = $stmt ->fetch();
		return $avatar;
	}

	function updateAvatar($pdo,$path){
		$sql = 'UPDATE options SET value = :path WHERE name LIKE "avatar"';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':path', $path);
		$stmt->execute();

	}


		// fonction SLIDER.PHP

		// function qui récupère les images pour le slider en DBB
	function get_image_slider($pdo, $id_user){
		$sql = 'SELECT chemin, label FROM image_slider WHERE id_user = :id_user' ;
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id_user', $id_user);
		$stmt->execute();

		$result = $stmt->fetchAll();
		return $result;
	}
		// function qui insère une image dans le slider en DBB
		function insert_image_slider($pdo, $label, $chemin, $id_user){
		$sql = 'INSERT INTO image_slider (label, chemin, id_user) VALUES(:label, :chemin, :id_user);';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':label', $label);
		$stmt->bindValue(':chemin', $chemin);
		$stmt->bindValue(':id_user', $id_user);
		$stmt->execute();
	}

	 // fonction CONTENT.php

	// function qui sert à inserer le texte dans la page content
	
	function inserContent($pdo,$content){
		$sql = 'UPDATE options SET value = :content WHERE name LIKE "content"';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':content', $content);
		$stmt->execute();
	}
	// function qui sert à recuperer le texte dans la page content
	function getContent($pdo){
		$sql = 'SELECT value FROM options WHERE name = "content"';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();
		$content = $stmt ->fetch();
		return $content;
	}


	// Fonction PORTFOLIO.PHP

		// function qui récupère les images pour le slider en DBB
	function getImage_portfolio($pdo, $id_user){
		$sql = 'SELECT chemin, label,titre FROM image_portfolio WHERE id_user = :id_user' ;
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':id_user', $id_user);
		$stmt->execute();

		$result = $stmt->fetchAll();
		return $result;
	}

	function insertImage_portfolio($pdo, $label, $chemin, $id_user){

		$sql = 'INSERT INTO image_portfolio (label, chemin, id_user) VALUES(:label, :chemin, :id_user);';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':label', $label);
		$stmt->bindValue(':chemin', $chemin);
		$stmt->bindValue(':id_user', $id_user);
		$stmt->execute();

	}


	// fonction qui récup la latitude et la longitude en BDD
	function recupLatLon($pdo) {
		$sql = '(SELECT value FROM options WHERE name ="lat") UNION (SELECT value FROM options WHERE name ="lon")';
		$stmt = $pdo->prepare($sql);
		$stmt->execute();

		$LatLon = $stmt->fetchAll();
		return $LatLon;
		}



// function qui supprime une image du slider en DBB
	function delete_image_slider($pdo, $label){
		$sql = 'DELETE FROM image_slider WHERE label = :label';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':label', $label);
		$stmt->execute();
	}

	// fonction qui met à jour le nom 
	function updateLat($pdo, $lat){
		$sql = 'UPDATE options SET value = :lat WHERE name = "lat"' ;
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':lat', $lat);
		$stmt->execute();
	}
		// fonction qui met à jour le prenom 
	function updateLon($pdo, $lon){
		$sql = 'UPDATE options SET value = :lon WHERE name = "lon"' ;
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':lon', $lon);
		$stmt->execute();
	}

/*	function insertUtilisateur($pdo, $email, $password){

		$sql = 'INSERT INTO user (email, password) VALUES(:email, :password);';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->bindValue(':password', $password);
		$stmt->execute();
	}

	function getUtilisateur($pdo){
		$sql = 'SELECT email FROM user ' ;
		$stmt = $pdo->query($sql);
		$stmt->execute();

		$result = $stmt->fetchAll();
		return $result;
	}
*/


	
	/**
	 * Renvoie la liste des role et les utilisateurs correspondants
	 * @param $pdo Connexion en DB
	 * @return Array Une liste de role et d'utilisateurs associés
	 */
	function getuserByrole($pdo) {
		$sql =  'SELECT role.name, role.FrName, user.email ' . 
				'FROM role ' .
				'LEFT JOIN user ON user.id_role = role.id;';
		$result = $pdo->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Renvoie la totalité des role (utilisé pour le <select> dans add_user.php)
	 * @param $pdo Connexion à la DB
	 * @return Array Une liste de role
	 */
	function getAllrole($pdo) {
		$sql =  'SELECT role.id, role.name, role.FrName ' .
				'FROM role;';
		$result = $pdo->query($sql);
		return $result->fetchAll(PDO::FETCH_ASSOC);
	}

	/**
	 * Ajoute un utilisateur en base de données
	 * @param $pdo Connexion à la DB
	 * @param $mail Mail
	 * @param $pass Mot de passe
	 * @param $idrole Identifiant 
	 */ 
	function addUser($pdo, $mail, $pass, $idrole) {
		$sql = 'INSERT INTO user(email,password,id_role) VALUES (:email,:password,:idrole);';
		$stmt = $pdo -> prepare($sql);
		$stmt ->bindparam(':email',$mail);
		$stmt ->bindparam(':password',$pass);
		$stmt ->bindparam(':idrole',$idrole);
		$stmt -> execute();
	}

	// fonction qui connecte l'utilisateur
	function connectUser($pdo, $email, $pass) {
		$sql = 'SELECT user.id, email, password, id_role, name, FrName FROM user INNER JOIN role ON role.id = user.id_role WHERE email LIKE :email LIMIT 1';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->execute();

		$user = $stmt->fetch(PDO::FETCH_ASSOC);
		
		/* On vérifie si l'adresse mail a été trouvée */
		if(empty($user)) {
			/* L'adresse mail n'existe pas en DB */
			return false;
		}

		$dbPass = $user['password'];
		if($pass == $dbPass) { // password_verify($pass, $dbPass) si en hash en BDD
			/* Le mot de passe correspond */
			return array(
				'id' 		=> $user['id'],
				'id_role' 	=> $user['id_role'],
				'email' 	=> $email,
				'name'		=> $user['name'],
				'FrName'	=> $user['FrName'],
			);
		}
		return false; /* Le mot de passe n'est pas correct */
	}

	// fonction qui regarde si l'email est présent en BDD
	function mailExists($pdo, $email) {
		$sql = 'SELECT COUNT(email) AS nbMail FROM user WHERE email LIKE :email';
		$stmt = $pdo->prepare($sql);
		$stmt->bindValue(':email', $email);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if($row['nbMail'] == 0) {
			return false;
		}
		return true;
	}
