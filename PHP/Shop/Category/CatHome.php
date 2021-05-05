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
                            
                            <a href = "AddCat.php?shop=<?php if (isset($_GET['shop'])){ echo '$_GET[shop]'; }?>">
                                <img src = "../../../icone/4105962-add-expand-plus_113920.png" alt = "add" class="action">Ajouter</a>
                        </li>
                        <li class="index-nav"><a href = "EditCat.php?shop=<?php if (isset($_GET['shop'])){ echo $_GET['shop']; }?>"><img src = "../../../icone/4105935-edit-pencil-update_113934.png" alt = "edit" class="action">
                                Modifier
                            </a></li>
                        <li class="index-nav"><a href = "DeleteCat.php?shop=<?php if (isset($_GET['shop'])){ echo $_GET['shop']; }?>"><img src = "../../../icone/4105949-bin-delete-dustbin-remove-trash-trash-can_113940.png" alt = "delete" class="action">
                                Supprimer
                            </a></li>
                    </ul>
                </nav>
            </aside>
    
            <article>
                <div class="col-md-12 col-xs-12">
                    <div class="card card-info espace">
                        <div class="card-header">LISTE DES CATEGORIES</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NOM</th><th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($DB, $_GET['shop'])){
                                            $categorie = $DB->SelectQuerry("SELECT * FROM
              categorie, shop WHERE categorie.id_shop = shop.id_shop
                                          AND shop.id_shop = '$_GET[shop]' ");
                                            if (!$categorie){
                                                echo "<h1>AUCUNE CATEGORIE DANS LA BASE DE DONNEES</h1>";
                                            }
                                        }
                                        if (isset($categorie, $_GET['shop'])) {
                                            $shop = $_GET['shop'];
                                            foreach ($categorie as $cat){ ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $cat->nom_cat; ?>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir modifier cet élément?');"
                                                           href="EditCat.php?edit=<?php echo $cat->id_cat; ?>&shop=<?php echo $shop;?>">
                                                            <img src="../../../icone/4105935-edit-pencil-update_113934.png" alt="corbeille" class="corbeille">
                                                        </a>
                                                
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');"
                                                           href="DeleteCat.php?del=<?php echo $cat->id_cat;?>&shop=<?php echo $shop;?>">
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

