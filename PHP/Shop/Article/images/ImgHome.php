
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../../../../CSS/menu.css">
        <link rel="stylesheet" href="../../../../CSS/gestion.css">
        <link rel="stylesheet" href="../../../../CSS/index.css">
        <link rel = "stylesheet" href = "../../../../CSS/Form.css">
        <link rel="stylesheet" href="../../../../CSS/list.css">
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
                            
                            <a href = "AddImage.php?shop=<?php if (isset($_GET['shop'])){ echo '$_GET[shop]'; }?>">
                                <img src = "../../../../icone/4105962-add-expand-plus_113920.png" alt = "add" class="action">Ajouter</a>
                        </li>
                        <li class="index-nav">
                            <a href = "EditImage.php?shop=
                            <?php if (isset($_GET['shop'])){ echo $_GET['shop']; }?>">
                                <img src = "../../../../icone/4105935-edit-pencil-update_113934.png" alt = "edit" class="action">
                                Modifier
                            </a></li>
                        <li class="index-nav">
                            <a href = "DeleteImage.php?shop=
                            <?php if (isset($_GET['shop'])){ echo $_GET['shop']; }?>">
                                <img src = "../../../../icone/4105949-bin-delete-dustbin-remove-trash-trash-can_113940.png" alt = "delete" class="action">
                                Supprimer
                            </a></li>
                    </ul>
                </nav>
            </aside>
    
            <article>
                <div class="col-md-12 col-xs-12">
                    <div class="card card-info espace">
                        <div class="card-header">LISTE DES IMAGES</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>IMAGE</th><th>NOM</th><th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($DB, $_GET['shop'])){
                                            $image = $DB->SelectQuerry("SELECT * FROM
              image, article, avoir, shop WHERE image.id_art = article.id_art
                                            AND article.id_art = avoir.id_art
                                            AND shop.id_shop = '$_GET[shop]'");
                                            if (!$image){
                                                echo "<h1>AUCUNE IMAGE DANS LA BASE DE DONNEES</h1>";
                                            }
                                        }
                                        if (isset($image)) {
                                            foreach ($image as $img){ ?>
                                                <tr>
                                                    <td>
                                                        <img src="../../../Product_images/<?php echo $img->img_blob;?>"
                                                             alt="img" class="prd-img">
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $img->nom_img; ?>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir modifier cet élément?');" href="EditImage.php?edit=<?php echo $img->id_img; ?>">
                                                            <img src="../../../../icone/4105935-edit-pencil-update_113934.png" alt="corbeille" class="corbeille">
                                                        </a>
                                                
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');" href="DeleteImage.php?del=<?php echo $img->id_img; ?>">
                                                            <img src="../../../../icone/iconfinder-trash-4341321_120557.png" alt="corbeille" class="corbeille">
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

