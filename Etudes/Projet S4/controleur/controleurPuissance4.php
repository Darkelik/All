<?php

class ControleurPuissance4 {
		
		public static function afficher(){
			$titre="Puissance 4";
			include("../vue/debut.php");
			
			include("../vue/menu.php");
	
			include("../vue/puissance4/puissance4.html");
	
			include("../vue/fin.html");
		}
		
	}
?>