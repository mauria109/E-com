<?php
    
    require '../../settings/_header.php';
    require '../../settings/functions.php';
    
    if (isset($DB)) {
        $article = $DB->SelectQuerry("SELECT * FROM  article");
        $image = $DB->SelectQuerry("SELECT * FROM  image");
        
        $categorie = $DB->SelectQuerry("SELECT * FROM  categorie");
        $marque = $DB->SelectQuerry("SELECT * FROM marque");
    
        $code = $DB->SelectQuerry("SELECT * FROM code_produit");
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../../../CSS/menu.css">
        <link rel = "stylesheet" href = "../../../CSS/index.css">
        <link rel = "stylesheet" href = "../../../CSS/shop.css">
        <link rel = "stylesheet" href = "../../../CSS/Form.css">
        <title>Catalogue</title>
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
                
                <p id="panier">
                    <img src="../../../icone/commerce/cart2-115853_115816.png" alt="panier" class="panier">
                </p>
            </div>
        
        </header>
        
        <section>
            
            <article>
                <div id="container">
                    <?php if (isset($article, $image)){
                        foreach ($article as $art){
                            foreach ($image as $img){ ?>
                                <div class="prd-box">
                                <div class="prd-img">
                                    <p>
                                        <img src="../../../product_img/<?php echo $img->nom_img;?>"
                                             alt="image" class="img">
                                    </p>
                                </div>
                                
                                <div class="prd-text">
                                
                                <div class="prd-title">
                                    <h2>
                                        <a href="AddPanier.php?id_art=<?php echo $art->id_art;?>">
                                            <?php echo $art->nom_art; ?>
                                        </a>
                                    </h2>
                                </div>
                                
                                <div class="prd-price">
                                    <h3> <?php echo number_format($art->prix,2,'.',' ');?> </h3>
                                </div>
                                
                                <div class="prd-desc">
                                    <p>
                                        <?php echo $art->description;  ?>
                                    </p>
                                </div>
                                
                                <div class="prd-info">
                                    <button type = "submit" id="more-info-btn">
                                        <a href = "#">
                                            <img src = "../../../icone/1486485587-add-create-new-maths-math-signs-plus_81172.png" alt = "info" class="more-info">
                                            Détails
                                        </a>
                                    </button>
                                </div>
                                
                                <div class="prd-panier">
                                <button type = "submit" id="add-to-pan-btn">
                                <a href="AddPanier.php?id_art=<?php echo $art->id_art;?>?name_art=<?php echo $art->nom_art;?>">
                                    <img src = "../../../icone/commerce/3507741-add-cart-ecommerce-iconoteka-shop-shopping_107687.png" alt = "panier" class="add-panier">
                                </a>
                            <?php } } ?>
                        </button>
                        </div>
                        
                        </div>
                        </div>
                    <?php } ?>
                </div>
            </article>
        
        </section>
    </body>
</html>