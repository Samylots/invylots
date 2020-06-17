<?php
include("mysql.php"); 
if(!empty($_GET['recette'])) {
	$no_recette = filter_input(INPUT_GET, 'recette', FILTER_VALIDATE_INT);
    if(false === $no_recette) {
        header('Location: welcome.php');
    }
    $items = $bdd->query('SELECT * FROM tbl_recette_articles WHERE no_recette="' . $no_recette . '"');
    while ($item = $items->fetch()) {
    	$bdd->exec('DELETE FROM tbl_recette_articles WHERE no_recette ="' . $no_recette . '"');
    }
    $bdd->exec('DELETE FROM tbl_recettes WHERE no_recette ="' . $no_recette . '"');
    header('Location: index.php');
}
?>