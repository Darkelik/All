<?php

class ControleurMemory {
		
		public static function afficher(){
			$titre="Memory";
			include("../vue/debut.php");
			
			include("../vue/menu.php");
	
			include("../vue/MEMORY/memory.html");
	
			include("../vue/fin.html");
		}
		
	}
?>