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
        <!--Page de liste des boutiques-->
        
        <header></header>
        
        <section>
            <aside>
                <nav>
                    <ul>
                        <li class="index-nav">
                            <a href ="AddShop.php?shop=<?php if (isset($_GET['shop'])){
                                echo '$_GET[shop]';}?>">
                                <img src = "../../../icone/4105962-add-expand-plus_113920.png" alt = "add" class="action">Ajouter</a>
                        </li>
                        <li class="index-nav">
                            <a href ="EditShop.php?shop=<?php if (isset($_GET['shop'])){
                                echo $_GET['shop'];}?>">
                                <img src = "../../../icone/4105935-edit-pencil-update_113934.png" alt = "edit" class="action">
                                Modifier</a></li>
                        <li class="index-nav">
                            <a href = "DeleteShop.php?shop=<?php if (isset($_GET['shop'])){
                                echo $_GET['shop']; }?>">
                                <img src = "../../../icone/4105949-bin-delete-dustbin-remove-trash-trash-can_113940.png" alt = "delete" class="action">
                                Supprimer</a></li>
                    </ul>
                </nav>
            </aside>
            
            <article>
                <div class="col-md-12 col-xs-12">
                    <div class="card card-info espace">
                        <div class="card-header">LISTE DES BOUTIQUES</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>NOM</th><th>TYPE</th><th>ADRESSE</th><th>TEL</th><th>EMAIL</th><th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($DB, $_GET['vend'])){
                                            $shop = $DB->SelectQuerry("SELECT * FROM shop
WHERE shop.id_vend = '$_GET[vend]' ");
                                            if (!$shop){
                                                echo "<h1>AUCUNE BOUTIQUE DANS LA BASE DE DONNEES</h1>";
                                            }
                                        }
                                        if (isset($shop, $_GET['vend'])) {
                                            foreach ($shop as $s){ ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $s->nom_shop; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $s->id_type; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $s->adresse_shop; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $s->tel_shop; ?>
                                                    </td>
                                                    
                                                    <td>
                                                        <?php echo $s->mail_shop; ?>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir modifier cet élément?');"
                                                           href="EditShop.php?edit=<?php echo $s->id_shop;?>&vend=<?php echo $_GET['vend']; ?>">
                                                            <img src="../../../icone/4105935-edit-pencil-update_113934.png" alt="corbeille" class="corbeille">
                                                        </a>
                                                        
                                                        <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');"
                                                           href="DeleteShop.php?del=<?php echo $s->id_shop; ?>&vend=<?php echo $_GET['vend']; ?>">
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

