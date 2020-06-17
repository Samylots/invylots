<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=invylots', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
if(!$_SESSION){
	//header('Location: index.php');
	echo '<script language="javascript">'; 
    echo 'top.location.href = "index.php";'; 
    echo '</script>'; 
    exit();
}
?>