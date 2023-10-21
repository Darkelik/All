<?php
	require_once(dirname(dirname(__FILE__)).'/controleur/controleurProfil.php');
	$res=ControleurProfil::createUser();
	header("Location: ../connexion?i=true");
?>