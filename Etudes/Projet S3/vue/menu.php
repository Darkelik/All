
	 
	 

<header class="wrapper">			<!-- toute la grille -->		
								
  <div class=" logo"> <img src="./ressources/logo.PNG" alt="Pulpit rock" class="img" width="304" height="80"> </div>
  <?php
	if (isset($_SESSION["titre"])){
		if ($_SESSION["titre"]=="admin"){
			echo "<div class=\" adm\"> <li class=\"li_admin\" ><a class=\"";
			if (isset($_GET["page"]) && $_GET["page"]=="administrateur"){
				echo "pageActuelle";
			} else {
				echo "admin";
			}
			echo "\" href=\"./index.php?page=administrateur\">Administrateur</a></li></div>";
		} else if ($_SESSION["titre"]=="doc"){
			echo "<div class=\" docum\"> <li class=\"li_docu\" ><a class=\"";
			if (isset($_GET["page"]) && $_GET["page"]=="documentaliste"){
				echo "pageActuelle";
			} else {
				echo "docu";
			}
			echo "\" href=\"./index.php?page=documentaliste\">Documentaliste</a></li></div>";
		}
	}
  ?>
  <div class=" compte">
  
  <li class =" menuDeroulantCompte">
                <a class="monCompte" <?php if (isset($_SESSION["login"])) echo "href=\"./index.php?page=compte\"";  else echo "href=\"./index.php?page=connexion\"";?>>Mon Compte</a>     <!-- compte en haut à droite -->
          <ul class="sous">
				<?php
				if (isset($_SESSION["login"])){
					echo "<li><a class=\"deco\" href = \"./controleur/testDeconnexion.php\"  > Déconnexion </a></li>";
				} else {
					echo "<li><a class=\"connex\" href = \"./index.php?page=connexion\"  > Connexion </a></li>";
				}
				?>
		  </ul>
  </li>

  </div>
  
  <div class=" accueil"><li class="li_ac"><a class="<?php if (!isset($_GET["page"])) echo "pageActuelle"; else echo "ac";?>" href="./">Accueil</a></li></div>
  
  <div class=" documents"><li class="li_doc"><a class="<?php if (isset($_GET["page"]) && $_GET["page"]=="documents") echo "pageActuelle"; else echo "doc";?>" href="./index.php?page=documents">Nos Documents</a></li></div>
  
  <div class=" cdc"><li class="li_ncdc" ><a class="<?php if (isset($_GET["page"]) && $_GET["page"]=="coupCoeur") echo "pageActuelle"; else echo "ncdc";?>" href="./index.php?page=coupCoeur">Nos Coups De Cœur</a></li></div>
  
  <div class=" contact"> <li class="li_co"><a class="<?php if (isset($_GET["page"]) && $_GET["page"]=="contacts") echo "pageActuelle"; else echo "co";?>" href="./index.php?page=contacts">Contact</a></li></div>
  
  <div class=" propo"> <li class="li_prop" ><a class="<?php if (isset($_GET["page"]) && $_GET["page"]=="propos") echo "pageActuelle"; else echo "prop";?>" href="./index.php?page=propos">À Propos</a></li></div>
  
  
  
  
  
  <div class=" recherche"> 
  
		<form class="boxr" action="./index.php?page=documents&action=rechercher" method="POST">
			<input type="text" name="texte" id="search" placeholder="Recherchez un document">
			<input type="submit" name="action" id="btnRechercher" value="Rechercher">
		</form>
  </div>
  
  
  
</header>


﻿