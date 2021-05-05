<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (isset($DB) && !empty($_POST)){
        $error = array();
        $shop = $_GET['shop'];
        $control = $DB->SelectQuerry("SELECT * FROM code_produit, shop WHERE nom_cp = '$_POST[nom]'
AND code_produit.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
        
        if (!$control){
            $insert = $DB->Querries("INSERT INTO code_produit (nom_cp, id_cat, id_shop)
VALUES ('$_POST[nom]', '$_POST[categorie]', '$shop') ");
            
            if ($insert) {
                echo "<h1>Enregistrement réussie</h1>";
            } else {
                echo "<h1>Echec!! Recommencez! Nous y étions presque</h1>";
            }
        }else{
            echo "<h1>Ce code produit existe déjà dans la base de données!!</h1>";
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
        <title>Ajouter nouveau code produit</title>
    </head>
    <body>
        
        <section>
            <article id="add-box">
                <form action = "" method = "post">
    
                    <p>
                        <label for="categorie">Sélectionnez la catégorie à affecter au code produit</label>
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
                    
                    <p>
                        <label for = "nom">Nom</label>
                        <input type = "text" name = "nom" id = "nom">
                    </p>
                    
                    <div id="btn">
                        <input type = "submit" value = "Ajouter">
                        <input type = "reset" value = "Annuler">
                    </div>
                
                </form>
            </article>
        </section>
    </body>
</html>

