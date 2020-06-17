<?php 
include("mysql.php"); 
if ( isset($_GET['erreur']) AND $_GET["erreur"] == "used") {
	echo "Le nom d'utilisateur est deja utiliser";
}
elseif ( isset($_GET['erreur']) AND $_GET["erreur"] == "email") {
	echo "Cet email est deja utiliser";
}
elseif ( isset($_GET['erreur']) AND $_GET["erreur"] == "nope") {
	echo "Cet utilisateur n'existe pas";
}
elseif ( isset($_GET['erreur']) AND $_GET["erreur"] == "mdpdone") {
	echo "Mot de passe modifier!";
}
elseif (isset($_COOKIE['Invylots_UserName']) AND isset($_COOKIE["Invylots_UserPW"]))
{
	header('Location: connection.php');
}
?>

<!DOCTYPE html>
<html>
	<head>
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
	<header>
		<form action="connection.php" method="post" style="float:right">
		<p>
		    <label for="user">Username :</label> <input type="text" name="user" />
		    <label for="mdp">Mot de passe :</label> <input type="password" name="mdp" /><br>
		    <input style="float:right;" type="submit" value="Se connecter" />
		    <a style="float:right;"href="recover.php">Mot de passe oublier</a>
		    
		</p>
		</form>
	</header>
	<body oncontextmenu="return false">
		<section name="Tete" style="height:3.13em;">
		<div class="tete" align="center">
			<div style="max-width:76em;min-width:56em;">
				<div style="float:left;">
					<div id="facebook" class="icon">
						<a target="Facebook" title="Samuel sur Facebook" href="https://www.facebook.com/samuel.beaudoin.758"><img src="images/facebook.png" alt="Facebook"/></a>
					</div>
					<div id="twitter" class="icon">
						<a target="Twitter" title="Samuel sur Twitter" href="http://www.twitter.com/samylots/"><img src="images/twitter.png" alt="Twitter"/></a>
					</div>
					<div id="twitch" class="icon">
						<a target="Twitch" title="Samuel sur Twitch.tv" href="http://www.twitch.tv/samylots/"><img src="images/twitch.png" alt="Twitch"/></a>
					</div>
					<div id="deviantart" class="icon">
						<a target="Deviant Art" title="Samuel sur Deviant Art" href="http://www.samylots.deviantart.com"><img src="images/deviantart.png" alt="DeviantArt"></a>
					</div>
					<div id="youtube" class="icon">
						<a target="Youtube" title="Samuel sur Youtube" href="http://www.youtube.com/user/MrSamylots/"><img src="images/youtube.png" alt="Youtube"/></a>
					</div>
					<div class="separateur" >
						<img src="images/separateur.png" alt="|"/>
					</div>
				</div>
				<div style="margin:0px;display:inline-block;">
					<div class="menu">
						<a href="index.html"><p class="headtext">Accueil</p></a>
					</div>
					<div class="separateur" >
						<img src="images/separateur.png" alt="|"/>
					</div>
					<div class="menu">
						<a href="pages/cv.html"><p class="headtext">CV</p></a>
					</div>
					<div class="separateur" >
						<img src="images/separateur.png" alt="|"/>
					</div>
					<div class="menu">
						<a href="pages/Projets.html"><p class="headtext">Projets</p></a>
					</div>
					<div class="separateur" >
						<img src="images/separateur.png" alt="|"/>
					</div>
					<div class="menu">
						<a href="pages/contacter.html"><p class="headtext">Contacter</p></a>
					</div>
				</div>
				<div style="float:right;display:inline-block;margin:0px;">
					<div class="separateur" >
						<img src="images/separateur.png" alt="|"/>
					</div>
					<div class="menu">
						<a href="index.html"><p class="headtext"> <?php echo $_SESSION["user"]; ?></p></a>
					</div>
					<div class="menu">
						<a href="deconnection.php" class="button2">Deconnecter</a>
					</div>

						
				</div>
			</div>
		</div>
	</section>
		<form action="inscription.php" method="post" style="float:left" onsubmit="return validationEmail(this)">
		<p>
		    <label for="user">Username :</label> <input type="text" name="user" /> <br>
		    <label for="prenom">Prenom :</label> <input type="text" name="prenom" /> <br>
		    <label for="nom">Nom :</label> <input type="text" name="nom" /> <br>
		    <label for="email">Email :</label> <input type="text" name="email" /> <br>
		    <label for="mdp">Mot de passe :</label> <input type="password" name="mdp" /> <br>
		    <label for="mdp2">Verification :</label> <input type="password" name="mdp2" /> <br>
		    <input type="submit" value="S'inscrire" />
		</p>
		</form>
	</body>
</html>