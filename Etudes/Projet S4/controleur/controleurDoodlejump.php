<?php

class ControleurDoodlejump {
		
		public static function afficher(){
			$titre="Doodle Jump";
			include("../vue/debut.php");
			
			include("../vue/menu.php");
	
			include("../vue/DOODLEJUMP/doodlejump.html");
	
			include("../vue/fin.html");
		}
		
	}
?>