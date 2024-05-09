<?php
    session_start();
    $file=fopen("../notification/feedBack.txt","a+");
    $infosUser="\nFeedBack envoyez par:\n\tid:".$_SESSION["user"]["id"]."\tnom".$_SESSION["user"]["nom"];
    $feed=$infosUser."\n\tMessage:".$_POST["contenuFeedBack"].".";
    fwrite($file,$feed);
    fclose($file);
    header("Location: ../../accueil.php");
    exit;