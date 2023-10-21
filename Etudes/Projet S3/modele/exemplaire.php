<?php

class Exemplaire {
	private $idExemplaire;
	private $problemeExemplaire;
	private $idDocument;
	private $estEmprunte;
	private $numeroExemplaire;
	

	// getter
	public function getIdExemplaire() {return $this->idExemplaire;}
	public function getProblemeExemplaire() {return $this->problemeExemplaire;}
	public function getIdDocument() {return $this->idDocument;}
	public function getEstEmprunte() {return $this->estEmprunte;}
	public function getNumeroExemplaire() {return $this->numeroExemplaire;}

	// setter
	public function setIdExemplaire($i) {$this->idExemplaire = $i;}
	public function setProblemeExemplaire($m) {$this->problemeExemplaire = $m;}
	public function setIdDocument($c) {$this->idDocument = $c;}
	public function setEstEmprunte($g) {$this->estEmprunte = $g;}
	public function setNumeroExemplaire() {return $this->numeroExemplaire= $q;}


	// constructeur polyvalent d'un objet Voiture
	public function __construct($i = NULL, $m = NULL, $c = NULL, $g = NULL,$q =NULL) {
		if (!is_null($i)) {
			$this->idExemplaire = $i;
			$this->problemeExemplaire = $m;
			$this->idDocument = $c;
			$this->estEmprunte = $g;
			$this->numeroExemplaire= $q;
			
		}
	}
	public static function getAllEXEMPLAIRE($i) {
		// écriture de la requête
		$requetePreparee = "SELECT * FROM EXEMPLAIRE WHERE idDocument = :id_tag";
		// envoi de la requête et stockage de la réponse
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		$valeurs = array("id_tag" => $i);
	
		try {
			// envoi de la requête
			$req_prep->execute($valeurs);
		// traitement de la réponse
			$req_prep->setFetchmode(PDO::FETCH_CLASS,'Exemplaire');
			$tableau = $req_prep->fetchAll();
			return $tableau;
		}catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	
	public function afficheExemplaire()
	{
		$bool=(isset($_SESSION["titre"]) && $_SESSION["titre"]=="user");
		echo"<tr class='laLigne'><td class='colonne1'>$this->numeroExemplaire</td><td class='colonne2'>$this->problemeExemplaire</td>";
		if($this->estEmprunte==0) {
			echo "<td class='colonne3'>libre</td>";
			if ($bool){
				echo "<td class='colonne4'><button class='boutonEmpruntable' onclick = \"window.location.href='./controleur/testReservation.php?exemplaire=$this->idExemplaire'\">réserver</button></td>";
			}
			echo "</tr>";
		}
		else if($this->estEmprunte==1) {
			echo "<td class='colonne3'>reservé</td>";
			if ($bool){
				echo "<td class='colonne4'> <input type='button' value='indisponible' style='color:red'> </td>";
			}
			echo "</tr>";
		}
		else {
			echo "<td class='colonne3'>emprunté</td>";
			if ($bool){
				echo "<td class='colonne4'> <input type='button' value='indisponible' style='color:red'> </td>";
			}
			echo "</tr>";
		}

	}
	
	public static function reserverDocument($user,$ex){
		require_once(dirname(dirname(__FILE__))."/config/connexion.php");
		Connexion::connect();
		
		$requete = "INSERT IGNORE INTO DATE_EMPRUNT VALUES (CURRENT_DATE());";
		
		Connexion::pdo()->query($requete);
		
		$requetePreparee = "SELECT idUtilisateur FROM UTILISATEUR WHERE login = :user";
		
		$req_prep=Connexion::pdo()->prepare($requetePreparee);
		
		$valeurs = array (
			"user" => $user
		);
		
		$req_prep->execute($valeurs);
		
		$id = $req_prep->fetch();
		
		$requetePreparee2 = "INSERT INTO EMPRUNTE(idUtilisateur,idExemplaire,dateEmprunt,statut) VALUES(:user,:ex,CURRENT_DATE(),0);";
		
		$req_prep2=Connexion::pdo()->prepare($requetePreparee2);
		
		$valeurs2 = array (
			"user" => $id[0],
			"ex" => $ex
		);
		
		try {
			
			$req_prep2->execute($valeurs2);
		
			return true;
		}catch(PDOException $e) {
			return $e->getMessage();
		}
	}
}
?>
