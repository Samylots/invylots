<?php
if (isset($_GET["liste"]))
{
	$noListe = $_GET["liste"];
	$liste = $_GET["liste"];
}

$listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes where no_liste ="' . $noListe . '"');
$tempoliste = $listes->fetch();
?>
<div class="Top2">
			<div class="Center">
				<p class="Title"> <?php echo $tempoliste["titre_liste"] . ' : ' . $tempoliste["desc_liste"]; ?> </p>		
				<!-- <input type="submit" value="Modifier" class="button2"/> -->
				<a href="ajoutArticleListe.php?liste= <?php echo $liste; ?>" target="Frame" class="button2 icons"><img src="icon/scan_add.png" alt="Ajouter" title="Ajouter un article par code barre" /></a>
				<a href="removeArticleListe.php?liste= <?php echo $liste; ?>" target="Frame" class="button2 icons"><img src="icon/scan_moins.png" alt="Enlever" title="Enlever un article par code barre" /></a>
				<a href="NouveauRestant.php?liste= <?php echo $liste; ?>" target="Frame" class="button2 icons"><img src="icon/restant_new.png" alt="Créer restant" title="Créer un nouveau restant" /></a>
				<a href="listeRestants.php?liste= <?php echo $liste; ?>" target="Frame" class="button2 icons"><img src="icon/restant_dell.png" alt="Liste restants" title="Liste restants" /></a>
				<a href="deleteListe.php?liste= <?php echo $liste; ?>" target="_top" style="float:left;"class="button3 icons" onclick="return confirm('Êtes vous certaint de vouloir supprimer la liste?')" ><img src="icon/emplacement_dell.png" alt="Supprimer emplacement" title="Supprimer l'emplacement" /></a>			
			</div>
		</div>
		<br><br><br><br><br><br><br><br>