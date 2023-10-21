<?php
	if ($_POST["action"]=="S'inscrire"){
		header("Location: ../index.php?page=inscription");
	} else {
		require_once(dirname(dirname(__FILE__)).'/controleur/controleurConnexionUtilisateur.php');
		$res=ControleurConnexionUtilisateur::testCo();
		if ($res!=-1){
			require_once(dirname(dirname(__FILE__)).'/controleur/controleurUtilisateur.php');
			ControleurUtilisateur::connecterUtilisateur($_POST["login"],$res);
			header("Location: ../");
		}
	}
?>