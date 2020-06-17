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
if (isset($_GET["recette"]) AND (isset($_POST["upc"]) OR isset($_GET["upc"])))
{
	$recette = $_GET["recette"];
	if (isset($_GET["upc"]))
	{
		$upc = $_GET["upc"];
	}else{
		$upc = $_POST["upc"];
	}
	if($upc != ""){
		$articles = $bdd->query('SELECT no_article, nom_article FROM tbl_articles WHERE upc_article ="' . $upc . '"');
		$article = $articles->fetch();
		if ($article)
		{
			$articleListes = $bdd->query('SELECT qte_article_recette FROM tbl_recette_articles WHERE no_recette ="' . $recette . '" AND no_article ="' . $article["no_article"] . '"');
			$articleListe = $articleListes->fetch();
			if (isset($_GET["add"]))
			{
				if ($articleListe)
				{
					$qte = intval($articleListe["qte_article_recette"]) + 1;
					$bdd->exec('UPDATE tbl_recette_articles SET qte_article_recette="' . $qte . '" WHERE no_recette ="' . $recette . '" AND no_article ="' . $article["no_article"] . '"');
				}
				else
				{
					$qte = 1;
					$bdd->exec('INSERT INTO tbl_recette_articles(no_article,no_recette,qte_article_recette) VALUES("' . $article["no_article"] . '","' . $recette . '", 1 )');
				}
			}
			elseif (isset($_GET["remove"])) {
				if ($articleListe)
				{
					$qte = intval($articleListe["qte_article_recette"]) - 1;
					if ($qte < 0)
					{
						$qte =0;
					}
					$bdd->exec('UPDATE tbl_recette_articles SET qte_article_recette="' . $qte . '" WHERE no_recette ="' . $recette . '" AND no_article ="' . $article["no_article"] . '"');
				}
			}
		}
		else
		{
			echo '<div class="Center"> <a class="Title"> L\'article n\'existe pas dans la base. Pour pouvoir l\'ajouter veuillez vous abonner!</a></div>' ;
		}
	}
}
if (isset($_GET["recette"])) {
	$recette = $_GET["recette"];
	$NomRecettes = $bdd->query('SELECT titre_recette FROM tbl_recettes WHERE no_recette ="' . $recette . '"');
		$NomRecette = $NomRecettes->fetch();
	$TitreRecette = $NomRecette["titre_recette"];
}

?>

		<div class="inscription">
			<form action="AjoutArticleRecettes.php?recette=<?php echo $_GET["recette"]; ?>&add=1" method="post" style="float:left">
				<div class="Center">
					<a class="Title"> Ajout d'articles dans la recette " <?php echo $TitreRecette; ?> " </a>
				</div>
				<label for="upc">CODE :</label> <input type="text" name="upc" autofocus /> <br>
			    <input type="submit" class="button2" value="Ajouter" />
			    <a href="recette.php?recette=<?php echo $recette ;?>" target="Frame" style="width:100%" class="button2">Terminer</a>
			</form>
		</div>

<table><tr><th>-</th><th>+</th><th>Articles</th><th>Lieu</th><th>Disponible</th><th>Requis</th><th>X</th></tr>
<?php
$items = $bdd->query('SELECT tbl_liste_articles.no_article, upc_article, nom_article, titre_liste, qte_article, qte_article_recette
						FROM (((tbl_recette_articles
						    INNER JOIN tbl_articles
						        ON tbl_articles.no_article = tbl_recette_articles.no_article)
						    LEFT JOIN tbl_liste_articles
						        ON tbl_liste_articles.no_article = tbl_articles.no_article)
						    LEFT JOIN tbl_listes
						        ON tbl_listes.no_liste = tbl_liste_articles.no_liste) WHERE tbl_recette_articles.no_recette = "' . $recette . '" GROUP BY upc_article ORDER BY titre_liste');
	while ($item = $items->fetch()) {
	?>
	<tr <?php 
			if ($item["qte_article_recette"] > $item["qte_article"])
			 {
			 	echo 'style="background-color: red;"'; 
			 }
			 elseif ($item["qte_article_recette"] == $item["qte_article"]) {
			 	echo 'style="background-color: yellow;"';
			 }
			?> >
	<td>
	<?php
	echo '<a href="AjoutArticleRecettes.php?recette=' . $recette . '&upc='. $item["upc_article"] .'&remove=1" target="Frame" style="width:90%" class="button3">-</a>';
	?>
	</td>
	<td>
	<?php
	echo '<a href="AjoutArticleRecettes.php?recette=' . $recette . '&upc='. $item["upc_article"] .'&add=1" target="Frame" style="width:90%" class="button2">+</a>';
	?>
	</td><td>
	<?php
	echo $item["nom_article"];
	?>
	</td><td>
	<?php
	echo $item["titre_liste"];
	?>
	</td><td>
	<?php
	echo $item["qte_article"];
	?>
	</td><td>
	<?php
	echo $item["qte_article_recette"];
	?>
	</td><td>
	<?php
	echo '<a href="DeleteArticleRecettes.php?recette=' . $recette . '&article='. $item["no_article"] .'" target="Frame" style="width:90%" class="button3">X</a>';
	?>
	</td></tr>
	<?php
	}
//}
?>
</table>

	</body>
</html>