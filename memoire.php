<?php
include('header.php');
/////////////////////////////////////
//$ttl = 3600;
//session_set_cookie_params($ttl);
//error_reporting(0);
// script pour traitment
$conn=connexpdo("sendoc","parametre");
	 if(isset($_SESSION['CodeMemoire'])){
		 $Code=htmlentities($_GET['q']);
		 $login=htmlentities($_SESSION['login']);
	 }
if(isset($_GET['search'])){
	$Code=htmlentities(intval($_GET['search']));
}
//}
	$query =$conn->query("SELECT * FROM memoire, categorie where        memoire.CodeCategorie=categorie.CodeCategorie and  memoire.CodeMemoire='$Code' ");
	$resultat = $query->fetch(PDO::FETCH_ASSOC);
			  $description=$resultat['DescriptionMemoire'];
			  $categorie=$resultat['NomCategorie'];
			  $titre=$resultat['TitreMemoire'];
			  $Nom=$resultat['NomAuteur'];
			  $Prenom=$resultat['PrenomAuteur'];
			  $DateEnregistrement=$resultat['DateEnregistrement'];
			  $CodeCategorie=$resultat['CodeCategorie'];
			  $NomFichier=$resultat['NomFichier'];
                
$CodeMemoire=$resultat['CodeMemoire'];

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
/////////////////////////////////LANCEMENT DE MES REQUETTES POUR LES MEMOIRES//////////////////////////
?>
<?php
	$tableName="memoire";
	$targetpage = "recherche_memoire.php";
	$limit = 6;
	$conn=connexpdo("sendoc","parametre");
	$query =$conn->query("SELECT COUNT(*) as 'num' FROM $tableName, categorie where     $tableName.CodeCategorie=categorie.CodeCategorie and categorie.CodeCategorie = '$CodeCategorie' and memoire.CodeMemoire!='$Code' ");
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
$result = $conn->query("SELECT * FROM $tableName , categorie where    $tableName.CodeCategorie=categorie.CodeCategorie  and categorie.CodeCategorie = '$CodeCategorie' and memoire.CodeMemoire!='$Code'   LIMIT $start, $limit");
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
		<div class="large-8 medium-8 small-12 columns similary_memory">
			<div class="simple_content">
				<nav class="breadcrumbs">
					<a href="index.php">Accueil </a><i class="fa fa-chevron-right"></i>
					<a class="unavailable"> <?php echo $categorie; ?></a>
				</nav>
				<div class="single_memory">
					<div class="title_current">
                        <h2><?php echo $titre; ?></h2>
					</div>
					<div class="description_current">
						<p>
							<?php echo $description; ?>
						</p>
					</div>
					<div class="author_current">
						<i>Posté par <?php echo $Nom; ?> <?php echo $Prenom; ?> le <em><?php echo dateFr($DateEnregistrement); ?></em></i>
					</div>
					<?php if($login=="") // si user non connecte on lui force de se coonecter d'abord
					{ echo "
					<div class='download_current'>
						<a href='#' class='login_form' ><i class='fa fa-download'></i> Télécharger</a>";
					} // fin du if connexion user
				  else
				{ echo
					"<div class='download_current'>
<a href='MEMOIRES/MEMOIRES_GLOBALE/$NomFichier' onclick=\"go(".$resultat['CodeMemoire'].", this);\"> <i class= 'fa fa-download'></i> Télécharger </a>";  } ?>
					</div>

	<?php //.......................... requette pour lister les commentaires............ ?>

				<ol id="update" class="timeline">
					<?php // lsiter les commentaire en fonction du codeMemoire
$sql=$conn->query("select CodeMemoire, NomUser, MailUser,CommentaireText, HOUR(DateCommentaire) as heure, DATE(DateCommentaire) as date, MINUTE(DateCommentaire) as minute, SECOND (DateCommentaire) as seconde from commentaire where CodeMemoire='$Code' order by DateCommentaire DESC LIMIT 20");
while($row=$sql->fetch(PDO::FETCH_ASSOC))
{
	$nom=$row['NomUser'];
	$email=$row['MailUser'];
	$commentaire=$row['CommentaireText'];
	$lowercase = strtolower($email);
	$date=date('Y-m-d');
	$heure=date('H:i:s');
					 ?>
                    <li class="boite_liste_commentaire">
                        <div class="bloc_comments">
                            <div class="comment" id="div">
                                <div class="avatar"><img src="images/avatar/1.jpg" alt="1" height="100%" width="100%" />
                                </div>
                                <div class="box_comment">
                                    <div class="dialog"></div>   
                                    <div class="text_comment">

                                        <p><strong>  <?php echo ucwords($nom); ?> </strong>a dit : <i class="fa fa-calendar"> le <?php echo $row['date']; ?> à <?php echo $row['heure']; ?>:<?php echo $row['minute']; ?>:<?php echo $row['seconde']; ?> </i></p>
                                        <p class="text css-emoticon animated-emoticon">
                                            <?php echo $commentaire ; ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
<?php
     }// fin du while
	?>
</ol>
        <?php if($login == ""){ ?>
        <?php }else { ?>
                <div id="flash"></div> 
                <div class="form_comments" id="form_comments">
                    <h4>LAISSER VOTRE COMMENTAIRE </h4><br/>
                    <form action="#" method="post">
                        <input type="hidden" id="postid" name="postid" value="<?php echo $Code;?>"/>
                        <div id='nom_error' class='errorbis'> veuillez entrer votre pseudo <i class=" fa fa-close hide " ></i></div>
                        <input type="text" id="name" placeholder="votre pseudo" name="name"/>
                        <div id='emailmatch_error' class='errorbis'> Cet email est invalide <i class=" fa fa-close hide " ></i></div>
                        <div id='email_error' class='errorbis'> veuillez entrer votre adrésse email <i class=" fa fa-close hide " ></i></div>
                        <input type="text" id="email" placeholder="votre email" disabled name="email" value="<?php if($login != ""){echo $login;}else{} ?>" />
                        <div id='commentaire_error' class='errorbis'> veuillez entrer votre commentaire <i class=" fa fa-close hide " ></i></div>
                        <textarea id="comment" name="comment"></textarea>
                        <div class="bloc_smiley">
                            <span>:-)</span> <span>:)</span> <span>:o)</span> <span>:c)</span> <span>:^)</span> <span>:-D</span> <span>:-(</span> <span>:-9</span> <span>;-)</span> <span>:-P</span> <span>:-p</span> <span>:-Þ</span> <span>:-b</span> <span>:-O</span> <span>:-/</span> <span>:-X</span> <span>:-#</span> <span>:'( B-)</span> <span>8-)</span> <span>:-\</span> <span>;*(</span> <span>:-*</span> <span>:]</span> <span>:></span> <span>=]</span> <span>=)</span>                                    <span>8)</span> <span>:}</span> <span>:D</span> <span>8D</span> <span>XD</span> <span>xD</span> <span>=D</span> <span>:(</span> <span>:<</span> <span>:[</span> <span>:{</span> <span>=(</span> <span>;)</span> <span>;]</span> <span>;D</span> <span>:P</span> <span>:p</span> <span>=P</span> <span>=p</span> <span>:b</span> <span>:Þ</span> <span>:O 8O</span> <span>:/</span> <span>=/</span> <span>:S</span> <span>:#</span> <span>:X</span> <span>B)</span> <span>O:)</span><span><3</span>
                            <span>;(</span>
                            <span>>:)</span>
                            <span>>;)</span>
                            <span>>:(</span>
                            </div>
                            <br/>
                            <p><button name="poster" class="submit" type="submit">commenter</button></p>
                            </form>
                 </div>
        <?php }?>
    </div><!--large-8-->
<?php  $compteur=0;
while($row = $result->fetch(PDO::FETCH_ASSOC)){
	$CodeCategorie=$row['CodeCategorie'];
	$Code=$row['CodeMemoire'];
		  $compteur++; // incrementer le compteur
				   if(($compteur % 2)!=0) {  // tester si le reste de la division==1
					 ?>
					<div class="large-6 medium-12 small-12 columns">
						<div class="memory_container">
						<?php echo"<a href='memoire.php?search=$Code'>";?>
							<div class="memory">
								<h4 class="memory_title"><?php echo $row['TitreMemoire'];?></h4>
								<span class="memory_category"><?php echo $row['NomCategorie'];?> <?php echo ($row['NiveauAuteur']);?></span>
								<p class="memory_description">
									<?php echo   $row['DescriptionMemoire'];?>
								</p>
								<span class="author">Par <?php echo $row['PrenomAuteur']; ?> <?php echo   $row['NomAuteur'];?></span>
								<span class="author">Le <?php echo $row['DateEnregistrement']; ?></span>
								<span class="memory_download"><i class="fa fa-download"></i>Télécharger</span>
							</div>
						   </a>
						</div><!--memory_container-->
					</div><!--large-6-->

 <?php
   } // fin du if//////////////////////////////////////////////////////////////////////////////////////////
			else  { // debut du else ou $compteur%2 ==0
 ?>
					<div class="large-6 medium-12 small-12 columns">
						<div class="memory_container">
						 <?php echo"<a href='memoire.php?search=$Code'>"; ?>
							  <div class="memory">
							   <h4 class="memory_title"><?php echo $row['TitreMemoire'];?></h4>
							   <span class="memory_category"><?php echo $row['NomCategorie'];?> <?php echo ($row['NiveauAuteur']);?></span>
								<p class="memory_description">
									<?php echo   $row['DescriptionMemoire'];?>
								</p>
								<span class="author">Par <?php echo $row['PrenomAuteur']; ?> <?php echo   $row['NomAuteur'];?></span>
								<span class="author">Le <?php echo $row['DateEnregistrement']; ?></span>
								  <span class="memory_download"><i class="fa fa-download"></i>Télécharger</span>
							</div>
						  </a>
						</div><!--memory_container-->
					 </div><!-- one memory -->

				  <?php
				 }  // fin du else////////////////////////////////////////////////////////////////////
			   } // fin du while//////////////////////////////////////////////////////////////////////
			  ?>
            <div class="row">
                <div class="large-12 small-12 medium-12 columns">
                    <?php  echo $paginate; // pour la pagination///////////////////////////////////////////////////?>
                </div>

            </div>
		   </div><!--simple_content-->
		 </div><!--large-8-->

<?php // Menu dynamique des types  memoires/////////////////////////////////////////////
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
				 {  $Code=$row['CodeCategorie'];
				   ?>
	  <li><?php echo"<a href='Memoire_Categorie.php?search=$Code'>
	  <i class='fa fa-chevron-right'></i> ".$row['NomCategorie']."</a>";
				 }?></li>
				</ul>
			</div>
		</div>
		<?php include('sidebar-other.php');?>
	</div>
</div><!--body_content-->
<?php include('footer.php');?>

<script type="text/javascript">
	function go(data, obj) {
		$.post("compteur.php", {CodeMemoire : data}, null);
		//alert(data);
		window.open(obj.href);
		return false;
	};
</script>
<script type='text/javascript'>
	$(function() {
		$(".submit").click(function(){ 
			var error=false;	   
			var name = $("#name").val();
			var email = $("#email").val();
			var comment = $("#comment").val();
			var postid = $("#postid").val();
		var dataString = 'name='+ name + '&email=' + email + '&comment=' + comment+ '&postid=' + postid;
			if(name.length == 0){
				var error = true;
				$('#nom_error').fadeIn(1000);
			}else{
				$('#nom_error').fadeOut(1000);
			}
			
			if(!email.match(/[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]+/i)&& email!=" "){
				var error = true;
				$('#emailmatch_error').fadeIn(1000);
				
			}
			else{
				$('#emailmatch_error').fadeOut(1000);   
			}
			
			if(email.length == 0){
				var error = true;
				$('#email_error').fadeIn(1000);
				$('#emailmatch_error').hide(); 
			}else{
				$('#email_error').fadeOut(1000);
			}

			
			if(comment==""){
			//alert('commentaire vide');
				var error = true;
				$('#commentaire_error').fadeIn(1000);
			}else{
				$('#commentaire_error').fadeOut(1000);
			}
		
			
			if(error==false)
			{
				$('#emailmatch_error').fadeOut(1000); 
				$('#email_error').fadeOut(1000);
				$('#nom_error').fadeOut(1000);
				$('#commentaire_error').fadeOut(1000);
				$('input').val("");
				$('#comment').val("");
				$("#flash").show();
				$("#flash").fadeIn(400).html('<img src="ajax-loader.gif" />Loading Comment...');
				$.ajax({
					type: "POST",
					url: "commentajax.php",
					data: dataString,
					cache: false,
					success: function(html){
						$("ol#update").append(html);
						$("ol#update li:last").fadeIn("slow");
						$("#flash").hide();
					}
				});
			}return false;
		}); });
</script>
