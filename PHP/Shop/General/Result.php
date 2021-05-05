<?php
    require '../../Settings/_header.php';
    
    if (isset($DB) && !empty($_POST)){
        $nom = $_POST['req'];
        $article = $DB->SelectQuerry("SELECT * FROM article WHERE nom_art LIKE '%$nom%' ");
        $categorie = $DB->SelectQuerry("SELECT * FROM categorie WHERE nom_cat LIKE '%$nom%' ");
        $code = $DB->SelectQuerry("SELECT * FROM code_produit WHERE nom_cp LIKE '%$nom%'");
        $marque = $DB->SelectQuerry("SELECT * FROM marque WHERE nom_mq LIKE '%$nom%'");
        
        $res = $article;
        
        if (!$article){
            $res = $categorie;
        }elseif (!$categorie){
            $res = $marque;
        }elseif (!$marque){
            $res = $code;
        }else{
            //rediriger vers la page d'erreur
            Redirection("Errors.php");
        }
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
        <title>Résultats</title>
    </head>
    <body>
        
        <header>
            <p id="logo">
                <img src="../../../icone/commerce/euro_shop_online_ecommerce_shopping-19_icon-icons.com_61648.png" alt="logo" class="logo">
            </p>
        
        </header>
        
        
        <section>
            
            <article>
                
                <div class="col-md-12 col-xs-12">
                    <div class="card card-info espace">
                        <div class="card-header">RESULTATS</div>
                        <div class="card-body">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if (isset($DB) && !empty($_POST)){
                                            $nom = $_POST['req'];
                                            $article = $DB->SelectQuerry("SELECT * FROM article WHERE nom_art LIKE '%$nom%' ");
                                            $categorie = $DB->SelectQuerry("SELECT * FROM categorie WHERE nom_cat LIKE '%$nom%' ");
                                            $code = $DB->SelectQuerry("SELECT * FROM code_produit WHERE nom_cp LIKE '%$nom%'");
                                            $marque = $DB->SelectQuerry("SELECT * FROM marque WHERE nom_mq LIKE '%$nom%'");
        
                                            $res = $article;
        
                                            if (!$article){
                                                $res = $categorie;
                                            }elseif (!$categorie){
                                                $res = $marque;
                                            }elseif (!$marque){
                                                $res = $code;
                                            }else{
                                                //rediriger vers la page d'erreur
                                                Redirection("Errors.php");
                                            }
                                        }
                                        if (isset($res)) {
                                            foreach ($res as $item){ ?>
                                                    <tr>
                                                <td>
                                                    <?php echo $item->nom_art; ?>
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