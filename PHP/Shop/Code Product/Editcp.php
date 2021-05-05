<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (isset($DB, $_GET['shop']) && !empty($_POST)){
        
        $insert = $DB->Querries("UPDATE code_produit SET nom_cp = '$_POST[nom]',
                        id_cat = '$_POST[categorie]' WHERE id_cp = '$_POST[code]' ");
    
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
                $shop = $_GET['shop'];
                $cat = $DB->SelectQuerry("SELECT * FROM  categorie, shop
WHERE categorie.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
                $code = $DB->SelectQuerry("SELECT * FROM code_produit, shop
WHERE code_produit.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
            }
        ?>
        <section>
            <article id="add-box">
                <form action = "" method = "post">
    
                    <p>
                        <label for="code">Sélectionnez le code produit à modifier</label>
                    </p>
                    <p>
                        <select name="code" id="code">
                            <option value="None">CODES PRODUITS</option>
                            <?php if (isset($code)){
                                foreach ($code as $cd){ ?>
                                    <option value="<?php echo $cd->id_cp; ?>">
                                        <?php echo $cd->nom_cp; ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                    </p>
    
                    <p>
                        <label for = "nom">Nouveau nom</label>
                        <input type="text" name="nom" id="nom">
                    </p>
                    
                    <p>
                        <label for="categorie">Quelle catégorie voulez-vous lui attribuer?</label>
                    </p>
                    <p>
                        <select name="categorie" id="categorie">
                            <option value="None">CATEGORIES</option>
                            <?php if (isset($cat)){
                                foreach ($cat as $ct){ ?>
                                    <option value="<?php echo $ct->id_cat; ?>">
                                        <?php echo $ct->nom_cat; ?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
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

