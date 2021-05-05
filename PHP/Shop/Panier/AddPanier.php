<?php
    
    require '../../settings/_header.php';
    require '../../settings/functions.php';
    
    $json = array('error' => true);
    
    if (isset($_GET['id_art'], $_GET['name_art'],$Db, $panier)){
        
        $article = $Db->query(
            "SELECT id_art FROM article WHERE id_art =:id",
            array(':id' => $_GET['id_art'])
        );
        
        if (empty($article)){
            $json['message'] = "Cet article n'existe pas!!";
        }
        
        if (!empty($article[0])) {
            $panier->add($article[0]->id_art);
        }
        
        $json['error'] = false;
        $json['total'] = $panier->total();
        $json['count'] = $panier->count();
        
        if (!empty($article)){
            $json['message'] = "Le produit a bien été ajouté!! ";
            header("Location: paniers.php");
        }
    }else{
        $json['message'] = "Vous n'avez pas sélectionner d'article!!";
    }
    
    echo json_encode($json);
