<?php 
if(isset($_SESSION["Yonetici"])){

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
        $GelenIsim = GuvenlikFiltresi($_POST["isim"]);
    }else{
        $GelenIsim = "";
    }
    //--------------------------------------------
    if(isset($_POST["email"])){
        $GelenEmail = GuvenlikFiltresi($_POST["email"]);
    }else{
        $GelenEmail = "";
    }
    //--------------------------------------------
    if(isset($_POST["Tel"])){
        $GelenTel = SadeceSayilar($_POST["Tel"]);
    }else{
        $GelenTel = "";
    }
    //--------------------------------------------

    if(($GelenYK != "") and ($GelenSifre != "") and ($GelenIsim != "") and ($GelenEmail != "") and ($GelenTel != "")){

        $YoneticiEkle = $DataBaseConnection->prepare("INSERT INTO yoneticiler (YoneticiKimligi,Sifre,isimSoyisim,EmailAdresi,TelNum) values(?,?,?,?,?) LIMIT 1");
        $YoneticiEkle->bind_param("sssss", $GelenYK, $GelenSifre, $GelenIsim, $GelenEmail, $GelenTel);
        $YoneticiEkle->execute();
        $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;



        if($etkilenenKayitSayisi>0){
            header("Location:index.php?SKI=17"); //başarılı
            exit();
        }else{
            header("Location:index.php?SKI=56"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=56"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>