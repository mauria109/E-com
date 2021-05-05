<?php
    
    require 'DB.php';
    require 'Basket.php';
    
    $DB = new DB();
    
    $panier = new Basket($DB);
