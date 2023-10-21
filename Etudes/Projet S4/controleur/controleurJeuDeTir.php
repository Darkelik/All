<?php

class ControleurJeuDeTir {
		
	public static function afficher(){
		$titre="Jeu de tir";
		include("../vue/debut.php");
	
		include("../vue/menu.php");

		include("../vue/JeuDeTir/JeuDeTir.html");
	
		include("../vue/fin.html");
	}
}
?>