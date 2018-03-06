<?php session_start();
error_reporting(0);
if(isset($_SESSION)){
    $login_on=$_SESSION['login']; // recupération de la valeur de login
    include_once('Script/connexion.php'); // inclusion de la page connexion
    $conn=connexpdo("sendoc","parametre"); // la connexion
    $requette=$conn->query("Select * from inscription where EmailEtudiant='".$login_on."' " ) ;
    $data=$requette->fetch(PDO::FETCH_ASSOC);
    $etatCompte = $data['EtatCompte'];

}
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html class="no-js lt-ie9" lang="en" >
<![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en" > <!--<![endif]-->
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="keywords" content="memoire, etudiant, senegal" >
        <meta name="description" content="Sen-Doc, Le Site Web">
        <meta name="author" content="Sen Doc">

        <title>Sen Doc | Vos mémoires en ligne</title>
        <link rel="stylesheet" href="css/responsive.css" />
        <link rel="stylesheet" href="css/style.css" />
        <link rel="icon" href="images/favicon.ico" />
        <link rel="stylesheet" href="css/slicknav.css" />
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link rel="stylesheet" href="css/jquery.custom-scrollbar.css" />

        <!-- OWL carousel   -->

        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/owl.transitions.css" rel="stylesheet" type="text/css" media="screen" />

        <!-- OWL carousel   -->

        <!-- Smiley   -->
        <link href="css/jquery.cssemoticons.css" rel="stylesheet" type="text/css" media="screen" />

        <link href='http://fonts.googleapis.com/css?family=Biryani:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/foundation.css" />
        <script src="js/vendor/modernizr.js"></script>
        <script src="js/jquery-1.8.0.min.js"></script>


    </head>
    <body>

        <div class="bg_login">
            <div class="bloc_login">
                <p class="p_close_login"><i class="fa fa-close close_login" title="Fermer"></i></p>
                <h1>Sendoc <small>carrefour memoires </small></h1>
                <div class="form_login">
                    <div class="triangle"></div>
                    <h4>
                        IL FAUT ÊTRE INSCRIT POUR TÉLÉCHARGER UN MÉMOIRE. SI VOUS N'AVEZ PAS ENCORE DE COMPTE CREEZ EN UN GRATUITEMENT EN CLIQUANT <a href="inscription.php">ICI</a>
                    </h4>
                    <form action= "membre.php"  method="post"  id="form_membre">
                        <div id="login_actif" class="errorbis"> Veuillez activer votre compte ! </div>
                        <div id="login_passe" class="errorbis"> Login et/ou Mot de Passe Invalide </div>
                        <div id="login_error" class="errorbis"> veuillez entrer votre adrésse email </div>

                        <p><p></p><span class="span_input"><i class="fa fa-envelope"></i></span><input type="text" name="login" placeholder="Votre Email" id="login"/></p>

                    <div id='password_error' class='errorbis'> veuillez entrer votre mot de passe </div>
                    <p><span class="span_input"><i class="fa fa-lock"></i></span><input type="password" name="password" placeholder="Votre mot de passe" id="password"/></p>
                    <label for="souvenir" class="souvenir">
                        <span class="switch_content">
                            <input type ="checkbox" name = "souvenir" id="souvenir" value="<?php //if (isset($_COOKIE['souvenir'])){
// echo 'checked = "checked"';
// }
// else {
// echo '';
// }
                                                                                           ?>">
                            <span class="switch">
                                <span class="off" >OUI</span>
                                <span class="mid"></span>
                                <span class="on">NON</span>
                            </span>
                        </span>
                        <em>Se souvenir de moi</em>
                    </label>
                    <a href="#" class="forget_btn">Mot de passe oublié ?</a>
                    <div class="clear"></div>
                    <button name="connexion" type="submit" id="connexion"><i class="fa fa-sign-in"></i>connexion</button>
                    </form>
            </div>
        </div>
        </div><!-- LOGIN -->
    <div class="bg_forget">
        <div class="bloc_forget">
            <p class="p_close_forget"><i class="fa fa-close close_login" title="Fermer"></i></p>
            <div class="form_forget">
                <div class="triangle"></div>
                <h4>
                    VOTRE MOT DE PASSE SERA ENVOYER SUR VOTRE COMPTE. VEUILLEZ CONSULTER VOTRE BOITE MAIL APRES CONFIRMATION POUR LE RECUPEER
                </h4>
                <form action= "#"  method="post"  id="form_forget">
                    <div id="email_error_forget" class="errorbis"> adrésse email invalide </div>
                    <div id="email_error_forgetbad" class="errorbis"> adrésse email inexistant</div>
                    <div class="success_register" class="errorbis"> Votre mot de passe vous &aacute; été envoyé  </div>

                    <p><p></p><span class="span_input"><i class="fa fa-envelope"></i></span><input type="text" name="email_forget" placeholder="Votre email" id="pass_forget"/></p>
                <div class="clear"></div>
                <button name="forget" type="submit" id="forget"><i class="fa fa-sign-in"></i>confirmer</button>
                </form>
        </div>
    </div>
    </div><!-- MOT DE PASSE OUBLIER -->

<?php
if(isset($page_en_cours) and $page_en_cours == "index"){
    //  include('zoom_box.php');
}
?>
<div id="contain">
    <div id="header">
        <div class="top_header">
            <div class="row">
                <div class="large-6 medium-6 small-12 columns">
                    <div class="contact">
                        <ul>
                            <li><i class="fa fa-phone"></i> (+221) 77 713 27 91 - 77 468 80 60</li>
                            <li><i class="fa fa-envelope"></i> contact@sendoc.sn</li>
                        </ul>
                    </div>
                </div>
                <div class="large-6 medium-6 small-12 columns">
                    <div class="compte">
                        <ul>
                            <li><a href="inscription.php">Ouvrir un compte</a></li>
                            <?php  if($login_on && $etatCompte == 1 ){ echo"
         <li><a href='logout.php' class='login_form'> Déconnexion <i class='fa fa-sign-out'>  </i></a></li>";} else { echo"
        <li><a href='#' class='login_form'>Connexion</a></li>";}   ?>
                            <li class="count"><?php include_once('Script/counter.php');
echo " Total En ligne : $c_online";
                                ?></li>

                        </ul>
                    </div>
                </div>
            </div><!--row-->
        </div><!--top_header-->
        <div class="bottom_header">
            <div class="row">
                <div class="large-2 medium-2 small-12 columns">
                    <div class="logo">
                        <img src="images/logo.png" alt="logo" />
                    </div>
                </div>
                <div class="large-8 medium-8 small-12 columns">
                    <div class="search">
                        <form method="post" action="recherche_memoire.php" class="form_search" id="form_search">
                            <input type="text" name="search_memory" placeholder="Trouver des mémoires" autocomplete="off" />
                            <button id="chercher" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!--search-->
                </div>
                <div class="large-2 medium-2 small-12 columns">
                    <div class="network_hader">
                        <ul>
                            <li><a href="https://www.facebook.com/pages/Sen-Doc/1605082233070143" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div><!--row-->
        </div><!--bottom_header-->

        <?php   // Menu dynamique des types  memoires
include_once('Script/connexion.php');
// requette sql pour sortir les menues
$conn=connexpdo("sendoc","parametre");
$requete_categorie="select CodeCategorie, NomCategorie from categorie order by NomCategorie ASC ";
$result_categorie=$conn->query( $requete_categorie);
$ligne_categorie=$result_categorie->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="menu">
            <div class="row">
                <div class="large-8 medium-8 small-8 columns">
                    <ul id="menu">
                        <li class="index"><a href="index.php">accueil</a></li>
                        <li class="cat"><a href="#">catégories</a>
                            <ul class="category_menu">
                                <?php
while($row = $result_categorie->fetch(PDO::FETCH_ASSOC))
    // ouverture du while pour recuperer les elemnts de menu
{
    $CodeCategorie=$row['CodeCategorie'];
                                ?>
                                <li>
                                    <?php echo"<a href='Memoire_Categorie.php?search=$CodeCategorie'>
                                        <i class='fa fa-chevron-right'></i> ".$row['NomCategorie']." </a>";
}?>
                            </ul>
                        </li>
                        <li class="plus_telecharger"><a href="memoires_note.php">les plus téléchargés</a></li>
                    </ul>
                </div>
                <div class="large-4 medium-4 small-12 columns">
                    <div class="upload_memory">
                        <a href="publier_memoire.php"><i class="fa fa-upload"></i>publier</a>
                    </div>
                </div>
            </div><!--row-->
        </div><!--menu-->
    </div><!--header-->
    <div class="banner_pub"></div><!--banner_pub-->
    <?php //session_unset($login_on); ?>
    <!--code jquery pour control du formulaire-->

    <script type="text/javascript">

        $(document).ready(function(){
            
            $('#connexion').click(function(e){
                e.preventDefault();
                var error = false;
                var login = $('#login').val();
                var password = $('#password').val();
                if(login.length == 0){
                    var error = true;
                    $('#login_error').fadeIn(1000);
                }else{
                    $('#login_error').fadeOut(1000);
                }

                if(password.length == 0){
                    var error = true;
                    $('#password_error').fadeIn(1000);
                }else{
                    $('#password_error').fadeOut(1000);
                }
                
                if(error == false){
                    $.post("membre.php", $("#form_membre").serialize(),function(result){
                        if(result=="ok"){
                            var page_current = document.URL;
                            window.location.reload();
                            $('#login').val("");
                            $('#password').val("");
                        }else if(result=="inactif"){
                            $('#login_actif').fadeIn(1000);
                            $('#login_passe').fadeOut();
                        }
                        else if(result=="fail")
                        {
                            $('#login_actif').fadeOut();
                            $('#login_passe').fadeIn(1000);
                            
                        }
                    });
                }
            });

            
            //RECUPERATION MOT DE PASSE
            $('#forget').click(function(e){
                e.preventDefault();
                var error = false;
                var email= $('#pass_forget').val();
                if(email.length == 0){
                    var error = true;
                    $('#email_error_forget').fadeIn(1000);
                }else{
                    $('#email_error_forget').fadeOut(1000);
                }

                if(error == false){
                    $.post("Script/forget.php", $("#form_forget").serialize(),function(result){
                        if(result=="envoye"){
                            $('#pass_forget').val("");
                            $('.success_register').fadeIn(1000);
                            $('#email_error_forget').fadeOut(1000);
                            $('#email_error_forgetbad').fadeOut(1000);
                        }
                        else if(result=="compte inexistant"){
                            $('#pass_forget').val("");
                            //alert(result);
                            $('.success_register').fadeOut(1000);
                            $('#email_error_forgetbad').fadeIn(1000);
                            $('#email_error_forget').fadeOut(1000);
                        }
                        
                        else{
                            $('#email_error_forget').fadeIn(1000);
                            $('.success_register').fadeOut(1000);
                            $('#email_error_forgetbad').fadeOut(1000);
                            $('#pass_forget').val("");
                        }
                        
                    });
                }
            });
        });
    </script>
