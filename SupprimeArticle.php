<?php
include("mysql.php"); 
if ($_SESSION["type"] < 3){
	if (isset($_GET["article"]))
	{
		$bdd->exec('DELETE FROM tbl_articles WHERE no_article ="' . $_GET["article"] . '"');
	}
	if (isset($_GET["order"]))
	{
		$order = true;
	}else{
		$order = false;
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
			<div class="Top2">
				<div class="Center">
					<p class="Title"> Suppression d'article: </p>		
					<a href="SupprimeArticle.php" target="Frame" class="button2">Ordre Création</a>
					<a href="SupprimeArticle.php?order=1" target="Frame" class="button2">Ordre Alpha.</a>
				</div>
			</div>
		<form action="SupprimeArticle.php" method="post">
				<div class="Center">
					<p class="Title"> Suppression d'articles </p>		
				</div>
				<br><br><br><br><br><br><br><br>
				<table><tr><th>#</th><th>UPC</th><th>NOM</th><th>DESCRIPTION</th></tr>
	<?php
	if ($order){
		$items = $bdd->query('SELECT * FROM tbl_articles ORDER BY nom_article');
	}else{
		$items = $bdd->query('SELECT * FROM tbl_articles');
	}
		while ($item = $items->fetch()) {
	?>
		<tr><td>
		<?php
		echo '<a href="SupprimeArticle.php?article='. $item["no_article"] .'" target="Frame" class="button3" style="width:90%;" >X</a>';
		?>
		</td><td>
		<?php
		echo $item["upc_article"];
		?>
		</td><td>
		<?php
		echo $item["nom_article"];
		?>
		</td><td>
		<?php
		echo $item["desc_article"];
		?>
		</td></tr>
		<?php
	}
	?>
	</table>
	</form>
	<br><br>
	</body>
	</html>
	<?php 
}else{
	header('Location: welcome.php');
	}
	?>
