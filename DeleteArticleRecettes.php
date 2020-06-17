<?php
include("mysql.php"); 
if(!empty($_GET['article']) AND !empty($_GET['recette'])) {
	$norecette = filter_input(INPUT_GET, 'recette', FILTER_VALIDATE_INT);
    if(false === $norecette) {
        header('Location: welcome.php');
    }
    $noArticle = filter_input(INPUT_GET, 'article', FILTER_VALIDATE_INT);
    if(false === $noArticle) {
        header('Location: recette.php?recette=' . $norecette);
    }else
    {
        $articles = $bdd->query('SELECT no_article FROM tbl_recette_articles WHERE no_recette ="' . $norecette . '" AND no_article="' . $noArticle . '"');
        $article = $articles->fetch();
        if ($article){
            $bdd->exec('DELETE FROM tbl_recette_articles WHERE no_recette ="' . $norecette . '" AND no_article="' . $noArticle . '"');
        } 
    }
    header('Location: recette.php?recette=' . $norecette);
}
?>