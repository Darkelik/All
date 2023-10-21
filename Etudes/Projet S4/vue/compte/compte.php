<div class="bloc">

	<ul class="infos">
	
	<h2 class="bjrX"> Bonjour, <?php echo $compte->getLogin();?>.</h2>
	
	<li class="information"><p> Nom Actuel : <?php echo $compte->getNom();?> </p></li>
	
	<li class="information"><p> Prenom Actuel : <?php echo $compte->getPrenom();?> </p></li>

	<li class="information"><p> Mot de Passe Actuel : </p><div id="mdpAffiche">X</div><button id="rev">Révéler</button></li>

	<li class="information"><p> Adresse Mail Actuelle : <?php echo $compte->getMail();?> </p></li>

	<li class="information"><p> Date de Naissance Actuelle : <?php echo $compte->getDateNaissance();?> </p></li>
	
	<li class="information"><p> Score total des jeux :  <?php echo $compte->getScoreTotal();?> </p></li>
	
	<li class="information"><p> Temps total des jeux :  <?php echo $compte->getTimeTotal();?> </p></li>
	
	<li class="information"><p> Vous êtes identifié en tant que : <?php echo $compte->getGenre();?> </p></li>
	
	<button id="deco" onclick="window.location.href='../controleur/testDeconnexion.php'">Déconnexion</button>

	</ul>
	
	

</div>

<img id="gateau" style="display:none;" src="https://projets.iut-orsay.fr/prj-s4-ibenelg/images/gateau.png"/>

<script>
	$(document).ready(function(){
		$('#rev').click(function(){
			if ($('#mdpAffiche').text() === "X"){
				$('#mdpAffiche').text("<?php echo $compte->getMdp();?>");
			} else {
				$('#mdpAffiche').text("X");
			}
		});
		
		var date = new Date();
		var dateUser = new Date("<?php echo $compte->getDateNaissance();?>")
		if (date.getDate() === dateUser.getDate() && date.getMonth() === dateUser.getMonth()){
			$('#gateau').css("display","block");
		}
	});
</script>