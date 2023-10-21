<?php

class ControleurAccueil {
		
		public static function afficher(){
			$titre="Mini-Jeux-Party";
			include("../vue/debut.php");
			
			include("../vue/menu.php");
	
			include("../vue/accueil/accueil.html");
	
			include("../vue/fin.html");
		}
		
	}
?>