
<div class="bloc">
	<h1 class="monC"> Mon Compte </h1>
		<h2 class="bjrX"> Bonjour, <?php echo $compte->getNomUtilisateur()." ".$compte->getPrenomUtilisateur();?> <h2>
	<img src="./ressources/pp.png" alt="photo de profil" class="pp" width="450" height="450">

	<ul class="infos">
	<li class="loginActuel"><p> Login Actuel : <?php echo $compte->getLogin();?> </p></li>

	<li class="mdpActuel"><p> Mot de Passe Actuel : X </p></li>

	<li class="adrActuel"><p> Adresse Physique Actuelle : <?php echo $compte->getAdresseUtilisateur();?> </p></li>

	<li class="mailActuel"><p> Adresse Mail Actuelle : <?php echo $compte->getMailUtilisateur();?> </p></li>

	<li class="ddnActuel"><p> Date de Naissance Actuelle : <?php echo $compte->getDateNaissance();?> </p></li>

	<li class="telActuel"><p> Téléphone Actuel : <?php echo $compte->getTelephoneUtilisateur();?> </p></li>

	<li class="empActuel"><p> Nombre d'emprunts Actuels : <?php echo $compte->getNbEmprunts();?> </p></li>

	<li class="penActuel"><p> Nombre de Pénalités Actuels : <?php echo $compte->getNbPenalites();?> </p></li>

	<li class="catActuel"><p> Catégorie Actuelle : <?php echo $compte->getCategorie()[0];?> </p></li>

	</ul>

</div>