<?php
class ControllerBase{
    static function event(){
        
         $_name = $_POST['prenom'];
        if(isset($_POST['email']) && isset($_POST['motdepasse']) && isset($_POST['nom']) && isset($_POST['prenom'])){ # vérification des champs
                
            # vérification si le format du mail est correcte 
            if( filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) && $_POST['motdepasse']){
                    print "<p>Bonjour ".$_POST['nom']."</p>";
            }
            else{
                
                die("<p> Champs Obligatoires!!! <a href=\"index.php\">Rechargez la page</a></p>");
            }
            return false;
            
        }
    }
}
?>