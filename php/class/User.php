<?php
//DELETE UPDATE
    require_once "./gererBD/BD.php";
    class User{
        private $idUser;
        private $email;
        private $mdp;
        private $nom;
        private $numeroTel;
        private $bd;
        public function __construct($idUser=0,$email="",$mdp="",$nom="",$numeroTel=""){
            $this->idUser=$idUser;
            $this->email=$email;
            $this->mdp=$mdp;
            $this->nom=$nom;
            $this->numeroTel=$numeroTel;
            $this->bd=new BD("emifi");
        }
        //setter
        public function setIdUser($idUser){
            $this->idUser=$idUser;
        }
        public function setEmail($email){
            $this->email=$email;
        }
        public function setNumeroTel($numeroTel){
            $this->numeroTel=$numeroTel;
        }
        public function setMdp($mdp){
            $this->mdp=$mdp;
        }
        //getter
        public function getNom(){
            return $this->nom;
        }
        public function getNumeroTel(){
            return $this->numeroTel;
        }
        public function getIdUser(){
            return $this->idUser;
        }
        public function getEmail(){
            return $this->email;
        }
        public function getMdp(){
            return $this->mdp;
        }
        public function setNom($nom){
            $this->nom=$nom;
        }
        public function insert($nom,$email,$mdp,$numeroTel){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("INSERT INTO user(nom,email,mdp,numero_tel) VALUES(:nom,:email,:mdp,:numeroTel)");
            $query->bindValue(":nom",$nom,PDO::PARAM_STR);
            $query->bindValue(":email",$email,PDO::PARAM_STR);
            $query->bindValue(":mdp",$mdp,PDO::PARAM_STR);
            $query->bindValue(":numeroTel",$numeroTel,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function updateUser($idUser,$nom,$mdp,$numeroTel){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("UPDATE user SET nom=:nom,mdp=:mdp,numero_tel=:numeroTel WHERE id_users=:idUser");
            $query->bindValue(":nom",$nom,PDO::PARAM_STR);
            $query->bindValue(":mdp",$mdp,PDO::PARAM_STR);
            $query->bindValue(":numeroTel",$numeroTel,PDO::PARAM_STR);
            $query->bindValue(":idUser",$idUser,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function deleteUser($idUser){
            $bd=$this->bd;
            $query=$bd->connect()->prepare("DELETE FROM user WHERE id_users=:idUser");
            $query->bindValue(":idUser",$idUser,PDO::PARAM_STR);
            return $bd->executeRequete($query);
        }
        public function selectAll(){
            $bd=$this->bd;
            $query=$bd->connect()->query("SELECT * FROM user");
            return $bd->queryRequeteAll($query);
        }
        public function selectOne($id){
            $bd=$this->bd;
            $query=$bd->connect()->query("SELECT * FROM user WHERE id_users=$id");
            return $bd->queryRequeteOne($query);
        }
        public function selectEmailMdp($email){
            $bd=$this->bd;
            $query=$bd->connect()->query("SELECT email,mdp,id_users FROM user WHERE email='$email' OR numero_tel='$email'");
            return $bd->queryRequeteOne($query);
        }
        public function selectLastIdUser(){
            $bd=$this->bd;
            $query=$bd->connect()->query("SELECT * FROM user ORDER BY id_users DESC LIMIT 1");
            return $bd->queryRequeteOne($query);
        }
    }