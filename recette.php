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

if(!empty($_GET['done'])) {
	$noArticle = filter_input(INPUT_GET, 'recette', FILTER_VALIDATE_INT);
    if(false === $noArticle) {
        header('Location: welcome.php');
    }
    ?>
    	<div class="Top2">
			<div class="Center">
				<p class="Title"> Recettes </p>	
				<a href="AjoutArticleRecettes.php?recette=<?php echo $noArticle; ?>" target="Frame" class="button2">Modifier Recette</a>
				<a href="recette.php?recette=<?php echo $noArticle; ?>&done=1" target="Frame" class="button2">Faire Recette</a>
				<a href="deleteRecette.php?recette= <?php echo $noArticle; ?>" target="_top" style="float:right;" class="button3">Supprimer recette</a>
			</div>
		</div>
    	<br><br><br><br><br>
		<table><tr><th>Articles</th><th>Lieu</th><th>Disponible</th><th>Requis</th></tr>
		<?php
		$bdd->exec('UPDATE tbl_recettes SET date_recette= NOW() WHERE no_recette ="' . $noArticle . '" AND no_user ="' . $_SESSION["id"] . '"');
		$items = $bdd->query('SELECT tbl_liste_articles.no_article, upc_article, nom_article, titre_liste, qte_article, qte_article_recette
						FROM (((tbl_recette_articles
						    INNER JOIN tbl_articles
						        ON tbl_articles.no_article = tbl_recette_articles.no_article)
						    LEFT JOIN tbl_liste_articles
						        ON tbl_liste_articles.no_article = tbl_articles.no_article)
						    LEFT JOIN tbl_listes
						        ON tbl_listes.no_liste = tbl_liste_articles.no_liste) WHERE tbl_recette_articles.no_recette = "' . $recette . '" GROUP BY upc_article ORDER BY titre_liste');
			while ($item = $items->fetch()) {
				$requis = $item["qte_article_recette"];
				$upc = $item["upc_article"];
				$liste = $item["no_liste"];
				for ($i=0; $i < $requis ; $i++) { 
					$articles = $bdd->query('SELECT no_article, nom_article FROM tbl_articles WHERE upc_article ="' . $upc . '"');
					$article = $articles->fetch();
					if ($article)
					{
						$articleListes = $bdd->query('SELECT qte_article FROM tbl_liste_articles WHERE no_liste ="' . $liste . '" AND no_article ="' . $article["no_article"] . '"');
						$articleListe = $articleListes->fetch();
						if ($articleListe)
						{
							$qte = intval($articleListe["qte_article"]) - 1;
							if( $qte < 0)
							{
								$qte = 0;
							}
							$bdd->exec('UPDATE tbl_liste_articles SET qte_article="' . $qte . '" WHERE no_liste ="' . $liste . '" AND no_article ="' . $article["no_article"] . '"');
						}
						//echo '<div class="Center"> <a style="color:blue;" class="Title"> Vous avez maintenant: « <font color="red"> '. $qte . ' </font> » de « <font color="red"> ' . $article["nom_article"] . ' </font> » !</a></div>';
						//header('Location: liste.php?liste=' . $liste);
					}
				}

			}
		?>
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
			<tr 
			<?php 
			if ($item["qte_article_recette"] > $item["qte_article"])
			 {
			 	echo 'style="background-color: red;"'; 
			 }
			 elseif ($item["qte_article_recette"] == $item["qte_article"]) {
			 	echo 'style="background-color: yellow;"';
			 }
			?> ><td>
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
			</td></tr>
			<?php
			}
		?>
		</table>
			</body>
		</html>
<?php
}

elseif(!empty($_GET['recette'])AND empty($_GET['done']) ) {
    $noArticle = filter_input(INPUT_GET, 'recette', FILTER_VALIDATE_INT);
    if(false === $noArticle) {
        header('Location: welcome.php');
    }
    ?>
	    <div class="Top2">
			<div class="Center">
				<p class="Title"> Recettes </p>	
				<a href="AjoutArticleRecettes.php?recette=<?php echo $noArticle; ?>" target="Frame" class="button2">Modifier Recette</a>
				<a href="recette.php?recette=<?php echo $noArticle; ?>&done=1" target="Frame" class="button2">Faire Recette</a>
				<a href="deleteRecette.php?recette= <?php echo $noArticle; ?>" target="_top" style="float:right;" class="button3">Supprimer recette</a>
			</div>
		</div>
		<br><br><br><br><br><br>
		<table><tr><th>Articles</th><th>Lieu</th><th>Disponible</th><th>Requis</th></tr>
		<?php
		$items = $bdd->query('SELECT tbl_liste_articles.no_article, upc_article, nom_article, titre_liste, qte_article, qte_article_recette
						FROM (((tbl_recette_articles
						    INNER JOIN tbl_articles
						        ON tbl_articles.no_article = tbl_recette_articles.no_article)
						    LEFT JOIN tbl_liste_articles
						        ON tbl_liste_articles.no_article = tbl_articles.no_article)
						    LEFT JOIN tbl_listes
						        ON tbl_listes.no_liste = tbl_liste_articles.no_liste) WHERE tbl_recette_articles.no_recette = "' . $noArticle . '" GROUP BY upc_article ORDER BY titre_liste');
			while ($item = $items->fetch()) {
			?>
			<tr 
			<?php 
			if ($item["qte_article_recette"] > $item["qte_article"])
			 {
			 	echo 'style="background-color: red;"'; 
			 }
			 elseif ($item["qte_article_recette"] == $item["qte_article"]) {
			 	echo 'style="background-color: yellow;"';
			 }
			?> ><td>
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
			</td></tr>
			<?php
			}
		?>
		</table>
			</body>
		</html>
<?php
}
else
{
?>
			<div class="Top2">
				<div class="Center">
					<p class="Title"> Recettes </p>	
					<a href="creationCategorie.php" target="Frame2" class="button2">Créer Catégorie</a>
					<a href="NouveauRecette.php" target="Frame2" class="button2">Créer Recette</a>
					<a href="verifyRecette.php" target="Frame2" class="button2">Verifier Recette</a>
					<a href="suggestionRecette.php?share=0" target="Frame2" class="button2">Suggestions</a>
					<a href="suggestionRecette.php?share=1" target="Frame2" class="button2">Publiques</a>			
				</div>
			</div>
			<br><br><br><br><br><br>
			<iframe class="frame2" name="Frame2" src="" frameborder="0" width="100%">
			  <p>Your browser does not support iframes.</p>
			</iframe>
			

</body>
</html>
	<?php
}

?>