<?php
/***********************************************************************
 definition de la classe Memoire
 ***********************************************************************/


   class Memoire {

   private $_CodeUniversite; // variable codeuniversite

   private $_TitreMemoire; // variable titrememoire

   private $_NomAuteur;   // variable nomauteur

   private $_PrenomAuteur; // variable prenomauteur

   private $_NiveauAuteur;  //variable niveauauteur

   private $_CodeCategorie; // variable codeCategorie

   private $_AnneeMemoire;  // variable annee memoire

   private $_DescriptionMemoire; // variable descriptionmemoire

   private $_NomFichier;        // variable nomfichier



   public function __construct($CodeUniversite,$TitreMemoire,$NomAuteur,$PrenomAuteur,$NiveauAuteur,$CodeCategorie,$AnneeMemoire,$DescriptionMemoire,$NomFichier,$date){

    $this->setCodeUniversite($CodeUniversite); // affectation de codeuniversité
    $this->setTitreMemoire($TitreMemoire);     // affectation de titrememoire
    $this->setNomAuteur($NomAuteur);           // affectation de nomauteur
    $this->setPrenomAuteur($PrenomAuteur);     // affectation de prenomauteur
    $this->setNiveauAuteur($NiveauAuteur);     // affectation de niveauauteur
    $this->setCodeCategorie($CodeCategorie);   // affectation de categorie
    $this->setAnneeMemoire($AnneeMemoire);     // affectation anneememoire
    $this->setDescriptionMemoire($DescriptionMemoire); // affectation de descriptionmemoire
    $this->setNomFichier($NomFichier);                 // affectation de nomfichier


   }

   public function setCodeUniversite($CodeUniversite){
   $this->_CodeUniversite=$CodeUniversite;
   }
   public function setTitreMemoire($TitreMemoire){
  $this->_TitreMemoire=$TitreMemoire;
   }

   public function setNomAuteur($NomAuteur){
  $this->_NomAuteur=$NomAuteur;
   }

   public function setPrenomAuteur($PrenomAuteur){
  $this->_PrenomAuteur=$PrenomAuteur;
   }

   public function setNiveauAuteur($NiveauAuteur){
  $this->_NiveauAuteur=$NiveauAuteur;
   }

   public function setCodeCategorie($CodeCategorie){
  $this->_CodeCategorie=$CodeCategorie;
   }

   public function setAnneeMemoire($AnneeMemoire){
  $this->_AnneeMemoire=$AnneeMemoire;

   } public function setDescriptionMemoire($DescriptionMemoire){
  $this->_DescriptionMemoire=$DescriptionMemoire;

   } public function setNomFichier($NomFichier){
  $this->_NomFichier=$NomFichier;
   }

   public function ajouterMemoire($conn){
 // date GMT en cours
  $requette=$conn->query("SELECT CURRENT_DATE()");
  $resultat=$requette->fetch(PDO::FETCH_NUM);
  $date=$resultat[0];
  ////attributs du memoire
  $CodeUniversite=$this->_CodeUniversite;
  $TitreMemoire=$this->_TitreMemoire;
  $NomAuteur=$this->_NomAuteur;
  $PrenomAuteur=$this->_PrenomAuteur;
  $NiveauAuteur=$this->_NiveauAuteur;
  $CodeCategorie=$this->_CodeCategorie;
  $AnneeMemoire=$this->_AnneeMemoire;
  $DescriptionMemoire=$this->_DescriptionMemoire;
  $NomFichier=$this->_NomFichier;

  $conn->exec("insert into memoire(CodeUniversite,TitreMemoire,NomAuteur,PrenomAuteur,NiveauAuteur,CodeCategorie,AnneeMemoire,DescriptionMemoire,NomFichier,DateEnregistrement,nbConsultation) values ('$CodeUniversite','$TitreMemoire','$NomAuteur','$PrenomAuteur','$NiveauAuteur','$CodeCategorie','$AnneeMemoire','$DescriptionMemoire','$NomFichier', '$date','')");
  return $conn->lastInsertId();
   }
}
?>
