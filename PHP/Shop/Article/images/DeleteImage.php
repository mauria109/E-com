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
            $rq = $DB->Querries("DELETE FROM image WHERE id_img = '$_POST[image]' ");
            
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
        <title>Suppression d'image</title>
    </head>
    <body>
        
        <h1>Formulaire de suppression d'image</h1>
        
        <form method="post" action="" enctype="multipart/form-data">
    
            <p>
                <label for="image">Quelle image voulez-vous supprimer ?</label>
            </p>
    
            <p>
                <select name="image" id="image">
                    <option value="None">IMAGES</option>
                    <?php if (isset($DB)){
                        $img = $DB->SelectQuerry("SELECT * FROM image, article, avoir, shop
WHERE image.id_art = avoir.id_art AND avoir.id_art = article.id_art AND avoir.id_shop = shop.id_shop
  AND shop.id_shop = '$_GET[shop]'");
                        foreach ($img as $item){ ?>
                            <option value="<?php echo $item->id_img ?>">
                                <?php echo $item->nom_img ?>
                            </option>
                        <?php }
                    } ?>
                </select>
            </p>
            
            <div id="bt">
                
                <p>
                    <input type="submit" value="Supprimer">
                    <input type="reset" value="Annuler">
                </p>
            
            </div>
        
        
        </form>
    </body>
</html>
