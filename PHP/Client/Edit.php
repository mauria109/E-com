<?php
    require '../Settings/_header.php';
    require '../Settings/functions.php';
    
    if (!empty($_POST) && isset($DB)){
        //tableau enregistrant les erreurs
        $errors = array();
        
        //test de l'email si ça correspond vraiment a un mail
        $mt = MailTest($_POST['mail']);
        
        if ($mt == true){
            //vérifions s'il n'existe pas deja dans la bdd
            $vend = $DB->SelectQuerry("SELECT * FROM client WHERE mail_cli = '$_POST[mail]' ") ;
            
            if ($vend){
                $errors['mail'] = "Cet email est déjà utilisé pour un autre compte";
            }else{
                //sinon vérifions le mot de passe et la confirmation sont identiques
                $pwdTest = PasswordTest($_POST['mdp'], $_POST['mdp-conf']);
                if ($pwdTest == false){
                    $errors['mdp'] = "mot de passe invalide";
                }
                //alors on exécute la requête
                if (empty($errors)){
                    $pwd = PasswordHash($_POST['mdp']);
                    $check = $DB->SelectQuerry("SELECT id_cli FROM client WHERE mail_cli = '$_POST[mail]' ") ;
                    
                    $insert = $DB->Querries("UPDATE client SET pseudo_cli = '$_POST[pseudo]',
mail_cli = '$_POST[mail]', mdp_cli = '$pwd' WHERE id_cli = '$check' ");
                    
                    if (!$insert) {
                        echo "<h1>Echec!! Recommencez! Vous y étiez presque</h1>";
                        
                    } else {
                        session_start();
                        $_SESSION['client'] = true;
                        echo "<h1>Modification réussie</h1>";
                        $location = "CHome.php";
                        Redirection($location);
                    }
                }
            }
        }else{
            echo $errors['mail'] = "Adresse email entrée incorrecte!!!Veuillez ressaisir!!";
        }
        
    }
?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Modification du compte client</title>
    </head>
    <body>
        <!--Page de modification des clients-->
        
        <header></header>
        
        <section>
            <article>
                <form action = "" method = "post">
                    <p>
                        <label for = "pseudo">Pseudo</label>
                        <input type = "text" name = "pseudo" id = "pseudo">
                        
                        <label for = "mail">Email</label>
                        <input type = "email" name = "mail" id = "mail">
                    </p>
                    
                    <p>
                        <label for = "mdp">Mot de passe</label>
                        <input type = "password" name = "mdp" id = "mdp">
                        
                        <label for = "mdp-conf">Confirmez le mot de passe</label>
                        <input type = "password" name = "mdp-conf" id = "mdp-conf">
                    </p>
                    
                    <div id="btn-add">
                        <input type = "submit" value = "Modifier">
                        <input type = "reset" value = "Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

