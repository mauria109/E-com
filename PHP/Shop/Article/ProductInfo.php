<?php
    require '../../Settings/_header.php';
    
    if (isset($DB, $_GET['art'])){
        $prd = $DB->SelectQuerry("SELECT * FROM article WHERE id_art = '$_GET[art]'");
        
        $image = $DB->SelectQuerry("SELECT * FROM image WHERE id_art = '$_GET[art]' ");
    }
