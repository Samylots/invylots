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
if (isset($_POST["upc"]))
{
	$upc = $_POST["upc"];
	if($upc != ""){
		$recettess = $bdd->query('SELECT no_recette FROM tbl_recettes WHERE code_recette ="' . $upc . '" AND no_user ="' . $_SESSION["id"] . '"');
		$article = $recettess->fetch();
		if ($article)
		{
			header('Location: recette.php?recette=' . $article["code_recette"] );
		}
		else
		{
			echo '<div class="Center"> <a class="Title"> La recette n\'existe pas dans la base...</a></div>' ;
		}
	}
}

?>

	<div class="inscription">
		<form action="verifyRecette.php" method="post" style="float:left">
			<div class="Center">
				<a class="Title"> Vérification de recette: </a>
			</div>
			<label for="upc">CODE :</label> <input type="text" name="upc" autofocus /> <br>
		    <input type="submit" class="button2" value="Vérifier" />
		</form>
		</div>
	</body>
</html>