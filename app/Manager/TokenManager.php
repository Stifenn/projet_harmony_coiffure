<?php

namespace Manager;

use \W\Manager\Manager;

class TokenManager extends Manager
{
	// fonction qui renvoi l'id, le token et l'id_user si le token existe sinon false
	public function tokenExists($token)
	{
	   $app = getApp();

	   $sql = "SELECT * FROM tokens WHERE token = :token LIMIT 1";
	   $dbh = \W\Manager\ConnectionManager::getDbh();
	   $sth = $dbh->prepare($sql);
	   $sth->bindValue(":token", $token);
	   if ($sth->execute()){
	       $foundUser = $sth->fetch();
	       if ($foundUser){
	           return $foundUser;
	       }
	   }
	   return false;
	}
}