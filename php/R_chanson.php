<?php
    //DELL SISA
    require "./class/Chanson.php";
    require "./class/Reaction.php";
    include_once "./fonction/typeMethode.php";
    include_once "./fonction/ecritureSurNotif.php";
    $chanson=new Chanson();
    switch ($method) {
        case "POST":
            $message="fichier non recu";
            if(isset($_FILES["music"]) /*&& $_FILES["music"]["error"]===0*/){
                if (pathinfo($_FILES["music"]["name"],PATHINFO_EXTENSION)!="mp3")
                    $message="Extension non supporter";
                else if($_FILES["music"]["size"]>1024*10000)
                    $message="Fichier très volumineux";
                else{
                    $newsfilename=dirname(__DIR__)."/audio/".pathinfo($_FILES["music"]["name"],PATHINFO_FILENAME).".".pathinfo($_FILES["music"]["name"],PATHINFO_EXTENSION);
                    $titre=trim(strip_tags(pathinfo($_FILES["music"]["name"],PATHINFO_FILENAME)));
                    if(!move_uploaded_file($_FILES["music"]["tmp_name"],$newsfilename))
                        $message="Envoie de fichier echouer";
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
            session_start();
            $idUser=$_SESSION["user"]["id"];
            // $idUser=26;
            $reaction=new Reaction();
            $request=$chanson->selectAll();
            $requestReact=$reaction->selectAllChansons($idUser);
            $allIdChrequestReact=array_column($requestReact,"id_ch");
            $data=[
                "sansReaction"=>$request,
                "avecReaction"=>$allIdChrequestReact
            ];
            echo json_encode($data);
        break;  
        case "PUT":
            $recupChanson=file_get_contents("php://input");
            $chansonObtenu=json_decode($recupChanson);
            $nvTitre=strip_tags($chansonObtenu["titre"]);
            $idCh=strip_tags($chansonObtenu["id_ch"]);
            $titre=$chanson->selectOne($idCh);
            $nameFile=dirname(__DIR__)."/audio/".$titre["titre"].".mp3";
            $newFile=dirname(__DIR__)."/audio/".$nvTitre.".mp3";
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
        case "DELETE":
            $reaction=new Reaction();
            $recupChanson=json_decode(file_get_contents("php://input",true));
            $idCh=strip_tags($recupChanson->idCh);
            $titre=strip_tags($recupChanson->titre);
            $cheminFichier=dirname(__DIR__)."/audio/".$titre.".mp3";
            $reaction->delReactChanson($idCh);
            if ($chanson->deleteChanson($idCh)!=1){
                $message="Erreur de connexion";
            }
            else{
                if (file_exists($cheminFichier)){
                    if (unlink($cheminFichier))
                        $message="suppression effectué";
                    else
                        $message="Erreur Lors du suppression";
                }
                else
                    $message="Fichier introuvable";
            }
            $data["data"]=[
                "message"=>$message
            ];
            echo json_encode($data);
        break;      
    }