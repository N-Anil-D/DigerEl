<?php
session_start(); ob_start();
$DataBaseConnection = new mysqli("localhost", "root", "");
$DataBaseConnection->set_charset("UTF8");
if($DataBaseConnection->connect_errno){
    //echo "DATABASE BAĞLANTISI SAĞLANAMADI<br>". $DataBaseConnection->connect_error;
    die();
}else{
    $DataBaseConnection->select_db("nad");
}

//---------------------------------------------------------------------------------------------------------
$Link		=	"https://www.tcmb.gov.tr/kurlar/today.xml";
$Kurlar		=	simplexml_load_file($Link);

$Dolar  			=	$Kurlar->Currency[0]->ForexSelling;
$DolarKuru			=	round(substr($Dolar, 0, 6), 3);
$Euro   			=	$Kurlar->Currency[3]->ForexSelling;
$EuroKuru			=	round(substr($Euro, 0, 6), 3);
//---------------------------------------------------------------------------------------------------------
$quueryAyar         = $DataBaseConnection->query("SELECT * FROM ayarlar LIMIT 1");
$kayitsayisi        = $quueryAyar->num_rows;
$icerik             = $quueryAyar->fetch_assoc();

if($kayitsayisi>0){
    $SiteAdi             = $icerik["SiteAdi"];
    $SiteTitle           = $icerik["SiteTitle"];
    $SiteDescription     = $icerik["SiteDescription"];
    $SiteKeywords        = $icerik["SiteKeywords"];
    $SiteCapyrightMetni  = $icerik["SiteCapyrightMetni"];
    $SiteLogosu          = $icerik["SiteLogosu"];
    $SiteEmailAdresi     = $icerik["SiteEmailAdresi"];
    $SiteEmailSiftesi    = $icerik["SiteEmailSifresi"];
    $SiteEmailHost       = $icerik["SiteEmailHost"];
    $SiteLinki           = $icerik["SiteLinki"];
    $SiteFacebook        = $icerik["SiteFacebook"];
    $SiteTwitter         = $icerik["SiteTwitter"];
    $SiteLinkedIn        = $icerik["SiteLinkedIn"];
    $SiteInstagram       = $icerik["SiteInstagram"];
    $SitePinteres        = $icerik["SitePinteres"];
    $SiteYoutube         = $icerik["SiteYoutube"];
    $ClientID            = $icerik["ClientID"];
    $StoreKey            = $icerik["StoreKey"];
    $ApiKullanicisi      = $icerik["ApiKullanicisi"];
    $ApiSifresi          = $icerik["ApiSifresi"];
    
        
    
    
    }
else{// echo "\$DataBaseConnection->query(SELECT * FROM ayarlar LIMIT 1) =-> HATALI";
    die();
}
//---------------------------------------------------------------------------------------------------------

$quueryFooterMetinleri  = $DataBaseConnection->query("SELECT * FROM sozlesmelervemetinler LIMIT 1");
$metinkayitsayisi       = $quueryFooterMetinleri->num_rows;
$metinicerik            = $quueryFooterMetinleri->fetch_assoc();

if($metinkayitsayisi>0){
    $HakkimizdaMetni                = $metinicerik["HakkimizdaMetni"];
    $UyelikSozlesmesiMetni          = $metinicerik["UyelikSozlesmesiMetni"];
    $KullanimKosullariMetni         = $metinicerik["KullanimKosullariMetni"];
    $GizlilikSozlesmesiMetni        = $metinicerik["GizlilikSozlesmesiMetni"];
    $MesafeliSatisSozlesmesiMetni   = $metinicerik["MesafeliSatisSozlesmesiMetni"];
    $TeslimatMetni                  = $metinicerik["TeslimatMetni"];
    $IptalIadeDegisimMetni          = $metinicerik["IptalIadeDegisimMetni"];
    }
else{// echo "\$DataBaseConnection->query(SELECT * FROM ayarlar LIMIT 1) =-> HATALI";
    die();
}
//---------------------------------------------------------------------------------------------------------
if(isset($_SESSION["Kullanici"])){
$SessionDegeri = $_SESSION["Kullanici"];
$quueryUye               = $DataBaseConnection->query("SELECT * FROM uyeler WHERE KullaniciAdi = '$SessionDegeri' LIMIT 1");
$uyekayitsayisi          = $quueryUye->num_rows;
$UyeBilgileri            = $quueryUye->fetch_assoc();
    
    if($uyekayitsayisi>0){
        $Uyeid              = $UyeBilgileri["id"];
        $UyeisimSoyisim     = $UyeBilgileri["isimSoyisim"];
        $UyeKullaniciAdi    = $UyeBilgileri["KullaniciAdi"];
        $UyeEmail           = $UyeBilgileri["Email"];
        $UyeSifre           = $UyeBilgileri["Sifre"];
        $UyeTelefonNum      = $UyeBilgileri["TelefonNum"];
        $UyeDurumu          = $UyeBilgileri["Durumu"];
        $UyeKayitTarihi     = $UyeBilgileri["KayitTarihi"];
        $UyeKayitIPadresi   = $UyeBilgileri["KayitIPadresi"];
        $UyeAktivasyonKodu  = $UyeBilgileri["AktivasyonKodu"];
    }else{
        unset($_SESSION["Kullanici"]);
        session_destroy();
        die();
    }

}


if(isset($_SESSION["Yonetici"])){
$SessionDegeri = $_SESSION["Yonetici"];
$YoneticiSorgusu         = $DataBaseConnection->query("SELECT * FROM  yoneticiler WHERE YoneticiKimligi = '$SessionDegeri' LIMIT 1");
$Yoneticikayitsayisi     = $YoneticiSorgusu->num_rows;
$YoneticiBilgileri       = $YoneticiSorgusu->fetch_assoc();
    
    if($Yoneticikayitsayisi>0){
        $YoneticiID              = $YoneticiBilgileri["id"];
        $YoneticiIsimSoyisim     = $YoneticiBilgileri["isimSoyisim"];
        $YoneticiKimligi         = $YoneticiBilgileri["YoneticiKimligi"];
        $YoneticiEmail           = $YoneticiBilgileri["EmailAdresi"];
        $YoneticiSifre           = $YoneticiBilgileri["Sifre"];
        $YoneticiTelefonNum      = $YoneticiBilgileri["TelNum"];
    }else{
        unset($_SESSION["Yonetici"]);
        session_destroy();
        die();
    }

}
//---------------------------------------------------------------------------------------------------------
?>