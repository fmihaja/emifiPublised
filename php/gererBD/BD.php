<?php
    class BD{
        private $dbname;
        private $host="localhost";
        private $username="root";
        private $password="";
        public function __construct($dbname){
            $this->dbname=$dbname;
        }
        public function connect(){
            $dsn="mysql:dbname=".$this->dbname.";host=".$this->host;
            try{
                $db=new PDO($dsn,$this->username,$this->password);
                $db->exec("SET NAMES utf8");
                $db->setAttribute(PDO:: ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_ASSOC);
                return $db;
            }catch (PDOException $e){
                die("Erreur:".$e->getMessage());
            }
        }
        public function executeRequete($query){
            if (!$query->execute()){
                // print_r($query->errorInfo());
                return 0;
            }
            else
                return 1;
        }
        public function queryRequeteOne($query){
            return $query->fetch();
        }
        public function queryRequeteAll($query){
            return $query->fetchAll();
        }

    }