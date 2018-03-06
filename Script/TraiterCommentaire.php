<?php
//appel de la page connexion
include_once('connexion.php');
error_reporting(1);
//appel de la page inscription
include_once('PosterCommentaire.php');


// recuperation du nom auteur
if(isset($_POST['author'])){
$Nom= htmlentities($_POST['author']);
}

// recuperation du comment
if(isset($_POST['comment'])){
$Commentaire= htmlentities($_POST['comment']);
}

// gerer les cles etrangéres
// recuperation du comment
if(isset($_POST['CodeMemoire'])){
 $CodeMemoire= htmlentities($_POST['CodeMemoire']);
}
// recuperation du comment
if(isset($_POST['rp'])){
 $IdCommentateur= htmlentities($_POST['rp']);
}

$conn=connexpdo("sendoc","parametre");

//date inscription =date system
$requette_date=$conn->query("SELECT CURRENT_DATE()");
$resultat=$requette_date->fetch(PDO::FETCH_NUM);
$date=$resultat[0];

//date inscription heure courant
$requette_heure=$conn->query("SELECT CURRENT_TIME()");
$resultat=$requette_heure->fetch(PDO::FETCH_NUM);
$heure=$resultat[0];


// insertion dans la table inscription
$commentaire  = new PosterCommentaire($Nom,$Commentaire,$date,$heure);
$idCommentateur=$commentaire->ajouterMessage($conn);
if($idCommentateur){  
 $second_insert=$conn->exec("insert into commentaire (CodeMemoire,IdCommentateur, IdRepondeur) values('$CodeMemoire','$idCommentateur', '1')");
echo "poste";
 
 
}
?>
