<?php
	require_once(dirname(dirname(__FILE__)).'/controleur/controleurUtilisateur.php');
	ControleurUtilisateur::deconnecterUtilisateur();
	header("Location: ../");
?>