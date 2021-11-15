<?php
if(isset($_SESSION["Yonetici"])){

    if(isset($_POST["YoneticiKayitID"])){
        $GelenYoneticiKayitID = SadeceSayilar($_POST["YoneticiKayitID"]);
    }else{
        $GelenYoneticiKayitID = "";
    }
    //--------------------------------------------
    if(isset($_POST["YK"])){
        $GelenYK = GuvenlikFiltresi($_POST["YK"]);
    }else{
        $GelenYK = "";
    }
    //--------------------------------------------
    if(isset($_POST["Sifre"])){
        $GelenSifre = GuvenlikFiltresi($_POST["Sifre"]);
    }else{
        $GelenSifre = "";
    }
    //--------------------------------------------
    if(isset($_POST["isim"])){
        $Gelenisim = GuvenlikFiltresi($_POST["isim"]);
    }else{
        $Gelenisim = "";
    }
    //--------------------------------------------
    if(isset($_POST["email"])){
        $Gelenemail = GuvenlikFiltresi($_POST["email"]);
    }else{
        $Gelenemail = "";
    }
    //--------------------------------------------
    if(isset($_POST["Tel"])){
        $GelenTel = GuvenlikFiltresi($_POST["Tel"]);
    }else{
        $GelenTel = "";
    }//--------------------------------------------


    if(($GelenYK != "") and ($GelenSifre != "") and ($Gelenisim != "") and ($Gelenemail != "") and ($GelenTel != "")){
    
    
        $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE yoneticiler SET YoneticiKimligi = ?, Sifre = ?, isimSoyisim = ?, EmailAdresi = ?, TelNum = ? WHERE id=$GelenYoneticiKayitID");
        $KayitGuncellemeQuery->bind_param("sssss", $GelenYK, $GelenSifre, $Gelenisim, $Gelenemail, $GelenTel);
        $KayitGuncellemeQuery->execute();
        $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    

        if($etkilenenKayitSayisi>0){
            header("Location:index.php?SKI=17"); //Çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=59");
            exit();
        }
    }else{
        header("Location:index.php?SKI=59");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>