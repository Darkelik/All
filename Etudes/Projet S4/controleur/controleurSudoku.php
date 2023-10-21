<?php

class ControleurSudoku {
		
		public static function afficher(){
			$titre="Sudoku";
			include("../vue/debut.php");
			
			include("../vue/menu.php");
	
			include("../vue/SUDOKU/SUDOKU3.html");
	
			include("../vue/fin.html");
		}
		
	}
?>