<?php

include("../modele/utilisateur.php");

class ControleurCompte {
		
		public static function afficher(){
			$titre="Mon compte";
			include("../vue/debut.php");
			
			include("../vue/menu.php");
	
			$compte = Utilisateur::getUtilisateurByLogin($_SESSION["login"]);
			include("../vue/compte/compte.php");
	
			include("../vue/fin.html");
		}
		
	}
?>