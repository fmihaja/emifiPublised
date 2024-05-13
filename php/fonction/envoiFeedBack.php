<?php
    session_start();
    $date=date("d-m-Y H:i:s");
    $file=fopen("../../notification/feedBack.txt","a+");
    $infosUser="\nFeedBack envoyez:\n\t".$date."\n\tid:".$_SESSION["user"]["id"]."\tnom:".$_SESSION["user"]["nom"];
    $feed=$infosUser."\n\tMessage:".str_replace("."," ",$_POST["contenuFeedBack"]).".";
    fwrite($file,$feed);
    fclose($file);
    header("Location: ../../accueil.php");
    exit();