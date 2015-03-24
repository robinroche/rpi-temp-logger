<?php
// Connexion MySQL
$serveur="xxxx";
$login="xxxx";
$base="xxxx";
$pass="xxxx";
$table="xxxx";
// Verification mot de passe
if(isset($_GET["PASSWD"])) {
$passwd = $_GET["PASSWD"];
$realPasswd = "123456";
if(strcmp($passwd,$realPasswd)==0) {
// Recuperation temperature
if(!isset($_GET["TEMPERATURE"])) {
$temp_c= "NULL";
}else {
$temp_c= $_GET["TEMPERATURE"];
}
// Connexion au serveur
$con = mysql_connect($serveur, $login, $pass);
if (!$con)
 {
 die('Could not connect: ' . mysql_error());
 }
mysql_select_db($base) or die("Erreur de connexion a la base
de donnees $base");
mysql_query("SET NAMES 'utf8'");
// Ajout des donnees dans la base
$requete = mysql_query("INSERT INTO $table
(time,temperature) VALUES(NOW(),$temp_c)");
}
}
?>
