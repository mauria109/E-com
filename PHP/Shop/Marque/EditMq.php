<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (isset($DB) && !empty($_POST)){
        $error = array();
    
        $insert = $DB->Querries("UPDATE marque SET
                     nom_mq = '$_POST[nom]' WHERE id_mq = '$_POST[marque]' ");
    
        if ($insert) {
            echo "<h1>Modification réussie</h1>";
        } else {
            echo "<h1>Echec!! Recommencez! Nous y étions presque</h1>";
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
        <link rel = "stylesheet" href = "../../../CSS/shop.css">
        <title>Modifier catégorie</title>
    </head>
    <body>
        <?php
            if (isset($DB, $_GET['shop'])){
                $cat = $DB->SelectQuerry("SELECT * FROM  marque, shop
WHERE marque.id_shop = shop.id_shop AND shop.id_shop = '$_GET[shop]'");
            }
        ?>
        <section>
            <article id="add-box">
                <form action = "" method = "post">
                    
                    <p>
                        <label for="marque">Sélectionnez le nom de marque à modifier</label>
                    </p>
                    
                    <p>
                        <select name="marque" id="marque">
                            <option value="None">MARQUES</option>
                            <?php if (isset($cat)){
                                foreach ($cat as $ct){ ?>
                                    <option value="<?php echo $ct->id_mq ?>">
                                        <?php echo $ct->nom_mq ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                    </p>
    
                    <p>
                        <label for = "nom">Nom</label>
                        <input type="text" name="nom" id="nom">
                    </p>
                    
                    <div id="btn">
                        <input type = "submit" value = "Modifier">
                        <input type = "reset" value = "Annuler">
                    </div>
                
                </form>
            </article>
        </section>
    </body>
</html>

