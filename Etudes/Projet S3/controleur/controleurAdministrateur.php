<?php
class ControleurAdministrateur
{
    public static function ajtDoc()
    {
        //si le formulaire est vide
        if (empty($_POST)) {
            throw new HttpException();
        }
        require_once "config/connexion.php";

        //si tout les champs du formulaire sont fournis
        if (isset($_POST["titre"], $_POST["date"], $_POST["type"], $_POST["langue"], $_POST["couverture"], $_POST["description"])
            && !empty($_POST["titre"]) && !empty($_POST["date"]) && !empty($_POST["type"]) && !empty($_POST["langue"]) && !empty($_POST["couverture"]) && !empty($_POST["description"])) {
            $titre = strip_tags($_POST["titre"]);
            $date = strip_tags($_POST["date"]);
            $couverture = strip_tags($_POST["couverture"]);
            $type = strip_tags($_POST["type"]);
            $langue = strip_tags($_POST["langue"]);
            $description = htmlspecialchars($_POST["description"]);
            $requete = "INSERT INTO DOCUMENT (`titreDocument`, `dateParution`, `lienImage`, `idAdmin`, `idType`, `idLangue`, `idGenre`, `description`) VALUES (:titre, :date, :lien, 1, :type, :langue, 1, :desc)";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->bindValue(":titre", $titre, PDO::PARAM_STR);
            $req_prep->bindValue(":date", $date, PDO::PARAM_STR);
            $req_prep->bindValue(":lien", $couverture, PDO::PARAM_STR);
            $req_prep->bindValue(":type", $type, PDO::PARAM_INT);
            $req_prep->bindValue(":langue", $langue, PDO::PARAM_INT);
            $req_prep->bindValue(":desc", $description, PDO::PARAM_STR);

            if (!$req_prep->execute()) {
                die("Une erreur est survenue");
            } else {
                header('Location: index.php?page=documents');
                //die("le livre $titre a bien été ajouté");
            }
        }
    }

    public static function suppDoc(){
        //si le formulaire est vide
        if (empty($_POST)) {
            throw new HttpException();
        }
        require_once "config/connexion.php";

        if (isset($_POST["idDoc"]) && !empty($_POST["idDoc"])) {
            $idDoc = strip_tags($_POST["idDoc"]);
            $requete = "DELETE FROM DOCUMENT WHERE idDocument = :id";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->bindValue(":id", $idDoc, PDO::PARAM_STR);
            if (!$req_prep->execute()) {
                die("Une erreur est survenue");
            } else {
                header('Location: index.php?page=documents');
            }
        }
    }

    public static function suppUtilisateur(){
        //si le formulaire est vide
        if (empty($_POST)) {
            throw new HttpException();
        }
        require_once "config/connexion.php";

        if (isset($_POST["idUtil"]) && !empty($_POST["idUtil"])) {
            $idUtil = strip_tags($_POST["idUtil"]);
            $requete = "DELETE FROM UTILISATEUR WHERE idUtilisateur = :id";
            $req_prep = Connexion::pdo()->prepare($requete);
            $req_prep->bindValue(":id", $idUtil, PDO::PARAM_STR);
            if (!$req_prep->execute()) {
                die("Une erreur est survenue");
            } else {
                header('Location: index.php?page=documents');
            }
        }
    }
    public static function pageFormulaire() {
        $titre = "administrateur";
        include("vue/debut.php");
        include("vue/menu.php");
        include("vue/administrateur/administrateur.html");
        include("vue/fin.html");
    }
}