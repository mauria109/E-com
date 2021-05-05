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
            $vend = $DB->SelectQuerry("SELECT * FROM vendeur WHERE mail_vend = '$_POST[mail]' ") ;
            
            if (!$vend){
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
                    
                    $insert = $DB->Querries("INSERT INTO vendeur
    (pseudo_vend, mail_vend, tel_vend, mdp_vend)
    VALUES ('$_POST[pseudo]', '$_POST[mail]', '$_POST[num]', '$pwd') ");
                    
                    if (!$insert) {
                        echo "<h1>Echec!! Recommencez! Vous y étiez presque</h1>";
                        
                    } else {
                        session_start();
                        $_SESSION['vend'] = true;
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
                            $location = "VHome.php";
                            Redirection($location);
                        }
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
        <link rel = "stylesheet" href = "../../CSS/menu.css">
        <link rel = "stylesheet" href = "../../CSS/Form.css">
        <title>Inscription des commerçants</title>
    </head>
    <body>
        <!--Page d'inscription des vendeurs-->
        
        <header>
            <div id="logo">
                <img src="../../icone/commerce/euro_shop_online_ecommerce_shopping-19_icon-icons.com_61648.png" alt="logo site" class="logo">
            </div>
        </header>
        
        
        <section>
            <article>
                <div id="vAuth">
                    <form action = "#" method = "post">
                        <p>
                            <label for = "pseudo">Pseudo</label>
                            <input type = "text" name = "pseudo" id = "pseudo">
                            
                            <label for = "mail">Email</label>
                            <input type = "email" name = "mail" id = "mail">
                        </p>
                        
                        <p>
                            <label for = "mdp">Mot de passe</label>
                            <input type = "password" name = "mdp" id = "mdp">
                            
                            <label for = "mdp-conf">Confirmer mot de passe</label>
                            <input type = "password" name = "mdp-conf" id = "mdp-conf">
                        </p>
                        
                        <p>
                            <label for = "num">Tel</label>
                            <input type = "tel" name = "num" id = "num" pattern="[0-9]{3}-[0-9]{2}-[0-9]{3}">
                        </p>
                        
                        <div id="btn">
                            <input type = "submit" value = "Valider">
                            <input type = "reset" value = "Annuler">
                        </div>
                    </form>
                    
                    <p>
                        <a href = "VLogin.php">J'ai déjà un compte</a>
                    </p>
                </div>
            </article>
        </section>
        
        
        <footer></footer>
    </body>
</html>

