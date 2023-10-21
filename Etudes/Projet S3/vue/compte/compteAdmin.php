<div class="bloc">
<h1 class="monC"> Mon Compte </h1>
	<h2 class="bjrX"> Bonjour, <?php echo $compte->getNomAdmin()." ".$compte->getPrenomAdmin();?> <h2>
<img src="./ressources/pp.png" alt="photo de profil" class="pp" width="450" height="450">

<ul class="infosAdm">
<li class="loginActuel"><p> Login Actuel : <?php echo $compte->getLogin();?> </p></li>

<li class="mdpActuel"><p> Mot de Passe Actuel : X </p></li>

<li class="mailActuel"><p> Adresse Mail Actuelle : <?php echo $compte->getAdresseAdmin();?> </p></li>


</ul>

</div>