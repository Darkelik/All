<?php
require_once(dirname(dirname(__FILE__))."/config/connexion.php");
class Contact
{
    private $login;
    private $sujet;
    private $message;
    private $date;

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function getSujet()
    {
        return $this->$sujet;
    }

    public function setSujet($s)
    {
        $this->sujet = $s;
    }

    public function getMessage()
    {
        return $this->message;
    }

    public function setMessage($m)
    {
        $this->message = $m;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function setDate($d)
    {
        $this->date = $d;
    }

    public function __construct($login = NULL, $s = NULL, $m = NULL, $d = NULL) {
        if (!is_null($login)) {
            $this->login = $login;
            $this->sujet = $t;
            $this->message = $m;
            $this->date = $d;
        }
    }

    public static function getAllMessages(){
        $requete = "SELECT * FROM CONTACT ORDER BY `date` DESC";
        $req = Connexion::pdo()->query($requete);
        $req->setFetchmode(PDO::FETCH_CLASS,'Contact');
        $tableau = $req->fetchAll();
	    return $tableau;
    }

    // une methode d'affichage.
    public function afficher() {
        echo "<div class='grp'> 
		<p> $this->login | $this->sujet : $this->date </p>
	    <p> $this->message </p>
		</div>
		</div>";
    }

}