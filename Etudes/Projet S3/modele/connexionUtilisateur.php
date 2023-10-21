<?php
	
	class ConnexionUtilisateur{
		private $login;
		private $MDP;
		private $titre;
		
		public function getLogin(){
			return $this->login;
		}
		
		public function getMDP(){
			return $this->MDP;
		}
		
		public function getTitre(){
			return $this->titre;
		}
	
		public static function testerConnexion($login,$password){
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			$requete="SELECT login,MDP,'user' AS titre FROM UTILISATEUR UNION SELECT login,mdp,'admin' AS titre FROM ADMINISTRATEUR UNION SELECT login,mdp,'doc' AS titre FROM DOCUMENTALISTE;";
			$resultat=Connexion::pdo()->query($requete);
			$resultat->setFetchmode(PDO::FETCH_CLASS,'ConnexionUtilisateur');
			$tableau = $resultat->fetchAll();
			$tableau2=array();
			$tableau3=array();
			$tableau4=array();
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
			$i=0;
			foreach ($tableau as $cle => $valeur){
				$tableau4[$i]=$valeur->getTitre();
				$i++;
			}
			$bool=false;
			$val=-1;
			$i=0;
			while(!$bool && $i<count($tableau2)){
				if ($tableau2[$i]==$login && $tableau3[$i]==$password){
					$bool=true;
					$val=$tableau4[$i];
				} else {
					$i++;
				}
			}
			return $val;
		}
	}
	
?>