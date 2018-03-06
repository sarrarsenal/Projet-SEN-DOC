<?php include('header.php');?>
<?php
include_once('Script/connexion.php');
// requette sql pour sortir les categories
$conn=connexpdo("sendoc","parametre");
    $requete="select CodeCategorie, NomCategorie from categorie order  by NomCategorie ASC";
    $result=$conn->query($requete);
    $ligne=$result->fetch(PDO::FETCH_ASSOC);

// requette sql pour sortir les universites
    $requete_universite="select CodeUniversite, NomUniversite from universite order  by NomUniversite ASC";
    $result_universite=$conn->query($requete_universite);
    $ligne_universite=$result_universite->fetch(PDO::FETCH_ASSOC);
?>
<div class="body_content">
    <div class="row">
        <div class="large-8 medium-8 small-12 columns">
            <nav class="breadcrumbs">
                <a href="#">Accueil </a><i class="fa fa-chevron-right"></i>
                <a class="unavailable">Publier</a>
            </nav>
            <h2 class="register_title">Publier vos mémoires ou rapports de stage sur <span class="sen">Sen</span> <span class="doc">doc</span> ...</h2>
            <img src="images/loader.gif" alt="chargement" height="60" width="60" class="loader"/>
            <div class="success_register">
                <span>Votre mémoire a été publié avec success </span>
                <i class="close fa fa-close"></i>
            </div>
            <div class="register_form">
                <form  id="form_memoire" method="post" > <div id='titre_error' class='errorbis'> veuillez entrer un titre <i class=" fa fa-close hide " ></i></div>

                    <span><i class="fa fa-list"></i></span>
                    <em><input type="text" name="titre" placeholder="Titre" id="titre" ><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>
                    <div id='categorie_error' class='errorbis'> veuillez choisir L'UFR <i class=" fa fa-close hide " ></i></div>
                <span><i class="fa fa-list-alt"></i></span>
                <select name="categorie" class="category" id="categorie">
                            <option value="">Choisir UFR</option>
                          <?php do { $CodeCategorie=$ligne['CodeCategorie'];
                                $NomCategorie=$ligne['NomCategorie'];?>
                                <option  value="<?php echo $CodeCategorie; ?>">
                                <?php echo strtolower($NomCategorie);}
                                while($ligne=$result->fetch(PDO::FETCH_ASSOC))
                           ?>
                         </option>
                    </select>
                    <div id='nomauteur_error' class='errorbis'> veuillez entrer un votre nom <i class=" fa fa-close hide " ></i></div>
                <span><i class="fa fa-user"></i></span>
                <em><input type="text" name="nom" placeholder="Nom de l'auteur" id="nomauteur"><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>
 <div id='prenomauteur_error' class='errorbis'> veuillez entrer un votre prenom <i class=" fa fa-close hide " ></i></div>
            <span><i class="fa fa-user"></i></span>
            <em><input type="text" name="prenom" placeholder="Prenom de l'auteur" id="prenomauteur"><i class="success fa fa-check hide" ></i><i class="error fa fa-close hide" ></i></em>
             <div id='annee_error' class='errorbis'> veuillez choisir une ann&eacute;e <i class=" fa fa-close hide " ></i></div>
<span><i class="fa fa-calendar"></i></span>
    <select name="anneememoire" class="niveau" id="annee">
        <option value="">Ann&eacute;e du M&eacute;moire</option>
        <option value="1990">1990</option>
        <option value="1991">1991</option>
        <option value="1992">1992</option>
        <option value="1993">1993</option>
        <option value="1994">1994</option>
        <option value="1995">1995</option>
        <option value="1996">1996</option>
        <option value="1997">1997</option>
        <option value="1998">1998</option>
        <option value="1999">1999</option>
        <option value="2000">2000</option>
        <option value="2001">2001</option>
        <option value="2002">2002</option>
        <option value="2003">2003</option>
        <option value="2004">2004</option>
        <option value="2005">2005</option>
        <option value="2006">2006</option>
        <option value="2007">2007</option>
        <option value="2008">2008</option>
        <option value="2009">2009</option>
        <option value="2010">2010</option>
        <option value="2011">2011</option>
        <option value="2012">2012</option>
        <option value="2013">2013</option>
        <option value="2014">2014</option>
        <option value="2015">2015</option>
    </select>
        
 <div id='niveau_error' class='errorbis'> veuillez choisir un niveau <i class=" fa fa-close hide " ></i></div>
    <span><i class="fa fa-level-up"></i></span>
    <select name="niveau" class="niveau" id="niveau">
        <option value="">Votre niveau</option>
        <option value="licence3">Licence 3</option>
        <option value="master1">Master 1</option>
        <option value="master2">Master 2</option>
        <option value="doctorat">Doctorat</option>
    </select>
     <div id='universite_error' class='errorbis'> veuillez choisir une universit&eacute; <i class=" fa fa-close hide " ></i></div>
    <span><i class="fa fa-university"></i></span>
    <select name="universite" class="university" id="universite">
         <?php do { $CodeUniversite=$ligne_universite['CodeUniversite'];
                                $NomUniversite=$ligne_universite['NomUniversite'];?>
                                <option  value="<?php echo $CodeUniversite ;?>">
                                <?php echo $NomUniversite;
                  }
                                while($ligne_universite=$result_universite->fetch(PDO::FETCH_ASSOC))
                           ?>
    </select>
     <div id='description_error' class='errorbis'> veuillez entrer une petite description <i class=" fa fa-close hide " ></i></div>
    <textarea name="description" placeholder="Description" id="description"></textarea>
     <div id='fichier_error' class='errorbis'> veuillez charger votre fichier(.pdf,.docx,.ppt) <i class=" fa fa-close hide " ></i></div>

    <label class="label_file" for="fichier"  >
        <span><i class="fa fa-file"></i></span><em>Charger fichier(.pdf,.docx,.ppt) </em>
    </label>
 <input type="file" id="fichier" name="fichier" value="" />
    <button id="publier" name="publier"  type="submit"><i class="fa fa-send"></i>Publier</button>
   
    </form>
</div><!--register_form-->
</div>
<?php include('sidebar-other.php'); ?>
</div><!--row-->
</div><!--content_body-->
<?php include('footer.php');?>

<!--code jquery pour control du formulaire-->

 <script type="text/javascript">
     $('.loader').hide();
     //On cache le messae de reussite au scroll
//     $(document).scroll(function(){
//         $('.success_register').fadeOut(8000);
//     });
     $("form#form_memoire").submit(function(event){
        // empecher la soumission automatique
         event.preventDefault();

         // tester les variables

       var error = false;
            var titre = $('#titre').val();
            var categorie = $('#categorie').val();
            var nomauteur = $('#nomauteur').val();
            var prenomauteur= $('#prenomauteur').val();
            var annee= $('#annee').val();
            var niveau = $('#niveau').val();
            var universite= $('#universite').val();
            var description= $('#description').val();
            var fichier = $('#fichier').val();
            $(this).parent().find('.success').addClass('hide');
            //alert(fichier);
            if(titre.length == 0){
                var error = true;
                $('#titre_error').fadeIn(1000);
            }else{
                $('#titre_error').fadeOut(1000);
            }

            if(categorie.length == 0){
                var error = true;
                $('#categorie_error').fadeIn(1000);
            }else{
                $('#categorie_error').fadeOut(1000);
            }

           if(nomauteur.length == 0){
                var error = true;
                $('#nomauteur_error').fadeIn(1000);
            }else{
                $('#nomauteur_error').fadeOut(1000);
            }

           if(prenomauteur.length == 0){
                var error = true;
                $('#prenomauteur_error').fadeIn(1000);
            }else{
                $('#prenomauteur_error').fadeOut(1000);
            }


            if(annee.length == 0){
                var error = true;
                $('#annee_error').fadeIn(1000);
            }else{
                $('#annee_error').fadeOut(1000);
            }

            if(niveau.length == 0){
                var error = true;
                $('#niveau_error').fadeIn(1000);
            }else{
                $('#niveau_error').fadeOut(1000);
            }


            if(universite.length == 0){
                var error = true;
                $('#universite_error').fadeIn(1000);
            }else{
                $('#universite_error').fadeOut(1000);
            }


            if(description.length == 0){
                var error = true;
                $('#description_error').fadeIn(1000);
            }else{
                $('#description_error').fadeOut(1000);
            }


           if(fichier.length == 0){
                var error = true;
                $('#fichier_error').fadeIn(1000);
            }else{
                $('#fichier_error').fadeOut(1000);

            }

///////////////////////////////////////////////////////////////////////////////////////////////////////////
  /// paquetage des donnees ou variable a envoyer
  var formData = new FormData($(this)[0]);

 if  (error == false){
     $('.loader').fadeIn();

  $.ajax({
    url: 'Script/PublierMemoire.php',
    type: 'POST',
    data: formData,
    async: false,
    cache: false,
    contentType: false,
    processData: false,
    success: function (returndata) {
            var body = $("body");
            var top = body.scrollTop() // obtenir position du body
              if(top!=0)
             {
               body.animate({scrollTop:200,}, '200');
             }
                      $('#titre').val("");
                      $('#categorie').val("");
                      $('#nomauteur').val("");
                      $('#prenomauteur').val("");
                      $('#annee').val("");
                      $('#niveau').val("");
                      $('#universite').val("");
                      $('#description').val("");
                      $('.label_file em').text("");
                      $('.success_register').fadeIn(1000);
                      $('.loader').fadeOut();
             }
            
            

  });// fin ajax
   } // fin if error
  return false;
  // fin fonction globale
         
});// fin ready

///////////////////////////////////////////////////////////////////////////////////////////////////////////
      </script>




