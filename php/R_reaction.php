<?php
    require "./class/Reaction.php";
    include_once "./fonction/typeMethode.php";
    include_once "./fonction/ecritureSurNotif.php";
    // session_start();
    // $idUser=$_SESSION["id"];
    $reaction=new Reaction();
    $idUser=28;
    switch($method){
        case "POST":
            $message="Erreur de connexion";
            //modifier idCH et idUser
            $idCh=52;
            if ($reaction->reactAdorer($idUser,$idCh)!=1)
                $message="reaction non executé";
            else{
                $message="reaction executé";   
                ecritureNotifReact("like",$idUser,$idCh);          
            }
            $data["data"]=[
                "message"=>$message
            ];
            echo json_encode($data);
        break;
        case "GET":
            $request=$reaction->selectAllChansons($idUser);
            $data["data"]=[
                $request
            ];
            echo json_encode($data);
        break;
        case "DELETE":
            ecritureNotifReact("dislike",$idUser,$idCh);          
        break;
    }