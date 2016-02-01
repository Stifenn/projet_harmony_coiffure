<?php

namespace Manager;

use \W\Manager\Manager;

class CommentairesManager extends  Manager
{
	public function insertCommentaireHome($name,$email,$commentaire)
	{
		$sql = "INSERT INTO commentaires(pseudo,email,commentaire) VALUES (:name,:email,:commentaire)";
		$sth = $this->dbh->prepare($sql);
		$sth->bindValue(':name',$name);
		$sth->bindValue(':email',$email);
		$sth->bindValue(':commentaire',$commentaire);
		$sth->execute();
	}

	public function showCommentairesHome()
	{
		$sql = "SELECT pseudo,commentaire,date FROM commentaires WHERE moderation = 1 ORDER BY date DESC LIMIT 0,4";
		$sth = $this->dbh->query($sql);
		$sth->execute();
		return $sth->fetchAll();
	}
}