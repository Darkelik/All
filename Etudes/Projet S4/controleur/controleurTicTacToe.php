<?php

class ControleurTicTacToe {
		
	public static function afficher(){
		$titre="Tic-Tac-Toe";
		include("../vue/debut.php");
	
		include("../vue/menu.php");

		include("../vue/TIC-TAC-TOE/tictactoe.html");
	
		include("../vue/fin.html");
	}
}
?>