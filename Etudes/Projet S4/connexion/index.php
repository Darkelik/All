<?php
	session_start();
	require_once("../config/connexion.php");
	require_once("../controleur/controleurProfil.php");
	if (isset($_GET["e"])){
		ControleurProfil::afficher2();
	} else if (isset($_GET["i"])){
		ControleurProfil::afficher3();
	} else {
		ControleurProfil::afficher();
	}
	
?>