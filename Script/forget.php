<?php
include_once('connexion.php');
$email_forget = htmlentities($_POST['email_forget']);
$conn=connexpdo("sendoc","parametre");
$requette = $conn->query("Select * from inscription where EmailEtudiant='$email_forget' " ) ;
$ligne = $requette->rowCount();
$data = $requette->fetch(PDO::FETCH_ASSOC);
$password = $data['MotDePasseEtudiantConfirm'];
//adresse email du client
// Préparation du mail contenant le lien d'activation
$destinataire = $email_forget;
$sujet = "Recupération de mot de passe" ;
$entete = "From: contact@sendoc.edu" ;
// Le lien d'activation est composé du login(log) et de la clé(cle)
$message = "Voici votre mot de passe : $password ";
mail($destinataire, $sujet, $message, $entete);
if(($password)&& (mail($destinataire, $sujet, $message, $entete)) && ($ligne==1)){
echo "envoye";
}else if($ligne ==0)
{
 echo "compte inexistant";
}
else { 
    echo    
        "echoue" ;}
?>