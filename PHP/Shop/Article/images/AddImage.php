<?php
    //connexion a la bdd
    
    require '../../../Settings/_header.php';
    require '../../../Settings/functions.php';
    
    // Initialiser la session
    //session_start();
    // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
    /*if(!isset($_SESSION["admin"])){
        header("Location: ../login_ad.php");
        exit();
    }*/
    
    if (!empty($_POST) && isset($DB, $_FILES['img']) && $_FILES['img']['error'] === 0 ) {
        
        $nom = $_POST['nom'];
        $path = "D:\\Workspace\\E-shop\\Product_images\\";
        
        $image = $_FILES['img'];
        
        $checkFile = UploadFiles($image, $path, $nom);
        
        if ($checkFile == true){
            $id = $_POST['article'];
            $rq = $DB->Querries("INSERT INTO image (nom_img, img, id_art)
VALUES ('$_FILES[img]', '$nom', '$id' )");
            
            if ($rq) {
                echo "<h1>Enregistrement réussie</h1>";
            } else {
                echo "<h1>Echec!! Recommencez! Nous y étions presque</h1>";
            }
        }
        
        
    }

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajout d'image</title>
    </head>
    <body>
        
        <h1>Formulaire d'ajout d'image</h1>
        
        <form method="post" action="" enctype="multipart/form-data">
            
            <p>
                <label for="nom">Nom de l'image</label>
                <input type="text" name="nom" id="nom" required>
            </p>
            
            <p>
                <label for="img"></label>
            </p>
            
            <p>
                <input type="file" name="img" id="img" required>
            </p>
            
            <p>
                <label for="article">A quel article attribuez-vous cette image?</label>
            </p>
            
            <p>
                <select name="article" id="article">
                    <option value="None">ARTICLES</option>
                    <?php if (isset($DB)){
                        $article = $DB->SelectQuerry("SELECT * FROM article, avoir, shop
WHERE avoir.id_shop = shop.id_shop AND shop.id_shop = '$_GET[shop]'");
                        foreach ($article as $art){ ?>
                            <option value="<?php echo $art->id_art ?>">
                                <?php echo $art->nom_art ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </p>
            
            <div id="bt">
                
                <p>
                    <input type="submit" value="Ajouter">
                    <input type="reset" value="Annuler">
                </p>
            
            </div>
        
        
        </form>
    </body>
</html>
