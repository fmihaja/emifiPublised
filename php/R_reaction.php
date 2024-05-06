<?php
    require "./class/Reaction.php";
    include_once "./fonction/typeMethode.php";
    include_once "./fonction/ecritureSurNotif.php";
    // session_start();
    // $idUser=$_SESSION["id"];
    $queryXML=strtoupper("HTTP_X_Requested_With");
    if(isset($_SERVER[$queryXML]) && strtoupper($_SERVER[$queryXML])==strtoupper("XMLHttpRequest")){
        session_start();
        $idUser=$_SESSION["user"]["id"];
        $reaction=new Reaction();
        // $idUser=28;
        switch($method){
            case "POST":
                $message="Erreur de connexion";
                //modifier idCH et idUser
                // $idCh=52;
                $idCh=$_POST["idCh"];
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
                //enleve le json
                $dataInput=json_decode(file_get_contents("php://input",true));
                //accede au tableau qui a idCh dans le fichier json
                $idCh=$dataInput->idCh;
                if ($reaction->delReactAdorer($idUser,$idCh)!=1)
                    $message="dislike non executé";
                else{
                    $message="dislike executé";
                    ecritureNotifReact("dislike",$idUser,$idCh);          
                }  
                $data["data"]=[
                    "message"=>$message
                ];
                
                echo json_encode($data);
            break;
            default:
                $data=[
                    "erreur"=>"erreur"
                ];
                echo json_encode($data);
            break;
        }
    }