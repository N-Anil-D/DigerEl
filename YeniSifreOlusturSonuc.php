<?php 
//--------------------------------------------
if(isset($_POST["AktivasyonKodu"])){
    $UyeGelenAktivasyonKodu = GuvenlikFiltresi($_POST["AktivasyonKodu"]);
}else{
    $UyeGelenAktivasyonKodu = "";
}
//--------------------------------------------
if(isset($_POST["UyeMail"])){
    $UyeGelenEmail = GuvenlikFiltresi($_POST["UyeMail"]);
}else{
    $UyeGelenEmail = "";
}
//--------------------------------------------
if(isset($_POST["sifre"])){
    $UyeGelensifre = GuvenlikFiltresi($_POST["sifre"]);
}else{
    $UyeGelensifre = "";
}
//--------------------------------------------

if(isset($_POST["sifre2"])){
    $UyeGelensifre2 = GuvenlikFiltresi($_POST["sifre2"]);
}else{
    $UyeGelensifre2 = "";
}
//--------------------------------------------
 
if(($UyeGelensifre2 != "") and ($UyeGelensifre != "") and ($UyeGelenEmail != "") and ($UyeGelenAktivasyonKodu != "")){
    if($UyeGelensifre == $UyeGelensifre2){
        $MD5liSifre             = md5($UyeGelensifre);
        $GuncellemeSorgusu      = $DataBaseConnection->query("UPDATE uyeler SET Sifre = '$MD5liSifre' WHERE Email = '$UyeGelenEmail' AND AktivasyonKodu = '$UyeGelenAktivasyonKodu' LIMIT 1");
        $GuncellemeBasarisi     = $DataBaseConnection->affected_rows;

        if($GuncellemeBasarisi>0){
            $UyebilgileriniCekmeSorgusu = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenEmail'");
            $KayitliKullanici           = $UyebilgileriniCekmeSorgusu->fetch_assoc();
            if($KayitliKullanici["Durumu"]=="Aktif"){
                $_SESSION["Kullanici"]  =   GeriDöndür($KayitliKullanici["KullaniciAdi"]);
            }
            header("Location:YeniSifreOlusturFBasarili");
            exit();
        }else{
            header("Location:YeniSifreOlusturFBasarisiz");
            exit();
        }

    }else{
        header("Location:YeniSifreOlusturFUyusmazlik");
        exit();
    }
  }else{
    header("Location:YeniSifreOlusturFEksikVeri");
    exit();
    }
?>