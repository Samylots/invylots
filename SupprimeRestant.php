<?php
include("mysql.php"); 

if (isset($_POST["article"]))
{
	$bdd->exec('DELETE FROM tbl_restants WHERE no_restant ="' . $_POST["article"] . '"');
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
	<form action="SupprimeRestant.php" method="post">
			<div class="Top2">
				<div class="Center">
					<p class="Title"> Suppression d'articles </p>		
					<input type="submit" value="Supprimer restant" class="button3"/>		
				</div>
			</div>
			<br><br><br><br><br><br>
			<table><tr><th>#</th><th>UPC</th><th>NOM</th><th>DESCRIPTION</th></tr>
<?php
	$items = $bdd->query('SELECT * FROM tbl_restants');
	while ($item = $items->fetch()) {
?>
	<tr><td>
	<?php
	echo '<input class="check" type="radio" name="article" value="' . $item["no_article"] . '" />';
	?>
	</td><td>
	<?php
	echo $item["code_restant"];
	?>
	</td><td>
	<?php
	echo $item["nom_restant"];
	?>
	</td><td>
	<?php
	echo $item["desc_restant"];
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