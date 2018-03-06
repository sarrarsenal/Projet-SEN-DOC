<?php
session_start();
include('header.php');
error_reporting(0);
// script pour traitement
$conn=connexpdo("sendoc","parametre");
	if(isset($_GET['search']))
	{
	 $code=$_GET['search'];
	 $_SESSION['search']=$code;
	}

	if(isset($_GET['categorie']))
	{
	 $Newcode=$_GET['categorie'];
	 $_SESSION['categorie']=$Newcode;
	}



	$query =$conn->query("SELECT * FROM memoire, categorie where        memoire.CodeCategorie=categorie.CodeCategorie and  memoire.CodeMemoire='$code'");
	$resultat = $query->fetch(PDO::FETCH_ASSOC);
			  $description=$resultat['DescriptionMemoire'];
			  $categorie=$resultat['NomCategorie'];
			  $titre=$resultat['TitreMemoire'];
			  $Nom=$resultat['NomAuteur'];
			  $Prenom=$resultat['PrenomAuteur'];
			  $DateEnregistrement=$resultat['DateEnregistrement'];
			  $CodeCategorie=$resultat['CodeCategorie'];

////////////////////////////////DEBUT CONVERSION DATE EN FRANCAIS////////////////////////////

// convertir la date en format français
/* Configure le script en français */
setlocale (LC_TIME, 'fr_FR','fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Definit l'encodage interne
mb_internal_encoding("UTF-8");
//Convertir une date US en françcais
function dateFr($date){
return strftime('%d-%m-%Y',strtotime($date));
}

/////////////////////////////////FIN CONVERSION DATE EN FRANCAIS////////////////////////////

?>

<?php
/////////////////////////////////LANCEMENT DE MES REQUETTES POUR LES MEMOIRES////////////////////////////
?>
<?php
	$tableName="memoire";
	$targetpage = "recherche_memoire.php";
	$limit = 10;
	$conn=connexpdo("sendoc","parametre");
	$query =$conn->query("SELECT COUNT(*) as 'num' FROM $tableName, categorie where     $tableName.CodeCategorie=categorie.CodeCategorie and categorie.CodeCategorie = '$Newcode' and memoire.CodeMemoire!='$code' ");
	$total_pages = $query->fetch(PDO::FETCH_ASSOC);
	$total_pages = $total_pages['num'];
	$query->closeCursor();
////////////////////////////DEBUT BLOC PAGINATION////////////////////////////////////////////////////
  $stages = 3;
	$page = mysql_escape_string($_GET['page']);
	if($page){
		$start = ($page - 1) * $limit;
	}else{
		$start = 0;
		}

// obtenir les resultat pour le remplissage des div
$result = $conn->query("SELECT * FROM $tableName , categorie where    $tableName.CodeCategorie=categorie.CodeCategorie  and categorie.CodeCategorie = '$Newcode' and memoire.CodeMemoire!='$code'   LIMIT $start, $limit");
$nbligne=$result->rowCount();

	// Initial page numero
	if ($page == 0){$page = 1;}
	$prev = $page - 1;
	$Suivant = $page + 1;
	$lastpage = ceil($total_pages/$limit);
	$LastPagem1 = $lastpage - 1;

	$paginate = '';
	if($lastpage > 1)
	{

		$paginate .= "<div class='paginate'>";
		// Précedent
		if ($page > 1){
			$paginate.= "<a href='$targetpage?page=$prev'>Précedent</a>";
		}else{
			$paginate.= "<span class='disabled'>Précedent</span>";	}



		// Pages
		if ($lastpage < 7 + ($stages * 2))
		{
			for ($counter = 1; $counter <= $lastpage; $counter++)
			{
				if ($counter == $page){
					$paginate.= "<span class='current'>$counter</span>";
				}else{
					$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
			}
		}
		elseif($lastpage > 5 + ($stages * 2))
		{

			if($page < 1 + ($stages * 2))
			{
				for ($counter = 1; $counter < 4 + ($stages * 2); $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
				}
				$paginate.= "";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
			}

			elseif($lastpage - ($stages * 2) > $page && $page > ($stages * 2))
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "";
				for ($counter = $page - $stages; $counter <= $page + $stages; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
				}
				$paginate.= "";
				$paginate.= "<a href='$targetpage?page=$LastPagem1'>$LastPagem1</a>";
				$paginate.= "<a href='$targetpage?page=$lastpage'>$lastpage</a>";
			}

			else
			{
				$paginate.= "<a href='$targetpage?page=1'>1</a>";
				$paginate.= "<a href='$targetpage?page=2'>2</a>";
				$paginate.= "";
				for ($counter = $lastpage - (2 + ($stages * 2)); $counter <= $lastpage; $counter++)
				{
					if ($counter == $page){
						$paginate.= "<span class='current'>$counter</span>";
					}else{
						$paginate.= "<a href='$targetpage?page=$counter'>$counter</a>";}
				}
			}
		}


		if ($page < $counter - 1){
			$paginate.= "<a href='$targetpage?page=$Suivant'>Suivant</a>";
		}else{
			$paginate.= "<span class='disabled'>Suivant</span>";
			}

		$paginate.= "</div>";
}
//////////////////////////////////FIN BLOC PAGINATION/////////////////////////////////////////////////?>

<div class="body_content">
	<div class="row">
		<div class="large-8 medium-8 small-12 columns">
			<div class="simple_content">
				<nav class="breadcrumbs">
					<a href="#">Accueil </a><i class="fa fa-chevron-right"></i>
					<a href="#">Informatique</a>
					<i class="fa fa-chevron-right"></i>
					<a class="unavailable"> <?php echo $categorie; ?></a>
				</nav>
				<div class="single_memory">
					<div class="title_current">
						 <h2><?php echo $categorie; ?></h2>
					</div>
					<div class="description_current">
						<p>
							<?php echo $description; ?>
						</p>
					</div>
					<div class="author_current">
						<i>Posté par <?php echo $Nom; ?> <?php echo $Prenom; ?> le <em><?php echo dateFr($DateEnregistrement); ?></em></i>
					</div>
					<div class="download_current">
						<a href="login.php"><i class="fa fa-download"></i> Télécharger</a>
					</div>
				</div><!--Single_memory-->
				<h2>Autres mémoire en <?php echo $categorie; ?></h2>
				<?php  $compteur=0;
while($row = $result->fetch(PDO::FETCH_ASSOC)){
	$CodeCategorie=$row['CodeCategorie'];
		  $compteur++; // incrementer le compteur
				   if(($compteur % 2)!=0) {  // tester si le reste de la division==1
					 ?>
					<div class="large-6 medium-12 small-12 columns">
						<div class="memory_container">
						<a href="../MEMOIRES/MEMOIRE_GLOBALE/<?php echo $row['NomFichier']; ?>"; </a>	   <div class="memory">
								<h4 class="memory_title"><?php echo $row['TitreMemoire'];?></h4>
								<span class="memory_category"><?php echo $row['NomCategorie'];?> <?php echo ($row['NiveauAuteur']);?></span>
								<p class="memory_description">
									<?php echo   $row['DescriptionMemoire'];?>
								</p>
								<span class="author">Par <?php echo $row['PrenomAuteur']; ?> <?php echo   $row['NomAuteur'];?></span>
								<span class="author">Le <?php echo $row['DateEnregistrement']; ?></span>
								<span class="memory_download"><i class="fa fa-download"></i><?php include"telechargements/image.zip.txt"?></span>
							</div>
						</div><!--memory_container-->
					</div><!--large-6-->

 <?php
   } // fin du if//////////////////////////////////////////////////////////////////////////////////////////
			else if(($compteur % 2)==0) { // debut du else ou $compteur%2 ==0
 ?>
					<div class="large-6 medium-12 small-12 columns">
						<div class="memory_container">
						 <a href="../MEMOIRES/MEMOIRE_GLOBALE/<?php echo $row['NomFichier']; ?>"; </a>	                           <div class="memory">
							   <h4 class="memory_title"><?php echo $row['TitreMemoire'];?></h4>
							   <span class="memory_category"><?php echo $row['NomCategorie'];?> <?php echo ($row['NiveauAuteur']);?></span>
								<p class="memory_description">
									<?php echo   $row['DescriptionMemoire'];?>
								</p>
								<span class="author">Par <?php echo $row['PrenomAuteur']; ?> <?php echo   $row['NomAuteur'];?></span>
								<span class="author">Le <?php echo $row['DateEnregistrement']; ?></span>
							   <span class="memory_download"><i class="fa fa-download"></i></span>
							</div>
						</div><!--memory_container-->
					 </div><!-- one memory -->

				  <?php
				 }  // fin du else////////////////////////////////////////////////////////////////////////
			   } // fin du while//////////////////////////////////////////////////////////////////////////
			  ?>
                <div class="row">
                    <div class="large-12 small-12 medium-12 columns">
                        <?php  echo $paginate; // pour la pagination///////////////////////////////////////////////////?>
                    </div>

                </div>
		   </div><!--simple_content-->
		 </div><!--large-8-->
		<?php   // Menu dynamique des types  memoires

		// requette sql pour sortir les menues
		$conn=connexpdo("sendoc","parametre");
		$requete_categorie="select CodeCategorie, NomCategorie from categorie order by NomCategorie ASC ";
		$result_categorie=$conn->query( $requete_categorie);
		$ligne_categorie=$result_categorie->fetch(PDO::FETCH_ASSOC);
?>
		<div class="large-4 medium-4 small-12 columns">
			<div class="menu_cat">
				<ul>
				   <?php
				  while($row = $result_categorie->fetch(PDO::FETCH_ASSOC))
					 // ouverture du while pour recuperer les elemnts de menu
				 {  $CodeCategorie=$row['CodeCategorie'];
				   ?>
	  <li><?php echo"<a href='memoire_similaire.php?categorie=$Newcode&search=$code/Download'> <i class='fa fa-chevron-right'></i> ".$row['NomCategorie']." </a>"; }?></li>
				</ul>
			</div>
		</div>
		<?php include('sidebar-other.php');?>
	</div>
</div><!--body_content-->
<?php include('footer.php');?>
