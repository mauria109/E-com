<?php
    
    
    class Basket
    {
        /**
         * @var
         *     base de données reliée au panier
         */
        private $Db;
        
        public function __construct($Db){
            if (!isset($_SESSION)){
                session_start();
            }
    
            if (!isset($_SESSION['panier'])){
                $_SESSION['panier'] = array();
            }
            $this->Db = $Db;
    
            if (isset($_GET['delpanier'])){
                $this->del($_GET['delpanier']);
            }
    
            if (isset($_POST['panier']['quantite'])){
                foreach ($_SESSION['panier'] as $article_id => $quantite){
                    if (isset($_SESSION['panier'][$article_id])){
                        $_SESSION['panier']['$article_id'] = $_POST['panier']['quantite'][$article_id];
                    }
                }
                $this->calcul();
            }
        }
    
        public function calcul(){
            $_SESSION['panier'] = $_POST['panier']['quantite'];
        }
    
        public function count(){
            return array_sum($_SESSION['panier']);
        }
    
        public function total(){
            $total = 0;
            $id = array_keys($_SESSION['panier']);
        
            if (isset($id)){
                $article = array();
            }else{
                $article = $this->Db->QuerryShow(
                    "SELECT id_art FROM article WHERE prix IN ('.implode(',',$id).')"
                );
            }
        
            foreach ($article as $art){
                $total += $art->prix * $_SESSION['panier'][$art->id_art];
            }
            return $total;
        }
    
        public function add($article_id){
            if (isset($_SESSION['panier'][$article_id])){
                $_SESSION['panier'][$article_id]++;
            }else{
                $_SESSION['panier'][$article_id] = 1;
            }
        }
    
        public function del($article_id){
            unset($_SESSION['panier'][$article_id]);
        }
    
    
        public function setDb($Db): void
        {
            $this->Db = $Db;
        }
    }