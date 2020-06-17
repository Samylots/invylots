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
		<form action="listeEpicerie.php" method="post">
			<div class="Top2">
				<div class="Center">
					<p class="Title"> Liste d'épicerie: </p>
						<select name='lieu'>
						<?php
						$lieux = $bdd->query('SELECT no_lieu, titre_lieu FROM tbl_lieux WHERE no_user="' . $_SESSION["id"] . '"');
						while ($lieu = $lieux->fetch()) {
							echo '<option value="' . $lieu["no_lieu"] . '">' . $lieu["titre_lieu"] .'</option>';
						}
						?>
				     	<!-- <option selected>Milk</option>
				      	<option>Coffee</option>
				      	<option>Tea</option> -->
					    </select>
					    <input type="submit" class="button2" value="Charger">		
				</div>
			</div>
		</form>
		<br><br><br><br><br><br>

<?php

if (isset($_POST["lieu"]))
{
	$lieu = htmlspecialchars($_POST["lieu"]);
}

$listes = $bdd->query('SELECT no_liste, titre_liste FROM tbl_listes where no_lieu ="' . $lieu . '" ORDER BY titre_liste');
while ($liste = $listes->fetch()) {
?>
	<p class="Title"> <?php echo $liste["titre_liste"] ?> : </p>
			<table><tr><th>Nom</th><th>Qtee</th><th>Desc</th><th>Magasin</th><th>prix</th><th>g/ml</th></tr>
<?php
$items = $bdd->query('SELECT * FROM tbl_articles AS a INNER JOIN tbl_liste_articles AS b ON a.no_article = b.no_article WHERE no_liste ="' . $liste["no_liste"] . '" ORDER BY nom_article');//' LIMIT ' . $offset . "," . $items_per_page);
	while ($item = $items->fetch()) {
		$OtherItems = $bdd->query('SELECT * FROM tbl_liste_articles AS b INNER JOIN tbl_listes AS a ON a.no_liste = b.no_liste INNER JOIN tbl_lieux AS c ON a.no_lieu = c.no_lieu WHERE c.no_user ="' . $_SESSION["id"] . '" AND b.no_liste !="' . $liste["no_liste"] . '" AND no_article="' . $item["no_article"] . '"');
		$OtherItem = $OtherItems->fetch();
		if ($OtherItem){
			if ($OtherItem["qte_article"] < 1)
			{
				if ($item["qte_limit_article"] >= $item["qte_article"]){
				$magasinsPrix = $bdd->query('SELECT no_magasin, no_prix FROM tbl_prix_articles WHERE no_article="' . $item["no_article"] . '" ORDER BY date_prix DESC');
				$magasinP = $magasinsPrix->fetch();
				$magasins = $bdd->query('SELECT nom_magasin FROM tbl_magasins WHERE no_magasin ="' . $magasinP["no_magasin"] . '"');
				$magasin = $magasins->fetch();
				$Prices = $bdd->query('SELECT montant_prix, gramme_prix FROM tbl_prix WHERE no_prix ="' . $magasinP["no_prix"] . '"');
				$Price = $Prices->fetch();
			?>
			<tr
				<?php echo 'id="'; echo $item["upc_article"]; echo '"';
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
				><td name="nom">
			<?php
			echo $item["nom_article"];
			?>
			</td><td name="qte">
			<?php
			echo $item["qte_article"];
			?>
			</td><td name="desc">
			<?php
			echo $item["desc_article"];
			?>
			</td><td name="magasin">
			<?php
			echo $magasin["nom_magasin"];
			?>
			</td><td name="montant">
			<?php
			echo $Price["montant_prix"];
			?>
			</td><td name="prix">
			<?php
			echo $Price["gramme_prix"];
			?>
			</td></tr>
			<?php
				}
			}
		}
		else{
			if ($item["qte_limit_article"] >= $item["qte_article"]){
				$magasinsPrix = $bdd->query('SELECT no_magasin, no_prix FROM tbl_prix_articles WHERE no_article="' . $item["no_article"] . '" ORDER BY date_prix DESC');
				$magasinP = $magasinsPrix->fetch();
				$magasins = $bdd->query('SELECT nom_magasin FROM tbl_magasins WHERE no_magasin ="' . $magasinP["no_magasin"] . '"');
				$magasin = $magasins->fetch();
				$Prices = $bdd->query('SELECT montant_prix, gramme_prix FROM tbl_prix WHERE no_prix ="' . $magasinP["no_prix"] . '"');
				$Price = $Prices->fetch();
			?>
			<tr
				<?php echo 'id="'; echo $item["upc_article"]; echo '"';
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
			><td name="nom">
			<?php
			echo $item["nom_article"];
			?>
			</td><td name="qte">
			<?php
			echo $item["qte_article"];
			?>
			</td><td name="desc">
			<?php
			echo $item["desc_article"];
			?>
			</td><td name="magasin">
			<?php
			echo $magasin["nom_magasin"];
			?>
			</td><td name="montant">
			<?php
			echo $Price["montant_prix"];
			?>
			</td><td name="prix">
			<?php
			echo $Price["gramme_prix"];
			?>
			</td></tr>
			<?php
			}
		}
	}
?>
</table>
	<?php
}

?>
</body>
</html>