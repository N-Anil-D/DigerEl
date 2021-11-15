<?php
if(isset($_SESSION["Yonetici"])){
    
    if(isset($_POST["MenuKayitID"])){
        $GelenMenuKayitID = SadeceSayilar($_POST["MenuKayitID"]);
    }else{
        $GelenMenuKayitID = "";
    }
    //--------------------------------------------
    if(isset($_POST["TA"])){
        $GelenTA = GuvenlikFiltresi($_POST["TA"]);
    }else{
        $GelenTA = "";
    }
    //--------------------------------------------
    if(isset($_POST["UrunTuru"])){
        $GelenUrunTuru = GuvenlikFiltresi($_POST["UrunTuru"]);
    }else{
        $GelenUrunTuru = "";
    }
    if(isset($_POST["MenuAdi"])){
        $GelenMenuAdi = GuvenlikFiltresi($_POST["MenuAdi"]);
    }else{
        $GelenMenuAdi = "";
    }
    //--------------------------------------------
    if(isset($_POST["UstID"])){
        $GelenUstID = GuvenlikFiltresi($_POST["UstID"]);
    }else{
        $GelenUstID = "";
    }
    //--------------------------------------------
    if(isset($_POST["UrunSay"])){
        $GelenUrunSay = GuvenlikFiltresi($_POST["UrunSay"]);
    }else{
        $GelenUrunSay = "";
    }

//--------------------------------------------


if(($GelenTA != "") and ($GelenUrunTuru != "") and ($GelenMenuAdi != "") and ($GelenUstID != "") and ($GelenUrunSay != "") and ($GelenMenuKayitID != "")){
    
    
    $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE menuler SET TabloAdi = ?, UrunTuru = ?, MenuAdi = ?, ustID = ?, UrunSayisi = ? WHERE id=$GelenMenuKayitID");
    $KayitGuncellemeQuery->bind_param("sssii", $GelenTA, $GelenUrunTuru, $GelenMenuAdi, $GelenUstID, $GelenUrunSay);
    $KayitGuncellemeQuery->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    

        if($etkilenenKayitSayisi>0){
            header("Location:index.php?SKI=17"); //Çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=50");
            exit();
        }
    }else{
        header("Location:index.php?SKI=50");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>