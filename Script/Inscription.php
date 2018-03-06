<?php
/***********************************************************************
 definition de la classe Inscription
 ***********************************************************************/


   class Inscription {

   private $_NomEtudiant;

   private $_PrenomEtudiant;

   private $_EmailEtudiant;

   private $_MotDePasseEtudiant;

   private $_MotDePasseEtudiantConfirm;

   private $_SexeEtudiant;

   private $_CodeUniversite;

   private $_NomUtilisateur;
   private $_CleActivation;

    public function __construct($NomEtudiant,$PrenomEtudiant,$EmailEtudiant,$MotDePasseEtudiant,$MotDePasseEtudiantConfirm,$SexeEtudiant,$CodeUniversite,$date,$NomUtilisateur,$CleActivation){

    $this->setNomEtudiant($NomEtudiant);
    $this->setPrenomEtudiant($PrenomEtudiant);
    $this->setEmailEtudiant($EmailEtudiant);
    $this->setMotDePasseEtudiant($MotDePasseEtudiant);
    $this->setMotDePasseEtudiantConfirm($MotDePasseEtudiantConfirm);
    $this->setSexeEtudiant($SexeEtudiant);
    $this->setCodeUniversite($CodeUniversite);
    $this->setNomUtilisateur($NomUtilisateur);
     $this->setCleActivation($CleActivation);

   }

   public function setNomEtudiant($NomEtudiant){
   $this->_NomEtudiant=$NomEtudiant;
   }
   public function setPrenomEtudiant($PrenomEtudiant){
  $this->_PrenomEtudiant=$PrenomEtudiant;
   }

   public function setEmailEtudiant($EmailEtudiant){
  $this->_EmailEtudiant=$EmailEtudiant;
   }

   public function setMotDePasseEtudiant($MotDePasseEtudiant){
  $this->_MotDePasseEtudiant=$MotDePasseEtudiant;
   }

   public function setMotDePasseEtudiantConfirm($MotDePasseEtudiantConfirm){
  $this->_MotDePasseEtudiantConfirm=$MotDePasseEtudiantConfirm;
   }

   public function setSexeEtudiant($SexeEtudiant){
  $this->_SexeEtudiant=$SexeEtudiant;
   }

   public function setCodeUniversite($CodeUniversite){
  $this->_CodeUniversite=$CodeUniversite;
   }

   public function setNomUtilisateur($NomUtilisateur){
  $this->_NomUtilisateur=$NomUtilisateur;
    
    
   } public function setCleActivation($CleActivation){
    $this->_CleActivation=$CleActivation;
   }


   public function ajouterInscription($conn){
 // date GMT en cours
  $requette=$conn->query("SELECT CURRENT_DATE()");
  $resultat=$requette->fetch(PDO::FETCH_NUM);
  $date=$resultat[0];
  ////attributs de l'inscription
  $NomEtudiant=$this->_NomEtudiant;
  $PrenomEtudiant=$this->_PrenomEtudiant;
  $EmailEtudiant=$this->_EmailEtudiant;
  $MotDePasseEtudiant=$this->_MotDePasseEtudiant;
  $MotDePasseEtudiantConfirm=$this->_MotDePasseEtudiantConfirm;
  $SexeEtudiant=$this->_SexeEtudiant;
  $CodeUniversite=$this->_CodeUniversite;
  $NomUtilisateur=$this->_NomUtilisateur;
    $CleActivation=$this->_CleActivation;

    $conn->exec("insert into inscription(NomEtudiant,PrenomEtudiant,EmailEtudiant,MotDePasseEtudiant,MotDePasseEtudiantConfirm,SexeEtudiant,CodeUniversite,DateInscription,NomUtilisateur,CleActivation,EtatCompte) values (' $NomEtudiant','$PrenomEtudiant','$EmailEtudiant','$MotDePasseEtudiant','$MotDePasseEtudiantConfirm','$SexeEtudiant','$CodeUniversite','$date','$NomUtilisateur','$CleActivation', 0)");
  return $conn->lastInsertId();
   }
}
?>
