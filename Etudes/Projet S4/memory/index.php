<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurMemory.php");
	Connexion::connect();
	ControleurMemory::afficher();
	
?>