<?php 
include("mysql.php"); 

if (isset($_GET["liste"]))
{
	$liste = $_GET["liste"];
}

if (isset($_POST["Title"]) AND isset($_POST["upc"]))
{
	$titre = htmlspecialchars($_POST["Title"]);
	$upc = htmlspecialchars($_POST["upc"]);
	$desc = htmlspecialchars($_POST["descPu"]);
	$descPer = htmlspecialchars($_POST["descPe"]);

	$checks = $bdd->query('SELECT upc_article FROM tbl_articles WHERE upc_article="' . $upc . '"');
	$check = $checks->fetch();
	if (!$check){
		if($titre != ""){
			$bdd->exec('INSERT INTO tbl_articles(upc_article,nom_article,desc_article) VALUES(' . $upc . ',"' . $titre . '","' . $desc .'")');
			$articles = $bdd->query('SELECT no_article FROM tbl_articles WHERE upc_article="' . $upc . '"');
			$noarticle = $articles->fetch();
			$bdd->exec('INSERT INTO tbl_descriptions(desc_desc,no_user,no_article) VALUES("' . $descPer . '",' . $_SESSION["id"] . ',' . $noarticle["no_article"] . ')');
			//header('Location: NouveauArticle.php');
			if (isset($_GET["liste"])){
				header('Location: ajoutArticleListe.php?liste=' . $liste . '&upc='. $upc . '&new=1');
			}
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

if (isset($_GET["liste"])) {
	$liste = $_GET["liste"];
	$noListe = $_GET["liste"];
	$Nomlistes = $bdd->query('SELECT titre_liste FROM tbl_listes WHERE no_liste ="' . $liste . '"');
		$Nomliste = $Nomlistes->fetch();
	$TitreListe = $Nomliste["titre_liste"];
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
		<form action="NouveauArticle.php<?php if (isset($_GET["liste"])) { echo '?liste='; echo htmlspecialchars($_GET["liste"]);} ?>" method="post" style="float:left">
		<div class="Center">
			<a class="Title"> Creation article dans " <?php echo $Nomliste["titre_liste"]; ?> "" </a>
			</div>
			<label for="Title">Titre :</label> <input type="text" placeholder="Nom du produit..." name="Title" autofocus/> <br>
			<label for="descPu">Description PUBLIC:</label> <textarea rows="4" placeholder="Description PUBLIC que tout le monde va voir..." cols="28" name="descPu"></textarea> <br>
		    <label for="descPe">Description PERSO:</label> <textarea rows="4" placeholder="Description PRIVÉE que vous seul peut voir..." cols="28" name="descPe"></textarea> <br>
		    <label for="upc">CODE :</label> <input type="text" placeholder="Les chiffres du code-barres" name="upc" value="<?php if (isset($_GET["upc"])) { echo htmlspecialchars($_GET["upc"]);} ?>"/> <br>
		    <!--<input name="addCreditCardNumber" size="20" maxlength="20">-->
		    <input type="submit" class="button2" value="Creer" />
		</form>
		</div>
	</body>
</html>