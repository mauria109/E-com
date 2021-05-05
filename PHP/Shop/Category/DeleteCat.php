<?php
    require '../../Settings/_header.php';
    
    if (isset($DB,  $_GET['shop']) && !empty($_POST)){
        $shop = $_GET['shop'];
        $insert = $DB->Querries("DELETE FROM categorie WHERE id_cat = '$_POST[categorie]' ");
    
        if ($insert) {
            echo "<h1>Suppression réussie</h1>";
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
        <title>Supprimer catégorie</title>
    </head>
    <body>
        
        <section>
            <article id="add-box">
                <form action = "AddCat.php" method = "post">
    
                    <p>
                        <label for="categorie">Sélectionnez le nom de catégorie à supprimer</label>
                    </p>
    
                    <p>
                        <select name="categorie" id="categorie">
                            <option value="None">CATEGORIES</option>
                            <?php if (isset($DB, $_GET['shop'])){
                                $shop = $_GET['shop'];
                                $cat = $DB->SelectQuerry("SELECT * FROM  categorie,shop
WHERE categorie.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
                                foreach ($cat as $ct){ ?>
                                    <option value="<?php echo $ct->id_cat ?>">
                                        <?php echo $ct->nom_cat ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                    </p>
                    
                    <div id="btn">
                        <input type = "submit" value = "Supprimer">
                        <input type = "reset" value = "Annuler">
                    </div>
                
                </form>
            </article>
        </section>
    </body>
</html>

