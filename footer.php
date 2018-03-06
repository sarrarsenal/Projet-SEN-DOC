<div class="footer_block">
    <div class="row">
        <div class="large-12 medium-12 small-12 columns">
            <div class="logo_footer">
                <img src="images/logo_footer.png" alt="logo_footer" />
            </div>
        </div>
    </div>
    <div class="row">
        <div class="footer_content">
            <div class="large-3 medium-3 small-12 columns">
                <h4>universites</h4>
                <ul>
                    <li><a href="http://www.ucad.sn/" target="_blank">Université Cheikh Anta Diop</a></li>
                    <li><a href="http://www.ugb.sn/" target="_blank">Université Gaston Berger</a></li>
                    <li><a href="http://www.uadb.edu.sn/" target="_blank">Université Alioune Diop de Bambey</a></li>
                    <li><a href="http://www.zig-univ.sn/" target="_blank">Université Assane Seck</a></li>
                    <li><a href="#">Université de Thiès</a></li>
                    <li><a href="http://www.uvs.sn/" target="_blank" >Université Virtuelle du Sénégal</a></li>
                </ul>
            </div>
            <div class="large-6 medium-6 small-12 columns">
                <h4>newsletter</h4>
                <div class="form_newsletter">
                    <form action="newsletter.php" method="post" id="form_newsletter">
                        <div class="success_register">
                            <span>SenDoc Vous remercie, vous allez recevoir nos newsletters</span>
                            <i class="close fa fa-close"></i>
                        </div>
                        <div id='email_error' class='errorbis'> veuillez entrer votre adrésse email <i class=" fa fa-close hide " ></i></div>
                        <div id='emailbis_error' class='errorbis'> Ce mail existe déja <i class=" fa fa-close hide " ></i></div>
                        <div id='emailmatch_error' class='errorbis'> Cet email est invalide  <i class=" fa fa-close hide " ></i></div>
                        <input type="text" name="email" id="email" placeholder="adrésse@domaine.com" />
                        <button id="envoyer" class="envoyer" type="submit"><i class="fa fa-send"></i></button>
                    </form>
                </div>
                <div class="network_footer">
                    <ul>
                        <li><a href="https://www.facebook.com/pages/Sen-Doc/1605082233070143" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="large-3 medium-3 small-12 columns">
                <div class="google_plus">
                    <div class="logo_gp">
                        <img src="images/logo_footer_gp.png" alt="logo_footer_gp" />
                    </div>
                    <p class="nb_visite"><?php
 include_once('Script/counter.php');
echo "Total visiteur : $c_today";
// echo "Total : \$c_alltime <br />";?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="row">
           <div class="large-12 medium-12 small-12 columns">
                <p>Copyright © Tous droits réservés - 2015 Sen doc</p>
           </div>
        </div>
    </div>
    </div><!--footer_block-->
</div><!--contain-->

<script src="js/main.js"></script>
<script type="text/javascript" src="js/owl.carousel.js"></script>
<script src="js/foundation.min.js">
</script><script src="js/jquery.slicknav.min.js"></script>
</script><script src="js/jquery.custom-scrollbar.js"></script>
</script><script src="js/jquery.cssemoticons.js"></script>
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
    
    $("#partenaires").owlCarousel({
        singleItem: false,
        items : 4, //10 items above 1000px browser width
        itemsDesktop : [1000,4], //5 items between 1000px and 901px
        itemsDesktopSmall : [900,2], // betweem 900px and 601px
        itemsTablet: [600,1], //2 items between 600 and 0
        itemsMobile : false, // itemsMobile disabled - inherit from itemsTablet option
        autoPlay: true,
        pagination: true
    });
</script>
<script>   
    $(document).ready(function(){
        $('#envoyer').click(function(e){
            e.preventDefault();
            var error = false;
            var email = $('#email').val(); 
            if(email.length == 0){
                var error = true;
                $('#email_error').fadeIn(1000);
                $('#emailbis_error').fadeOut(1000);
            }else{
                $('#email_error').fadeOut(1000);   
            }
            
            if(!email.match(/[a-z0-9_\-\.]+@[a-z0-9_\-\.]+\.[a-z]+/i) && email!=""){
               var error = true;
                $('#emailmatch_error').fadeIn(1000);
                $('#emailbis_error').fadeOut(1000);
               }
                //else{
                //$('#emailmatch_error').fadeOut(1000);   
             //}

            if(error == false){
                $.post("newsletter.php", $("#form_newsletter").serialize(),function(result){
                    if(result=="ok"){
                      $('.success_register').fadeIn(1000);
                        $('#email_error').fadeOut(1000);
                        $('#emailbis_error').fadeOut(1000);
                        $('#emailmatch_error').fadeOut(1000);
                        $('#email').val("");
                    }
                    else if(result=="Cet email existe déja"){
                        $('#emailbis_error').text(result).fadeIn(1000);
                        $('#email_error').fadeOut(1000);
                        $('#emailmatch_error').fadeOut(1000);
                    }
                });
            }
        });
    });
</script>
</body>
</html>

