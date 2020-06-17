<?php 
include("mysql.php"); 
if(!empty($_GET['article'])) {
	if(!empty($_POST['prix']) AND !empty($_POST['poid'])) {
		$bdd->exec('INSERT INTO tbl_prix(montant_prix,gramme_prix) VALUES('. $_POST["prix"] . ','. $_POST["poid"] .')');
		$Prix = $bdd->query('SELECT no_prix FROM tbl_prix WHERE montant_prix ="' . $_POST["prix"] . '" AND gramme_prix ="'. $_POST["poid"] .'"');
		$noPrix = $Prix->fetch();
		$bdd->exec('INSERT INTO tbl_prix_articles(no_article,no_magasin,no_prix,date_prix) VALUES('. $_GET["article"] . ','. $_POST["choix"] . ','. $noPrix["no_prix"] . ', NOW())');
	}
	if(!empty($_GET["desc"]))
	{
		$bdd->exec('UPDATE tbl_descriptions SET desc_desc="' . $_POST["descPerso"] . '" WHERE no_desc ="'. $_GET["desc"] . '"');
	}else{
		$bdd->exec('INSERT INTO tbl_descriptions(desc_desc,no_user,no_article) VALUES("'. $_POST["descPerso"] . '",'. $_SESSION["id"] . ','. $_GET["article"] . ')');
	}
	$noListe = $_GET["liste"];
	$bdd->exec('UPDATE tbl_liste_articles SET qte_limit_article="' . $_POST["alerte"] . '" WHERE no_liste ="'. $noListe . '" AND no_article="' . $_GET["article"] . '"');
}
elseif(!empty($_GET['restant'])) {
	$date = $_POST["Annee"] . "-" . $_POST["Mois"] . "-" . $_POST["Jour"];
	$noListe = $_GET["liste"];
	$bdd->exec('UPDATE tbl_restants SET nom_restant="' . $_POST["Title"] . '", desc_restant="' . $_POST["desc"] . '" WHERE code_restant ="'. $_GET['restant'] . '"');

	$items = $bdd->query('SELECT no_restant FROM tbl_restants WHERE code_restant ="'. $_GET['restant'] . '"');
	$item = $items->fetch();

	$bdd->exec('UPDATE tbl_liste_restants SET date_liste_restant = CAST("' . $date . '" AS DATETIME) WHERE no_restant="' . $item["no_restant"] . '" AND no_liste ="' . $noListe . '"');
}
	header('Location: liste.php?liste=' . $noListe);
?>