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
        $check = $DB->SelectQuerry(
                "SELECT nom_art FROM article, shop WHERE id_art = '$_POST[article]'
AND article.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
    
        $ins = $DB->Querries("UPDATE article SET nom_art = '$_POST[nom]',
                   id_mq = '$_POST[marque]', id_cat = '$_POST[categorie]', id_cp = '$_POST[code]',
                   prix = '$_POST[prix]', description = '$_POST[desc]',stock = '$_POST[stock]'
                   WHERE id_art = '$_POST[article]'");
    
        if ($ins) {
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
                $cat = $DB->SelectQuerry("SELECT * FROM  categorie, shop
WHERE categorie.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
                $marque = $DB->SelectQuerry("SELECT * FROM marque, shop
WHERE marque.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
                $article = $DB->SelectQuerry("SELECT * FROM article, shop
WHERE article.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
                $code = $DB->SelectQuerry("SELECT * FROM code_produit, shop
WHERE code_produit.id_shop = shop.id_shop AND shop.id_shop = '$shop'");
            }
        ?>
        <section>
            <article id="add-box">
                <form action = "" method = "post">
                    
                    <p>
                        <label for="article">Quel article voulez-vous modifier?</label>
                        <select name="article" id="article">
                            <option value="None">ARTICLES</option>
                            <?php if (isset($article)){
                                foreach ($article as $art){?>
                            <option value="<?php echo $art->id_art; ?>">
                                <?php echo $art->nom_art; ?>
                            </option>
                            <?php }
                        } ?>
                        </select>
                    </p>
                    
                    <p>
                        <label for = "nom">Nom</label>
                        <input type = "text" name = "nom" id = "nom">
                    </p>
                    
                    <p>
                        <label for = "categorie">Voulez-vous modifier également la catégorie, la marque et/ou le code produit? </label>
                    </p>
                    <p>
                        <select name = "categorie" id = "categorie">
                            <option value="None">CATEGORIES</option>
                            <?php if (isset($cat)){
                                foreach ($cat as $ct) { ?>
                                    <option value = "<?php echo $ct->id_cat ; ?>">
                                        <?php echo $ct->nom_cat ;?>
                                    </option>
                                <?php }
                            } ?>
                        </select>
                        
                        <label for = "marque"></label>
                        <select name = "marque" id = "marque">
                            <option value="None">MARQUES</option>
                            <?php if (isset($marque)){
                                foreach ($marque as $mq) {?>
                                    <option value = "<?php echo $mq->id_mq;?>">
                                        <?php echo $mq->nom_mq;?>
                                    </option>
                                <?php } } ?>
                        </select>
    
                        <label for = "code"></label>
                        <select name = "code" id = "code">
                            <option value="None">CODES PRODUIT</option>
                            <?php if (isset($code)){
                                foreach ($code as $cd) {?>
                                    <option value = "<?php echo $cd->id_cp;?>">
                                        <?php echo $cd->nom_cp;?>
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
                        <label for = "desc"></label>
                        <textarea
                            name = "desc" id = "desc" cols = "30" rows = "10"
                            placeholder="Description du produit" is="textarea-autogrow">
                </textarea>
                    </p>
                    
                    <div id="btn-add">
                        <input type = "submit" value = "Modifier">
                        <input type = "reset" value = "Annuler">
                    </div>
                
                </form>
            </article>
        </section>
    </body>
</html>

