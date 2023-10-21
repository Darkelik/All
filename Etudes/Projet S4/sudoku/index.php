<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurSudoku.php");
	Connexion::connect();
	ControleurSudoku::afficher();
	
?>