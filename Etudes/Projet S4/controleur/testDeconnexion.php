<?php
	require_once(dirname(dirname(__FILE__)).'/controleur/controleurProfil.php');
	ControleurProfil::deconnecterUtilisateur();
	header("Location: ../");
?>