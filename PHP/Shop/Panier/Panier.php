<?php
    require '../../settings/_header.php';
    
    if (isset($panier, $_GET['del'], $_GET['name_art'])) {
        $panier->del($_GET['del']);
        $name = $_GET['name_art'];
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../../../CSS/menu.css">
        <link rel = "stylesheet" href = "../../../CSS/Form.css">
        <link rel="stylesheet" href="../../../CSS/panier.css">
        <link rel="stylesheet" href="../../../CSS/list.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../../../JS/panier.js" type="text/javascript" async></script>
        <title>Panier</title>
    </head>
    <body>
        
        <header>
            <p id="logo">
                <img src="../../../icone/commerce/euro_shop_online_ecommerce_shopping-19_icon-icons.com_61648.png" alt="logo" class="logo">
            </p>
        
        </header>
        
        
        <section>
            
            <article>
                <div class="up">
                    <div id="count">
                        <h2>Nombre d'articles choisis</h2>
                        
                        <h3>
                            <?php if (isset($panier)) {
                                echo $panier->count();
                            } ?>
                        </h3>
                    
                    </div>
                    
                    <div id="total">
                        <h2>Prix total</h2>
                        
                        <h3>
                            <?php
                                //afficher le total
                                if (isset($panier)) {
                                    echo number_format($panier->total(),2,'.',' ');
                                } ?>
                        </h3>
                    
                    </div>
                
                </div>
                
                <a href="#" id="payer">
                    <img src="../../../icone/commerce/cashregister_106599.png" alt="caisse" class="caisse">
                </a>
            </article>
            
            <article>
                
                <div class="col-md-12 col-xs-12">
                    <div class="card card-info espace">
                        <div class="card-header">PANIER</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th><th>NOM</th><th>PRIX</th><th>QUANTITE</th><th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($DB)){
                                            $id = array_keys($_SESSION['panier']);
                                            if (isset($id, $name)){
                                                $article = $DB->SelectQuerry("SELECT * FROM article WHERE id_art IN (".implode(",",$id).") ");
                                                $image = $DB->SelectQuerry("SELECT * FROM image WHERE id_art = '$article' ");
                                            }else {
                                                $article = array();
                                                echo"<h1>Aucun article sélectionné</h1>";
                                            }
                                        }
                                        if (isset($article, $image)) {
                                            foreach ($article as $art){
                                                foreach ($image as $img){?>
                                                    <tr>
                                                    <td>
                                                        <img src="../../../Product_images/<?php echo $img->img_blob;?>"
                                                             alt="img" class="prd-img">
                                                    </td>
                                                <?php } ?>
                                                <td>
                                                    <?php echo $art->nom_art; ?>
                                                </td>
                                                <td>
                                                    <?php echo number_format($art->prix,2,'.',' '); ?>
                                                </td>
                                                <td>
                                                    <label for="quantite"></label>
                                                    <input type="number" name="quantite" id="quantite">
                                                </td>
                                                <td>
                                                    <a onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet élément?');" href="Panier.php?del=<?php echo $art->id_art; ?>">
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

