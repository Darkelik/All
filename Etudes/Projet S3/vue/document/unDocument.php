<main>
<div class=afficheDocResume>
<?php
    // affichage du tableau
	
	$l->afficherDoc();

?>
<table>
  
  <caption>Exemplaire</caption>
  
  <tr><th>Numéro Exemplaire</th> <th>Etat</th> <th>Statut</th><th> </th></tr>
  
  <?php 

  $num=0;
  foreach ($tab_ex as $ex) {
   
    $ex->afficheExemplaire($l->getIdDocument());
  }
  ?>

 
  
  </table>

</div>
<form>
  <input type="button" value="retour" onclick="history.go(-1)">
</form>

</main>
