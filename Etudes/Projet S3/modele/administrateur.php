<?php
	class Administrateur{
		private $idAdmin;
		private $login;
		private $mdp;
		private $nomAdmin;
		private $prenomAdmin;
		private $adresseAdmin;
		
		public function getLogin(){
			return $this->login;
		}
		public function getMDP(){
			return $this->mdp;
		}
		public function getNomAdmin(){
			return $this->nomAdmin;
		}
		public function getPrenomAdmin(){
			return $this->prenomAdmin;
		}
		public function getAdresseAdmin(){
			return $this->adresseAdmin;
		}
		
		public static function getAdminByLogin($login){
			
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requetePreparee="SELECT * FROM ADMINISTRATEUR WHERE login = :tag_l;";
			
			$valeurs=array (
				"tag_l" => $login
			);
			
			$req_prep = Connexion::pdo()->prepare($requetePreparee);
			
			$req_prep->execute($valeurs);
			
			$req_prep->setFetchmode(PDO::FETCH_CLASS,'Administrateur');
			
			$user = $req_prep->fetch();
			
			return $user;
		}
	}
?>