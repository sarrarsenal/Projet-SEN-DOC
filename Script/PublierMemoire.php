<?php
//appel de la page connexion
include_once('connexion.php');
//appel de la page memoires
include_once('Memoires.php');
// fonction de copy
include_once('copy.php');

//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;DEBUT MODULE DES RECUPERATIONS VARIABLES POSTEES;;;;;;

 // recuperation du titre du memoire
if(isset($_POST['titre'])){
$TitreMemoire= htmlentities($_POST['titre']);
}

// recuperation du nom de l'auteur
if(isset($_POST['nom'])){
$NomAuteur= htmlentities($_POST['nom']);
}

// recuperation du prenom de l'auteur
if(isset($_POST['prenom'])){
$PrenomAuteur= htmlentities($_POST['prenom']);
}


// recuperation de l'annee memoire
if(isset($_POST['anneememoire'])){
$AnneeMemoire= htmlentities($_POST['anneememoire']);
}


// recuperation du niveau de l etudiant
if(isset($_POST['niveau'])){
$Niveau= htmlentities($_POST['niveau']);
}


// recuperation du categorie
if(isset($_POST['categorie'])){
$Categorie= htmlentities($_POST['categorie']);
}

$Universite="";
// recuperation de l'universite
if(isset($_POST['universite'])){
$Universite= htmlentities($_POST['universite']);
}

// recuperation du description
if(isset($_POST['description'])){
$Description= htmlentities($_POST['description']);
}


// recuperation du fichier
if(isset($_POST['fichier'])){
$Fichier= htmlentities($_POST['fichier']);
}

//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;MODULE DES RECUPERATIONS VARIABLES POSTEES;;;;;;;;;;;;;;;;



//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;MODULE DES UPLOADS;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;


  // teste sur les universites et les dossiers de destination des uploades
if($Universite==1){ // pour universite  assane seck de ziguinchor(UZ)
$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UZ/";
	$destination_global = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC 1.6/MEMOIRES/MEMOIRES_GLOBALE/";
			$extensionsAutorisees = array("pdf","PDF","docx","DOCX","ppt","PPT");
			if (is_uploaded_file($_FILES["fichier"]["tmp_name"])){
                $nomFichier = $AnneeMemoire.'-'.$_FILES["fichier"]["name"];
				$extension = substr($nomFichier, strrpos($nomFichier, ".")+1);
				// Contrôle de l'extension du fichier
				if (!(in_array($extension, $extensionsAutorisees))) {
					//die("Le fichier n'a pas l'extension attendue");
					exit(0);
				}

				$cheminFichier = $nomFichier;
				$fichier=$destination.$cheminFichier;
				rename($_FILES["fichier"]["tmp_name"], $destination.$cheminFichier);

			}
}//fin du if de l'université de ziguinchor UZ

else if($Universite==2){ // pour universite cheikh anta diop de dakar(UCAD)
$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UCAD/";
			$extensionsAutorisees = array("pdf","PDF","docx","DOCX","ppt","PPT");
			if (is_uploaded_file($_FILES["fichier"]["tmp_name"])){
                $nomFichier = $AnneeMemoire.'-'.$_FILES["fichier"]["name"];
				$extension = substr($nomFichier, strrpos($nomFichier, ".")+1);
				// Contrôle de l'extension du fichier
				if (!(in_array($extension, $extensionsAutorisees))) {
					//die("Le fichier n'a pas l'extension attendue");
					exit(0);
				}

				$cheminFichier=$nomFichier;
				$fichier=$destination.$cheminFichier;
				rename($_FILES["fichier"]["tmp_name"], $destination.$cheminFichier);
			}
}//fin du if de l'université UCAD

else if($Universite==3){ // pour universite alioune diop de bambey(UADB)
$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UADB/";
			$extensionsAutorisees = array("pdf","PDF","docx","DOCX","ppt","PPT");
			if (is_uploaded_file($_FILES["fichier"]["tmp_name"])){
                $nomFichier = $AnneeMemoire.'-'.$_FILES["fichier"]["name"];
				$extension = substr($nomFichier, strrpos($nomFichier, ".")+1);
				// Contrôle de l'extension du fichier
				if (!(in_array($extension, $extensionsAutorisees))) {
					//die("Le fichier n'a pas l'extension attendue");
					exit(0);
				}

				$cheminFichier=$nomFichier;
				$fichier=$destination.$cheminFichier;
				rename($_FILES["fichier"]["tmp_name"], $destination.$cheminFichier);
			}
}//fin du if de l'université UADB


else if($Universite==4){ // pour universite gaston berger de saint louis(UGB)
$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UGB/";
			$extensionsAutorisees = array("pdf","PDF","docx","DOCX","ppt","PPT");
			if (is_uploaded_file($_FILES["fichier"]["tmp_name"])){
                $nomFichier = $AnneeMemoire.'-'.$_FILES["fichier"]["name"];
				$extension = substr($nomFichier, strrpos($nomFichier, ".")+1);
				// Contrôle de l'extension du fichier
				if (!(in_array($extension, $extensionsAutorisees))) {
					//die("Le fichier n'a pas l'extension attendue");
					exit(0);
				}

				$cheminFichier=$nomFichier;
				$fichier=$destination.$cheminFichier;
				rename($_FILES["fichier"]["tmp_name"], $destination.$cheminFichier);
			}
}//fin du if de l'université UGB


else if($Universite==5){ // pour universite de thies(UT)
$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UT/";
			$extensionsAutorisees = array("pdf","PDF","docx","DOCX","ppt","PPT");
			if (is_uploaded_file($_FILES["fichier"]["tmp_name"])){
				$nomFichier = $AnneeMemoire.'-'.$_FILES["fichier"]["name"];
				$extension = substr($nomFichier, strrpos($nomFichier, ".")+1);
				// Contrôle de l'extension du fichier
				if (!(in_array($extension, $extensionsAutorisees))) {
					//die("Le fichier n'a pas l'extension attendue");
					exit(0);
				}

				$cheminFichier=$nomFichier;
				$fichier=$destination.$cheminFichier;
				rename($_FILES["fichier"]["tmp_name"], $destination.$cheminFichier);
			}
}//fin du if de l'université UT


else if($Universite==6){ // pour universite virtuelle du senegal (UVS)
$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UVS/";
			$extensionsAutorisees = array("pdf","PDF","docx","DOCX","ppt","PPT");
			if (is_uploaded_file($_FILES["fichier"]["tmp_name"])){
                $nomFichier = $AnneeMemoire.'-'.$_FILES["fichier"]["name"];
				$extension = substr($nomFichier, strrpos($nomFichier, ".")+1);
				// Contrôle de l'extension du fichier
				if (!(in_array($extension, $extensionsAutorisees))) {
					//die("Le fichier n'a pas l'extension attendue");
					exit(0);
				}

				$cheminFichier=$nomFichier;
				$fichier=$destination.$cheminFichier;
				rename($_FILES["fichier"]["tmp_name"], $destination.$cheminFichier);

			}
}//fin du if de l'université UVS */



if($Universite!=0){ // stocker les fichiers uploader dans le dossier globale par copie
$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/MEMOIRES_GLOBALE/";

	if($Universite==1){
		$origine = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UZ/";
	}
	else if($Universite==2){
		$origine = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UCAD/";
	}
	else if($Universite==3){
		$origine = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UADB/";
	}

	else if($Universite==4){
		$origine = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UGB/";
	}

	else if($Universite==5){
		$origine = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UT/";

	}

	else if($Universite==6){
		$origine = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/Memoires UVS/";
	}

	$destination = $_SERVER["DOCUMENT_ROOT"]."/SEN DOC/MEMOIRES/MEMOIRES_GLOBALE/";
	if(CopyDir($origine, $destination)) {
	echo "Le dossier ".$origine." a ete copie avec succes vers ".$destination;
	};



}

//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;FIN MODULE DES UPLOADS;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;






//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;MODULE DES INSERTIONS DANS LA BASE DE DONNEES;;;;;;;;;;;;;;;;

$conn=connexpdo("sendoc","parametre");
//date inscription =date system
$requette_date=$conn->query("SELECT CURRENT_DATE()");
$resultat=$requette_date->fetch(PDO::FETCH_NUM);
$date=$resultat[0];
// insertion dans la table memoire
$memoire=new Memoire($Universite,$TitreMemoire,$NomAuteur,$PrenomAuteur,$Niveau,$Categorie,$AnneeMemoire,$Description,$nomFichier,$date);
$idMemoire=$memoire->ajouterMemoire($conn);
if($idMemoire){
	$sucess="ok";
}
else $fail="echec";


//;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;;FIN MODULE DES INSERTIONS DANS LA BASE DE DONNEES;;;;;;;;;;;;;;;;;;;;
?>
