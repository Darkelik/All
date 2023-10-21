<?php
	require_once(dirname(dirname(__FILE__))."/modele/utilisateur.php");
	
	class ControleurInscription {
		
		public static function afficher(){
			$titre="inscription";
			include("vue/debut.php");
			
			if (array_key_exists("mode",$_GET)){
				include("vue/inscription/reussite.html");
			} else {
	
				include("vue/inscription/pageInscription.html");
			
				if (array_key_exists("err",$_GET)){
					if ($_GET["err"]=="vide"){
						include("vue/inscription/erreurVide.php");
					} else if ($_GET["err"]=="mdp"){
						include("vue/inscription/erreurMDP.php");
					} else if ($_GET["err"]=="log"){
						include("vue/inscription/erreurLogin.php");
					}
				
				}
	
				include("vue/fin.html");
			}
		}
		
		public static function createUser(){
			if ($_POST["name"]=="" || $_POST["name2"]=="" || $_POST["login"]=="" || $_POST["birth"]=="" || $_POST["adr"]=="" || $_POST["mail"]=="" || $_POST["phone"]=="" || $_POST["pass"]=="" || $_POST["pass2"]==""){
				header("Location: ../index.php?page=inscription&err=vide");
				return false;
			} else {
				$name=$_POST["name"];
				$name2=$_POST["name2"];
				$login=$_POST["login"];
				$birth=$_POST["birth"];
				$adr=$_POST["adr"];
				$mail=$_POST["mail"];
				$phone=$_POST["phone"];
				$pass=$_POST["pass"];
				$pass2=$_POST["pass2"];
				if ($pass!=$pass2){
					header("Location: ../index.php?page=inscription&err=mdp");
					return false;
				}
				$test=Utilisateur::creerUtilisateur($name,$name2,$login,$birth,$adr,$mail,$phone,$pass);
				
				if ($test=="err"){
					header("Location: ../index.php?page=inscription&err=log");
					return false;
				}
				return true;
			}			
		}
	}
?>