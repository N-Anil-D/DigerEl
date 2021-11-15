<?php 
if(isset($_SESSION["Kullanici"])){ 
    
if(isset($_POST["IsimSoyisim"])){
    $UyeGelenIsim = GuvenlikFiltresi($_POST["IsimSoyisim"]);
}else{
    $UyeGelenIsim = "";
}
//--------------------------------------------
if(isset($_POST["KullaniciAdi"])){
    $UyeGelenKullaniciAdi = GuvenlikFiltresi($_POST["KullaniciAdi"]);
}else{
    $UyeGelenKullaniciAdi = "";
}
//--------------------------------------------

if(isset($_POST["Email"])){
    $UyeGelenMail = GuvenlikFiltresi($_POST["Email"]);
}else{
    $UyeGelenMail = "";
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
if(isset($_POST["telefonNum"])){
    $UyeGelenTelefon = GuvenlikFiltresi($_POST["telefonNum"]);
    $UyeGelenTelefon = SadeceSayilar($_POST["telefonNum"]);
}else{
    $UyeGelenTelefon = "";
}
//--------------------------------------------

$UyeninAktivasyonKodu   = AktivasyonKoduUret();
if($UyeGelensifre == $UyeGelensifre2){
    $MD5liSifre             = md5($UyeGelensifre);
}
    
    if(($UyeGelenIsim != "") and ($UyeGelenMail != "") and ($UyeGelensifre != "") and ($UyeGelenTelefon != "") and ($UyeGelenKullaniciAdi != "")){
        
        if($UyeGelensifre != $UyeGelensifre2){
            header("Location:UyelikBilgileriGuncelleFUyusmayanSifre");//eslesmeyen sifre
            exit();
        }else{
            $UyeBilgileri  = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenMail' ");
            $UyeDetay      = $UyeBilgileri->fetch_assoc();
            $UyeSifre      = $UyeDetay["Sifre"];
            if($MD5liSifre == $UyeSifre){
                $PWDegistirmeTalebi = 0 ;
            }else{
                $PWDegistirmeTalebi = 1 ;
            }
        }
            

        if($UyeGelenMail != $UyeEmail){

            $UyeEmailiVarMi  = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenMail' ");
            $DogriMi1        = $UyeEmailiVarMi->num_rows;
            if($DogriMi1 > 0){
                header("Location:UyelikBilgileriGuncelleFZatenVar");//mail ZATEN VAR
                exit();
            }
        }
        if($UyeGelenKullaniciAdi != $UyeKullaniciAdi){

            $UyeKullaniciAdiVarMi  = $DataBaseConnection->query("SELECT * FROM uyeler WHERE KullaniciAdi = '$UyeGelenKullaniciAdi' ");
            $DogriMi2              = $UyeKullaniciAdiVarMi->num_rows;
            if($DogriMi2 > 0){
                header("Location:UyelikBilgileriGuncelleFZatenVar");//Kullanıcı adı ZATEN VAR
                exit();
            }
        }
        if($UyeGelenTelefon != $UyeTelefonNum){

            $UyeTelefonNumVarMi  = $DataBaseConnection->query("SELECT * FROM uyeler WHERE TelefonNum = '$UyeGelenTelefon' ");
            $DogriMi3            = $UyeTelefonNumVarMi->num_rows;
            if($DogriMi3 > 0){
                header("Location:UyelikBilgileriGuncelleFZatenVar");//telefon ZATEN VAR
                exit();
            }
        }
        
        if($PWDegistirmeTalebi>0){
            $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE uyeler SET isimSoyisim = ?, KullaniciAdi = ?, Email = ?, TelefonNum = ?, Sifre = ? WHERE id= '$Uyeid'");
            $KayitGuncellemeQuery->bind_param("sssss", $UyeGelenIsim, $UyeGelenKullaniciAdi, $UyeGelenMail ,$UyeGelenTelefon, $MD5liSifre);
            $KayitGuncellemeQuery->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
        }else{
            $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE uyeler SET isimSoyisim = ?, KullaniciAdi = ?, Email = ?, TelefonNum = ? WHERE id= '$Uyeid'");
            $KayitGuncellemeQuery->bind_param("ssss", $UyeGelenIsim, $UyeGelenKullaniciAdi, $UyeGelenMail ,$UyeGelenTelefon);
            $KayitGuncellemeQuery->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
        }

        if($etkilenenKayitSayisi>0){
            $_SESSION["Kullanici"]  =   $UyeGelenKullaniciAdi;
            header("Location:UyelikBilgileriGuncelleFBasarili");//tamam
            exit();
        }else{
            header("Location:UyelikBilgileriGuncelleFBasarisiz");//hata
            exit();
        }
    }else{    
        header("Location:UyelikBilgileriGuncelleFEksikBilgi");//eksik bilgi
        exit();
    }
}else{    
    header("Location:AnaSayfa");
    exit();
}
?>