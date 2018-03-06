<?php
/**
 * Compteur de clique PHP avec jQuery
 *
 * Ce petit script vous montre comment créer un compteur de clique totalement invisible
 * à l'oeil nu simplement en utilisant la librairie jQuery et bien entendu du PHP
 * à l'aide d'une base de données MySql.
 * 
 * Fichier index
 *
 * PHP versions 4 and 5
 *
 * @category   jQuery / PHP
 * @package    Compteur de clique jQuery
 * @author     Filipe Gomes <contact@devgoneti.com>
 * @copyright  2011-2012 DevGoneti http://www.devgoneti.com
 * @version    1.0
 * @link       http://www.devgoneti.com
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <title>Compteur de clique en jQuery</title>
        
        <!-- Ne pas oublier la librairie jQuery !! -->
        <script type="text/javascript" src="libs/jquery.min.js"></script>
        
    </head>
    <body style="margin:150px;text-align:center;font-family:verdana;font-size:18px;">
        <div style="font-size:32px;font-weight:bold;padding-bottom:60px;">Compteur de clique en jQuery</div>
        <?php
        
        
        // on se connecte à notre base de données
        include('libs/connexion_mysql.php');
        
        
        /*****************************************************************************************************
         * 
         * EXEMPLE POUR LE LIEN N°1
         * Téléchargement d'un fichier
         * 
         * Pour utiliser cet exemple vous devez indiquer dans la balise de votre lien l'attribut ID et REL comme ci-dessous:
         * <a id="1" rel="Lien1" href="telecharger/fichier.exe">Télécharger</a>
         * 
         * L'attribut ID est l'identifiant de votre fichier, lien etc...
         * L'attribut REL permet d'identifiant le lien qui a été cliqué
         * 
         ****************************************************************************************************/        
        // on ouvre une requete sql pour récupérer les infos sur nos fichiers à télécharger
        $req = mysql_query("SELECT * FROM fichier_telechargeable WHERE id_fichier=1");
        $ligne = mysql_fetch_array($req);
        $IdFichier1 = intval($ligne['id_fichier']);
        $NomFichier1 = stripslashes($ligne['nom_fichier']);
        $LienFichier1 = stripslashes($ligne['lien_fichier']);
        mysql_free_result($req);
               
        // Script jqeury pour compter le clique
        echo '
        <script type="text/javascript">                
            // valable pour un seul lien à la fois
            $(document).ready(function(){
                $(\'a[rel="Lien1"]\').click(function() {
                    $.ajax({
                        type:\'POST\',
                        url: \'libs/compteur-clic.php\', // ici on appel le fichier PHP pour compter le clique
                        data: \'id=\'+$(this).attr("id"), // Ici, on récupère l\id de notre source (ne pas modifier)
                        async: false
                    });
                    return true;              
                });
            });
        </script>';                
        // lien de téléchargement
        echo '<div><a rel="Lien1" id="'.$IdFichier1.'" href="'.$LienFichier1.'">Cliquez ici pour télécharger le fichier <strong>'.$NomFichier1.'</strong> et je compte</a></div><br />';
        
        
        
        
        
        /*****************************************************************************************************
         * 
         * 
         * EXEMPLE POUR LE LIEN N°2
         * 
         * 
         *****************************************************************************************************/
        // on récupère les infos du 2e fichier
        $req = mysql_query("SELECT * FROM fichier_telechargeable WHERE id_fichier=2");
        $ligne2=mysql_fetch_array($req);
        $IdFichier2 = intval($ligne2['id_fichier']);
        $NomFichier2 = stripslashes($ligne2['nom_fichier']);
        $LienFichier2 = stripslashes($ligne2['lien_fichier']);
        mysql_free_result($req);
        
        // Script jqeury pour compter le clique
        echo '
        <script type="text/javascript">                
            // valable pour un seul lien à la fois
            $(document).ready(function(){
                // pour un autre lien il suffit simplement de changer le nom de l\'attribut REL 
                $(\'a[rel="Lien2"]\').click(function() {
                    $.ajax({
                        type:\'POST\',
                        url: \'libs/compteur-clic.php\', // ici on appel le fichier PHP pour compter le clique
                        data: \'id=\'+$(this).attr("id"), // Ici, on récupère l\id de notre source (ne pas modifier)
                        async: false
                    });
                    return true;              
                });
            });
        </script>';             
        // pour un 2e lien, il suffit de modifier le nom de l'attribut REL sans oublier aussi
        // de le modifier dans le script jQuery ci-dessus
        echo '<div><a rel="Lien2" id="'.$IdFichier2.'" href="'.$LienFichier2.'">Cliquez ici pour télécharger le fichier <strong>'.$NomFichier2.'</strong> et je compte</a></div><br />';

        /*****************************************************************************************************
         * 
         * 
         * EXEMPLE POUR LE LIEN N°3 vers un site Internet
         * 
         * 
         *****************************************************************************************************/
        // on récupère les infos du 2e fichier
        $req = mysql_query("SELECT * FROM fichier_telechargeable WHERE id_fichier=3");
        $ligne3=mysql_fetch_array($req);
        $IdFichier3 = intval($ligne3['id_fichier']);
        $NomFichier3 = stripslashes($ligne3['nom_fichier']);
        $LienFichier3 = stripslashes($ligne3['lien_fichier']);
        mysql_free_result($req);
        
        // Script jqeury pour compter le clique
        echo '
        <script type="text/javascript">                
            // valable pour un seul lien à la fois
            $(document).ready(function(){
                // pour un autre lien il suffit simplement de changer le nom de l\'attribut REL 
                $(\'a[rel="Lien3"]\').click(function() {
                    $.ajax({
                        type:\'POST\',
                        url: \'libs/compteur-clic.php\', // ici on appel le fichier PHP pour compter le clique
                        data: \'id=\'+$(this).attr("id"), // Ici, on récupère l\id de notre source (ne pas modifier)
                        async: false
                    });
                    return true;              
                });
            });
        </script>';             
        // Le 3e lien permet de visiter un site et de comptabiliser le nombre de visites
        echo '<div><a rel="Lien3" id="'.$IdFichier3.'" href="'.$LienFichier3.'" target="_blank">Cliquez ici pour visiter <strong>'.$NomFichier3.'</strong> et je compte</a></div><br />';
        
        
        
        
        
        
        
        /******************************************************************************************************
         * 
         * POUR AFFICHER LE RESULTAT DES CLIQUES
         * 
         ******************************************************************************************************/
        
        // on va créer une petite fonction pour que se soit plus simple et rapide
        function GetClique($IdSource)
        {
            // on ouvre une requete pour récupèrer le nombre de clique sur un fichier ou lien
            $req = mysql_query("SELECT COUNT(c_id) FROM compteur_clic WHERE c_id_source=".intval($IdSource));
            // on récupère le résultat de notre requete dans une variable
            $CompteurLien = mysql_fetch_row($req); 
            // on libère notre requête
            mysql_free_result($req);
            // on retourne le résultat
            return $CompteurLien[0];
        }
        
        // pour le 1er lien
        echo '<p>Le fichier <strong>"'.$NomFichier1.'"</strong> a été téléchargé <strong>'.GetClique($IdFichier1).' fois</strong>.</p>';        
        // pour le 2e lien
        echo '<p>Le fichier <strong>"'.$NomFichier2.'"</strong> a été téléchargé <strong>'.GetClique($IdFichier2).' fois</strong>.</p>';
        // pour le 3e lien
        echo '<p>Le site <strong>"'.$NomFichier3.'"</strong> a été visité <strong>'.GetClique($IdFichier3).' fois</strong>.</p>';
        
        // etc....
        ?>      
        
        <!-- FIN DU SCRIPT -->
        
    
        <div style="margin-top:60px;font-size:11px;">Retrouvez mes autres scripts dans <a href="http://www.devgoneti.com" target="_blank">www.devgoneti.com</a></div>
    </body>
</html>




