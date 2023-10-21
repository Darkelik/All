<?php
	require_once(dirname(dirname(__FILE__))."/modele/utilisateur.php");
	
	class ControleurUtilisateur {
		
		public static function getUserByLogin(){
			$login = $_POST["login"];
			$user = Utilisateur::getUtilisateurByLogin($login);
			//à faire
		}
		
		public static function connecterUtilisateur($l,$a){
			session_start();
			$_SESSION["login"]=$l;
			$_SESSION["titre"]=$a;
		}
		
		public static function deconnecterUtilisateur(){
			session_start();
			session_unset();
			session_destroy();
			setcookie(session_name(),'',time()-1);
		}
	}
?>