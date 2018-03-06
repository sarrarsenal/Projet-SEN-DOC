<?php include('header.php');?>
<?php
include_once('Script/connexion.php');// inclusion de la page connexion
$conn=connexpdo("sendoc","parametre"); // connexion
// requette sql pour sortir les universites
    $requete_universite="select CodeUniversite, NomUniversite from universite order  by NomUniversite ASC";
    $result_universite=$conn->query($requete_universite); // execution de la requete
    $ligne_universite=$result_universite->fetch(PDO::FETCH_ASSOC);
?>

<div class="body_content">
    <div class="row">
        <div class="large-8 medium-8 small-12 columns">
            <nav class="breadcrumbs">
                <a href="#">Accueil </a><i class="fa fa-chevron-right"></i>
                <a class="unavailable">Inscription</a>
            </nav>
            <h2 class="register_title">Créer votre compte <span class="sen">Sen</span> <span class="doc">doc</span> gratuitement...</h2>
            <div class="success_register">
                <span>Incription reussie ! Veuillez consulter vos mails pour activer votre compte</span>
                <i class="close fa fa-close"></i>
            </div>
            <div class="register_form">
                <form action="Script/PageInscription.php" method="post" id="form">
                   <div id='nom_error' class='errorbis'> veuillez entrer votre nom  <i class=" fa fa-close hide " ></i></div>
                    <span><i class="fa fa-user"></i></span>
                    <em><input type="text" name="nom" placeholder="Votre nom" id="nom" /><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>
                    <div id='prenom_error' class='errorbis'> veuillez entrer votre prenom  <i class=" fa fa-close hide " ></i></div>
                <span><i class="fa fa-user"></i></span>
                    <em><input type="text" name="prenom" placeholder="Votre prenom" id="prenom" /><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>
 <div id='username_error' class='errorbis'> veuillez entrer votre nom d'utilisateur  <i class=" fa fa-close hide " ></i></div>
            <span><i class="fa fa-user"></i></span>
                    <em><input type="text" name="username" placeholder="Nom d'utilisateur" id="nomUser" /><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>
                    <div id='email_error' class='errorbis'> veuillez entrer votre adrésse email <i class=" fa fa-close hide " ></i></div>
                        
                    <div id='email_existe' class='erroremail'> l'email existe déja <i class=" fa fa-close hide " ></i></div>
                        
                    <div id='emailmatch_error' class='errorbis'> Cet email est invalide <i class=" fa fa-close hide " ></i></div>
        <span><i class="fa fa-envelope"></i></span>
                    <em><input type="text" name="email" placeholder="Votre email" id="email" /><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>

                    <div id='passwordConfirm_error' class='errorbis'> les deux mot de passe ne sont pas identiques <i class=" fa fa-close hide " ></i></div>
<div id='password_error' class='errorbis'> veuillez entrer votre mot de passe <i class=" fa fa-close hide " ></i></div>
    <span><i class="fa fa-lock"></i></span>
                    <em><input type="password" name="password" class="password" placeholder="Mot de passe" id="passwordd"/><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>
<div id='passwordConfirm_error' class='errorbis'> veuillez entrer votre mot de passe  de confirmation <i class=" fa fa-close hide " ></i></div>
<span><i class="fa fa-lock"></i></span>
                    <em><input type="password" name="confirm" class="confirm" placeholder="Confirmer le mot de passe"  id="passwordConfirm" /><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>

<span><i class="fa fa-university"></i></span>
<select name="universite" class="university">
    <?php do { $CodeUniversite=$ligne_universite['CodeUniversite'];
                                $NomUniversite=$ligne_universite['NomUniversite'];?>
                                <option  value="<?php echo $CodeUniversite?>">
                                <?php echo $NomUniversite;
                  }
                                while($ligne_universite=$result_universite->fetch(PDO::FETCH_ASSOC))
                           ?>
</select>
<div class="sexe_choise">
    Vous êtes : <input type="radio" name="sexe" id="homme" value="homme" checked /><label for="homme">Un homme</label>
    <input type="radio" name="sexe" id="femme" value="femme" /><label for="femme">Une femme</label>
</div>
<button id="valider" name="valider" id="valider"><i class="fa fa-send"></i>Valider</button>
<img src="images/loader.gif" alt="chargement" height="60" width="60" class="loader"/>
</form>
</div><!--register_form-->
</div>
<?php include('sidebar-other.php'); ?>
</div><!--row-->
</div><!--content_body-->
<?php include('footer.php');?>

<!--code jquery pour control du formulaire-->
<script type="text/javascript">

   $(document).ready(function(){
       $('.loader').hide();
        $('#valider').click(function(e){
            e.preventDefault();
            var error = false;
            var nom = $('#nom').val();
            var prenom = $('#prenom').val();
            var username = $('#nomUser').val();
            var email = $('#email').val();
            var password = $('#passwordd').val();
            $(this).parent().find('.success').addClass('hide');
            var passwordConfirm = $('#passwordConfirm').val();

            if(nom.length == 0){
                var error = true;
                $('#nom_error').fadeIn(1000);
            }else{
                $('#nom_error').fadeOut(1000);
            }

            if(prenom.length == 0){
                var error = true;
                $('#prenom_error').fadeIn(1000);
            }else{
                $('#prenom_error').fadeOut(1000);
            }

           if(username.length == 0){
                var error = true;
                $('#username_error').fadeIn(1000);
            }else{
                $('#username_error').fadeOut(1000);
            }


             if(email.length == 0){
                var error = true;
                $('#email_error').fadeIn(1000);
            }else{
                $('#email_error').fadeOut(1000);
            }
            
            if(!email.match(/[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]+/i)&& email!=""){
                var error = true;
                $('#emailmatch_error').fadeIn(1000);
                //$('#email_existe').fadeOut(1000);
            }
            else{
            $('#emailmatch_error').fadeOut(1000);   
            }
            

            if(password.length == 0){
                var error = true;
                $('#password_error').fadeIn(1000);
            }else{
                $('#password_error').fadeOut(1000);
                // var password1=$('#password').val();
            }

            if(passwordConfirm.length == 0){
                var error = true;
                $('#passwordConfirm_error').fadeIn(1000);
            }else{
                $('#passwordConfirm_error').fadeOut(1000);
               
            }

            if(password!=passwordConfirm){
                 var error = true;
                $('#passwordConfirm_error').fadeIn(1000);
             
           }


            if(error == false){
                 $.post("Script/PageInscription.php",
                        $("#form").serialize(),function(result){
                   //alert(result);
                    if(result=="inscris"){
                        $('.loader').fadeIn();  
                      $('#nom').val("");
                      $('#prenom').val("");
                      $('#nomUser').val("");
                      $('#email').val("");
                      $('#passwordd').val("");
                      $('#passwordConfirm').val("");
                        $('.erroremail').fadeOut(1000);
                        $('.success_register').fadeIn('slow',function(){
                            $('.loader').fadeOut(); 
                        });
                       
                    }else if(result=="mail existe deja"){
                        $('.erroremail').fadeIn(1000);
                        $('.success_register').fadeOut(1000);
                        $('#email').val("");
                        $('#nom').val("");
                        $('#prenom').val("");
                        $('#nomUser').val("");
                        $('#email').val("");
                        $('#passwordd').val("");
                        $('#passwordConfirm').val("");
                       
                    }
                });
            }
        });
    });
      </script>
