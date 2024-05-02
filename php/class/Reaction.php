<?php
    require_once "./gererBD/BD.php";
    Class Reaction{
        private $bd;
        public function __construct(){
            $this->bd=new BD("emifi");
        }
        public function reactAdorer($idUser,$idCh){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("INSERT INTO reaction VALUES (:idUser,:idCh)");
            $query->bindValue(":idUser",$idUser,PDO::PARAM_STR);
            $query->bindValue(":idCh",$idCh,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function delReactAdorer($idUser,$idCh){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("DELETE FROM reaction WHERE id_chanson=:idCh AND id_user=:idUser");
            $query->bindValue(":idUser",$idUser,PDO::PARAM_STR);
            $query->bindValue(":idCh",$idCh,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }public function delReactClient($idUser){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("DELETE FROM reaction WHERE id_user=:idUser");
            $query->bindValue(":idUser",$idUser,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function selectAllChansons($idUser){
            $bd=$this->bd;
            $query=$bd->connect()->query("SELECT * FROM chansons WHERE id_ch IN (SELECT id_chanson FROM reaction WHERE id_user=$idUser)");
            return $bd->queryRequeteAll($query);
        }
    }