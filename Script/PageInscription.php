<?php
//appel de la page connexion
include_once('connexion.php');
//appel de la page inscription
include_once('Inscription.php');
// Génération aléatoire d'une clé
//$cle = md5(microtime(TRUE)*100000);

// Génération de la clef d'activation
$caracteres = array("a", "b", "c", "d", "e", "f", 0, 1, 2, 3, 4, 5, 6, 7, 8, 9);
$caracteres_aleatoires = array_rand($caracteres, 8);
$clef_activation = "";

foreach($caracteres_aleatoires as $i)
{
    $clef_activation .= $caracteres[$i];
}
// recuperation du nom
if(isset($_POST['nom'])){
    $Nom= htmlentities($_POST['nom']);
}
// recuperation du prenom
if(isset($_POST['prenom'])){
    $Prenom= htmlentities($_POST['prenom']);
}
// recuperation du nomuser
if(isset($_POST['username'])){
    $NomUser = htmlentities($_POST['username']);
}
// recuperation de email
if(isset($_POST['email'])){
    $Email= htmlentities($_POST['email']);
}
// recuperation de password
if(isset($_POST['password'])){
$MotDePasse= md5($_POST['password']);
}
// recuperation de password confirm
if(isset($_POST['confirm'])){
$MotDePasseConfirm = htmlentities($_POST['confirm']);
}
// recuperation du sexe
if(isset($_POST['sexe'])){
    $Sexe= htmlentities($_POST['sexe']);
}
// recuperation du code universite
if(isset($_POST['universite'])){
    $Universite= htmlentities($_POST['universite']);
}
$conn=connexpdo("sendoc","parametre");
//date inscription =date system
$requette_date=$conn->query("SELECT CURRENT_DATE()");
$resultat=$requette_date->fetch(PDO::FETCH_NUM);
$date=$resultat[0];
// teste existence email dans la base
$requette_mail=$conn->query("SELECT * from inscription where EmailEtudiant='$Email'");
$resultat_mail=$requette_mail->rowCount();
if($resultat_mail==0){
// insertion dans la table inscription
    $inscription=new Inscription($Nom,$Prenom,$Email,$MotDePasse,$MotDePasseConfirm,$Sexe,$Universite,$date, $NomUser,$clef_activation);
$idEtudiant=$inscription->ajouterInscription($conn);
//if($idEtudiant){
echo "inscris";
}// fin du if mail
else {
echo "mail existe deja";
    }
?>
<?php 
/*if($idEtudiant!=0){
//adresse email du client
//$destinataire = $Email;

    // Préparation du mail contenant le lien d'activation
    $destinataire = $email;
    $sujet = "Activer votre compte" ;
    $entete = "From: contact@sendoc.edu" ;

    // Le lien d'activation est composé du login(log) et de la clé(cle)
$message = "Bienvenue sur VotreSite,

Pour activer votre compte, veuillez cliquer sur le lien ci dessous
ou copier/coller dans votre navigateur internet.

"http://www.sendoc.sn/Script/PageInscription.php?log='.urlencode($Email).'&cle='.urlencode($cle)."
    
    if (mail($destinataire, $sujet, $message, $entete)){
    echo "envoye";
}else{
    echo "echoue";
}
}*/
?>