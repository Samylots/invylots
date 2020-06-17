<?php 
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=invylots', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>