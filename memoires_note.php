<?php include('header.php');?>
<div class="body_content">
    <div class="row">
        <div class="large-8 medium-8 small-12 columns">
            <div class="simple_content">
                <nav class="breadcrumbs">
                </nav>
                <h2>Les mémoires les plus téléchargés</h2>
                        <?php
/////////////////////////////LANCEMENT DE MES REQUETTES POUR LES MEMOIRES////////////////////////////
                        ?>
<?php
$tableName="memoire";
$targetpage = "index.php";
$limit = 10;
$conn=connexpdo("sendoc","parametre");
$query =$conn->query("SELECT COUNT(*) as 'num' FROM $tableName, categorie where     $tableName.CodeCategorie=categorie.CodeCategorie and nbConsultation >=7 order by nbConsultation DESC");
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
$result = $conn->query("SELECT * FROM $tableName , categorie where    $tableName.CodeCategorie=categorie.CodeCategorie and nbConsultation >=7 order by nbConsultation DESC LIMIT $start, $limit");


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
<?php //si la cookie exite et la variable de session transmis///////////////////////// ////////       ?>

<?php
$compteur=0;
while($row = $result->fetch(PDO::FETCH_ASSOC)){
    $compteur++; // incrementer le compteur
    $code=$row['CodeMemoire'];
    $_SESSION['CodeMemoire']=$code;
    if(($compteur % 2)!=0) {   // tester si le reste de la division==1
                        ?>
                        <div class="large-6 medium-12 small-12 columns">
                            <div class="memory_container">
                                <?php   echo  "<a href='memoire.php?q=$code'>"; ?>
                                <div class="memory">
                                    <h4 class="memory_title"><?php echo $row['TitreMemoire'];?></h4>
                                    <span class="memory_category"><?php echo $row['NomCategorie'];?> <?php echo ($row['NiveauAuteur']);?></span>
                                    <p class="memory_description">
                                        <?php echo   $row['DescriptionMemoire'];?>
                                    </p>
                                    <span class="author">Par <?php echo $row['PrenomAuteur']; ?> <?php echo   $row['NomAuteur'];?></span>
                                    <span class="author">Le <?php echo $row['DateEnregistrement']; ?></span>
<span class="memory_download"><i class="fa fa-download"></i>Télécharger <?php echo $row['nbConsultation']; ?> fois</span>
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
                            <div class="memory">
                                <?php   echo  "<a href='memoire.php?q=$code'>"; ?>
                                <h4 class="memory_title"><?php echo $row['TitreMemoire'];?></h4>
                                <span class="memory_category"><?php echo $row['NomCategorie'];?> <?php echo ($row['NiveauAuteur']);?></span>
                                <p class="memory_description">
                                    <?php echo   $row['DescriptionMemoire'];?>
                                </p>
                                <span class="author">Par <?php echo $row['PrenomAuteur']; ?> <?php echo   $row['NomAuteur'];?></span>
                                <span class="author">Le <?php echo $row['DateEnregistrement']; ?>                                           </span>
                                <span class="memory_download"><i class="fa fa-download"></i>Télécharger <?php echo $row['nbConsultation']; ?> fois</span>
                            </div>
                            </a>
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
        <?php include('sidebar.php'); ?>
    </div><!--row-->
</div><!--body_content-->
<?php include('footer.php');?>

