<?php 
include("mysql.php"); 
if(!$_SESSION["id"])
{
	header('Location: index.php');
}
$id = $_SESSION["id"];
$lieux = $bdd->query('SELECT * FROM tbl_lieux WHERE no_user = "' . $id . '"');
while ($lieu = $lieux->fetch())
	{
		$noLieu = $lieu["no_lieu"];
		$listes = $bdd->query('SELECT * FROM tbl_listes WHERE no_lieu ="' . $noLieu . '" ORDER BY titre_liste');
		if ($listes)
		{
			$dispo = false;
			while ($liste = $listes->fetch()) {
				$dispo = true;
			}
			if(!$dispo){
				$bdd->query('DELETE FROM tbl_lieux WHERE no_lieu ="'. $noLieu . '"');
			}
		}
	}
?>

<!DOCTYPE html>
<html lang="fr">
	<head>
		<title>Samuel Beaudoin | Curriculum Vitae</title>
		<meta name="description" content="Site pr&eacute;sentant Samuel Beaudoin"/>
		<meta name="author" content="Samuel Beaudoin"/>
		<link rel="stylesheet" type="text/css" media="all" href="css/CSSmain.css"/>
		<script language="JavaScript">
			<!--
			function autoResize(id){
			    var newheight;
			    var newwidth;

			    if(document.getElementById){
			        newheight=document.getElementById(id).contentWindow.document .body.scrollHeight;
			        newwidth=document.getElementById(id).contentWindow.document .body.scrollWidth;
			    }

			    document.getElementById(id).height= (newheight) + "px";
			    document.getElementById(id).width= (newwidth) + "px";
			}

			function afficheMenu(obj){

				var idMenu     = obj.id;
				var idSousMenu = 'Sous' + idMenu;
				var sousMenu   = document.getElementById(idSousMenu);

				/*****************************************************/
				/**  si le sous-menu correspondant au menu cliqué    **/
				/** est caché alors on l'affiche, sinon on le cache **/
				/*****************************************************/
				if(sousMenu.style.display == "none"){
					sousMenu.style.display = "block";
				}
				else{
					sousMenu.style.display = "none";
				}

			}
			//-->
		</script>
	</head>
	<body style="background-color:transparent;margin:0 auto;" oncontextmenu="return false">
	<?php
		include "tete.php";
	?>
		<section name="body" class="body">
			<div class="Left">
				<div class="Title">
					<p> Listes: </p> <br>
				</div>
				<div class="Listes">
				<?php
					$id = $_SESSION["id"];
					$lieux = $bdd->query('SELECT * FROM tbl_lieux WHERE no_user = "' . $id . '"');
					echo "<ol style='list-style-type:none'>";
					$cpt = 0;
					while ($lieu = $lieux->fetch())
					{
						echo '<a onclick="afficheMenu(this)" id="Liste'. $cpt .'"> <li class="Lieu">';
						echo $lieu["titre_lieu"];
						echo "</li></a>";
						$noLieu = $lieu["no_lieu"];
						$listes = $bdd->query('SELECT * FROM tbl_listes WHERE no_lieu ="' . $noLieu . '" ORDER BY titre_liste');
						if ($listes)
						{
							echo "<ol id='SousListe". $cpt  ."' style='list-style-type:none;display:block'>";
							while ($liste = $listes->fetch()) {
								echo '<a href="liste.php?liste=' . $liste["no_liste"] . '" target="Frame">';
								echo "<li class='Liste icons' >";
								//echo '<img src="icon/liste.png"/>';
								echo $liste["titre_liste"];
								echo "</li>";
								echo '</a>';
							}
							echo "</ol>";
						}
						$cpt++;
					}
					echo "</ol>";
				?>
				</div>
			</div>
			<div class="Top">
				<div class="Center">
					<a href="creationLieu.php" target="Frame" class="button2 icons"><img src="icon/lieu_new.png" alt="Créer un lieu" title="Créer un lieu" /></a>
					<a href="creationListe.php" target="Frame" class="button2 icons"><img src="icon/emplacement_new.png" alt="Créer un emplacement" title="Créer un emplacement" /></a>
					<a href="listeEpicerie.php" target="Frame" class="button2 icons"><img src="icon/epicerie.png" alt="Liste épicerie" title="Liste épicerie" /></a>
					<?php
						if( $_SESSION["type"] < 4)
						{
					?>
					<a href="NouveauArticle.php" target="Frame" class="button2 icons"><img src="icon/article_new.png" alt="Créer article" title="Créer article" /></a>
					<?php
						}
						if( $_SESSION["type"] < 3)
						{
					?>
					<a href="SupprimeArticle.php" target="Frame" class="button3 icons"><img src="icon/article_dell.png" alt="Supprimer article" title="Supprimer article" /></a>
					<?php
						}
					?>
					<a href="recette.php" target="Frame" class="button2">Recettes</a>
				</div>
			</div>
			<div style="float:left;overflow: scroll; -webkit-overflow-scrolling: touch; width:63.6%">
				<iframe class="frame" name="Frame" src="welcome.php" frameborder="0" oncontextmenu="return false">
				  <p>Your browser does not support iframes.</p>
				</iframe>
			</div>
			<div class="Right">
				<div class="Title" id="Right"> <!-- onclick="afficheMenu(this)" !-->
					<p> Recettes: 
						<div style="margin-top:0px;">
							<a href="index.php" style="margin-right:2em;width:100%;line-height:20px;margin-top:0px;" class="button2">Actualiser</a>
						</div>
					</p>
				</div>
			</div>
			<div class="SousRight" id="SousRight" >
					<div class="Recettes">
					<?php
					$id = $_SESSION["id"];
					$categos = $bdd->query('SELECT * FROM tbl_categories WHERE no_user = "' . $id . '"');
						echo "<ol style='list-style-type:none'>";
						$cpt = 0;
						while ($catego = $categos->fetch())
						{
							echo '<a onclick="afficheMenu(this)" id="Recette'. $cpt .'"> <li class="Lieu">';
							echo $catego["nom_catego"];
							echo "</li></a>";
							$noCatego = $catego["no_catego"];
							$Recettes = $bdd->query('SELECT * FROM tbl_recettes WHERE no_catego ="' . $noCatego . '" ORDER BY titre_recette');
							if ($Recettes)
							{
								echo "<ol id='SousRecette". $cpt  ."' style='list-style-type:none;display:block'>";
								while ($recette = $Recettes->fetch()) {
									echo '<a href="recette.php?recette=' . $recette["no_recette"] . '" target="Frame">';
									echo "<li class='Recette' >";
									echo $recette["titre_recette"];
									echo "</li>";
									echo '</a>';
								}
								echo "</ol>";
							}
							$cpt++;
						}
						echo "</ol>";
					?>
					</div>
			</div>
		</section>
		<section name="Pied" style="height:3.13em;">
			<div class="pied" align="center">
				<div style="float:left;display:inline-block;margin:0px;">
					<h5>- Samuel Beaudoin, alias Samylots.</h5>
				</div>
				<div style="float:right;display:inline-block;margin:0px;">
					<h5>- Copyright &copy; Samylots 2014 -</h5>
				</div>
				<div>
			</div>
		</section>
	</body>
</html>