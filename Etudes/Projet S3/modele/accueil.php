<?php
	class Accueil{
		private $idArticle;
		private $titre;
		private $texte;
		private $lienImage;
		private $idDocumentaliste;
		
		
		public function getIdArticle() {return $this->idArticle;}
		public function getTitre() {return $this->titre;}
		public function getTexte() {return $this->texte;}
		public function getLienImage() {return $this->lienImage;}
		public function getIdDocumentaliste() {return $this->idDocumentaliste;}
	

		public function setIdArticle($i) {$this->idArticle = $i;}
		public function setTitre($t) {$this->titre = $t;}
		public function setTexte($m) {$this->texte = $m;}
		public function setLienImage($c) {$this->lienImage = $c;}
		public function setIdDocumentaliste($g) {$this->idDocumentaliste = $g;}


	// constructeur polyvalent d'un objet Voiture
	public function __construct($i = NULL,$t =NULL ,$m = NULL, $c = NULL, $g = NULL) {
		if (!is_null($i)) {
			$this->idArticle = $i;
			$this->titre = $t;
			$this->texte = $m;
			$this->lienImage = $c;
			$this->idDocumentaliste = $g;
			
		}
	}
	public static function getAllArticles() {
			$requete = "SELECT * FROM ARTICLE";
			$resultat = Connexion::pdo()->query($requete);
			$resultat->setFetchmode(PDO::FETCH_CLASS,'Accueil');
			$tableau = $resultat->fetchAll();
			return $tableau;
	}
		
		
		
	
	public function afficherArticle()
	{
		echo "<section class = acrticleAccueil>

		<img class='imageLireAccueil' src= $this->lienImage > 
		<div class='texteTitre'>
		<h1 class ='titreAccueil'>$this->titre</h1>

		<p class='texteAccueil' >$this->texte</p>
		</div>
		</section>";


		
	}
	}
?>