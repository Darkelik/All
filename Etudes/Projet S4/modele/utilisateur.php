<?php
	class Utilisateur{
		private $login;
		private $mdp;
		private $nom;
		private $prenom;
		private $dateNaissance;
		private $mail;
		private $scoreTotal;
		private $timeTotal;
		private $genre;
		
		public function getLogin(){
			return $this->login;
		}
		public function getMdp(){
			return $this->mdp;
		}
		public function getNom(){
			return $this->nom;
		}
		public function getPrenom(){
			return $this->prenom;
		}
		public function getDateNaissance(){
			return $this->dateNaissance;
		}
		public function getMail(){
			return $this->mail;
		}
		public function getScoreTotal(){
			return $this->scoreTotal;
		}
		public function getTimeTotal(){
			return $this->timeTotal;
		}
		public function getGenre(){
			return $this->genre;
		}
		
		public function __construct($login = NULL, $mdp = NULL, $nom = NULL, $prenom = NULL, $dateNaissance = NULL, $mail = NULL, $scoreTotal = NULL, $timeTotal = NULL, $genre = NULL){
			if (!is_null($login)){
				$this->login = $login;
				$this->mdp = $mdp;
				$this->nom = $nom;
				$this->prenom = $prenom;
				$this->dateNaissance = $dateNaissance;
				$this->mail = $mail;
				$this->scoreTotal = $scoreTotal;
				$this->timeTotal = $timeTotal;
				$this->genre = $genre;
			}
		}
	
		public static function getUtilisateurByLogin($login){
			
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requetePreparee="SELECT * FROM Utilisateur WHERE login = :tag_l;";
			
			$valeurs=array (
				"tag_l" => $login
			);
			
			$req_prep = Connexion::pdo()->prepare($requetePreparee);
			
			$req_prep->execute($valeurs);
			
			$req_prep->setFetchmode(PDO::FETCH_CLASS,'Utilisateur');
			
			$user = $req_prep->fetch();
			
			return $user;
		}
		
		public static function creerUtilisateur($login,$mdp,$nom,$prenom,$dateNaissance,$mail,$genre){
			
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requetePreparee="INSERT INTO Utilisateur VALUES (:tag_1, :tag_2, :tag_3, :tag_4, :tag_5, :tag_6, 0, 0,:tag_7);";
			
			$valeurs=array (
				"tag_1" => $login,
				"tag_2" => $mdp,
				"tag_3" => $nom,
				"tag_4" => $prenom,
				"tag_5" => $dateNaissance,
				"tag_6" => $mail,
				"tag_7" => $genre
			);
			
			$req_prep2 = Connexion::pdo()->prepare($requetePreparee);
			
			$req_prep2->execute($valeurs);
		}
		
		public static function getTousLogins(){
			require_once(dirname(dirname(__FILE__))."/config/connexion.php");
			Connexion::connect();
			
			$requete="SELECT login FROM Utilisateur;";
			$resultat = Connexion::pdo()->query($requete);
			$tableau_temp = $resultat->fetchAll();
			$tableau = [];
			for ($i=0;$i<count($tableau_temp);$i++){
				array_push($tableau,$tableau_temp[$i][0]);
			}
			return $tableau;
		}
		
	}
?>