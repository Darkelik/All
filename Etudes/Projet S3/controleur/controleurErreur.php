<?php

class ControleurErreur {
		
		public static function afficher(){
			$titre="erreur 404";

			include("vue/debut.php");
			
			include("vue/menu.php");
	
			include("vue/erreur/erreur.php");
	
			include("vue/fin.html");
		}
		
	}
?>