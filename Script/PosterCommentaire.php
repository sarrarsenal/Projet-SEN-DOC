<?php
/***********************************************************************
 definition de la classe Poster Commentaire
 ***********************************************************************/


   class PosterCommentaire {

   private $_NomCommentateur;

   private $_Message;


   public function
    __construct($NomCommentateur,$Message,$DatePoste,$HeurePost){//4

    $this->setNomCommentateur($NomCommentateur);
    $this->setMessage($Message);


   }

   public function setNomCommentateur($NomCommentateur){
   $this->_NomCommentateur=$NomCommentateur;
   }
   public function setMessage($Message){
  $this->_Message=$Message;
   }


   public function ajouterMessage($conn){
 // date GMT en cours
  $requette=$conn->query("SELECT CURRENT_DATE()");
  $resultat=$requette->fetch(PDO::FETCH_NUM);
  $date=$resultat[0];
  // heure courante
    // date GMT en cours
  $requette_heure=$conn->query("SELECT CURRENT_TIME()");
  $resultat=$requette_heure->fetch(PDO::FETCH_NUM);
  $heure=$resultat[0];

  ////attributs de commentaire
  $NomCommentateur=$this->_NomCommentateur;
  $Message=$this->_Message;

$conn->exec("insert into commentateurs(Nom,Message,DatePoste,HeurePoste) values ('$NomCommentateur','$Message','$date','$heure')");
  return $conn->lastInsertId();
   }
}
?>
