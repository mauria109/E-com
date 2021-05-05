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
            $client= $DB->SelectQuerry("SELECT * FROM client WHERE mail_cli= '$_POST[mail]'") ;
    
            if ($client){
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
            
                    $insert = $DB->Querries("INSERT INTO client
    (pseudo_cli, mail_cli, mdp_cli) VALUES ('$_POST[pseudo]', '$_POST[mail]', '$pwd')");
            
                    if (!$insert) {
                        echo "<h1>Echec!! Recommencez! Vous y étiez presque</h1>";
                
                    } else {
                        session_start();
                        $_SESSION['client'] = true;
                        echo "<h1>Inscription réussie</h1>";
                
                        $to = $_POST['mail'];
                        $subject ="Validation d'inscription" ;
                        $message = "Bonjour".$_POST['nom'].
                            "C'est avec plaisir que nous vous annonçons
                        la validité de votre compte!!!!
                        Vous pouvez dès lors vous diriger vers votre page d'accueil avec ce lien:
                          ";
                
                        $send = SendMail($to, $subject, $message);
                
                        if ($send == false){
                            echo $errors['compte'] = "Votre compte n'a pas été validé!!! Veuillez réessayer";
                        }else{
                            $location = "CHome.php";
                            Redirection($location);
                        }
                    }
                }
            }
        }else{
            echo $errors['mail'] = "Adresse email entré incorrecte!!!Veuillez ressaisir!!";
        }
        
    }
?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Inscription des clients</title>
    </head>
    <body>
        <!--Page d'inscription des clients-->
        
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
                        <input type = "submit" value = "M'inscrire">
                        <input type = "reset" value = "Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

