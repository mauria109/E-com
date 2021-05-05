<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (!empty($_POST) && isset($DB, $_GET['vend'], $_GET['edit'])){
        $errors = array();
        //test de l'email si ça correspond vraiment a un mail
        $mt = MailTest($_POST['mail']);
        
        if ($mt == true && empty($errors)){
            $insert = $DB->Querries("UPDATE shop SET nom_shop = '$_POST[nom]',
                id_type = '$_POST[type]',adresse_shop = '$_POST[adresse]',
                tel_shop = '$_POST[tel]', mail_shop = '$_POST[mail]',
                id_vend = '$_GET[vend]' WHERE id_shop = '$_POST[shop]' OR id_shop = '$_GET[edit]'");
            
            if ($insert){
                echo "<h1>Modification effectuée avec succès!!</h1>";
            }else{
                echo "<h1>Echec de la modification!!Veuillez réessayer!!</h1>";
            }
        }else{
            echo $errors['mail'] = "<h1>Adresse email entrée invalide</h1>";
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
        <?php if (isset($DB, $_GET['vend'])){
            $type = $DB->SelectQuerry("SELECT * FROM type");
            $shop = $DB->SelectQuerry("SELECT * FROM shop WHERE id_vend = '$_GET[vend]'");
        } ?>
        <section>
            <article>
                <h1>Modification du profil de votre boutique en ligne</h1>
                
                <form action = "" method = "post">
    
                    <p>
                        <label for = "shop">Laquelle de vos boutiques voulez-vous modifier?</label>
                        <select name = "shop" id = "shop">
                            <?php if (isset($shop)){
                                foreach ($shop as $s){ ?>
                                    <option value = "">TYPE</option>
                                    <option value = "<?php echo $s->id_shop; ?>">
                                        <?php echo $s->nom_shop; ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                    </p>
                    <p>
                        <label for = "nom">Nouveau nom de la boutique</label>
                        <input type = "text" name = "nom" id = "nom">
                    </p>
    
                    <p>
                        <label for = "type">Nouveau type de boutique</label>
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
                    </p>
    
                    <p>
                        <label for = "adresse">Nouvelle adresse de la boutique</label>
                        <input type = "text" name = "adresse" id = "adresse">
        
                        <label for = "tel">Nouveau tel</label>
                        <input type = "text" name = "tel" id = "tel">
                    </p>
    
                    <p>
                        <label for = "mail">Nouvel email de la boutique (sinon le vôtre)</label>
                        <input type = "email" name = "mail" id = "mail">
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

