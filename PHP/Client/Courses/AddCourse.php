<?php
    require '../../Settings/_header.php';
    
    if (isset($DB, $_GET) && !empty($_POST)){
        $errors=array();
        $liste = $DB->Querries("INSERT INTO course (titre_lc, content_lc, id_cli, quand_lc)
VALUES ('$_POST[nom]', '$_POST[contenu]' ,'$_GET[client]', NOW())");
        
        if (!$liste){
            echo $errors['liste'] = "Erreur d'enregistrement de votre liste de courses!!!";
        }else{
            echo "<h1>Votre liste de courses vient d'être enregistrée avec succès!!</h1>";
        }
    }
    
    ?>

