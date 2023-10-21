<?php

include(dirname(dirname(__FILE__))."/modele/utilisateur.php");
include(dirname(dirname(__FILE__))."/modele/administrateur.php");
include(dirname(dirname(__FILE__))."/modele/documentaliste.php");

class ControleurCompte {
		
		public static function afficherCompte($login){
			$titre="compte";
			
			include("vue/debut.php");
			
			include("vue/menu.php");
			
			if ($_SESSION["titre"]=="user") {
				$compte = Utilisateur::getUtilisateurByLogin($login);
				include("vue/compte/compte.php");
			} else if ($_SESSION["titre"]=="doc") {
				$compte = Documentaliste::getDocumentalisteByLogin($login);
				include("vue/compte/compteDoc.php");
			} else if ($_SESSION["titre"]=="admin") {
				$compte = Administrateur::getAdminByLogin($login);
				include("vue/compte/compteAdmin.php");
			}
	
			include("vue/fin.html");
		}
		
	}
?>