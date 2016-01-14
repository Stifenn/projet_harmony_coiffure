<?php

namespace Controller;

use \W\Controller\Controller;

class CommentairesController extends Controller
{
	function Commentaires()
	{
		$commentairesManager = new \Manager\CommentairesManager();
		$Commentaires = $commentairesManager->findAll();
		$this->show('commentaires/commentaires', ['Commentaires' => $Commentaires]);
	}

	function ModifierCommentaires($id)
	{
		$commentairesManager = new \manager\CommentairesManager();
		$Commentaires = $commentairesManager->update(['moderation' => $_REQUEST['statut']],$id);
		$this->show('commentaires/modifier_commentaires', ['Commentaire' => $Commentaires]);
	}

}