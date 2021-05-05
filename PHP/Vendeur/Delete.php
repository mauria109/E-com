<?php
    
    require '../Settings/_header.php';
    require '../Settings/functions.php';
    
    if (!empty($_POST) && isset($DB)){
        //tableau enregistrant les erreurs
        $errors = array();
        
        //test de l'email si ça correspond vraiment a un mail
        $mt = MailTest($_POST['mail']);
        
        if ($mt == true){
            if (empty($errors)){
                $check = $DB->SelectQuerry("SELECT id_vend FROM vendeur WHERE id_vend = '$_POST[mail]' ");
                
                $insert = $DB->Querries("DELETE FROM vendeur WHERE id_vend = '$check' ");
                
                if (!$insert) {
                    echo "<h1>Echec!! Recommencez! Vous y étiez presque</h1>";
                } else {
                    session_destroy();
                    $_SESSION['vend'] = false;
                    echo "<h1>Suppression réussie</h1>";
                    //redirection sur l'accueil général
                    $location = "";
                    Redirection($location);
                }
            }
        }else{
            echo $errors['mail'] = "Adresse email entrée incorrecte!!";
        }
    }
?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Suppression du compte client</title>
    </head>
    <body>
        <!--Page de suppression des clients-->
        
        <header></header>
        
        <section>
            <article>
                <form action = "" method = "post">
                    <p>
                        <label for = "mail">Email</label>
                        <input type = "email" name = "mail" id = "mail">
                    </p>
                    
                    <div id="btn-add">
                        <input type = "submit" value = "Supprimer">
                        <input type = "reset" value = "Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

