<?php 
include("mysql.php"); 
	$req = $bdd->prepare('SELECT username_user, courriel_user FROM tbl_users WHERE username_user = :user OR courriel_user = :email');
	$req->execute(array('user' => $_POST["user"],
						'email' => $_POST['email']));
	$used = false;
	while ($stuff = $req->fetch())
	{
		if ($stuff["courriel_user"] != null)
		{
			$used = true;
			header('Location: index.php?erreur=email');
		}
		if ($stuff["username_user"] != null)
		{
			$used = true;
			header('Location: index.php?erreur=used');
		}
	}
	if (!$used){
		$req = $bdd->prepare('INSERT INTO tbl_users(username_user, nom_user, prenom_user, mdp_user, courriel_user, no_type ) VALUES( :user, :nom, :prenom, :mdp, :email, :type )');
		if ($_POST["mdp"] == $_POST["mdp2"])
		{
			$CryptPwd = sha1($_POST["mdp"]);
			$req->execute(array('user' => $_POST["user"] , 'nom' => $_POST["nom"], 'prenom' => $_POST["prenom"], 'mdp' => $CryptPwd, 'email' => $_POST["email"], 'type' => 4));
			setcookie('Invylots_UserName', $_POST["user"], time() + 365*255*3600, null, null, false, true);
			setcookie('Invylots_UserPW', $CryptPwd, time() + 365*255*3600, null, null, false, true); 
			header('Location: connection.php');
		}
	}
?>
