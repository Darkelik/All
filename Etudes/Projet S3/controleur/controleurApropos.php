<?php
class ControleurApropos {
		
		public static function afficher(){
			$titre="à propos";
			
			include("vue/debut.php");
			
			include("vue/menu.php");
	
			include("vue/aPropos/pageAPropos.html");
	
			include("vue/fin.html");
		}
}
?>