<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurCompte.php");
	Connexion::connect();
	ControleurCompte::afficher();
	
?>