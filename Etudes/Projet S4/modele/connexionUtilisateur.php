<?php
	
	class ConnexionUtilisateur{
		private $login;
		private $mdp;
		
		public function getLogin(){
			return $this->login;
		}
		
		public function getMDP(){
			return $this->MDP;
		}
	
		public static function testerConnexion($login,$password){
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			$requete="SELECT login,MDP,'user' FROM Utilisateur;";
			$resultat=Connexion::pdo()->query($requete);
			$resultat->setFetchmode(PDO::FETCH_CLASS,'ConnexionUtilisateur');
			$tableau = $resultat->fetchAll();
			$tableau2=array();
			$tableau3=array();
			$i=0;
			foreach ($tableau as $cle => $valeur){
				$tableau2[$i]=$valeur->getLogin();
				$i++;
			}
			$i=0;
			foreach ($tableau as $cle => $valeur){
				$tableau3[$i]=$valeur->getMDP();
				$i++;
			}
			$bool=false;
			$i=0;
			while(!$bool && $i<count($tableau2)){
				if ($tableau2[$i]==$login && $tableau3[$i]==$password){
					$bool=true;
				} else {
					$i++;
				}
			}
			return $bool;
		}
	}
	
?>