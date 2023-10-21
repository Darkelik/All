<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurDoodlejump.php");
	Connexion::connect();
	ControleurDoodlejump::afficher();
	
?>