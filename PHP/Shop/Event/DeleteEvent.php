<?php
    require '../../Settings/_header.php';
    
    if (isset($DB, $_GET['shop']) && !empty($_POST)){
        $shop = $_GET['shop'];
        $del = $DB->Querries("DELETE FROM event WHERE id_ev = '$_POST[event]'");
        
        if ($del){
            echo "<h1>Votre évènement vient d'être supprimé avec succès!!!</h1>";
        }else{
            echo "<h1>Echec de la suppression de l'évènement!!! Veuillez recommencer!!!</h1>";
        }
    }

?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <title>Supprimer un évènement</title>
    </head>
    <body>
        <header></header>
        
        <section>
            <?php if (isset($DB, $_GET['shop'])){
                $shop = $_GET['shop'];
                $ev = $DB->SelectQuerry("SELECT * FROM event, shop
WHERE event.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
            } ?>
            <article>
                <form action = "" method = "post">
                    <p>
                        <label for = "event">Nom de l'évènement</label>
                        <select name="event" id="event">
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
                    
                    <div id="btn">
                        <input type="submit" value="Supprimer">
                        <input type="reset" value="Annuler">
                    </div>
                </form>
            </article>
        </section>
    </body>
</html>

