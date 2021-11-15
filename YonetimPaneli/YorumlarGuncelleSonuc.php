<?php

if(isset($_SESSION["Yonetici"])){
    
    if(isset($_POST["YorumKayitID"])){
        $GelenYorumKayitID = SadeceSayilar($_POST["YorumKayitID"]);
    }else{
        $GelenYorumKayitID = "";
    }
    //--------------------------------------------
    if(isset($_POST["Yorum"])){
        $GelenYorum = GuvenlikFiltresi($_POST["Yorum"]);
    }else{
        $GelenYorum = "";
    }
    //--------------------------------------------


    if(($GelenYorum != "") and ($GelenYorumKayitID != "")){
    

        $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE yorumlar SET Yorum = ? WHERE id=$GelenYorumKayitID");
        $KayitGuncellemeQuery->bind_param("s", $GelenYorum);
        $KayitGuncellemeQuery->execute();
        $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;


        if($etkilenenKayitSayisi>0){
            header("Location:index.php?SKI=17"); //Çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=71");
            exit();
        }
    }else{
        header("Location:index.php?SKI=71");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>