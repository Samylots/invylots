<?php 
include("mysql.php"); 

if (isset($_POST["Title"]) AND isset($_POST["upc"]))
{
	$titre = htmlspecialchars($_POST["Title"]);
	$upc = htmlspecialchars($_POST["upc"]);
	$desc = htmlspecialchars($_POST["desc"]);
	$share = $_POST["share"];
	$catego = $_POST["choix"];

	$checks = $bdd->query('SELECT code_recette FROM tbl_recettes WHERE code_recette="' . $upc . '"');
	$check = $checks->fetch();
	if (!$check){
		if($titre != ""){
			$bdd->exec('INSERT INTO tbl_recettes(code_recette,titre_recette,desc_recette,share_recette,no_user,no_catego,date_recette) VALUES("' . $upc . '","' . $titre . '","' . $desc .'","' . $share .'","' . $_SESSION["id"] .'","' . $catego .'", NOW() )');
			$recettes = $bdd->query('SELECT no_recette FROM tbl_recettes WHERE code_recette="' . $upc . '" AND no_user=' . $_SESSION["id"]);
			$recette = $recettes->fetch();
			header('Location: AjoutArticleRecettes.php?recette=' . $recette["no_recette"]);
		}
		else
		{
			header('Location: welcome.php');
		}
	}
	else
	{
		header('Location: welcome.php');
	}
}

?>

<!DOCTYPE html>
<html>
<head>
		<title>Samuel Beaudoin | Curriculum Vitae</title>
		<meta name="description" content="Site pr&eacute;sentant Samuel Beaudoin"/>
		<meta name="author" content="Samuel Beaudoin"/>
		<link rel="stylesheet" type="text/css" media="all" href="css/CSSmain.css"/>
	</head>
	<body oncontextmenu="return false">
	<div class="inscription">
		<form action="NouveauRecette.php" method="post" style="float:left">
		<div class="Center">
			<a class="Title"> Creation Recette </a>
			</div>
			<label for="choix">Catégorie :</label> <select name="choix">
			<?php
				$lieux = $bdd->query('SELECT no_catego, nom_catego FROM tbl_categories WHERE no_user="' . $_SESSION["id"] . '"');
				while ($lieu = $lieux->fetch()) 
				{
					echo '<option value="' . $lieu["no_catego"] . '"'; 
					if (isset($_GET["categorie"]) AND $lieu["no_catego"] == $_GET["categorie"] )
					{
						echo 'selected';
					}
	 				echo ' >' . $lieu["nom_catego"] . '</option>';
				}
			?>
			</select><br>
			<label for="Title">Titre :</label> <input type="text" name="Title" autofocus/> <br>
			<label for="upc">CODE :</label> <input type="text" name="upc"/> <br>
		    <label for="desc">Description :</label> <textarea rows="4" cols="28" name="desc"></textarea> <br>
		    <label for="desc">Partager? :</label><select name="share">
		    	<option value="0" selected>
		    		Non
		    	</option>
		    	<option value="1">
		    		Oui
		    	</option>
		    </select>
		    <input type="submit" class="button2" value="Creer" />
		    <a href="index.php" target="_top" class="button2">Terminer</a>
		</form>
		</div>
	</body>
</html>