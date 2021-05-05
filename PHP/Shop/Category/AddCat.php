<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (isset($DB, $_GET['shop']) && !empty($_POST)){
        $error = array();
        $shop = $_GET['shop'];
        $control = $DB->SelectQuerry("SELECT * FROM categorie, shop WHERE nom_cat = '$_POST[nom]'
AND categorie.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
    
        if (!$control){
            $insert = $DB->Querries("INSERT INTO categorie (nom_cat, id_shop) VALUE
    ('$_POST[nom]', '$shop') ");
        
            if ($insert) {
                echo "<h1>Enregistrement réussie</h1>";
            } else {
                echo "<h1>Echec!! Recommencez! Nous y étions presque</h1>";
            }
        }else{
            echo "<h1>Ce nom de catégorie existe déjà dans la base de données!!</h1>";
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
        <title>Ajouter nouvelle catégorie</title>
    </head>
    <body>
        
        <section>
            <article id="add-box">
                <form action = "" method = "post">
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

