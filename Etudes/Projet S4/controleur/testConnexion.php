<?php
	require_once(dirname(dirname(__FILE__)).'/controleur/controleurProfil.php');
	$res=ControleurProfil::testCo();
	if ($res){
		ControleurProfil::connecterUtilisateur($_POST["login"]);
		header("Location: ../");
	} else {
		header("Location: ../connexion?e=true");
	}
?>
