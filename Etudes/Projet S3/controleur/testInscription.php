<?php
	if ($_POST["action"]=="Se connecter"){
		header("Location: ../index.php?page=connexion");
	} else {
		require_once(dirname(dirname(__FILE__)).'/controleur/controleurInscription.php');
		$res=ControleurInscription::createUser();
		if ($res){
			header("Location: ../index.php?page=inscription&mode=inscrit");
		}
	}
?>