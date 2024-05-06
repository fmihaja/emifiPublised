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
            }
                
        }    
    }
    $data["data"]=[
        "message"=>$message
    ];
    echo json_encode($data);