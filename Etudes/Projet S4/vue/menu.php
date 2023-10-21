    <h1><a href="https://projets.iut-orsay.fr/prj-s4-ibenelg/"> Mini-Jeux-Party </a></h1>
  <h2 id="mode"> Mode Nuit </h2>
  <h2 id="monCompte"> <a class="monCompte" <?php if (isset($_SESSION["login"])) echo "href=\"https://projets.iut-orsay.fr/prj-s4-ibenelg/compte\"";  else echo "href=\"https://projets.iut-orsay.fr/prj-s4-ibenelg/connexion\"";?>> Mon Compte</a> </h2>
  <script>
	$(document).ready(function(){
		if (sessionStorage.getItem('mode') === 'nuit') {
			$("#mode").css("color","white"); // on passe à la nuit
			$("#monCompte").css("color","white");
			$("#mode").text("Mode Jour");
			$("body").css("background","linear-gradient(#56003d, #000000)");
			$("#game").css("border","1px solid #ffffff"); // Permet de changer les bordures du snake en blanc dans mode nuit
			$("#gameCanvas").css("border","1px solid #ffffff"); // " du DoodleJump
			$(".cell").css("border","1px solid #ffffff"); // bordure blanche du ttt
			$(".cell").css("color","white"); 
			$(".game").css("border","6px solid #ffffff"); // bordure blanche du ttt
			$("#d1").css("border","1px solid #ffffff"); // bordure blanche du memory
			$(".case").css("border","1px solid #ffffff"); // cellules blanches du memory
			$("#info").css("color","white");
			$("#times").css("color","white");
			$("#scores").css("color","white");
			$("#vite").css("color","white");
			$("#points").css("color","white");
			$("#terrain_de_jeu").css("border","1px solid #ffffff");
			$(".monC").css("color","white");
			$(".bjrX").css("color","white");
			$(".infos").css("color","white");
			$("#gateau").attr("src","https://projets.iut-orsay.fr/prj-s4-ibenelg/images/gateauNuit.png");
			$(".grid").css("background-color", "white");
			$(".grid").css("color", "black");
			$(".grid").css("border", "black");
			$("h2").css("color","white");
			$("#titreJeu").css("color","white");
			$("#descJeu").css("color","white");
		}
		
		$("#mode").click(function(){
			if ($(this).css("color") == "rgb(128, 128, 128)"){ // Quand on est en jour
				sessionStorage.setItem('mode', 'nuit');
				$("#monCompte").css("color","white");
				$(this).text("Mode Jour");
				$("body").css("background","linear-gradient(#56003d, #000000)");
				$("#game").css("border","1px solid #ffffff"); // Permet de changer les bordures du snake en blanc dans mode nuit
				$("#gameCanvas").css("border","1px solid #ffffff"); // " du DoodleJump
				$(".cell").css("border","1px solid #ffffff"); // bordure blanche du ttt
				$(".cell").css("color","white"); 
				$(".game").css("border","6px solid #ffffff"); // bordure blanche du ttt
				$("#d1").css("border","1px solid #ffffff"); // bordure blanche du memory
				$(".case").css("border","1px solid #ffffff"); // cellules blanches du memory
				$("#info").css("color","white");
				$("#times").css("color","white");
				$("#scores").css("color","white");
				$("#vite").css("color","white");
				$("#points").css("color","white");
				$("#terrain_de_jeu").css("border","1px solid #ffffff");
				$(".monC").css("color","white");
				$(".bjrX").css("color","white");
				$(".infos").css("color","white");
				$("#gateau").attr("src","https://projets.iut-orsay.fr/prj-s4-ibenelg/images/gateauNuit.png");
				$(".grid").css("background-color", "black");
				$(".grid").css("color", "white");
				$(".grid").css("border", "white");
				$("h2").css("color","white");
				$("#titreJeu").css("color","white");
				$("#descJeu").css("color","white");
			} else {
				sessionStorage.setItem('mode', 'jour');
				$("#monCompte").css("color","gray");
				$(this).text("Mode Nuit");
				$("body").css("background","linear-gradient(#ffc3f4, #ffffff)");
				$("#game").css("border","1px solid #000");// Permet de remettre les bordures du snake en noir dans mode jour
				$("#gameCanvas").css("border","1px solid #000"); // " du DoodleJump
				$(".cell").css("border","1px solid #000");  // bordure noir du ttt
				$(".cell").css("color","black");
				$(".game").css("border","6px solid #000");  // bordure noir du ttt
				$("#d1").css("border","1px solid #000"); // bordure noires du memory
				$(".case").css("border","1px solid #000"); // cellules noires du memory
				$("#info").css("color","black");
				$("#times").css("color","black");
				$("#scores").css("color","black");
				$("#vite").css("color","black");
				$("#points").css("color","black");
				$("#terrain_de_jeu").css("border","1px solid black");
				$(".monC").css("color","black");
				$(".bjrX").css("color","black");
				$(".infos").css("color","black");
				$("#gateau").attr("src","https://projets.iut-orsay.fr/prj-s4-ibenelg/images/gateau.png");
				$(".grid").css("background-color", "white");
				$(".grid").css("color", "black");
				$(".grid").css("border", "black");
				$("h2").css("color","gray");
				$("#titreJeu").css("color","gray");
				$("#descJeu").css("color","gray");
			}
		});
	});
  </script>