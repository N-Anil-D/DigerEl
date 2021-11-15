<?php
 if(isset($_SESSION["Yonetici"])){


    if(isset($_GET["Mid"])){
        $MenuID = SadeceSayilar($_GET["Mid"]);
    }else{
        $MenuID = "";
    }

    if($MenuID != ""){
    
        $KayitSil = $DataBaseConnection->prepare("DELETE FROM menuler WHERE id = ? LIMIT 1");
        $KayitSil->bind_param("i", $MenuID);
        $KayitSil->execute();
        $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

        if($SilinenKayitSayisi){
            header("Location:index.php?SKI=3"); //çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=52"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=52"); // hata
        exit();
    }        
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>