<?php
    //DELL SISA
    require "./class/Chanson.php";
    include_once "./fonction/typeMethode.php";
    include_once "./fonction/ecritureSurNotif.php";
    $chanson=new Chanson();
    switch ($method) {
        case "POST":
            $message="fichier non recu";
            if(isset($_FILES["music"]) && $_FILES["music"]["error"]===0){
                if (pathinfo($_FILES["music"]["name"],PATHINFO_EXTENSION)!="mp3")
                    $message="Extension non supporter";
                else if($_FILES["music"]["size"]>1024*10000)
                    $message="Fichier très volumineux";
                else{
                    $newsfilename=dirname(__DIR__)."\audio\ ".pathinfo($_FILES["music"]["name"],PATHINFO_FILENAME).".".pathinfo($_FILES["music"]["name"],PATHINFO_EXTENSION);
                    $titre=strip_tags(pathinfo($_FILES["music"]["name"],PATHINFO_FILENAME));
                    if(!move_uploaded_file($_FILES["music"]["tmp_name"],$newsfilename))
                        $message="Upload echouer";
                    else{
                        // echo json_encode($chanson->verifDoublons($titre));
                        if($chanson->verifDoublons($titre))
                            $message="Titre existant";
                        else{
                            if ($chanson->insertChanson($titre)!=1)
                                $message="Insertion echouer";
                            else
                                $message="Insertion réussi";
                                $request=$chanson->selectLastId();
                                $infos="Id:".$request["id_ch"].",Titre:".$request["titre"];
                                $idCh=$request["id_ch"];
                                ecritureNotifUserCh("insert",$infos,0,$idCh);
                        }
                    }
                }
            }
            $data["data"]=[
                "message"=>$message
            ];
            echo json_encode($data);
        break;
        case "GET":
            $request=$chanson->selectAll();
            $data["data"]=[
                $request
            ];
            echo json_encode($data);
        break;  
        case "PUT":
            $recupChanson=file_get_contents("php://input");
            $chansonObtenu=json_decode($recupChanson);
            $nvTitre=strip_tags($chansonObtenu["titre"]);
            $idCh=strip_tags($chansonObtenu["id_ch"]);
            $titre=$chanson->selectOne($idCh);
            $nameFile=dirname(__DIR__)."\audio\ ".$titre["titre"].".mp3";
            $newFile=dirname(__DIR__)."\audio\ ".$nvTitre.".mp3";
            if (file_exists($nameFile)){
                if(rename($nameFile,$newFile)){
                    if (!$chanson->verifDoublons($nvTitre)){
                        if($chanson->updateChanson($idCh,$titre)==1)
                            $message="Mise à jour effectuer";
                    }
                    else{
                        $message="Titre existant mise à jour non effectuer";
                    }
                }
                else{
                    $message="Fichier introuvable";
                }
            }

        break;      
    }