<?php
    
    require '../../settings/_header.php';
    
    if (isset($DB, $_GET['shop']) && !empty($_POST)){
        // Initialiser la session
        /*session_start();
        // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
        if(!isset($_SESSION["admin"])){
            header("Location: ../login_ad.php");
            exit();
        }*/
        
        $shop = $_GET['shop'];
    
        $ins = $DB->Querries("DELETE FROM article WHERE id_art = '$_POST[article]'");
    
        if ($ins) {
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
            <?php
                if (isset($DB, $_GET['shop'])){
                    $shop = $_GET['shop'];
                    $article = $DB->SelectQuerry("SELECT * FROM article , shop
WHERE article.id_shop = shop.id_shop AND shop.id_shop = '$shop' ");
                }
            ?>
        </header>
        <section>
            <article id="add-box">
                <form action = "" method = "post">
                    
                    <p>
                        <label for = "article">Nom article</label>
                        <select name="article" id="article">
                            <option value="None">ARTICLES</option>
                            
                            <?php
                                if (isset($article)) {
                                    foreach ($article as $art){ ?>
                                    <option value="<?php echo $art->id_art;?>">
                                        <?php echo $art->nom_art;?>
                                    </option>
                                    <?php }
                                } ?>
                        </select>
                    </p>
                    
                    <div id="btn-add">
                        <input type = "submit" value = "Supprimer">
                        <input type = "reset" value = "Annuler">
                    </div>
                
                </form>
            </article>
        </section>
    </body>
</html>

