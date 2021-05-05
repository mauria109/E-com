<?php
    require '../Settings/_header.php';
    require '../Settings/functions.php';
    
    if (isset($DB) && !empty($_POST)){
        //vérifions s'il existe deja dans la bdd
        $check = $DB->SelectQuerry("SELECT * FROM client WHERE mail_cli= '$_POST[mail]' ");
    
        if (!$check){
            $errors['mail'] = "Cet email/pseudo n'est relié à aucun compte!!!";
        }else {
            //alors on exécute la requête
            if (empty($errors)){
                $pwd = PasswordHash($_POST['mdp']);
            
                $client = $DB->SelectQuerry("SELECT * FROM client WHERE
                           mail_cli = '$_POST[mail]' AND  mdp_cli = '$pwd' ");
            
                if (!$client) {
                    echo "<h1>Echec!! Recommencez! Vous y étiez presque</h1>";
                } else {
                    $_SESSION['client'] = true;
                    echo "<h1>Connexion réussie!!</h1>";
                }
            }
        }
    }
    
    ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Connexion</title>
    </head>
    <body>
        <!--Page de connexion-->
        <header></header>
        
        <section>
            <article>
                <form action = "" method = "post">
                    <p>
                        <label for = "mail">Email</label>
                        <input type = "email" name = "mail" id = "mail">
                    </p>
                    
                    <p>
                        <label for = "mdp">Mot de passe</label>
                        <input type = "password" name = "mdp" id = "mdp">
                    </p>
                    
                    <div id="btn">
                        <input type = "submit" value = "Connexion">
                        <input type = "reset" value = "Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

