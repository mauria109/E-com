<?php
    require '../../Settings/_header.php';
?>

<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../CSS/menu.css">
        <link rel="stylesheet" href="../../../CSS/gestion.css">
        <link rel="stylesheet" href="../../../CSS/index.css">
        <link rel = "stylesheet" href = "../../../CSS/Form.css">
        <link rel="stylesheet" href="../../../CSS/list.css">
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
                            
                            <a href = "AddPrd.php?shop=<?php if (isset($_GET['shop'])){ echo '$_GET[shop]'; }?>">
                                <img src = "../../../icone/4105962-add-expand-plus_113920.png" alt = "add" class="action">Ajouter</a>
                        </li>
                        <li class="index-nav"><a href = "EditPrd.php?shop=<?php if (isset($_GET['shop'])){ echo $_GET['shop']; }?>"><img src = "../../../icone/4105935-edit-pencil-update_113934.png" alt = "edit" class="action">
                                Modifier
                            </a></li>
                        <li class="index-nav"><a href = "DeletePrd.php?shop=<?php if (isset($_GET['shop'])){ echo $_GET['shop']; }?>"><img src = "../../../icone/4105949-bin-delete-dustbin-remove-trash-trash-can_113940.png" alt = "delete" class="action">
                                Supprimer
                            </a></li>
                    </ul>
                </nav>
            </aside>
    
            <<article>
                <div class="col-md-12 col-xs-12">
                    <div class="card card-info espace">
                        <div class="card-header">LISTE DES ARTICLES</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th><th>NOM</th><th>MARQUE</th><th>CATEGORIE</th><th>CODE PRODUIT</th><th>PRIX</th><th>DESCRIPTION</th><th>STOCK</th><th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($DB, $_GET['shop'])){
                                            $shop = $_GET['shop'];
                                            $article = $DB->SelectQuerry("SELECT * FROM
              article, shop WHERE article.id_shop = shop.id_shop
                                     AND shop.id_shop = '$_GET[shop]'");
                                            $image = $DB->SelectQuerry("SELECT * FROM image,
              article WHERE image.id_art = article.id_art AND article.id_art = '$article' ");
    
                                            $mq = $DB->SelectQuerry("SELECT * FROM marque, article
WHERE id_art = '$article' AND article.id_mq = marque.id_mq ");
    
                                            $cat = $DB->SelectQuerry("SELECT * FROM categorie, article
WHERE id_art = '$article' AND article.id_cat = categorie.id_cat ");
    
                                            $code = $DB->SelectQuerry("SELECT * FROM code_produit, article
WHERE id_art = '$article' AND article.id_cp = code_produit.id_cp ");
                                            if (!$article){
                                                echo "<h1>AUCUN ARTICLE DANS LA BASE DE DONNEES</h1>";
                                            }
                                        }
                                        if (isset($article, $image, $mq, $cat, $code, $shop)) {
                                            foreach ($article as $art){
                                                foreach ($image as $img){ ?>
                                                <tr>
                                                    <td>
                                                        <img src="../../../Product_images/<?php echo $img->img_blob;?>"
                                                             alt="img" class="prd-img">
                                                    </td>
                                                    <?php } ?>
                                                    
                                                    <td><?php echo $art->nom_art; ?></td>
                                                
                                                <td><?php echo $mq->nom_mq; ?></td>
    
                                                <td><?php echo $cat->nom_cat; ?></td>
    
                                                <td><?php echo $code->nom_cp; ?></td>
    
                                                <td><?php echo $art->prix; ?></td>
    
                                                <td><?php echo $art->description; ?></td>
    
                                                <td><?php echo $art->stock; ?></td>
                                                    <td>
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir modifier cet élément?');"
                                                           href="EditPrd.php?edit=<?php echo $art->id_art; ?>&shop=<?php echo $shop;?>">
                                                            <img src="../../../icone/4105935-edit-pencil-update_113934.png" alt="corbeille" class="corbeille">
                                                        </a>
                                                
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');"
                                                           href="DeletePrd.php?del=<?php echo $art->id_art; ?>&shop=<?php echo $shop;?>">
                                                            <img src="../../../icone/iconfinder-trash-4341321_120557.png" alt="corbeille" class="corbeille">
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php }
                                        } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </article>
        </section>
    </body>
</html>

