<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurJeuDeTir.php");
	Connexion::connect();
	ControleurJeuDeTir::afficher();
	
?>