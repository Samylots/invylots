<?php 
include("mysql.php"); 

if (isset($_POST["Title"]))
{
	$titre = htmlspecialchars($_POST["Title"]);
	$desc = htmlspecialchars($_POST["desc"]);
	if($titre != ""){
		$bdd->exec('INSERT INTO tbl_listes(titre_liste,desc_liste,no_lieu) VALUES("' . $titre . '","' . $desc . '",' . $_POST["choix"] .")");
		header('Location: main.php');
	}
	else
	{
		header('Location: main.php');
	}
}

if (isset($_GET["lieu"]))
{
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
		<form action="creationListe.php" target="_top" method="post" style="float:left">
		<div class="Center">
			<a class="Title"> Creation Emplacement </a>
			</div>
		<label for="choix">Lieu :</label> <select name="choix">
		<?php
			$lieux = $bdd->query('SELECT no_lieu, titre_lieu FROM tbl_lieux WHERE no_user="' . $_SESSION["id"] . '"');
			while ($lieu = $lieux->fetch()) 
			{
				echo '<option value="' . $lieu["no_lieu"] . '"'; 
				if (isset($_GET["lieu"]) AND $lieu["no_lieu"] == $_GET["lieu"] )
				{
					echo 'selected';
				}
 				echo ' >' . $lieu["titre_lieu"] . '</option>';
			}
		?>
			</select><br>
			<label for="Title">Titre :</label> <input type="text" name="Title" autofocus/> <br>
		    <label for="desc">Description :</label> <textarea rows="4" cols="28" name="desc"></textarea> <br>
		    <input type="submit" class="button2" value="Creer" />
		</form>
		</div>
	</body>
</html>