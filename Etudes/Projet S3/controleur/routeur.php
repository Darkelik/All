<?php

require_once("config/connexion.php");
Connexion::connect();
require_once("modele/session.php");
if (isset($_GET["page"])) {
    if ($_GET["page"] == "connexion") {
        require_once("controleur/controleurConnexionUtilisateur.php");
        ControleurConnexionUtilisateur::afficher();
    } else if ($_GET["page"] == "inscription") {
        require_once("controleur/controleurInscription.php");
        ControleurInscription::afficher();
    } else if ($_GET["page"] == "documents") {
        $controleur = "controleurDocument";
        if (isset($_POST["action"]) && $_GET["action"] == "rechercher") {
            require_once("controleur/$controleur.php");
            $controleur::rechercherDocuments();
        } else {
            $action = "lireDocuments";
            $actionParDefaut = array(
                "controleurDocument" => "lireDocuments",
            );
            require_once("controleur/$controleur.php");
            if (isset($_GET["action"]) && in_array($_GET["action"], get_class_methods($controleur))) {
                $action = $_GET["action"];
            } else {
                $action = $actionParDefaut[$controleur];
            }
            $controleur::$action();
        }
    }else if ($_GET["page"] == "coupCoeur") {
        require_once("controleur/controleurDocument.php");
        ControleurDocument::lireCoupDeCoeur();
    } else if ($_GET["page"] == "administrateur") {
		if (!isset($_SESSION["titre"]) || $_SESSION["titre"]!="admin"){
			require_once("controleur/controleurErreur.php");
			ControleurErreur::afficher();
		} else {
			require_once("controleur/controleurAdministrateur.php");
			ControleurAdministrateur::pageFormulaire();
		}
    } else if($_GET["page"]=="propos"){
        require_once("controleur/controleurApropos.php");
        ControleurApropos::afficher();
    }else if ($_GET["page"] == "documentaliste") {
		if (!isset($_SESSION["titre"]) || $_SESSION["titre"]!="doc"){
			require_once("controleur/controleurErreur.php");
			ControleurErreur::afficher();
		} else {
			require_once("controleur/controleurDocumentaliste.php");
			ControleurDocumentaliste::pageFormulaire();
		}
    }else if($_GET["page"]=="compte"){
        require_once("controleur/controleurCompte.php");
		$login=$_SESSION["login"];
        ControleurCompte::afficherCompte($login);
    }else if ($_GET["page"] == "contacts") {
        require_once("controleur/controleurContact.php");
        ControleurContact::afficherContacts();
	}else if ($_GET["page"] == "reservation") {
        require_once("controleur/controleurEmprunt.php");
        ControleurEmprunt::afficher();
    } else {
		require_once("controleur/controleurErreur.php");
		ControleurErreur::afficher();
	}
} else if (isset($_POST['form'])) {
    if ($_POST["form"] == "addDoc") {
        require_once("controleur/controleurAdministrateur.php");
        ControleurAdministrateur::ajtDoc();
    }else if ($_POST["form"] == "suppDoc"){
        require_once("controleur/controleurAdministrateur.php");
        ControleurAdministrateur::suppDoc();
    }else if ($_POST["form"] == "suppUtil"){
        require_once("controleur/controleurAdministrateur.php");
        ControleurAdministrateur::suppUtilisateur();
    }else if ($_POST["form"] == "ajtArticle"){
        require_once("controleur/controleurDocumentaliste.php");
        ControleurDocumentaliste::ajtArticle();
    }else if ($_POST["form"] == "suppArticle"){
        require_once("controleur/controleurDocumentaliste.php");
        ControleurDocumentaliste::suppArticle();
    }else if ($_POST["form"] == "addFav"){
        require_once("controleur/controleurDocumentaliste.php");
        ControleurDocumentaliste::ajtFav();
    } else if ($_POST["form"] == "addMessage" ) {
        require_once("controleur/controleurContact.php");
        ControleurContact::ajouterMessage();
    }
} else {
    require_once("controleur/controleurAccueil.php");
    ControleurAccueil::afficher();
}
?>



	