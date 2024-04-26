<?php
    require "./class/User.php";
    include_once "./fonction/typeMethode.php";
    include_once "./fonction/ecritureSurNotif.php";
    $user=new User;
    switch ($method){
        case "POST":
            $email= strip_tags($_POST["iEmail"]);
            $nom= strip_tags($_POST["nom"]);
            $mdp= password_hash(strip_tags($_POST["iMdp"]),PASSWORD_ARGON2ID);
            if ($user->insert($nom,$email,$mdp)!=1)
                $message="Inscription non effectué";
            else{
                $message="Inscription effectué";
                $request=$user->selectLastIdUser();
                $idUser=$request["id_users"];
                $infos="Id:".$request["id_users"].",Nom:".$request["nom"];
                ecritureNotifUserCh("insert",$infos,$idUser,0);
            }
            $data["data"]=[
                "message"=>$message
            ];
            echo json_encode($data);
        break;
    }