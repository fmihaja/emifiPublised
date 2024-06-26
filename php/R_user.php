<?php
    require "./class/User.php";
    require "./class/Reaction.php";
    include_once "./fonction/typeMethode.php";
    include_once "./fonction/ecritureSurNotif.php";
    $queryXML=strtoupper("HTTP_X_Requested_With");
    // echo json_encode($method);
    // if(isset($_SERVER[$queryXML]) && strtoupper($_SERVER[$queryXML])==strtoupper("XMLHttpRequest")){
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
                        "email"=>$email,
                        "numeroTel"=>$numeroTel
                    ];
                }
                $data["data"]=[
                    "message"=>$message
                ];
                echo json_encode($data);
                break;
            case "GET":
                $data=$user->selectAll();
                echo json_encode($data);
                break;
            case "PUT":
                session_start();
                $dataInput=json_decode(file_get_contents("php://input",true));
                //accede au tableau qui a idUser dans le fichier json
                $idUser=$_SESSION["user"]["id"];
                $nom=strip_tags($dataInput->nom);
                $numeroTel=strip_tags($dataInput->numeroTel);
                $mdp=strip_tags($dataInput->mdp);
                $infos=$user->selectOne($idUser);
                $mdpUser=$infos["mdp"];
                $nvMdp=(trim($dataInput->nvMdp)!="")? password_hash(strip_tags($dataInput->nvMdp),PASSWORD_ARGON2ID):$mdpUser;
                if (!password_verify($mdp,$mdpUser))
                    $message="Verifier votre mot de passe";
                else if ($dataInput->nvMdp!="" && strlen($dataInput->nvMdp)<5 || strlen($dataInput->nvMdp)>15)
                    $message="Mot de passe doit être entre 5 et 15 caractère";
                else if ($user->updateUser($idUser,$nom,$nvMdp,$numeroTel)!=1){
                    $message="mise à jour non executé,le numeroTel est deja pris";
                }
                else{
                    $message="mise à jour executé";
                    $_SESSION["user"]=[
                        "id"=>$idUser,
                        "nom"=>$nom,
                        "numeroTel"=>$numeroTel
                    ];
                }
                $data["data"]=[
                    "message"=>$message
                ];
                echo json_encode($data);
            break;                
            case "DELETE":
                $reaction=new Reaction();
                // //enleve le json
                // $dataInput=json_decode(file_get_contents("php://input",true));
                // // //accede au tableau qui a idUser dans le fichier json
                // $idUser=$dataInput->idUser;
                session_start();
                $idUser=$_SESSION["user"]["id"];
                // $message=$user->deleteUser($idUser);
                if ($reaction->delReactClient($idUser)!=1 || $user->deleteUser($idUser)!=1)
                    $message="suppression non executé";
                else{
                    $message="suppression effectué";
                    $infos="id:".$_SESSION["user"]["id"]." nom:".$_SESSION["user"]["nom"];
                    ecritureNotifUserCh("delete",$infos,$idUser);   
                    session_destroy();
                    // header('Location: ../index.php');       
                }  
                // $message=$idUser;
                $data["data"]=[
                    "message"=>$message
                ];
                echo json_encode($data);
        }  
    // }
        