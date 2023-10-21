<?php
	require_once("../modele/utilisateur.php");
	require_once("../modele/connexionUtilisateur.php");
	
	class ControleurProfil {
		
		public static function afficher(){
			$titre="connexion / inscription";
			include("../vue/debut.php");
			include("../vue/menu.php");
			include("../vue/profil/profil.html");
			include("../vue/fin.html");
		}
		
		public static function afficher2(){
			$titre="connexion / inscription";
			include("../vue/debut.php");
			include("../vue/menu.php");
			include("../vue/profil/profil2.html");
			include("../vue/fin.html");
		}
		
		public static function afficher3(){
			$titre="connexion / inscription";
			include("../vue/debut.php");
			include("../vue/menu.php");
			include("../vue/profil/profil3.html");
			include("../vue/fin.html");
		}
		
		public static function createUser(){
			$login=$_POST["login"];
			$mdp=$_POST["pwd1"];
			$nom=$_POST["nom"];
			$prenom=$_POST["prenom"];
			$dateNaissance=$_POST["birth"];
			$mail=$_POST["email"];
			$genre=$_POST["genre"];
			Utilisateur::creerUtilisateur($login,$mdp,$nom,$prenom,$dateNaissance,$mail,$genre);
			return true;			
		}
		
		public static function getAllLogins(){
			$tableau = Utilisateur::getTousLogins();
			return $tableau;
		}
		
		public static function testCo(){
			$login=$_POST["login"];
			$password=$_POST["password"];
			$test=ConnexionUtilisateur::testerConnexion($login, $password);
			return $test;
		}
		
		public static function connecterUtilisateur($login){
			session_start();
			$_SESSION["login"]=$login;
		}
		
		public static function deconnecterUtilisateur(){
			session_start();
			session_unset();
			session_destroy();
			setcookie(session_name(),'',time()-1);
		}
	}
?>
