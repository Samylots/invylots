<?php 
include("mysql.php"); 
if (isset($_GET["liste"])){
	$noliste = $_GET["liste"];
	$listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes WHERE no_liste="' . $noliste .'"');
	$liste = $listes->fetch();
	if (isset($_POST["Title"]) AND isset($_POST["upc"]))
	{
		$titre = htmlspecialchars($_POST["Title"]);
		$upc = htmlspecialchars($_POST["upc"]);
		$desc = htmlspecialchars($_POST["desc"]);

		$checks = $bdd->query('SELECT code_restant FROM tbl_restants WHERE code_restant="' . $upc . '"');
		$check = $checks->fetch();
		if (!$check){
			if($titre != ""){
				$bdd->exec('INSERT INTO tbl_restants(code_restant,nom_restant,desc_restant,no_user) VALUES("' . $upc . '","' . $titre . '","' . $desc . '","' . $_SESSION["id"] .'")');
				header('Location: ajoutArticleListe.php?liste='. $noliste . '&upc=' . $upc);
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
		<?php
			include("TopBar2.php"); 
		?>
		<div class="inscription">
			<form action="NouveauRestant.php?liste=<?php echo $noliste; ?>" method="post" style="float:left">
			<div class="Center">
				<a class="Title"> Creation Restant dans "<font color="red"><?php echo $tempoliste["titre_liste"]; ?></font>"</a>
				</div>
				<label for="Title">Titre :</label> <input type="text" name="Title" autofocus/> <br>
				<label for="upc">CODE :</label> <input type="text" name="upc"/> <br>
			    <label for="desc">Description :</label> <textarea rows="4" cols="28" name="desc"></textarea> <br>
			    <input type="submit" class="button2" value="Creer" />
			</form>
			</div>
		</body>
	</html>
<?php
}
?>