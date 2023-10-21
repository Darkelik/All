<?php
	require_once(dirname(dirname(__FILE__))."/modele/connexionUtilisateur.php");
	
	class ControleurConnexionUtilisateur {
		
		public static function afficher(){
			$titre="connexion";
			include("vue/debut.php");
	
			include("vue/connexion/pageConnexion.html");
	
			if (array_key_exists("err",$_GET)){
				if ($_GET["err"]=="vide"){
					include("vue/connexion/erreurVide.php");
				} else if ($_GET["err"]=="mauvais"){
					include("vue/connexion/erreurMauvais.php");
				}
			}
	
			include("vue/fin.html");
		}
		
		public static function testCo(){
			if ($_POST["login"]=="" || $_POST["password"]==""){
				header("Location: ../index.php?page=connexion&err=vide");
				return -1;
			} else {
				$login=$_POST["login"];
				$password=$_POST["password"];
				$test=ConnexionUtilisateur::testerConnexion($login,$password);
				if ($test==-1){
					header("Location: ../index.php?page=connexion&err=mauvais");
					return -1;
				} else {
					return $test;
				}
			}
		}
	}
?>