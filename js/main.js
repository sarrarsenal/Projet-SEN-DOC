$(document).ready(function(){
    'use strict';
    //------------- MENU
    $('.menu ul li').click(function(){
        $('.menu ul li').removeClass('actif');
        $(this).addClass('actif');
    });
    //-----------  Login
    $('.login_form').click(function(){
        $('.bg_login').fadeIn('slow');
    });

     $('.close_login').click(function(){
        $('.bg_login').fadeOut('fast');
    });
    
    //-----------  Mot de passe oblie
    $('.forget_btn').click(function(){
        $('.bg_login').fadeOut('fast');
        $('.bg_forget').fadeIn('slow');
    });

    $('.p_close_forget').click(function(){
        $('.bg_forget').fadeOut('fast');
    });
    
    //-----------  ScrollBar
     $(".menu_cat").customScrollbar({

          skin: "default-skin",
          hScroll: false,
          updateOnWindowResize: true
     });
    // recupere la valeur du input file et le mettre dans le label .label_file
    $('input[type="file"]').change(function(){
        var val = $(this).val();
        $('.label_file em').text(val);
    });

    //Light box index
    $('.close_light_box').click(function(){
        $('.light_box').fadeOut('slow');
    });
    
    

    //Gestion des message d'erreur
    $('.success_register .close').click(function(){
       $('.success_register').slideToggle();
    });

    //Les messages d erreurs des formulaires
    $('input').blur(function(){
        if($(this).val() == ''){
             $(this).parent().find('.success').addClass('hide');
             $(this).parent().find('.error').removeClass('hide');
             $(this).parent().prev().prev().fadeIn();
        }else{
            $(this).parent().find('.error').addClass('hide');
            $(this).parent().find('.success').removeClass('hide');  
            $(this).parent().prev().prev().fadeOut(); 
            //$('.erroremail').detach();
           // $('#passwordConfirm_error').hide();
        }
    });


    //Ajouter des smiley au textarea
       $('.bloc_smiley span').click(function(){
        var smiley = $(this).text();
        var textarea = $('.form_comments textarea').val();
        $('.form_comments textarea').focus();
        if(textarea != ''){
            $('.form_comments textarea').val(textarea+' '+smiley+' ');
        }else{
            $('.form_comments textarea').val(' '+smiley+' ');
        }

        });

    //Charger les Smyley
    $('.comment').emoticonize();
    $('.text_comment').emoticonize();
    $('.bloc_smiley span').emoticonize();
    $('textarea').emoticonize();

    //Repondre a un commentaire
    $('.reply').click(function(){
        var scroll = $(document).scrollTop();
        var pos = $('#form_comments').offset().top;
        $('html,body').animate({
            scrollTop: pos
        });

    });
    
    //Recuperer le lien de la page courante
    var tab = document.URL;
    var link = tab.search('memoires_note.php');
    if(link != -1 && link != 0){
        $('.plus_telecharger').addClass('actif');
        $('.index').removeClass('actif');
        $('.cat').removeClass('actif');
    }

    var link = tab.search('Memoire_Categorie.php');
    if(link != -1 && link != 0){
        $('.cat').addClass('actif');
        $('.plus_telecharger').removeClass('actif');
        $('.index').removeClass('actif');
    }

    var link = tab.search('index.php');
    if(link != -1 && link != 0){
        $('.index').addClass('actif');
        $('.plus_telecharger').removeClass('actif');
        $('.cat').removeClass('actif');
    }
});
