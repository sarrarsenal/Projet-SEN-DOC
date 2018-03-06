<?php session_start();  
include_once('Script/connexion.php');
$conn=connexpdo("sendoc","parametre");
// convertir la date en format français
/* Configure le script en français */
setlocale (LC_TIME, 'fr_FR','fra');
//Définit le décalage horaire par défaut de toutes les fonctions date/heure
date_default_timezone_set("Europe/Paris");
//Definit l'encodage interne
mb_internal_encoding("UTF-8");
//Convertir une date US en françcais
function dateFr($date){
    return strftime('%d-%m-%Y',strtotime($date));}
if($_POST)
{
    $nom = htmlentities(addslashes($_POST['name']));
    $email = htmlentities($_POST['email']);
    $commentaire = htmlentities(addslashes($_POST['comment']));
    $Code=intval($_POST['postid']);
    $date = date('Y-m-d'); 
    
    $re=$conn->query("insert into commentaire(CodeMemoire,NomUser,MailUser,CommentaireText, DateCommentaire) values ('$Code','$nom', '$email','$commentaire',NOW())");
} 
?>
<li class="boite_liste_commentaire">
    <div class="bloc_comments">
        <div class="comment" id="div">
            <div class="avatar"><img src="images/avatar/1.jpg" alt="1" height="100%" width="100%" />
            </div>
            <div class="box_comment">
                <div class="dialog"></div>   
                <div class="text_comment">

                    <p><strong>  <?php echo ucwords($nom); ?> </strong>a dit : <i class="fa fa-calendar"> le <?php echo dateFr($date); ?> </i></p>
                    <p class="text css-emoticon animated-emoticon">
                        <?php echo $commentaire ; ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</li>