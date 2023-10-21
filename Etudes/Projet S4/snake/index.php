<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurSnake.php");
	Connexion::connect();
	ControleurSnake::afficher();
	
?>