<?php
    
    
    class DB
    {
        
        private $host = 'localhost';
        private $username = 'root';
        private $pwd = '';
        private $dbname = 'com-shop';
        
        public function __construct($host=null, $username=null, $pwd=null, $dbname=null){
            if ($host != null){
                $this->host = $host;
                $this->username = $username;
                $this->pwd = $pwd;
                $this->dbname = $dbname;
            }
    
            try {
                $this->db = new PDO('mysql:dbname='.$this->dbname.';host='.$this->host,$this->username,$this->pwd, array(
                        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING
                    )
                );
            }catch (PDOException $e){
                die('Erreur : '.$e->getMessage());
            }
        }
    
        /**
         * @param       $sql
         * @param array $data
         *
         * fonction qui permet de faciliter les requêtes select
         * @return array
         */
        public function SelectQuerry($sql, $data=array()): array
        {
            $req = $this->db->prepare($sql);
            $req->execute($data);
            return $req->fetchAll(PDO::FETCH_OBJ);
        }
    
        /**
         * @param $sql
         *
         * fonction qui permet de faciliter les requêtes autres que les select
         * @return bool
         */
        public function Querries($sql): bool
        {
            $req = $this->db->prepare($sql);
            return $req->execute();
        }
    }