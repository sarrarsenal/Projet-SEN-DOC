<?php
session_start();
$an = time () + 31536000;//duree du cookies =1an
if(isset($_POST['souvenir'])){
setcookie ('souvenir',htmlentities($_POST['login']), $an);
$_COOKIE['souvenir']= htmlentities($_POST['login']);
}
//if(isset($_POST['connexion'])){
//echo $_COOKIE['souvenir'];
include_once('Script/connexion.php');
//if(isset($_POST['login'])){
$login=htmlentities($_POST['login']);
//$_SESSION['login']=$login;
//}

//if(isset($_POST['password'])){
$password=htmlentities($_POST['password']);
//$_SESSION['password']=$password;

//}
if(isset($_POST['souvenir'])){
    $souvenir=htmlentities($_POST['souvenir']);
    //$_SESSION['souvenir']=$souvenir;

}
$conn=connexpdo("sendoc","parametre");
$requette=$conn->query("Select * from inscription where EmailEtudiant='".trim($login)."' and MotDePasseEtudiant='".md5($password)."' " ) ;
$ligne=$requette->rowCount();
$data=$requette->fetch(PDO::FETCH_ASSOC);
$row=$data['EmailEtudiant'];
$_SESSION['login']=$row;
$etatCompte = $data['EtatCompte'];

if($ligne!=0 && $etatCompte == 1 ){
        echo "ok";
}else if($ligne!=0 && $etatCompte == 0 ){
    echo "inactif";
}
 if($ligne==0) {
    echo "fail";
}


?>
