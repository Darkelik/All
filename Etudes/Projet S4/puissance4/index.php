<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurPuissance4.php");
	Connexion::connect();
	ControleurPuissance4::afficher();
	
?>