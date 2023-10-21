<?php
require_once("modele/accueil.php");
class ControleurAccueil {
		
		public static function afficher(){
			$titre="accueil";
			$tab_accueil = Accueil::getAllArticles();
			include("vue/debut.php");
			
			include("vue/menu.php");
	
			include("vue/accueil/pageAccueil.php");
	
			include("vue/fin.html");
		}
		
	}
?>