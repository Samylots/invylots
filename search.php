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
$search = $_POST["search"];
?>
			<div class="Top2">
				<div class="Center">
					<p class="Title"> Recherche de: <?php echo $search; ?> </p>
					</div>
			</div>
			<br><br><br><br>
<?php
$items = $bdd->query('SELECT * FROM tbl_articles AS d INNER JOIN tbl_liste_articles AS b ON d.no_article = b.no_article INNER JOIN tbl_listes AS a ON a.no_liste = b.no_liste INNER JOIN tbl_lieux AS c ON a.no_lieu = c.no_lieu WHERE c.no_user ="' . $_SESSION["id"] . '" AND nom_article LIKE "%' . $search . '%"');
	$item = $items->fetch();
	if($item)
	{
		echo'<table><tr><tr><th>-</th><th>+</th><th>Articles</th><th>description</th><th>Quantitee</th><th>Place</th></tr>';
	}
	$items = $bdd->query('SELECT * FROM tbl_articles AS d INNER JOIN tbl_liste_articles AS b ON d.no_article = b.no_article INNER JOIN tbl_listes AS a ON a.no_liste = b.no_liste INNER JOIN tbl_lieux AS c ON a.no_lieu = c.no_lieu WHERE c.no_user ="' . $_SESSION["id"] . '" AND nom_article LIKE "%' . $search . '%"');
	while ($item = $items->fetch()) {
	?>
	<tr
		<?php 
			if ($item["qte_article"] == $item["qte_limit_article"])
			 {
			 	echo 'class="yellow"'; 
			 }
			 elseif  ($item["qte_article"] < $item["qte_limit_article"]){
			 	echo 'class="red"';
			 }
			 elseif  ($item["qte_article"] == 0){
			 	echo 'class="red"';
			 }
			 else{
			 	echo 'class="white"';
			 }
		?>
	><td>
	<?php
	echo '<a href="removeArticleListe.php?liste=' . $item["no_liste"] . '&upc='. $item["upc_article"] .'" target="Frame" class="button3" style="width:90%;">-</a>';
	?>
	</td><td>
	<?php
	echo '<a href="ajoutArticleListe.php?liste=' . $item["no_liste"] . '&upc='. $item["upc_article"] .'" target="Frame" class="button2" style="width:90%;">+</a>';
	?>
	</td><td>
	<?php
	echo $item["nom_article"];
	?>
	</td><td>
	<?php
	echo $item["desc_article"];
	?>
	</td><td>
	<?php
	echo $item["qte_article"];
	?>
	</td><td>
	<?php
	echo $item["titre_liste"];
	?>
	</td></tr>
	<?php
}
?>
</table>
<br>

<?php
$items = $bdd->query('SELECT * FROM tbl_restants AS d INNER JOIN tbl_liste_restants AS b ON d.no_restant = b.no_restant INNER JOIN tbl_listes AS a ON a.no_liste = b.no_liste INNER JOIN tbl_lieux AS c ON a.no_lieu = c.no_lieu WHERE c.no_user ="' . $_SESSION["id"] . '" AND nom_restant LIKE "%' . $search . '%"');
$item = $items->fetch();
if($item)
{
	echo'<table><tr><tr><th>-</th><th>+</th><th>Restants</th><th>description</th><th>Quantitee</th><th>Place</th></tr>';
}
$items = $bdd->query('SELECT * FROM tbl_restants AS d INNER JOIN tbl_liste_restants AS b ON d.no_restant = b.no_restant INNER JOIN tbl_listes AS a ON a.no_liste = b.no_liste INNER JOIN tbl_lieux AS c ON a.no_lieu = c.no_lieu WHERE c.no_user ="' . $_SESSION["id"] . '" AND nom_restant LIKE "%' . $search . '%"');
	while ($item = $items->fetch()) {
	?>
	<tr <?php 
			if ($item["qte_restant"] == 0)
			 {
			 	echo 'class="red"'; 
			 }
			 elseif ($item["qte_restant"] == 1) {
			 	echo 'class="yellow"';
			 }else{
			 	echo 'class="white"';
			 }
			?> ><td>
	<?php
	echo '<a href="removeArticleListe.php?liste=' . $item["no_liste"] . '&upc='. $item["code_restant"] .'" target="Frame" class="button3" style="width:90%;">-</a>';
	?>
	</td><td>
	<?php
	echo '<a href="ajoutArticleListe.php?liste=' . $item["no_liste"] . '&upc='. $item["code_restant"] .'" target="Frame" class="button2" style="width:90%;">+</a>';
	?>
	</td><td>
	<?php
	echo $item["nom_restant"];
	?>
	</td><td>
	<?php
	echo $item["desc_restant"];
	?>
	</td><td>
	<?php
	echo $item["qte_restant"];
	?>
	</td><td>
	<?php
	echo $item["titre_liste"];
	?>
	</td></tr>
	<?php
}
?>
</table>
</body>
</html>