<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurAccueil.php");
	Connexion::connect();
	ControleurAccueil::afficher();
	
?>