<?php

namespace Manager;

class UserManager extends \W\Manager\Manager
{
	// fonction qui vérifie si un id existe en DB
	public function idExists($userId)
	{
	   $app = getApp();

	   $sql = "SELECT ". $app->getConfig('security_id_property') ." FROM " . $app->getConfig('security_user_table') .
	           " WHERE ". $app->getConfig('security_id_property') ." = :userId LIMIT 1";
	   $dbh = \W\Manager\ConnectionManager::getDbh();
	   $sth = $dbh->prepare($sql);
	   $sth->bindValue(":userId", $userId);
	   if ($sth->execute()){
	       $foundUser = $sth->fetch();
	       if ($foundUser){
	           return true;
	       }
	   }
	   return false;
	}

}