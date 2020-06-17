<?php
include("mysql.php"); 
if(!empty($_GET['article']) AND !empty($_GET['liste'])) {
	$noListe = filter_input(INPUT_GET, 'liste', FILTER_VALIDATE_INT);
    if(false === $noListe) {
        header('Location: welcome.php');
    }
    $noArticle = filter_input(INPUT_GET, 'article', FILTER_VALIDATE_INT);
    if(false === $noArticle) {
        header('Location: liste.php?liste=' . $noListe);
    }else
    {
        $articles = $bdd->query('SELECT no_article FROM tbl_liste_articles WHERE no_liste ="' . $noListe . '" AND no_article="' . $noArticle . '"');
        $article = $articles->fetch();
        if ($article){
            $bdd->exec('DELETE FROM tbl_liste_articles WHERE no_liste ="' . $noListe . '" AND no_article="' . $noArticle . '"');
        } 
    }
    header('Location: liste.php?liste=' . $noListe);
}

if(!empty($_GET['restant']) AND !empty($_GET['liste'])) {
    $noListe = filter_input(INPUT_GET, 'liste', FILTER_VALIDATE_INT);
    if(false === $noListe) {
        header('Location: welcome.php');
    }
    $noRestant = filter_input(INPUT_GET, 'restant', FILTER_VALIDATE_INT);
    if(false === $noRestant) {
        header('Location: liste.php?liste=' . $noListe);
    }
    else{
        $restants = $bdd->query('SELECT no_restant FROM tbl_liste_restants WHERE no_liste ="' . $noListe . '" AND no_restant="' . $noRestant . '"');
        $restant = $restants->fetch();
        if ($restant){
            $bdd->exec('DELETE FROM tbl_liste_restants WHERE no_liste ="' . $noListe . '" AND no_restant="' . $noRestant . '"');
        }
    }
    header('Location: liste.php?liste=' . $noListe);
}
?>