<?php
require_once(dirname(dirname(__FILE__))."/modele/contact.php");
class ControleurDocumentaliste
{
    public static function ajtArticle()
    {
        //si le formulaire est vide
        if (empty($_POST)) {
            throw new HttpException();
        }
        require_once "config/connexion.php";

        //si tout les champs du formulaire sont fournis
        if (isset($_POST["titreArticle"], $_POST["texteArticle"], $_POST["image"])
        && !empty($_POST["titreArticle"]) && !empty($_POST["texteArticle"]) && !empty($_POST["image"])) {
            $titre = strip_tags($_POST["titreArticle"]);
            $texte = htmlspecialchars($_POST["texteArticle"]);
            $lien = strip_tags($_POST["image"]);

            $requete = "INSERT INTO ARTICLE (`titre`, `texte`, `lienImage`, `idDocumentaliste`) VALUES (:titre, :texte, :lien, 1)";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->bindValue(":titre", $titre, PDO::PARAM_STR);
            $req_prep->bindValue(":texte", $texte, PDO::PARAM_STR);
            $req_prep->bindValue(":lien", $lien, PDO::PARAM_STR);

            if (!$req_prep->execute()) {
                die("Une erreur est survenue");
            } else {
                header('Location: index.php');
                //die("le livre $titre a bien été ajouté");
            }
        }
    }

    public static function suppArticle()
    {
        //si le formulaire est vide
        if (empty($_POST)) {
            throw new HttpException();
        }
        require_once "config/connexion.php";

        //si tout les champs du formulaire sont fournis
        if (isset($_POST["idArticle"]) && !empty($_POST["idArticle"])) {
            $id = strip_tags($_POST["idArticle"]);

            $requete = "DELETE FROM ARTICLE WHERE idArticle = :id";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->bindValue(":id", $id, PDO::PARAM_INT);

            if (!$req_prep->execute()) {
                die("Une erreur est survenue");
            } else {
                header('Location: index.php');
                //die("le livre $titre a bien été ajouté");
            }
        }
    }

    public static function ajtFav()
    {
        //si le formulaire est vide
        if (empty($_POST)) {
            throw new HttpException();
        }
        require_once "config/connexion.php";

        //si tout les champs du formulaire sont fournis
        if (isset($_POST["idArticleFav"]) && !empty($_POST["idArticleFav"])) {
            $id = strip_tags($_POST["idArticleFav"]);

            $requete = "UPDATE DOCUMENT SET coupDeCoeur = 1 WHERE idDocument = :id";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->bindValue(":id", $id, PDO::PARAM_INT);

            if (!$req_prep->execute()) {
                die("Une erreur est survenue");
            } else {
                header('Location: index.php?page=documentaliste');
                //die("le livre $titre a bien été ajouté");
            }
        }
    }
    public static function suprimmeFav()
    {
        //si le formulaire est vide
        if (empty($_POST)) {
            throw new HttpException();
        }
        require_once "config/connexion.php";

        //si tout les champs du formulaire sont fournis
        if (isset($_POST["idArticleFav"]) && !empty($_POST["idArticleFav"])) {
            $id = strip_tags($_POST["idArticleFav"]);

            $requete = "UPDATE DOCUMENT SET coupDeCoeur = 0 WHERE idDocument = :id";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->bindValue(":id", $id, PDO::PARAM_INT);

            if (!$req_prep->execute()) {
                die("Une erreur est survenue");
            } else {
                header('Location: index.php?page=documentaliste');
                //die("le livre $titre a bien été supprimer");
            }
        }
    }
    public static function pageFormulaire()
    {
        require_once "config/connexion.php";
        $titre= "documentaliste";
        $messages = Contact::getAllMessages();
        include("vue/debut.php");
        include("vue/menu.php");
        include("vue/documentaliste/documentaliste.html");
        include("vue/documentaliste/lesMessages.php");
        include("vue/fin.html");
    }
}