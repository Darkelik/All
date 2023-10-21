
<div class =affichageImg>
<h1>Résultats pour : <?php echo $texte;?></h1>
<?php
    
	foreach ($tab_u as $u) {
		$u->afficher();
	}

?>
</div>
