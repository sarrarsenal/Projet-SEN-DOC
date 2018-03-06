<?php
function connexpdo($base,$parametre)
{
include_once($parametre.".php"); 
$dsn="mysql:host=".MYHOST.";dbname=".$base;
$user=MYUSER;
$pass=MYPASS;
try
{
$conn = new PDO($dsn,$user,$pass); 
return $conn;
}
catch(PDOException $except) 
{
echo"Echec de la connexion",$except>getMessage();
return FALSE;
exit();
}
}
?>