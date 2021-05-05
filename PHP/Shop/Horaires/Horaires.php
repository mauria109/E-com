<?php
    require '../../Settings/_header.php';
    
    if (isset($DB) && !empty($_POST)){
        $errors = array();
        
        $insert = $DB->Querries("INSERT INTO ouverture (jour, debut, fin, id_shop)
VALUES
       ('$_POST[lundi_d]', '$_POST[lundi_f]', 'Lundi', '$_GET[shop]'),
       ('$_POST[mardi_d]', '$_POST[mardi_f]', 'Mardi', '$_GET[shop]'),
       ('$_POST[mercredi_d]', '$_POST[mercredi_f]', 'Mercredi', '$_GET[shop]'),
       ('$_POST[jeudi_d]', '$_POST[jeudi_f]', 'Jeudi', '$_GET[shop]'),
       ('$_POST[vendredi_d]', '$_POST[vendredi_f]', 'Vendredi', '$_GET[shop]'),
       ('$_POST[samedi_d]', '$_POST[samedi_f]', 'Samedi', '$_GET[shop]'),
       ('$_POST[dimanche_d]', '$_POST[dimanche_f]', 'Dimanche', '$_GET[shop]')");
       
        if ($insert){
            echo "<h1>Enregistrement des horaires réussi</h1>";
        }else{
            echo "<h1>Echec de l'enregistrement des horaires !!</h1>";
        }
    }
    ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../../../CSS/menu.css">
        <link rel = "stylesheet" href = "../../../CSS/index.css">
        <link rel = "stylesheet" href = "../../../CSS/shop.css">
        <link rel = "stylesheet" href = "../../../CSS/Form.css">
        <title>Paramètres de ma boutique</title>
    </head>
    <body>
        
        <!--Page de paramètres de la boutique-->
        
        <header></header>
        
        
        <section>
            <article>
                <h1>Horaires d'ouverture de mon shop</h1>
                <form action = "" method = "post">
                    
                    <div id="lundi-box">
                        <p>
                            <input type = "checkbox" name = "lundi" id = "lundi" value="Lundi">
                            <label for = "lundi">Lundi</label>
                        </p>
                        
                        <p>
                            <label for = "lundi-d">De</label>
                            <input type = "time" name = "lundi_d" id = "lundi-d">
                            
                            <label for = "lundi-f">à</label>
                            <input type = "time" name = "lundi_f" id = "lundi-f">
                        </p>
                    </div>
                    
                    <br>
                    
                    <div id="mardi-box">
                        <p>
                            <input type = "checkbox" name = "mardi" id = "mardi" value="Mardi">
                            <label for = "mardi">Mardi</label>
                        </p>
                        
                        <p>
                            <label for = "mardi-d">De</label>
                            <input type = "time" name = "mardi_d" id = "mardi-d">
                            
                            <label for = "mardi-f">à</label>
                            <input type = "time" name = "mardi_f" id = "mardi-f">
                        </p>
                    </div>
                    
                    <br>
                    
                    <div id="mercredi-box">
                        <p>
                            <input type = "checkbox" name = "mercredi" id = "mercredi" value="Mercredi">
                            <label for = "mercredi">Mercredi</label>
                        </p>
                        
                        <p>
                            <label for = "mercredi-d">De</label>
                            <input type = "time" name = "mercredi_d" id = "mercredi-d">
                            
                            <label for = "mercredi-f">à</label>
                            <input type = "time" name = "mercredi_f" id = "mercredi-f">
                        </p>
                    </div>
                    
                    <br>
                    
                    <div id="jeudi-box">
                        <p>
                            <input type = "checkbox" name = "jeudi" id = "jeudi" value="Jeudi">
                            <label for = "jeudi">Jeudi</label>
                        </p>
                        
                        <p>
                            <label for = "jeudi-d">De</label>
                            <input type = "time" name = "jeudi_d" id = "jeudi-d">
                            
                            <label for = "jeudi-f">à</label>
                            <input type = "time" name = "jeudi_f" id = "jeudi-f">
                        </p>
                    </div>
                    
                    <br>
                    
                    <div id="vendredi-box">
                        <p>
                            <input type = "checkbox" name = "vendredi" id = "vendredi" value="Vendredi">
                            <label for = "vendredi">Vendredi</label>
                        </p>
                        
                        <p>
                            <label for = "vendredi-d">De</label>
                            <input type = "time" name = "vendredi_d" id = "vendredi-d">
                            
                            <label for = "vendredi-f">à</label>
                            <input type = "time" name = "vendredi_f" id = "vendredi-f">
                        </p>
                    </div>
                    
                    <br>
                    
                    <div id="samedi-box">
                        <p>
                            <input type = "checkbox" name = "samedi" id = "samedi" value="Samedi">
                            <label for = "samedi">Samedi</label>
                        </p>
                        
                        <p>
                            <label for = "samedi-d">De</label>
                            <input type = "time" name = "samedi_d" id = "samedi-d">
                            
                            <label for = "samedi-f">à</label>
                            <input type = "time" name = "samedi_f" id = "samedi-f">
                        </p>
                    </div>
                    
                    <br>
                    
                    <div id="dimanche-box">
                        <p>
                            <input type = "checkbox" name = "dimanche" id = "dimanche" value="Dimanche">
                            <label for = "dimanche">Dimanche</label>
                        </p>
                        
                        <p>
                            <label for = "dimanche-d">De</label>
                            <input type = "time" name = "dimanche_d" id = "dimanche-d">
                            
                            <label for = "dimanche-f">à</label>
                            <input type = "time" name = "dimanche_f" id = "dimanche-f">
                        </p>
                    </div>
               
                </form>
            </article>
        </section>
    </body>
</html>

