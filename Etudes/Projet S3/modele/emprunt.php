<?php
class Emprunt {
	private $idUtilisateur;
	private $idDocumentaliste;
	private $idExemplaire;
	private $dateEmprunt;
	private $dateFin;

	// getter
	public function getUtilt() {return $this->idUtilisateur;}
	public function getTitreDocument() {return $this->idDocumentaliste;}
	public function getDateParution() {return $this->idExemplaire;}
	public function getLienImage() {return $this->dateEmprunt;}
	public function getIdAdmin() {return $this->dateFin;}
	// setter
	public function setIdDocument($i) {$this->idUtilisateur = $i;}
	public function setTitreDocument($m) {$this->idDocumentaliste = $m;}
	public function setDateParution($c) {$this->idExemplaire = $c;}
	public function setLienImage($g) {$this->dateEmprunt = $g;}
	public function setIdAdmin($h) {$this->dateFin = $h;}
	
	// constructeur polyvalent d'un objet Voiture
	public function __construct($i = NULL, $m = NULL, $c = NULL, $g = NULL, $h = NULL) {
		if (!is_null($i)) {
			$this->idDocument = $i;
			$this->titreDocument = $m;
			$this->dateParution = $c;
			$this->lienImage = $g;
			$this->idAdmin = $h;		
		}
	}
	public static function emprunterDoc()
	{
		$dateEmp = date("Y-m-d");
		$dateF = date("Y-m-d", strtotime("+30 days"));

		$requete = "INSERT INTO 'EMPRUNTE(idUtilisateur,idDocumentaliste,idExemplaire,dateEmprunt,dateFin) values ($this->idUtilisateur,$this->idDocumentaliste,$this->idExemplaire,$dateEmp,$dateF)";
		// préparation de la requête
		$resultat = Connexion::pdo()->prepare($requete);
		$resultat->setFetchmode(PDO::FETCH_CLASS,'Emprunt');
		$resultat->execute(array($this->idUtilisateur,$this->idDocumentaliste,$this->idExemplaire,$dateEmp,$dateF));
		

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






	

}
?>
