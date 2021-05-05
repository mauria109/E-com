<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (!empty($_POST) && isset($DB , $_GET['del'])){
        $insert = $DB->Querries("DELETE FROM shop WHERE id_shop = '$_POST[shop]'
                    OR id_shop = '$_GET[del]'");
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
            $shop = $DB->SelectQuerry("SELECT * FROM shop WHERE id_vend = '$_GET[vend]'");
        } ?>
        <section>
            <article>
                <h1>Suppression du profil de votre boutique en ligne</h1>
                
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
                    
                    <div id="btn">
                        <input type = "submit" value = "Valider">
                        <input type = "reset" value = "Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

