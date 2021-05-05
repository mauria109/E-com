<?php
    require '../../Settings/_header.php';
    
    if (isset($DB) && !empty($_POST)){
        $insert = $DB->Querries("DELETE FROM code_produit WHERE id_cp = '$_POST[code]' ");
        
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
                <form action = "" method = "post">
                    <p>
                        <label for = "code"></label>
                        <select name="code" id="code">
                            <option value="None">CODES PRODUITS</option>
                            <?php if (isset($DB)){
                                $cat = $DB->SelectQuerry("SELECT * FROM  code_produit ");
                                foreach ($cat as $ct){ ?>
                                    <option value="<?php echo $ct->id_cp ?>">
                                        <?php echo $ct->nom_cp ?>
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

