<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurTicTacToe.php");
	Connexion::connect();
	ControleurTicTacToe::afficher();
	
?>