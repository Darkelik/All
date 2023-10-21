<?php
	class Utilisateur{
		private $idUtilisateur;
		private $nomUtilisateur;
		private $prenomUtilisateur;
		private $dateNaissance;
		private $adresseUtilisateur;
		private $telephoneUtilisateur;
		private $mailUtilisateur;
		private $nbEmprunts;
		private $nbPenalites;
		private $idCategorie;
		private $MDP;
		private $login;
		
		public function getNomUtilisateur(){
			return $this->nomUtilisateur;
		}
		public function getPrenomUtilisateur(){
			return $this->prenomUtilisateur;
		}
		public function getAdresseUtilisateur(){
			return $this->adresseUtilisateur;
		}
		public function getTelephoneUtilisateur(){
			return $this->telephoneUtilisateur;
		}
		public function getMailUtilisateur(){
			return $this->mailUtilisateur;
		}
		public function getDateNaissance(){
			return $this->dateNaissance;
		}
		public function getNbEmprunts(){
			return $this->nbEmprunts;
		}
		public function getNbPenalites(){
			return $this->nbPenalites;
		}
		public function getMDP(){
			return $this->MDP;
		}
		public function getLogin(){
			return $this->login;
		}
		public function getCategorie(){
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requete = "SELECT nomCategorie FROM CATEGORIE WHERE idCategorie=$this->idCategorie;";
			
			$req_prep = Connexion::pdo()->query($requete);
			
			$resultat = $req_prep->fetch();
			
			return $resultat;
		}
		
		public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $date = NULL, $adr = NULL, $tel = NULL, $mail = NULL, $emp = NULL, $pen = NULL, $cat = NULL, $mdp = NULL, $log = NULL){
			if (!is_null($id)){
				$this->idUtilisateur = $id;
				$this->nomUtilisateur = $nom;
				$this->prenomUtilisateur = $prenom;
				$this->dateNaissance = $date;
				$this->adresseUtilisateur = $adr;
				$this->telephoneUtilisateur = $tel;
				$this->mailUtilisateur = $mail;
				$this->nbEmprunts = $emp;
				$this->nbPenalites = $pen;
				$this->idCategorie = $cat;
				$this->MDP = $mdp;
				$this->login = $log;
			}
		}
	
		public static function getUtilisateurByLogin($login){
			
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requetePreparee="SELECT * FROM UTILISATEUR WHERE login = :tag_l;";
			
			$valeurs=array (
				"tag_l" => $login
			);
			
			$req_prep = Connexion::pdo()->prepare($requetePreparee);
			
			$req_prep->execute($valeurs);
			
			$req_prep->setFetchmode(PDO::FETCH_CLASS,'Utilisateur');
			
			$user = $req_prep->fetch();
			
			return $user;
		}
		
		public static function creerUtilisateur($name,$name2,$login,$birth,$adr,$mail,$phone,$pass){
			
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requete = "SELECT login FROM UTILISATEUR UNION SELECT login FROM ADMINISTRATEUR UNION SELECT login FROM DOCUMENTALISTE;";
			
			$req_prep = Connexion::pdo()->query($requete);
			
			$resultat = $req_prep->fetchAll();
			
			$bool=true;
			
			foreach($resultat as $cle => $valeur){
				$bool=$bool && $valeur["login"]!=$login;
			}
			
			if (!$bool){
				return "err";
			}
			
			$requete = "SELECT COUNT(*) FROM UTILISATEUR;";
			$resultat = Connexion::pdo()->query($requete);
			$resultat = $resultat->fetchColumn();
			$id = $resultat+1;
			
			$requetePreparee2="INSERT INTO UTILISATEUR VALUES ($id, :tag_1, :tag_2, :tag_3, :tag_4, :tag_5, :tag_6, 0, 0, 3, :tag_7, :tag_8);";
			
			$valeurs=array (
				"tag_1" => $name,
				"tag_2" => $name2,
				"tag_3" => $birth,
				"tag_4" => $adr,
				"tag_5" => $phone,
				"tag_6" => $mail,
				"tag_7" => $pass,
				"tag_8" => $login
			);
			
			$req_prep2 = Connexion::pdo()->prepare($requetePreparee2);
			
			$req_prep2->execute($valeurs);
			
			return "ok";
		}
		
	}
?>