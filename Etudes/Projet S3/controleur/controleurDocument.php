<?php
// insertion du modèle Utilisateur
require_once(dirname(dirname(__FILE__))."/modele/document.php");
require_once(dirname(dirname(__FILE__))."/modele/exemplaire.php");

// définition du contrôleur Utilisateur
class ControleurDocument{

  // la méthode de récupération et d'affichage de tous les utilisateurs
  public static function lireDocuments() {
    $titre = "tous les documents";
    $tab_u = Document::getAllDocuments();
    include("vue/debut.php");
    include("vue/menu.php");
	
    include("vue/document/lesDocuments.php");
	include("vue/fin.html");

  }
  public static function lireDocument() {
  
    $titre = "un document";
    $i = $_GET["idDocument"];
    $l = Document::getDocumentById($i);
    $tab_ex = Exemplaire::getAllEXEMPLAIRE($i);
    include("vue/debut.php");
    include("vue/menu.php");
    if (!$l)
  {
      include("vue/document/erreur.php");
      
      include("vue/fin.html");
  
  }
    else
  {
      include("vue/document/unDocument.php");
      
     include("vue/fin.html");
  
  }
  }

  
	public static function rechercherDocuments(){
		$titre = "resultats";
		$texte = $_POST["texte"];
		if (!ctype_alnum($texte)){
			header("Location: ./index.php?page=documents");
		}
		$tab_u = Document::searchDocuments($texte);
		include("vue/debut.php");
		include("vue/menu.php");
		include("vue/document/resultatDocuments.php");
		include("vue/fin.html");
	}

    public static function lireCoupDeCoeur() {
        $titre = "les coups de coeurs";
        $tab_u = Document::getCoupsDeCoeur();
        include("vue/debut.php");
        include("vue/menu.php");
        include("vue/document/lesCoupsDeCoeurs.php");
        include("vue/document/lesDocuments.php");
        include("vue/fin.html");

    }
}
?>
