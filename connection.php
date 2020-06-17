<?php
include("mysql2.php");
	if (isset($_COOKIE['Invylots_UserName']) AND isset($_COOKIE["Invylots_UserPW"]))
	{
		$req = $bdd->prepare('SELECT no_user, no_type FROM tbl_users where username_user= :user AND mdp_user= :mdp');
		$req->execute(array(
		    'user' => $_COOKIE["Invylots_UserName"],
		    'mdp' =>  $_COOKIE["Invylots_UserPW"]));
		$reponse = $req->fetch();
		if ($reponse) 
		{
			$_SESSION["id"] = $reponse["no_user"];
			$_SESSION["user"] = $_COOKIE["Invylots_UserName"];
			$_SESSION["type"] = $reponse["no_type"];

			//echo "Connecté!";
			header('Location: main.php');
			echo "main.php";
		}
		else
		{
			setcookie('Invylots_UserName', '');
			setcookie('Invylots_UserPW', '');
			$_SESSION = array();
			session_destroy();
			header('Location: index.php?erreur=nope');
		}
	}
	else
	{
		setcookie('Invylots_UserName', $_POST["user"], time() + 365*255*3600, null, null, false, true);
		$CryptPwd = sha1($_POST["mdp"]);
		setcookie('Invylots_UserPW', $CryptPwd, time() + 365*255*3600, null, null, false, true); 
		header('Location: connection.php');
		echo "loading";
	}
?>

<!DOCTYPE html>
<html>
	<body oncontextmenu="return false">
		<form action="deconnection.php" method="post" style="float:left">
		<p>
		    <input type="submit" value="deconnection" />
		</p>
		</form>
	</body>
</html>