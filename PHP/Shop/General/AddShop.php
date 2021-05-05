<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (!empty($_POST) && isset($DB, $_GET['vend'])){
        //test de l'email si ça correspond vraiment a un mail
        $mt = MailTest($_POST['mail']);
        
        if ($mt == true){
            $check = $DB->SelectQuerry("SELECT * FROM shop WHERE nom_shop = '$_POST[nom]'") ;
            
            if ($check){
                echo "<h1>Vous avez déjà attribué ce nom à une autre de vos boutiques!!!</h1>";
            }else{
                $insert = $DB->Querries("INSERT INTO shop
    (nom_shop, id_type, adresse_shop, tel_shop, mail_shop, id_vend)
    VALUES ('$_POST[nom]', '$_POST[type]', '$_POST[adresse]', '$_POST[tel]', '$_POST[mail]', '$_GET[vend]') ");
            }
        }
    }
    
    ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../../../CSS/menu.css">
        <link rel = "stylesheet" href = "../../../CSS/Form.css">
        <title>Créer boutique</title>
    </head>
    <body>
        <header></header>
        <?php if (isset($DB)){
            $type = $DB->SelectQuerry("SELECT * FROM type");
        } ?>
        <section>
            <article>
                <h1>Création d'un nouveau profil de votre boutique en ligne</h1>
                
                <form action = "" method = "post">
                    <p>
                        <label for = "nom">Nom de la boutique</label>
                        <input type = "text" name = "nom" id = "nom">
                    </p>
    
                    <p>
                        <label for = "type">Type de boutique</label>
                        <select name = "type" id = "type">
                            <?php if (isset($type)){
                                foreach ($type as $t){ ?>
                                    <option value = "">TYPE</option>
                                    <option value = "<?php echo $t->id_type; ?>">
                                        <?php echo $t->type; ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
    
                        <button type="submit"><a href="#">Autre</a></button>
                    </p>
                    
                    <p>
                        <label for = "adresse">Adresse de la boutique</label>
                        <input type = "text" name = "adresse" id = "adresse">
                        
                        <label for = "tel_sh">Tel</label>
                        <input type = "text" name = "tel_sh" id = "tel_sh">
                    </p>
                    
                    <p>
                        <label for = "mail_sh">Email de la boutique (sinon le vôtre)</label>
                        <input type = "email" name = "mail_sh" id = "mail_sh">
                    </p>
                    
                    <div id="btn">
                        <input type = "submit" value = "Valider">
                        <input type = "reset" value = "Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

