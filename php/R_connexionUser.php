<?php
    require "./class/User.php";
    $message="Veuillez remplir votre formulaire";
    if ((isset($_POST["email"],$_POST["mdp"])) && !empty($_POST["email"]) && !empty($_POST["mdp"])){
        $user=new User();
        $email=strip_tags($_POST["email"]);
        $mdp=strip_tags($_POST["mdp"]);
        $request=$user->selectEmailMdp($email);
        $message="Mot de passe ou email incorrecte";
        if ($request!=false){
            // echo json_encode($data["id_users"]);
            if (password_verify($mdp,$request["mdp"])){
                $message="Connexion effectué";
                session_start();
                $request=$user->selectOne($request["id_users"]);
                $_SESSION["user"]=[
                    "id"=>$request["id_users"],
                    "nom"=>$request["nom"],
                    "email"=>$request["email"],
                    "numeroTel"=>$request["numero_tel"]
                ];
            }
        }    
    }
    $data["data"]=[
        "message"=>$message
    ];
    echo json_encode($data);