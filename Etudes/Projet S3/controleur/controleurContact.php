<?php
class ControleurContact {
		
		public static function ajouterMessage(){
			if (empty($_POST)) {
				throw new HttpException();
			}
			require_once "config/connexion.php";
	
			//si tout les champs du formulaire sont fournis
			if (isset($_POST["sujet"], $_POST["message"])
			&& !empty($_POST["sujet"]) && !empty($_POST["message"])) {
				$login = $_SESSION["login"];
				$sujet = strip_tags($_POST["sujet"]);
				$message = htmlspecialchars($_POST["message"]);
	
				$requete = "INSERT INTO CONTACT (`login`, `sujet`, `message`) VALUES (:login ,:sujet, :message)";
				$req_prep = Connexion::pdo()->prepare($requete);
				$req_prep->bindValue(":login", $login, PDO::PARAM_STR);
				$req_prep->bindValue(":sujet", $sujet, PDO::PARAM_STR);
				$req_prep->bindValue(":message", $message, PDO::PARAM_STR);
	
				if (!$req_prep->execute()) {
					die("Une erreur est survenue");
				} else {
					header('Location: index.php');
					//die("le livre $titre a bien été ajouté");
				}
			}
		}

		public static function afficherContacts(){
            $titre = "Contactez-Nous";
			include("vue/debut.php");
			include("vue/menu.php");
			include("vue/contact/pageContact.html");
			include("vue/fin.html");
		}

}
?>