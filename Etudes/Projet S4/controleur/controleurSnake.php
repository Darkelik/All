<?php

class ControleurSnake {
		
		public static function afficher(){
			$titre="Snake";
			include("../vue/debut.php");
			
			include("../vue/menu.php");
	
			include("../vue/SNAKE/snake.html");
	
			include("../vue/fin.html");
		}
		
	}
?>