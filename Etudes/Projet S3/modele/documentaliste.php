<?php
	class Documentaliste{
		private $idDocumentaliste;
		private $login;
		private $mdp;
		private $nomDocumentaliste;
		private $prenomDocumentaliste;
		private $adresse;
		
		public function getLogin(){
			return $this->login;
		}
		public function getMDP(){
			return $this->mdp;
		}
		public function getNomDocumentaliste(){
			return $this->nomDocumentaliste;
		}
		public function getPrenomDocumentaliste(){
			return $this->prenomDocumentaliste;
		}
		public function getAdresse(){
			return $this->adresse;
		}
		
		public static function getDocumentalisteByLogin($login){
			
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requetePreparee="SELECT * FROM DOCUMENTALISTE WHERE login = :tag_l;";
			
			$valeurs=array (
				"tag_l" => $login
			);
			
			$req_prep = Connexion::pdo()->prepare($requetePreparee);
			
			$req_prep->execute($valeurs);
			
			$req_prep->setFetchmode(PDO::FETCH_CLASS,'Documentaliste');
			
			$user = $req_prep->fetch();
			
			return $user;
		}
	}
?>