<?php
    
    require '../../settings/_header.php';
    require '../../settings/functions.php';
    
    if (isset($DB, $_GET['shop']) && !empty($_POST)){
        // Initialiser la session
        /*session_start();
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if(!isset($_SESSION["admin"])){
            header("Location: ../login_ad.php");
            exit();
        }*/
        $shop = $_GET['shop'];
        $check = $DB->SelectQuerry("SELECT * FROM article, shop WHERE nom_art = '$_POST[nom]'
AND article.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
        
        if (!$check){
            $ins = $DB->Querries("INSERT INTO article
    (nom_art, id_mq, id_cat, id_cp, prix, description, stock, quand_art, id_shop) VALUES
('$_POST[nom]','$_POST[marque]','$_POST[categorie]', '$_POST[code]',
         '$_POST[prix]','$_POST[desc]', '$_POST[stock]', NOW(), '$shop') ");
    
            if ($ins) {
                echo "<h1>Enregistrement réussie</h1>";
            } else {
                echo "<h1>Echec!! Recommencez! Nous y étions presque</h1>";
            }
        }else{
            echo "<h1>Vous avez déjà un article de même nom dans votre base de données!!!</h1>";
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
        <title>Ajouter produit</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../../../JS/form-manip.js" async></script>
    </head>
    <body>
        
        <header>
            <div id="index-head">
                <p id="logo">
                    <img src="../../../icone/commerce/euro_shop_online_ecommerce_shopping-19_icon-icons.com_61648.png" alt="logo" class="logo">
                </p>
                
                <div id="search-bar">
                    <form action="" method="post">
                        <label for="search"></label>
                        <input type="search" name="chercher" id="search">
                    </form>
                </div>
                
                <p id="profil">
                    <img src="../../../icone/card_account_details_outline_icon_139838.png" alt="profil" class="profil">
                </p>
            </div>
        
        </header>
        <?php
            if (isset($DB, $_GET['shop'])){
                $shop = $_GET['shop'];
                $cat = $DB->SelectQuerry("SELECT * FROM categorie, shop
WHERE categorie.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
                $marque = $DB->SelectQuerry("SELECT * FROM marque, shop
WHERE marque.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
                $codeP = $DB->SelectQuerry("SELECT * FROM code_produit, shop
WHERE code_produit.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
            }
        ?>
        <section>
            <article id="add-box">
                <form action = "" method = "post">
                    
                    <p>
                        <label for = "nom">Nom</label>
                        <input type = "text" name = "nom" id = "nom">
                    </p>
                    
                    <p>
                        <label for = "categorie"></label>
                        <select name = "categorie" id = "categorie">
                            <option value = "None">CATEGORIE</option>
                            <?php if (isset($cat)){
                                foreach ($cat as $ct) {?>
                                    <option value = "<?php echo $ct->id_cat ; ?>">
                                        <?php echo $ct->nom_cat ;?></option>
                                <?php }
                            } ?>
                        </select>
                        
                        <label for = "marque"></label>
                        <select name = "marque" id = "marque">
                            <option value = "None">MARQUE</option>
                            <?php if (isset($marque)){
                                foreach ($marque as $mq) {?>
                                    <option value = "<?php echo $mq->id_mq;?>">
                                        <?php echo $mq->nom_mq;?>
                                    </option>
                                <?php } } ?>
                        </select>
    
                        <label for = "code"></label>
                        <select name = "code" id = "code">
                            <option value = "None">CODE PRODUIT</option>
                            <?php if (isset($codeP)){
                                foreach ($codeP as $cp) {?>
                                    <option value = "<?php echo $cp->id_cp;?>">
                                        <?php echo $cp->nom_cp;?>
                                    </option>
                                <?php } } ?>
                        </select>
                    
                    </p>
                    
                    <p>
                        <label for = "stock">Stock</label>
                        <input type = "number" name = "stock" id = "stock" placeholder="0">
                    </p>
                    
                    <p>
                        <label for = "price">Prix</label>
                        <input type = "text" name = "price" id = "price"
                               placeholder="<?php echo number_format(0,2,
                                   '.',' '); ?>">
                    </p>
                    
                    <p>
                        <label for = "color">Couleurs</label>
                        <input type = "text" name = "color" id = "color" multiple>
                    </p>
                    
                    <p>
                        <label for = "desc"></label>
                        <textarea
                            name = "desc" id = "desc" cols = "30" rows = "10"
                            placeholder="Description du produit" is="textarea-autogrow">
                </textarea>
                    </p>
                    
                    <div id="btn-add">
                        <input type = "submit" value = "Ajouter">
                        <input type = "reset" value = "Annuler">
                    </div>
                
                </form>
            </article>
        </section>
    </body>
</html>

