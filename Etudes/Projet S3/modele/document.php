<?php
require_once(dirname(dirname(__FILE__))."/config/connexion.php");

class Document {
	private $idDocument;
	private $titreDocument;
	private $dateParution;
	private $lienImage;
	private $idAdmin;
	private $idType;
	private $idLangue;
	private $idGenre;
	private $description;
	public $a=0;

	// getter
	public function getIdDocument() {return $this->idDocument;}
	public function getTitreDocument() {return $this->titreDocument;}
	public function getDateParution() {return $this->dateParution;}
	public function getLienImage() {return $this->lienImage;}
	public function getIdAdmin() {return $this->idAdmin;}
	public function getIdType() {return $this->idType;}
	public function getIdLangue() {return $this->idLangue;}
	public function getIdGenre() {return $this->idGenre;}
	public function getDescription() {return $this->description;}

	// setter
	public function setIdDocument($i) {$this->idDocument = $i;}
	public function setTitreDocument($m) {$this->titreDocument = $m;}
	public function setDateParution($c) {$this->dateParution = $c;}
	public function setLienImage($g) {$this->lienImage = $g;}
	public function setIdAdmin($h) {$this->idAdmin = $h;}
	public function setIdType($j) {$this->idType = $j;}
	public function setIdGenre($k) {$this->idGenre = $k;}
	public function setDescription($r) {return $this->description =$r;}

	// constructeur polyvalent d'un objet Voiture
	public function __construct($i = NULL, $m = NULL, $c = NULL, $g = NULL, $h = NULL , $j = NULL , $k = NULL, $r =NULL) {
		if (!is_null($i)) {
			$this->idDocument = $i;
			$this->titreDocument = $m;
			$this->dateParution = $c;
			$this->lienImage = $g;
			$this->idAdmin = $h;
			$this->idType = $j;
			$this->idGenre = $k;
			$this->idDescription =$r;
		}
	}
	public static function getAllDocuments() {
		// écriture de la requête
		$requete = "SELECT * FROM DOCUMENT";
		// envoi de la requête et stockage de la réponse
		$resultat = Connexion::pdo()->query($requete);
		// traitement de la réponse
		$resultat->setFetchmode(PDO::FETCH_CLASS,'Document');
		$tableau = $resultat->fetchAll();
		return $tableau;
	}
	public static function getDocumentById($i) {
		// écriture de la requête
		$requetePreparee = "SELECT * FROM DOCUMENT WHERE idDocument = :id_tag;";
		// préparation de la requête
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		// le tableau des valeurs
		$valeurs = array("id_tag" => $i);
		try {
			// envoi de la requête
			$req_prep->execute($valeurs);
			// traitement de la réponse
	    $req_prep->setFetchmode(PDO::FETCH_CLASS,'Document');
			// récupération de la voiture
			$l = $req_prep->fetch();
			// retour
			return $l;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	public static function getCoupsDeCoeur() {
		// écriture de la requête
		$requete = "SELECT * FROM DOCUMENT WHERE coupDeCoeur = 1";
		// envoi de la requête et stockage de la réponse
		$resultat = Connexion::pdo()->query($requete);
		// traitement de la réponse
		$resultat->setFetchmode(PDO::FETCH_CLASS,'Document');
		$tableau = $resultat->fetchAll();
		return $tableau;
	}

	// une methode d'affichage.
	public function afficher() {
		echo "<div class='grp'> 
		<a href=  'index.php?page=documents&action=lireDocument&idDocument=$this->idDocument'> 
		<img class='imageDoc' src= $this->lienImage ></a> <div class = 'titre-container'>
		<p> $this->titreDocument </p>
	
		</div>
		</div>";
	}
	public static function recupNomLangue($i)
	{
	// écriture de la requête
		$requetePreparee = "SELECT nomLangue FROM DOCUMENT natural join LANGUE WHERE idDocument = :id_tag;";
		// préparation de la requête
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		// le tableau des valeurs
		$valeurs = array("id_tag" => $i);
		try {
			// envoi de la requête
			$req_prep->execute($valeurs);
			// traitement de la réponse

			$l = $req_prep->fetch();
			$r = $l[0];
			
			// retour
			return $r;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	public static function recupNomGenre($i)
	{
	// écriture de la requête
		$requetePreparee = "SELECT nomGenre FROM DOCUMENT natural join GENRE WHERE idDocument = :id_tag;";
		// préparation de la requête
		$req_prep = Connexion::pdo()->prepare($requetePreparee);
		// le tableau des valeurs
		$valeurs = array("id_tag" => $i);
		try {
			// envoi de la requête
			$req_prep->execute($valeurs);
			// traitement de la réponse
	    /*$req_prep->setFetchmode(PDO::FETCH_CLASS,'Document');*/

			$l = $req_prep->fetch();
			// retour
			$r = $l[0];
			
			return $r;
		} catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	


public function afficherDoc()
{
	
	
	
	$a=self::recupNomLangue($this->idDocument);
	$b=self::recupNomGenre($this->idDocument);
	
	

	
	echo "
	<div class='texte-imageLireDoc'> 
	
	<img class='imageLireDoc' src= $this->lienImage > 
	
	
	
	<div class='titre-sous-titreLireDoc'> 
	<h1 class = titreLireDoc> 
	$this->titreDocument
	</h1> 
	
	<div class='sous-titreLireDoc'> 
	<p class = DateParuLireDoc >$this->dateParution - $b - $a</p> 
	
	</div>
	<p class = descriptionLireDoc>$this->description </p>
	
	</div>
	</div>";
	


	
}

	public static function searchDocuments($texte){
			
			$requetePreparee = "SELECT * FROM DOCUMENT WHERE titreDocument LIKE '%$texte%';";
			
			Connexion::connect();
			
			$req_prep = Connexion::pdo()->prepare($requetePreparee);
			
			//$valeurs = array (
			//	"tag_t" => $texte
			//);
			
			$req_prep->execute();
			
			$req_prep->setFetchmode(PDO::FETCH_CLASS,'Document');
			
			$tableau = $req_prep->fetchAll();
			
			return $tableau;
		}

}
?>
