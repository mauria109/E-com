<?php
    require '../../Settings/_header.php';
    
    if (isset($DB, $_GET['vend'])){
        $shop = $DB->SelectQuerry("SELECT id_shop FROM shop WHERE id_vend = '$_GET[vend]' ");
    }
    ?>

<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../CSS/menu.css">
        <link rel="stylesheet" href="../../../CSS/gestion.css">
        <link rel="stylesheet" href="../../../CSS/index.css">
        <title>Gestion des catégories</title>
    </head>
    <body>
        <!--Page d'accueil des catégories-->
        
        <header></header>
        
        <section>
            <aside>
                <nav>
                    <ul>
                        <li class="index-nav">
                            <a href = "../Article/ArtHome.php?shop=
                            <?php if (isset($shop)){ echo $shop; }?>">
                                Articles
                            </a>
                        </li>
                        <li class="index-nav"><a href = "../Category/CatHome.php?shop=
                        <?php if (isset($shop)){ echo $shop; }?>">
                                Catégories
                            </a></li>
                        <li class="index-nav"><a href = "../Code Product/CodeHome.php?shop=
                        <?php if (isset($shop)){ echo $shop; }?>">
                                Codes produit
                            </a></li>
    
                        <li class="index-nav"><a href = "../Marque/MqHome.php?shop=
                        <?php if (isset($shop)){ echo $shop; }?>">
                                Marques
                            </a></li>
                        <li class="index-nav"><a href = "../Marque/MqHome.php?shop=
                        <?php if (isset($shop)){ echo $shop; }?>">
                                Ma boutique
                            </a></li>
                    </ul>
                </nav>
            </aside>
            
            <article></article>
        </section>
    </body>
</html>

