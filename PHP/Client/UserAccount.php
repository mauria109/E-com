<?php
    require '../Settings/_header.php';
    ?>
<!DOCTYPE html>
<html lang = "fr">
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale=1.0">
        <link rel = "stylesheet" href = "../../CSS/menu.css">
        <link rel = "stylesheet" href = "../../CSS/index.css">
        <link rel = "stylesheet" href = "../../CSS/Form.css">
        <link rel = "stylesheet" href = "../../CSS/profil.css">
        <title>Compte utilisateur</title>
    </head>
    <body>
        
        <header>
            <div id="logo">
                <img src="../../icone/4544850-business-comerce-delivery-online-shop-shop_121450.png" alt="logo site" class="logo">
            </div>
            
            <div id="search-bar">
                <form action="#" method="post">
                    <label for="search"></label>
                    <input type="search" name="chercher" id="search">
                </form>
            </div>
        </header>
        
        <section>
            <aside>
                <nav>
                    <ul>
                        <li class="index-nav"><a href = "#">
                                <img src = "../../icone/homeinterfacebuttonsymbolforweb_87800.png" alt = "new" class="user-account">
                                Accueil
                            </a></li>
                        <li class="index-nav"><a href = "#">
                                <img src = "../../icone/account_edit_outline_icon_140057.png" alt = "new" class="user-account">
                                Modifier
                            </a></li>
                        <li class="index-nav"><a href = "#">
                                <img src = "../../icone/trash_delete_recycle_bin_icon_176991.png" alt = "new" class="prd-new">
                                Supprimer
                            </a></li>
                        <li class="index-nav"><a href = "#">
                                <img src = "../../icone/353434-off-on-power-switch_107506.png" alt = "infos" class="site-info">
                                Me déconnecter
                            </a></li>
                        <li class="index-nav"><a href = "#">
                                <img src = "../../icone/tool_120757.png" alt = "infos" class="site-info">
                                Mes paramètres
                            </a></li>
                    </ul>
                </nav>
            </aside>
            <?php
                if (isset($DB, $_GET['client'])){
                    $client = $_GET['client'];
                    $view = $DB->SelectQuerry("SELECT * FROM client WHERE id_cli = '$client' ");
                }
            ?>
            <article>
                <h1>Bonjour!!!</h1>
                <p class="pseudo">
                    Pseudo
                    <?php if (isset($view)){ echo $view->pseudo_cli;} ?>
                </p>
                
                <p class="email">
                    Email
                    <?php if (isset($view)){ echo $view->mail_cli; }?>
                </p>
                
                <p class="mdp">
                    Mot de passe
                    <?php if (isset($view)){ echo $view->mdp_cli; }?>
                </p>
            </article>
        </section>
        <hr>
        <footer>
            <div id="menu-content">
                <nav>
                    <ul>
                        
                        <li class="index-nav"><a href = "#">
                                <img src = "../../icone/shop-store-frontal-building_icon-icons.com_56118.png" alt = "new" class="prd-new-foot">
                                Catalogue
                            </a></li>
                        <li class="index-nav"><a href = "#">
                                <img src = "../../icone/1492532797-30-auction_83224.png" alt = "infos" class="site-info-foot">
                                Renseignements
                            </a></li>
                    </ul>
                </nav>
            </div>
            
            <div id="mentions">
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit.
                    Earum sapiente dolor sed repellat ducimus delectus, corrupti,
                    iusto blanditiis deserunt eos voluptas. Distinctio, quam error.
                    Possimus perferendis enim voluptates labore minima.
                </p>
                <p>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit.
                    Perspiciatis sint ullam consequuntur officia suscipit recusandae,
                    atque veniam ipsa numquam dignissimos, optio natus, laboriosam repudiandae modi
                    magnam rerum quidem perferendis libero?
                </p>
                <p>
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Magnam adipisci fugit vitae,
                    nisi doloremque in iure laborum iste consequatur reprehenderit, omnis dolor unde,
                    facere maiores distinctio consectetur esse officiis sunt.
                
                </p>
            </div>
            
            <div id="shop-info">
                <!--localisation maps-->
                
                <p>
                    <a href = "#">
                        <img src = "../../icone/support_icon_177289.png" alt = "assistance" class="assist-icone">
                        Assistance
                    </a>
                </p>
            </div>
        </footer>
    </body>
</html>

