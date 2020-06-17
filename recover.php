<?php
include("mysql.php"); 
	if (isset($_GET["m"]) AND isset($_GET["u"]))
	{
		$req = $bdd->prepare('SELECT no_user FROM tbl_users where mdp_user= :mdp AND username_user = :user');
		$req->execute(array(
		    'mdp' => $_GET["m"],
		    'user' => $_GET["u"]));
		$reponse = $req->fetch();
		echo $reponse["no_user"];
		$id = $reponse["no_user"];
		echo $id;
		if ($reponse) 
		{
?>
			<!DOCTYPE html>
			<html>
				<body oncontextmenu="return false">
					<form action="recover.php?id=<?php echo $id; ?>" method="post" style="float:left">
					<p>
					    <label for="mdp">Nouveau Mot de passe :</label> <input type="password" name="mdp" /> <br>
					    <label for="mdp2">Verification :</label> <input type="password" name="mdp2" /> <br>
					    <input type="submit" value="Modifier" />
					</p>
					</form>
				</body>
			</html>
<?php
		}
		else
		{
			header('Location: index.php');
		}
	}
	elseif(isset($_POST["email"]))
	{
		$req = $bdd->prepare('SELECT mdp_user, username_user FROM tbl_users where courriel_user= :email');
		$req->execute(array(
		    'email' => $_POST["email"]));
		$reponse = $req->fetch();
		if ($reponse) 
		{
			mail($_POST['email'],"Invylots | Reinitialisation de mot de passe", "Bonjour, veuillez suivre ce lien: http://74.50.163.197/MAIN/recover.php?m=" . $reponse['mdp_user'] . "&u=" . $reponse['username_user'] . " Veuillez ne pas repondre a cet email.", "FROM: DoNotReply@invylots.000free.us");
			echo "L'email pour retrouver votre mot de passe a ete envoyer! <br>" ;
			echo "<a href='index.php'> Retourner sur la page principale </a>" ;
		}
		else
		{
			header('Location: recover.php');
		}
	}
	elseif (isset($_POST["mdp"]) AND isset($_POST["mdp2"]) AND isset($_GET["id"]))
		{
			$CryptPwd = sha1($_POST["mdp"]);
			$req = $bdd->prepare('UPDATE tbl_users SET mdp_user = :mdp where no_user= :id');
			$req->execute(array(
		    	'mdp' => $CryptPwd,
		    	'id' => $_GET["id"]));
			$_SESSION = array();
			session_destroy();
			setcookie('Invylots_UserName', '');
			setcookie('Invylots_UserPW', '');
			header('Location: index.php?erreur=mdpdone');
		}
	else
	{
?>

		<!DOCTYPE html>
		<html>
			<body oncontextmenu="return false">
				<form action="recover.php" method="post" style="float:left">
				<p>
				    <label for="email">Email :</label> <input type="text" name="email" /> <br>
				    <input type="submit" value="Retrouver" />
				</p>
				</form>
			</body>
		</html>
		<?php
	}
?>