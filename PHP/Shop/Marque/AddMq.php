<?php
    require '../../Settings/_header.php';
    require '../../Settings/functions.php';
    
    if (isset($DB, $_GET['shop']) && !empty($_POST)){
        
        $control = $DB->SelectQuerry("SELECT * FROM marque, shop
WHERE nom_mq = '$_POST[nom]' AND marque.id_shop = shop.id_shop AND shop.id_shop = '$_GET[shop]'");
        
        if (!$control){
            $insert = $DB->Querries("INSERT INTO marque (nom_mq, id_shop)
VALUES ('$_POST[nom]', '$_GET[shop]') ");
            
            if ($insert) {
                echo "<h1>Enregistrement réussie</h1>";
            } else {
                echo "<h1>Echec!! Recommencez! Nous y étions presque</h1>";
            }
        }else{
            echo "<h1>Cette marque existe déjà dans la base de données!!</h1>";
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
        <title>Ajouter nouvelle marque</title>
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

