<?php
    function ecritureNotifReact($typeNotif,$idUser,$idCh){
        $date=date("d-m-Y H:i:s");
        $nom=$_SESSION["user"]["nom"];
        switch($typeNotif){
            case "like":
                $action=" aime chanson numero";
            break;
            case "dislike":
                $action=" n'aime plus la chanson numero ";
            break;
        }
        $file=fopen("../notification/notif.txt","a+");
        $notif="Ajout Reaction:\n\t".$date."\n\tInfos:id:".$idUser." Nom:".$nom." ".$action.$idCh.".";
        fwrite($file,$notif);
        fclose($file);
    }
    function ecritureNotifUserCh($typeNotif,$infos,$idUser=0,$idCh=0){
        $date=date("d-m-Y H:i:s");
        $target=($idUser==0)? "chanson":"compte";
        switch($typeNotif){
            case "insert":
                $action="Nouvelle ".$target.":\n\t";
            break;
            case "delete":
                $action="Suppresion de ".$target.":\n\t";
            break;
        }
        $file=fopen("../notification/notif.txt","a+");
        $notif=$action.$date."\n\t"."Infos:".$infos.".";
        fwrite($file,$notif);
        fclose($file);

    }