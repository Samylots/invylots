<?php 
include("mysql.php"); 

if (isset($_POST["Title"]))
{
	$titre = htmlspecialchars($_POST["Title"]);
	$desc = htmlspecialchars($_POST["desc"]);
	if($titre != ""){
		$lieux = $bdd->query('SELECT no_catego FROM tbl_categories WHERE nom_catego ="' . $titre . '" AND no_user="' . $_SESSION["id"] .'"');
		$lieu = $lieux->fetch();
		if (!$lieu){
			$bdd->exec('INSERT INTO tbl_categories(nom_catego,desc_catego,no_user) VALUES("' . $titre . '","' . $desc . '",' . $_SESSION["id"] .")");
			$lieux = $bdd->query('SELECT no_catego FROM tbl_categories WHERE nom_catego ="' . $titre . '" AND no_user="' . $_SESSION["id"] .'"');
			$lieu = $lieux->fetch();
			header('Location: NouveauRecette.php?categorie=' . $lieu["no_catego"] );
		}else
		{
		header('Location: creationCategorie.php');
		}
	}
	else
	{
		header('Location: creationCategorie.php');
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
		<form action="creationCategorie.php" method="post" style="float:left">
			<div class="Center">
			<a class="Title"> Creation Catégorie recette </a>
			</div>
			<label for="Title">Titre :</label> <input type="text" name="Title" autofocus /> <br>
		    <label for="desc">Description :</label> <textarea name="desc"></textarea> <br>
		    <input type="submit" class="button2" value="Créer" />
		</form>
		</div>
	</body>
</html>