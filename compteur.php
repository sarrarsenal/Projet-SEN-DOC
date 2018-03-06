<?php
include("Script/connexion.php");
$conn=connexpdo("sendoc","parametre");
if(isset($_POST['CodeMemoire'])){
$id = intval($_POST['CodeMemoire']);
$req=$conn->exec( "UPDATE memoire SET nbConsultation = nbConsultation+1  WHERE CodeMemoire = '".$id."' ");
}
?>
