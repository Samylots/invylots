<?php
include("mysql.php"); 
if(!empty($_GET['liste'])) {
	$noListe = filter_input(INPUT_GET, 'liste', FILTER_VALIDATE_INT);
    if(false === $noListe) {
        header('Location: welcome.php');
    }
    $items = $bdd->query('SELECT * FROM tbl_liste_articles WHERE no_liste="' . $noListe . '"');
    while ($item = $items->fetch()) {
    	$bdd->exec('DELETE FROM tbl_liste_articles WHERE no_liste ="' . $noListe . '"');
    }
    $items2 = $bdd->query('SELECT * FROM tbl_liste_restants WHERE no_liste="' . $noListe . '"');
    while ($item2 = $items2->fetch()) {
        $bdd->exec('DELETE FROM tbl_liste_restants WHERE no_liste ="' . $noListe . '"');
    }
    $bdd->exec('DELETE FROM tbl_listes WHERE no_liste ="' . $noListe . '"');
    header('Location: index.php');
}
?>