<?php 
include("mysql2.php"); 
if (!empty($_COOKIE['Invylots_UserName']) AND !empty($_COOKIE["Invylots_UserPW"]))
{
	header('Location: connection.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Samuel Beaudoin | Curriculum Vitae</title>
		<meta name="description" content="Site pr&eacute;sentant Samuel Beaudoin"/>
		<meta name="author" content="Samuel Beaudoin"/>
		<link rel="stylesheet" type="text/css" media="all" href="css/CSSmain.css"/>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<script language="JavaScript">
			function validationEmail(maForm)
			{
				if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(maForm.email.value))
				{
					if (/^\w{6}/.test(maForm.user.value))
					{
						if ((maForm.mdp.value) == (maForm.mdp2.value))
						{
							return (true)
						}
						else
						{
							alert("Mot de passe non semblables!")
							return (false)
						}
					}
					else
					{
						alert("Nom d'utilisateur trop court")
						return (false)
					}
				}
				alert("Invalid E-mail Address! Please re-enter.")
				return (false)
			}
		</script>
	</head>
	<body oncontextmenu="return false">
		<section name="Tete" style="height:3.13em;">
		<div class="tete" align="center">
			<div style="max-width:76em;min-width:56em;">
				<div style="float:right;display:inline-block;margin:0px;">
					<form action="connection.php" method="post" style="float:right">
					<div class="menu">
		    			<label class="headtext" for="user">Username :</label> <input type="text" name="user" autofocus />
					</div>
					<div class="menu">
		    			<label class="headtext" for="mdp">Mot de passe :</label> <input type="password" name="mdp" />
					</div>
					<div class="menu">
		    			<input type="submit" class="button2" value="Se connecter" />
					</div>
					</form>
						
				</div>
			</div>
		</div>
	</section>

<?php
if ( isset($_GET['erreur']) AND $_GET["erreur"] == "used") {
	echo '<div class="Center"> <a style="text-align: center;" class="Title"> Le nom d\'utilisateur est deja utiliser! </a></div>';
}
elseif ( isset($_GET['erreur']) AND $_GET["erreur"] == "email") {

	echo '<div class="Center"> <a style="text-align: center;" class="Title"> Cet email est deja utiliser! </a></div>';
}
elseif ( isset($_GET['erreur']) AND $_GET["erreur"] == "nope") {

	echo '<div class="Center"> <a style="text-align: center;" class="Title"> Cet utilisateur n\'existe pas! </a></div>';
}
elseif ( isset($_GET['erreur']) AND $_GET["erreur"] == "mdpdone") {

	echo '<div class="Center"> <a style="text-align: center;" class="Title"> Mot de passe modifier! </a></div>';
}
?>

	<div class="inscription">
		<form action="inscription.php" method="post" style="float:left" onsubmit="return validationEmail(this)">
		    <label for="user">Username :</label> <input type="text" name="user" placeholder="Nom d'utilisateur" /> <br>
		    <label for="prenom">Prénom :</label> <input type="text" name="prenom" placeholder="Prénom" /> <br>
		    <label for="nom">Nom :</label> <input type="text" name="nom" placeholder="Nom"/> <br>
		    <label for="email">Email :</label> <input type="Email" name="email" placeholder="Email"/> <br>
		    <label for="mdp">Mot de passe :</label> <input type="password" name="mdp" placeholder="Mot de passe" /> <br>
		    <label for="mdp2">Verification :</label> <input type="password" name="mdp2" placeholder="Mot de passe" /> <br>
		    <input class="button2" type="submit" value="S'inscrire" />
		</form>
	</div>
	</body>
</html>