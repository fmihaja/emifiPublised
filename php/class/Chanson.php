<?php
    require_once "./gererBD/BD.php";
    class Chanson{
        private $idCh;
        private $titre;
        private $bd;
        public function __construct($idCh="",$titre=""){
            $this->idCh=$idCh;
            $this->titre=$titre;
            $this->bd=new BD("emifi");
        }
        //setter
        public function setIdCh($idCh){
            $this->idCh=$idCh;
        }
        public function setTitre($titre){
            $this->titre=$titre;
        }
        //getter
        public function getIdCh(){
            return $this->idCh;
        }
        public function getTitre(){
            return $this->titre;
        }
        //method
        //execution
        public function insertChanson($titre){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("INSERT INTO chansons(titre) VALUES (:titre)");
            $query->bindValue(":titre",$titre,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function deleteChanson($id){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("DELETE FROM chansons WHERE id_ch=:id");
            $query->bindValue(":id",$id,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function updateChanson($id,$titre){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("UPDATE chansons SET titre=:titre WHERE id_ch=:id");
            $query->bindValue(":id",$id,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function selectAll(){
            $bd=$this->bd;
            $query=$bd->connect()->query("SELECT * FROM chansons");
            return $bd->queryRequeteAll($query);
        }
        public function selectOne($idCh){
            $bd=$this->bd;
            $query=$bd->connect()->query("SELECT id_ch FROM chansons WHERE id_ch=$idCh");
            return $bd->queryRequeteOne($query);
        }
        public function verifDoublons($titre){
            $chanson=new Chanson();
            $titreExistant=array_column($chanson->selectAll(),"titre");
            if (in_array($titre,$titreExistant))
                return true;
            else
                return false;
        }
    }