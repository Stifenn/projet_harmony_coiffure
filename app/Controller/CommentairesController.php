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
		
		if(isset($_REQUEST['statut']) == 'on')
		{
			$Commentaires = $commentairesManager->update(['moderation' => 1],$id);
		}elseif(!isset($_REQUEST['statut']))
		{
			$Commentaires = $commentairesManager->update(['moderation' => 0],$id);
		}
		if(isset($_REQUEST['supprimer']))
		{
			$Commentaires = $commentairesManager->delete($id);
		}
		
		$this->redirectToRoute('administration_commentaires');
	}

}