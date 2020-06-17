<?php
include("mysql.php"); 
$page = 1;
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
<?php
// determine page number from $_GET
if(!empty($_GET['liste'])) {
    $noListe = filter_input(INPUT_GET, 'liste', FILTER_VALIDATE_INT);
    if(false === $noListe) {
        header('Location: creationListe.php');
    }
}
if(!empty($_GET['page'])) {
    $page = filter_input(INPUT_GET, 'page', FILTER_VALIDATE_INT);
    if(false === $page) {
        $page = 1;
    }
}

if(!empty($_GET['article'])) {
    $noArticle = filter_input(INPUT_GET, 'article', FILTER_VALIDATE_INT);
    if(false === $noArticle) {
        header('Location: liste.php?liste=' . $noListe);
    }
    $articletitles = $bdd->query('SELECT no_article, nom_article FROM tbl_articles WHERE no_article="' . $noArticle . '"');
						$articlename = $articletitles->fetch();
						$descPs = $bdd->query('SELECT no_desc, desc_desc FROM tbl_descriptions WHERE no_article="' . $articlename["no_article"] . '" AND no_user="' . $_SESSION["id"] .'"');
				    $descP = $descPs->fetch();
    $listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes where no_liste ="' . $noListe . '"');
$tempoliste = $listes->fetch();

?>
    	<div class="inscription">
				<form action="modifyArticle.php?article=<?php echo $noArticle; ?>&liste=<?php echo $noListe; ?>&desc=<?php echo $descP["no_desc"]; ?>" method="post" style="float:left">
					<?php 
					echo '<div class="Center"><a class="Title">' . $articlename["nom_article"] .'  </a></div>'; ?>
					<label for="choix">Magasin :</label> <select name="choix">
					<?php
						$lieux = $bdd->query('SELECT no_magasin, nom_magasin FROM tbl_magasins ORDER BY nom_magasin');
						while ($lieu = $lieux->fetch()) 
						{
							echo '<option value="' . $lieu["no_magasin"] . '">' . $lieu["nom_magasin"] . '</option>';
						}
						$lieux->closeCursor();
						$item = $bdd->query('SELECT no_prix FROM tbl_prix_articles WHERE no_article="' . $noArticle . '"');
						$noPrix = $item->fetch();
						$item2 = $bdd->query('SELECT * FROM tbl_prix WHERE no_prix="' . $noPrix["no_prix"] . '"');
						$prix = $item2->fetch();
					echo '</select><br>';
				    echo '<label for="prix">Prix :</label> <input type="number" name="prix" placeholder="Nouveau prix" value="'. $prix["montant_prix"] . '" autofocus /> <br>';
				    echo '<label for="poid">Grammes/ml :</label> <input type="number" name="poid" placeholder="gramme ou ml pour ce prix" value="'. $prix["gramme_prix"] . '" /> <br>';

				    $alerts = $bdd->query('SELECT * FROM tbl_liste_articles WHERE no_liste="' . $noListe . '" AND no_article ="'. $noArticle .'"');
				    $alert = $alerts->fetch();
				    echo '<label for="alerte">Alerte :</label> <input type="number" name="alerte" placeholder="Quantitée minimum pour liste épicerie" value="'. $alert["qte_limit_article"] . '" /> <br>';
				    
				    echo '<label for="descPerso">Description PERSO :</label> <textarea rows="4" cols="28" placeholder="Description personalisée" name="descPerso">' . $descP["desc_desc"] . '</textarea> <br>';
				    ?>
				    <input type="submit" class="button2" value="Modifier" />
					<a href="deleteArticle.php?article= <?php echo $noArticle; ?>&liste= <?php echo $noListe; ?>" target="Frame" class="button3">supprimer l'article</a>
				</form>
				</div>
			</body>
		</html>
<?php
}
elseif(!empty($_GET['restant'])) {
    $noArticle = $_GET['restant'];
    if(false === $noArticle) {
        header('Location: liste.php?liste=' . $noListe);
    }
    $items = $bdd->query('SELECT *, DAY(date_liste_restant) as jour, MONTH(date_liste_restant) as mois, YEAR(date_liste_restant) as annee FROM tbl_restants AS a INNER JOIN tbl_liste_restants AS b ON a.no_restant = b.no_restant WHERE no_liste ="' . $noListe . '" AND code_restant="' . $noArticle . '"');
	$item = $items->fetch();

    $listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes where no_liste ="' . $noListe . '"');
$tempoliste = $listes->fetch();

?>
    	<div class="inscription">
				<form action="modifyArticle.php?restant=<?php echo $noArticle; ?>&liste=<?php echo $noListe; ?>" method="post" style="float:left">
					<div class="inscription">
						<div class="Center"><a class="Title"> Modification de Restant </a></div>
						<label for="Title">Titre :</label> <input type="text" value="<?php echo $item["nom_restant"]; ?>" name="Title" autofocus/> <br>
						<label for="upc">CODE :</label> <label><font color="yellow"><?php echo $item["code_restant"]; ?></font></label> <br>
	    				<label for="desc">Description :</label> <textarea rows="4" cols="28" name="desc" placeholder="Description..."><?php echo $item["desc_restant"]; ?></textarea>  <br>
	    				<label for="Jour">Jour:</label>
	    				<select name='Jour'>
						<?php
						$cpt = 1;
						while ($cpt <= 31) {
							echo '<option value="' . $cpt . '"';
							if ( $cpt == $item["jour"]){
								echo 'selected';
							}
							echo '>' . $cpt .'</option>';
							$cpt++;
						}
						?>
					    </select><br>
					    <label for="Mois">Mois:</label>
	    				<select name='Mois'>
						<option value="1"
						<?php
						if ( 1 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Janvier</option>
						<option value="2"
						<?php
						if ( 2 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Février</option>
						<option value="3"
						<?php
						if ( 3 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Mars</option>
						<option value="4"
						<?php
						if ( 4 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Avril</option>
						<option value="5"
						<?php
						if ( 5 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Mai</option>
						<option value="6"
						<?php
						if ( 6 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Juin</option>
						<option value="7"
						<?php
						if ( 7 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Juillet</option>
						<option value="8"
						<?php
						if ( 8 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Août</option>
						<option value="9"
						<?php
						if ( 9 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Septembre</option>
						<option value="10"
						<?php
						if ( 10 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Octobre</option>
						<option value="11"
						<?php
						if ( 11 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Nomvembre</option>
						<option value="12"
						<?php
						if ( 12 == $item["mois"]){
								echo 'selected';
							}
						?>
						>Décembre</option>
					    </select><br>
					    <label for="Annee">Année:</label>
	    				<select name='Annee'>
						<?php
						$cpt = date("Y")-2;
						while ($cpt <= date("Y")) {
							echo '<option value="' . $cpt . '"';
							if ( $cpt == $item["annee"]){
								echo 'selected';
							}
							echo '>' . $cpt .'</option>';
							$cpt++;
						}
						?>
					    </select><br>

	    				<input type="submit" class="button2" value="Modifier" />
						<a href="deleteArticle.php?restant= <?php echo $noArticle; ?>&liste= <?php echo $noListe; ?>" target="Frame" class="button3">supprimer le restant</a>
					</div>
				</form>
				</div>
			</body>
		</html>
<?php
}elseif(!empty($_GET['move'])) {
    $noArticle = $_GET['move'];
    if(false === $noArticle) {
        header('Location: liste.php?liste=' . $noListe);
    }
    $items = $bdd->query('SELECT * FROM tbl_articles AS a INNER JOIN tbl_liste_articles AS b ON a.no_article = b.no_article WHERE no_liste ="' . $noListe . '" AND upc_article="' . $noArticle . '"');
	$item = $items->fetch();

    $listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes where no_liste ="' . $noListe . '"');
$tempoliste = $listes->fetch();

?>
    	<div class="inscription">
				<form action="MoveArticles.php?article=<?php echo $noArticle; ?>&liste=<?php echo $noListe; ?>" method="post" style="float:left">
					<div class="inscription">
						<div class="Center"><a class="Title"> Déplacement de l'article : <?php echo $item["nom_article"]; ?>  </a></div>
						<label for="Nombre">Combien :</label>
						<select name='Nombre'>
						<?php
						$cpt = 1;
						while ($cpt <= $item["qte_article"]) {
							echo '<option value="' . $cpt . '">' . $cpt .'</option>';
							$cpt++;
						}
						?>
					    </select>
					    <label for="lieu">Vers :</label>
						<select name='lieu'>
						<?php
						$lieux = $bdd->query('SELECT * FROM tbl_listes AS a INNER JOIN tbl_lieux AS b ON a.no_lieu = b.no_lieu WHERE no_liste !="'. $noListe .'" AND b.no_user = "' . $_SESSION["id"] . '"');
						while ($lieu = $lieux->fetch()) {
							echo '<option value="' . $lieu["no_liste"] . '">' . $lieu["titre_liste"] .'</option>';
						}
						?>
					    </select>
						<input type="submit" class="button2" value="Déplacer" />
					</div>
				</form>
				</div>
			</body>
		</html>
<?php
}
else
{
// set the number of items to display per page
$items_per_page = 10000;

// build query
$offset = ($page - 1) * $items_per_page;

$listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes where no_liste ="' . $noListe . '"');
$tempoliste = $listes->fetch();
?>
	<form action="liste.php?liste=<?php echo $noListe; ?>" method="post">
<?php
//for ($i=0; $i < 20; $i++) { 
$items = $bdd->query('SELECT * FROM tbl_articles AS a INNER JOIN tbl_liste_articles AS b ON a.no_article = b.no_article WHERE no_liste ="' . $noListe . '" LIMIT ' . $offset . "," . $items_per_page);
	$item = $items->fetch();
	if($item)
	{
		echo'<table><tr><th>-</th><th>+</th><th>Articles</th><th>desc / perso</th><th >Qtee</th><th >Date</th><th >Modif</th><th >-></th><th >X</th></tr>';
	}
	$items = $bdd->query('SELECT *, MONTHNAME(date_liste_article) as mois, DAY(date_liste_article) as jour FROM tbl_articles AS a INNER JOIN tbl_liste_articles AS b ON a.no_article = b.no_article WHERE no_liste ="' . $noListe . '" ORDER BY nom_article');// LIMIT ' . $offset . "," . $items_per_page);
	while ($item = $items->fetch()) {
		$NbArticles = $bdd->query('SELECT qte_article FROM tbl_liste_articles AS b INNER JOIN tbl_listes AS a ON a.no_liste = b.no_liste INNER JOIN tbl_lieux AS c ON a.no_lieu = c.no_lieu WHERE c.no_user ="' . $_SESSION["id"] . '" AND no_article="' . $item["no_article"] . '"');
		$NbTotalArticle = 0;
		while ($NbArticle = $NbArticles->fetch()){
			$NbTotalArticle += $NbArticle["qte_article"];
		};
		$descs = $bdd->query('SELECT desc_desc FROM tbl_descriptions WHERE no_article="' . $item["no_article"] . '" AND no_user="' . $_SESSION["id"] . '"');
		$desc = $descs->fetch();
	?>
	<tr <?php echo 'id="'; echo $item["upc_article"]; echo '"';
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
	echo '<a href="removeArticleListe.php?liste=' . $noListe . '&upc='. $item["upc_article"] .'" target="Frame" class="button3 icons" style="min-width:25px;width:90%;"><img src="icon/artiel_moins.png" alt="-" title="Enlever un exemplaire" /></a>';
	?>
	</td><td>
	<?php
	echo '<a href="ajoutArticleListe.php?liste=' . $noListe . '&upc='. $item["upc_article"] .'" target="Frame" class="button2 icons" style="min-width:25px;width:90%;"><img src="icon/article_new.png" alt="+" title="Ajouter un exemplaire" /></a>';
	?>
	</td><td>
	<?php
	echo $item["nom_article"];
	?>
	</td><td>
	<?php
	echo $item["desc_article"];
	?>
	<br>
	<?php
	echo $desc["desc_desc"];
	?>
	</td><td>
	<?php
	echo $item["qte_article"];
	echo '/';
	echo $NbTotalArticle;
	?>
	</td><td>
	<?php
	if ( $item["jour"] != "" and $item["mois"] != ""){
		echo $item["jour"];
		echo " ";
		echo $item["mois"];
	}else{
		echo "?? ???";
	}
	?>
	</td><td>
	<?php
	echo '<a href="liste.php?liste=' . $noListe . '&article='. $item["no_article"] .'" target="Frame" class="button2 icons" style="min-width:25px;width:90%;" ><img src="icon/edit.png" alt="~" title="Modifier" /></a>';
	?>
	</td><td>
	<?php
	echo '<a href="liste.php?liste=' . $noListe . '&move='. $item["upc_article"] .'" target="Frame" class="button2 icons" style="min-width:25px;width:90%;" ><img src="icon/move.png" alt="->" title="Déplacer des exemplaires" /></a>';
	?>
	</td><td>
	<?php
	echo '<a href="deleteArticle.php?liste=' . $noListe . '&article='. $item["no_article"] .'" target="Frame" class="button3 icons" onclick="return confirm(\'Êtes-vous sur de vouloir supprimer '. $item["nom_article"] .'?\')" style="min-width:25px;width:90%;" ><img src="icon/article_dell.png" alt="X" title="Supprimer l\'article de l\'emplacement" /></a>';
	?>
	</td></tr>
	<?php
}
//}
?>
</table>
<br>

<?php
$items = $bdd->query('SELECT * FROM tbl_restants AS a INNER JOIN tbl_liste_restants AS b ON a.no_restant = b.no_restant WHERE no_liste ="' . $noListe . '"');
$item = $items->fetch();
if($item)
{
	echo'<table >
	<tr><th >-</th><th >+</th><th >Restants</th><th >Desc.</th><th >Qtee</th><th >Date</th><th >Modif</th><th >-></th><th >X</th></tr>';
}
$items = $bdd->query('SELECT *, YEAR(date_liste_restant) as annee , MONTH(date_liste_restant) as mois, DAY(date_liste_restant) as jour FROM tbl_restants AS a INNER JOIN tbl_liste_restants AS b ON a.no_restant = b.no_restant WHERE no_liste ="' . $noListe . '" ORDER BY nom_restant');
	while ($item = $items->fetch()) {
		$NbArticles = $bdd->query('SELECT * FROM tbl_liste_restants AS b INNER JOIN tbl_listes AS a ON a.no_liste = b.no_liste INNER JOIN tbl_lieux AS c ON a.no_lieu = c.no_lieu WHERE c.no_user ="' . $_SESSION["id"] . '" AND b.no_restant="' . $item["no_restant"] . '"');
		$NbTotalArticle = 0;
		while ($NbArticle = $NbArticles->fetch()){
			$NbTotalArticle += $NbArticle["qte_restant"];
		};
	?>
	<tr <?php 
			echo 'id="';
			echo $item["code_restant"]; 
			echo '"';
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
	echo '<a href="removeArticleListe.php?liste=' . $noListe . '&upc='. $item["code_restant"] .'" target="Frame" class="button3 icons" style="min-width:25px;width:90%;"><img src="icon/restant_moins.png" alt="-" title="Enlever un exemplaire" /></a>';
	?>
	</td><td>
	<?php
	echo '<a href="ajoutArticleListe.php?liste=' . $noListe . '&upc='. $item["code_restant"] .'" target="Frame" class="button2 icons" style="min-width:25px;width:90%;"><img src="icon/restant_new.png" alt="+" title="Ajouter un exemplaire" /></a>';
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
	echo '/';
	echo $NbTotalArticle;
	?>
	</td><td>
	<?php
	if ( $item["jour"] != "" and $item["mois"] != ""){
		echo $item["jour"];
		echo "-";
		echo $item["mois"];
		echo " ";
		echo $item["annee"];
	}else{
		echo "?? ???";
	}
	?>
	</td><td>
	<?php
	echo '<a href="liste.php?liste=' . $noListe . '&restant='. $item["code_restant"] .'" target="Frame" class="button2 icons" style="min-width:25px;width:90%;" ><img src="icon/edit.png" alt="~" title="Modifier" /></a>';
	?>
	</td><td>
	<?php
	echo '<a href="liste.php?liste=' . $noListe . '&move='. $item["code_restant"] .'" target="Frame" class="button2 icons" style="min-width:25px;width:90%;" ><img src="icon/move.png" alt="->" title="Déplacer des exemplaires" /></a>';
	?>
	</td><td>
	<?php
	echo '<a href="deleteArticle.php?liste=' . $noListe . '&restant='. $item["no_restant"] .'" target="Frame" class="button3 icons" onclick="return confirm(\'Êtes-vous sur de vouloir supprimer '. $item["nom_restant"] .'?\')" style="min-width:25px;width:90%;" ><img src="icon/restant_dell.png" alt="X" title="Supprimer le restant de l\'emplacement" /></a>';
	?>
	</td></tr>
	<?php
}
?>
</table>
</form>
</body>
</html>
	<?php


/*$sql = "SELECT your_primary_key_field FROM menuitem";
$result = mysqli_query($con, $sql);
if(false === $result) {
   throw new Exception('Query failed with: ' . mysqli_error());
} else {
   $row_count = mysqli_num_rows($result);
   // free the result set as you don't need it anymore
   mysqli_free_result($result);
}

$page_count = 0;
if (0 === $row_count) {  
    // maybe show some error since there is nothing in your table
} else {
   // determine page_count
   $page_count = (int)ceil($row_count / $items_per_page);
   // double check that request page is in range
   if($page > $page_count) {
        // error to user, maybe set page to 1
        $page = 1;
   }
}

// make your LIMIT query here


// later when outputting page, you can simply work with $page and $page_count to output links
// for example
for ($i = 1; $i <= $page_count; $i++) {
   if ($i === $page) { // this is current page
       echo 'Page ' . $i . '<br>';
   } else { // show link to other page   
       echo '<a href="/menuitem.php?page=' . $i . '">Page ' . $i . '</a><br>';
   }
}*/
}

?>