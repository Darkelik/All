<?php
	require_once(dirname(dirname(__FILE__)).'/controleur/controleurEmprunt.php');
	$val = ControleurEmprunt::reserverDoc();
	
	if ($val){
		header("Location: ../index.php?page=reservation");
	}
?>