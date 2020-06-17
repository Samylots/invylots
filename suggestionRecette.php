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

if(!empty($_GET['share'])) {
    $share = filter_input(INPUT_GET, 'share', FILTER_VALIDATE_INT);
    if(false === $share) {
        header('Location: welcome.php');
    }
	?>
	<br><br>
	<table>
		<tr><th>#</th><th>Titre</th><th>Description</th><th>Créateur</th></tr>
		<?php
			$Recettes = $bdd->query('SELECT * FROM tbl_recettes WHERE share_recette ='. $share .' ORDER BY titre_recette , date_recette');
			while ($recette = $Recettes->fetch()) {
		?>
		<tr>
			<td>
				<?php
					echo '<a href="recette.php?recette=' . $recette["no_recette"] . '" target="Frame" class="button2"> Voir </a>';
				?>
			</td>
			<td>
				<?php
					echo $recette["titre_recette"];
				?>
			</td>
			<td>
				<?php
					echo $recette["desc_recette"];
				?>
			</td>
			<td>
				<?php
				$users = $bdd->query('SELECT username_user FROM tbl_users WHERE no_user="' .$recette["no_user"]. '"');
				$user= $users->fetch();
					echo $user["username_user"];
				?>
			</td>
		</tr>
<?php
}
?>
	</table>
<?php
}
else{
	?>
	<br><br>
	<table>
		<tr><th>#</th><th>Titre</th><th>Description</th><th>Créateur</th></tr>
		<?php
			$Recettes = $bdd->query('SELECT * FROM tbl_recettes WHERE no_user ="'. $_SESSION["id"] .'" ORDER BY titre_recette');
			while ($recette = $Recettes->fetch()) {
				$dispo = true;
				$items = $bdd->query('SELECT nom_article, titre_liste, qte_article, qte_article_recette
									FROM tbl_recette_articles
									    INNER JOIN tbl_articles
									        ON tbl_articles.no_article = tbl_recette_articles.no_article
									    LEFT JOIN tbl_liste_articles
									        ON tbl_liste_articles.no_article = tbl_articles.no_article
									    LEFT JOIN tbl_listes
									        ON tbl_listes.no_liste = tbl_liste_articles.no_liste WHERE no_recette ="' . $recette["no_recette"] . '"');
				while ($item = $items->fetch()) {
					if ($item["qte_article_recette"] > $item["qte_article"])
					{
						$dispo	= false;
					}
				}
			if ($dispo){
		?>
		<tr>
			<td>
				<?php
					echo '<a href="recette.php?recette=' . $recette["no_recette"] . '" target="Frame" style="width:90%" class="button2"> Voir </a>';
				?>
			</td>
			<td>
				<?php
					echo $recette["titre_recette"];
				?>
			</td>
			<td>
				<?php
					echo $recette["desc_recette"];
				?>
			</td>
			<td>
				<?php
				$users = $bdd->query('SELECT username_user FROM tbl_users WHERE no_user="' .$recette["no_user"]. '"');
				$user= $users->fetch();
					echo $user["username_user"];
				?>
			</td>
		</tr>
<?php
}
}
?>
	</table>
<?php
}
?>
</body>
</html>