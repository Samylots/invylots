<?php
include("mysql.php"); 

if(isset($_GET["delete"])){
	$restants = $bdd->query('SELECT no_restant FROM tbl_restants WHERE code_restant ="' . $_GET["delete"] . '"');
	$restant = $restants->fetch();
	if ($restant){
		$bdd->exec('DELETE FROM tbl_restants WHERE no_restant ="' . $restant["no_restant"] . '"');
	}
}

if (isset($_GET["liste"]))
{
	$liste = $_GET["liste"];
}

$listes = $bdd->query('SELECT titre_liste, desc_liste FROM tbl_listes where no_liste ="' . $liste . '"');
$tempoliste = $listes->fetch();
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

				<div class="Center">
					<p class="Title"> Restants: </p>				
				</div>
			<br><br><br>
<?php
$items = $bdd->query('SELECT * FROM tbl_restants WHERE no_user ="' . $_SESSION["id"] . '"');
if($items)
{
	echo'<table><tr><th>Modifier</th><th>Restants</th><th>description</th><th>Code</th><th>X</th></tr>';
}
	while ($item = $items->fetch()) {
	?>
	<tr><td>
	<?php
	echo '<a href="liste.php?liste=' . $liste . '&restant='. $item["code_restant"] .'" target="Frame" class="button2" style="min-width:25px;width:90%;" >~</a>';
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
	echo $item["code_restant"];
	?>
	</td><td>
	<?php
	echo '<a href="listeRestants.php?delete=' . $item["code_restant"] . '" target="Frame" class="button3" onclick="return confirm(\'Êtes-vous sur de vouloir supprimer '. $item["nom_restant"] .'?\')" style="width:90%;">X</a>';
	?>
	</td></tr>
	<?php
}
?>
</table>
</body>
</html>
