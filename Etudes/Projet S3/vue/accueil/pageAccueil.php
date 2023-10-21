
<main>


<?php
	echo "<h1>Bienvenue";
	if (isset($_SESSION["titre"])){
		echo ", ";
		if ($_SESSION["titre"]=="admin"){
			echo "administrateur ";
		} else if ($_SESSION["titre"]=="doc"){
			echo "documentaliste ";
		} else {
			echo "utilisateur ";
		}
	} else {
		echo " ";
	}
	
	if (isset($_SESSION["login"])){
		$login=$_SESSION["login"];
		echo "$login";
	}
	
	echo "!</h1>";
	
    // affichage du tableau
	echo"<div classe ='affichagePages'>";
	foreach ($tab_accueil as $a) {
		$a->afficherArticle();
	}
	echo"</div>";	
    
    
?>


</main>
