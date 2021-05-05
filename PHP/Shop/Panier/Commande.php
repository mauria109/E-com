<?php
    require '../../Settings/_header.php';
    
    if (isset($DB, $_GET)){
        $com = $DB->Querries("INSERT INTO commande (id_panier, id_cli, date_com)
VALUES ('$_GET[id_pan]', '$_GET[id_cli]', (NOW())) ");
    }
