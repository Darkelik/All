<?php
require_once(dirname(dirname(__FILE__))."/modele/exemplaire.php");
class ControleurEmprunt
{
    public static function emprunterDoc()
    {
        $dateEmp = date("Y-m-d");
        $dateF = date("Y-m-d", strtotime("+30 days"));

        $requete = "INSERT INTO `EMPRUNTE`(idUtilisateur,idDocumentaliste,idExemplaire,dateEmprunt,dateFin) values ($this->idUtilisateur,$this->idDocumentaliste,$this->idExemplaire,$dateEmp,$dateF)";
        // préparation de la requête
        $resultat = Connexion::pdo()->prepare($requete);
        if($resultat->execute()){
            header('Location: index.php?page=administrateur');
        }else{
            die("une erreur est survenue");
        }
    }
	
	public static function reserverDoc(){
		session_start();
		$user=$_SESSION["login"];
		$ex=$_GET["exemplaire"];
		$bool=Exemplaire::reserverDocument($user,$ex);
		return $bool;
	}
	
	public static function afficher(){
		$titre="reservation";
		include("vue/document/reservation.php");
	}
}