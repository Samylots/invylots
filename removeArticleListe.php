<?php 
include("mysql.php"); 
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
if (isset($_GET["liste"])) {
	$liste = $_GET["liste"];
	$noListe = $_GET["liste"];
	$Nomlistes = $bdd->query('SELECT titre_liste FROM tbl_listes WHERE no_liste ="' . $liste . '"');
		$Nomliste = $Nomlistes->fetch();
	$TitreListe = $Nomliste["titre_liste"];
}

$listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes where no_liste ="' . $noListe . '"');
$tempoliste = $listes->fetch();

?>
		<?php
			include("TopBar2.php"); 
		?>

<?php
if (isset($_GET["liste"]) AND isset($_POST["upc"]))
{
	$liste = $_GET["liste"];
	$upc = $_POST["upc"];
	if($upc != ""){
		$articles = $bdd->query('SELECT no_article, nom_article FROM tbl_articles WHERE upc_article ="' . $upc . '"');
		$article = $articles->fetch();
		if ($article)
		{
			$articleListes = $bdd->query('SELECT qte_article FROM tbl_liste_articles WHERE no_liste ="' . $liste . '" AND no_article ="' . $article["no_article"] . '"');
			$articleListe = $articleListes->fetch();
			if ($articleListe)
			{
				$qte = intval($articleListe["qte_article"]) - 1;
				if ($qte < 0)
				{
					$qte =0;
				}
				$bdd->exec('UPDATE tbl_liste_articles SET qte_article="' . $qte . '", date_liste_article = NOW() WHERE no_liste ="' . $liste . '" AND no_article ="' . $article["no_article"] . '"');
			}
			echo '<div class="Center"> <a style="color:blue;" class="Title"> Vous avez maintenant: « <font color="red"> '. $qte . ' </font> » de « <font color="red"> ' . $article["nom_article"] . ' </font> » !</a></div>';
		}
		else
		{
			echo '<div class="Center"> <a class="Title"> L\'article n\'existe pas dans la base. Pour pouvoir l\'ajouter veuillez vous abonner!</a></div>' ;
		}
	}
}elseif (isset($_GET["liste"]) AND isset($_GET["upc"]))
{
	$liste = $_GET["liste"];
	$upc = $_GET["upc"];
	if($upc != ""){
		$articles = $bdd->query('SELECT no_article, nom_article FROM tbl_articles WHERE upc_article ="' . $upc . '"');
		$article = $articles->fetch();
		if ($article)
		{
			$articleListes = $bdd->query('SELECT qte_article FROM tbl_liste_articles WHERE no_liste ="' . $liste . '" AND no_article ="' . $article["no_article"] . '"');
			$articleListe = $articleListes->fetch();
			if ($articleListe)
			{
				$qte = intval($articleListe["qte_article"]) - 1;
				if ($qte < 0)
					{
						$qte =0;
					}
				$bdd->exec('UPDATE tbl_liste_articles SET qte_article="' . $qte . '", date_liste_article = NOW() WHERE no_liste ="' . $liste . '" AND no_article ="' . $article["no_article"] . '"');
			}
			//echo '<div class="Center"> <a style="color:blue;" class="Title"> Vous avez maintenant: « <font color="red"> '. $qte . ' </font> » de « <font color="red"> ' . $article["nom_article"] . ' </font> » !</a></div>';
			header('Location: liste.php?liste=' . $liste. '#'. $upc);
		}
		else
		{
			$articles = $bdd->query('SELECT no_restant, nom_restant FROM tbl_restants WHERE code_restant ="' . $upc . '"');
			$article = $articles->fetch();
			if ($article)
			{
				$articleListes = $bdd->query('SELECT qte_restant FROM tbl_liste_restants WHERE no_liste ="' . $liste . '" AND no_restant ="' . $article["no_restant"] . '"');
				$articleListe = $articleListes->fetch();
				if ($articleListe)
				{
					$qte = intval($articleListe["qte_restant"]) - 1;
					if ($qte < 0)
					{
						$qte =0;
					}
					$bdd->exec('UPDATE tbl_liste_restants SET qte_restant="' . $qte . '" WHERE no_liste ="' . $liste . '" AND no_restant ="' . $article["no_restant"] . '"');
				}
				//echo '<div class="Center"> <a style="color:blue;" class="Title"> Vous avez maintenant: « <font color="red"> '. $qte . ' </font> » de « <font color="red"> ' . $article["nom_article"] . ' </font> » !</a></div>';
				header('Location: liste.php?liste=' . $liste. '#'. $upc);
			}
			else
			{
				echo '<div class="Center"> <a class="Title"> L\'article n\'existe pas dans la base. Pour pouvoir l\'ajouter veuillez vous abonner!</a></div>' ;
			}
		}
	}
}
?>
	<div class="inscription">
		<form action="removeArticleListe.php?liste=<?php echo $_GET["liste"]; ?>" method="post" style="float:left">
			<div class="Center">
				<a class="Title"> Retirement d'articles dans la liste " <?php echo $Nomliste["titre_liste"]; ?> " </a>
			</div>
			<label for="upc">CODE :</label> <input type="text" name="upc" autofocus /> <br>
		    <input type="submit" class="button2" value="Retirer" />
		</form>
		</div>
	</body>
</html>