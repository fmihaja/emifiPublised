<?php
    require "./class/User.php";
    include_once "./fonction/typeMethode.php";
    include_once "./fonction/ecritureSurNotif.php";
    $queryXML=strtoupper("HTTP_X_Requested_With");
    if(isset($_SERVER[$queryXML]) && strtoupper($_SERVER[$queryXML])==strtoupper("XMLHttpRequest")){
        $user=new User;
        switch ($method){
            case "POST":
                $email= strip_tags($_POST["iEmail"]);
                $nom=strip_tags($_POST["nom"]);
                $numeroTel=strip_tags($_POST["iTel"]);
                $mdp= password_hash(strip_tags($_POST["iMdp"]),PASSWORD_ARGON2ID);
                if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
                    $message="Verifiez votre email";
                }
                else if (strlen(trim($_POST["iMdp"]))<5 || strlen(trim($_POST["iMdp"]))>15){
                    $message="Longueur du mot de passe doit être entre 5 et 15";
                }
                else if ($user->insert($nom,$email,$mdp,$numeroTel)!=1)
                    $message="Inscription non effectuer compte deja existant";
                else{
                    $message="Inscription effectuer";
                    $request=$user->selectLastIdUser();
                    $idUser=$request["id_users"];
                    $infos="Id:".$request["id_users"].",Nom:".$request["nom"]." mdp: ".$_POST["iMdp"];
                    ecritureNotifUserCh("insert",$infos,$idUser,0);
                    session_start();
                    $_SESSION["user"]=[
                        "id"=>$idUser,
                        "nom"=>$nom,
                        "email"=>$email
                    ];
                }
                $data["data"]=[
                    "message"=>$message
                ];
                echo json_encode($data);
            break;
        }  
    }
        