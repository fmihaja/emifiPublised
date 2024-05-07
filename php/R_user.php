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
                $message="ok";
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
                        "numeroTel"=>$numeroTel,
                        "mdp"=>$_POST["iMdp"]
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
                $dataInput=json_decode(file_get_contents("php://input",true));
                //accede au tableau qui a idUser dans le fichier json
                $idUser=$dataInput->idUser;
                $nom=$dataInput->nom;
                $email=$dataInput->email;
                $numeroTel=$dataInput->numeroTel;
                if (!$user->updateUser($idUser,$nom,$email,$mdp,$numeroTel)!=1){
                    $message="mise à jour non executé";
                }
                else{
                    $message="mise à jour executé";
                    session_start();
                    $_SESSION["user"]=[
                        "id"=>$idUser,
                        "nom"=>$nom,
                        "email"=>$email,
                        "numeroTel"=>$numeroTel
                    ];
                }
            break;                
            case "DELETE":
                $reaction=new Reaction();
                //enleve le json
                // $dataInput=json_decode(file_get_contents("php://input",true));
                // //accede au tableau qui a idUser dans le fichier json
                // $idUser=$dataInput->idUser;
                session_start();
                $idUser=$_SESSION["user"]["id"];
                if ($reaction->delReactClient($idUser)!=1 || $user->deleteUser($idUser)!=1)
                    $message="suppression non executé";
                else{
                    $message="suppression effectué";
                    $infos="Infos: id:".$_SESSION["user"]["id"]." email:".$_SESSION["user"]["nom"]." mdp:".$_SESSION["user"]["mdp"];
                    ecritureNotifUserCh("Suppression",$infos);   
                    session_destroy();
                    header('Location: ../index.php');       
                }  
                $data["data"]=[
                    "message"=>$message
                ];
                
                echo json_encode($data);

        }  
        
    // }
        