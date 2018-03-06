<?php 
if(isset($_POST['email'])){
$email=htmlentities($_POST['email']);
include_once('Script/connexion.php'); 
$conn=connexpdo("sendoc","parametre");
$req_mail= $conn->query("select * from newsletters where email='$email'");   
$ligne_mail= $req_mail->rowCount();
if($ligne_mail==0){  
$requette=$conn->query("insert into newsletters(email)values('$email')");                      
echo "ok";
}// fin if insertion
else 
{
echo "Cet email existe déja";
}
}
?>