<?php
    require '../../Settings/_header.php';
    
    if (isset($DB,  $_GET['shop']) && !empty($_POST)){
        $shop = $_GET['shop'];
        
        $check = $DB->Querries("INSERT INTO event (nom_ev, debut, fin, id_shop)
VALUES ('$_POST[nom]', '$_POST[debut]', '$_POST[fin]', '$shop')");
        
        if ($check){
            echo "<h1>Votre nouvel évènement vient d'être enregistré avec succès!!!</h1>";
        }else{
            echo "<h1>Echec de l'enregistrement d'évènement!!! Veuillez recommencer!!!</h1>";
        }
    }

?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Modifier un évènement</title>
    </head>
    <body>
        <header></header>
    
        <?php if (isset($DB, $_GET['shop'])){
            $shop = $_GET['shop'];
            $ev = $DB->SelectQuerry("SELECT * FROM event, shop
WHERE event.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
        } ?>
        
        <section>
            
            <article>
                <form action = "" method = "post">
    
                    <p>
                        <label for = "ev">Quel évènement voulez-vous modifier?</label>
                        <select name="ev" id="ev">
                            <option value="None">ÉVÈNEMENTS</option>
                            <?php if (isset($ev)){
                                foreach ($ev as $e){ ?>
                                    <option value="<?php echo $e->id_ev?>">
                                        <?php echo $e->nom_ev?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                    </p>
                    
                    
                    <p>
                        <label for = "nom">Nom de l'évènement</label>
                        <input type = "text" name = "nom" id = "nom">
                    </p>
                    
                    <p>
                        <label for="debut">Date et heure de début</label>
                        <input type="datetime-local" name="debut" id="debut">
                        
                        <label for="fin">Date et heure de fin</label>
                        <input type="datetime-local" name="fin" id="fin">
                    </p>
                    
                    <div id="btn">
                        <input type="submit" value="Modifier">
                        <input type="reset" value="Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

