<?php session_start();
if(isset($_POST['login'])){
$login=htmlentities($_POST['login']);
}

if(isset($_POST['pasword'])){
$password=htmlentities($_POST['password']);
}

if(isset($_POST['souvenir'])){
 $souvenir= htmlentities($_POST['souvenir']);
}

// variable de session
$_SESSION['login']=$login;
$_SESSION['password']=$password;
$_SESSION['souvenir']=$souvenir;


 // j ouvre la connexion a ma base de donnee
   $conn=new PDO('mysql:host=localhost, dbbname=sendoc', '', '') ;
   $requete=$conn->query("Select * from inscription where NomUtilisateur='$login' and MotDePasseEtudiant='$password'");
    $row=$requete->rowCount();
    if($row==1){
        header('location:memoire.php');
        }
   else
       echo "Vous n'avez pas ncore de compte"

///////////////////////////////////////////////////////////////////////////////////////////////////////


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
        <link rel="stylesheet" href="css/slicknav.css" />
        <link rel="stylesheet" href="css/font-awesome.css" />
        <link rel="stylesheet" href="css/jquery.custom-scrollbar.css" />

        <!-- OWL carousel   -->

        <link href="css/owl.carousel.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/owl.theme.css" rel="stylesheet" type="text/css" media="screen" />
        <link href="css/owl.transitions.css" rel="stylesheet" type="text/css" media="screen" />

        <!-- OWL carousel   -->

        <link href='http://fonts.googleapis.com/css?family=Biryani:300,400,600,700,800,900' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/foundation.css" />
        <script src="js/vendor/modernizr.js"></script>
        <script type='text/javascript' src='js/jquery-1.8.0.min.js'></script>
    </head>
    <body>
        <div class="bg_login">
            <div class="bloc_login">
                <h1>Sendoc <small>carrefour memoires </small></h1>
                <div class="form_login">
                   <div class="triangle"></div>
                    <form action="<?php echo $_SERVER['PHP_SELF'] ;?> " method="post" id="log_form">
                        <p><span class="span_input"><i class="fa fa-user"></i></span><input type="text" name="login" placeholder="Votre login" /></p>
                        <p><span class="span_input"><i class="fa fa-lock"></i></span><input type="password" name="password" placeholder="Votre mot de passe" /></p>
                        <label for="souvenir" class="souvenir">
                            <span class="switch_content">
                                <input type="checkbox" id="souvenir" name="souvenir"/>
                                <span class="switch">
                                    <span class="off">OUI</span>
                                    <span class="mid"></span>
                                    <span class="on">NON</span>
                                </span>
                            </span>
                            <em>Se souvenir de moi</em>
                        </label>
                        <a href="#" class="forget">Mot de passe oublié ?</a>
                        <div class="clear"></div>
                        <button type="submit"><i class="fa fa-sign-in"></i>connexion</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/main.js"></script>
        <script type="text/javascript" src="js/owl.carousel.js"></script>
        <script src="js/foundation.min.js">
        </script><script src="js/jquery.slicknav.min.js"></script>
        </script><script src="js/jquery.custom-scrollbar.js"></script>
    <script>
        $(document).foundation();
    </script>
    <script>
        $(function(){
            $('#menu').slicknav();
        });

        $("#pub_ban").owlCarousel({

            navigation : false, // Show next and prev buttons
            slideSpeed : 800,
            paginationSpeed : 1000,
            singleItem: true,
            autoPlay: true,
            pagination: true,
            rewindSpeed: 1000,
            stopOnHover: true
        });
        $("#concours_info").owlCarousel({

            navigation : false, // Show next and prev buttons
            slideSpeed : 800,
            paginationSpeed : 1000,
            singleItem: true,
            autoPlay: true,
            pagination: true,
            rewindSpeed: 1000,
            stopOnHover: true
        });
    </script>
    </body>

</html>
