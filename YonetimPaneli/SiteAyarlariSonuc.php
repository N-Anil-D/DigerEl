<?php namespace Verot\Upload;


if(isset($_SESSION["Yonetici"])){

if(isset($_POST["SiteAdi"])){
    $GelenSiteAdi = GuvenlikFiltresi($_POST["SiteAdi"]);
}else{
    $GelenSiteAdi = "";
}
//--------------------------------------------
if(isset($_POST["SiteTitle"])){
    $GelenSiteTitle = GuvenlikFiltresi($_POST["SiteTitle"]);
}else{
    $GelenSiteTitle = "";
}
//--------------------------------------------
if(isset($_POST["SiteDescription"])){
    $GelenSiteDescription = GuvenlikFiltresi($_POST["SiteDescription"]);
}else{
    $GelenSiteDescription = "";
}
//--------------------------------------------
if(isset($_POST["SiteKeywords"])){
    $GelenSiteKeywords = GuvenlikFiltresi($_POST["SiteKeywords"]);
}else{
    $GelenSiteKeywords = "";
}
//--------------------------------------------
if(isset($_POST["SiteCapyrightMetni"])){
    $GelenSiteCapyrightMetni = GuvenlikFiltresi($_POST["SiteCapyrightMetni"]);
}else{
    $GelenSiteCapyrightMetni = "";
}
//--------------------------------------------
        if(isset($_FILES["SiteLogosu"])){
            $GelenSiteLogosu = $_FILES["SiteLogosu"];
        }else{
            $GelenSiteLogosu = "";
        }
//--------------------------------------------
if(isset($_POST["SiteEmailAdresi"])){
    $GelenSiteEmailAdresi = GuvenlikFiltresi($_POST["SiteEmailAdresi"]);
}else{
    $GelenSiteEmailAdresi = "";
}
//--------------------------------------------
if(isset($_POST["SiteEmailSiftesi"])){
    $GelenSiteEmailSiftesi = GuvenlikFiltresi($_POST["SiteEmailSiftesi"]);
}else{
    $GelenSiteEmailSiftesi = "";
}
//--------------------------------------------
if(isset($_POST["SiteEmailHost"])){
    $GelenSiteEmailHost = GuvenlikFiltresi($_POST["SiteEmailHost"]);
}else{
    $GelenSiteEmailHost = "";
}
//--------------------------------------------
if(isset($_POST["SiteLinki"])){
    $GelenSiteLinki = GuvenlikFiltresi($_POST["SiteLinki"]);
}else{
    $GelenSiteLinki = "";
}
//--------------------------------------------
if(isset($_POST["SiteFacebook"])){
    $GelenSiteFacebook = GuvenlikFiltresi($_POST["SiteFacebook"]);
}else{
    $GelenSiteFacebook = "";
}
//--------------------------------------------
if(isset($_POST["SiteTwitter"])){
    $GelenSiteTwitter = GuvenlikFiltresi($_POST["SiteTwitter"]);
}else{
    $GelenSiteTwitter = "";
}
//--------------------------------------------
if(isset($_POST["SiteLinkedIn"])){
    $GelenSiteLinkedIn = GuvenlikFiltresi($_POST["SiteLinkedIn"]);
}else{
    $GelenSiteLinkedIn = "";
}
//--------------------------------------------
if(isset($_POST["SiteInstagram"])){
    $GelenSiteInstagram = GuvenlikFiltresi($_POST["SiteInstagram"]);
}else{
    $GelenSiteInstagram = "";
}
//--------------------------------------------
if(isset($_POST["SitePinteres"])){
    $GelenSitePinteres = GuvenlikFiltresi($_POST["SitePinteres"]);
}else{
    $GelenSitePinteres = "";
}
//--------------------------------------------
if(isset($_POST["SiteYoutube"])){
    $GelenSiteYoutube = GuvenlikFiltresi($_POST["SiteYoutube"]);
}else{
    $GelenSiteYoutube = "";
}
//--------------------------------------------
if(isset($_POST["ClientID"])){
    $GelenClientID = GuvenlikFiltresi($_POST["ClientID"]);
}else{
    $GelenClientID = "";
}
//--------------------------------------------
if(isset($_POST["StoreKey"])){
    $GelenStoreKey = GuvenlikFiltresi($_POST["StoreKey"]);
}else{
    $GelenStoreKey = "";
}
//--------------------------------------------
if(isset($_POST["ApiKullanicisi"])){
    $GelenApiKullanicisi = GuvenlikFiltresi($_POST["ApiKullanicisi"]);
}else{
    $GelenApiKullanicisi = "";
}
//--------------------------------------------
if(isset($_POST["ApiSifresi"])){
    $GelenApiSifresi = GuvenlikFiltresi($_POST["ApiSifresi"]);
}else{
    $GelenApiSifresi = "";
}

if(($GelenSiteAdi != "") and ($GelenSiteTitle != "") and ($GelenSiteDescription != "") and ($GelenSiteKeywords != "") and ($GelenSiteCapyrightMetni != "") and ($GelenSiteEmailAdresi != "") and ($GelenSiteEmailSiftesi != "") and ($GelenSiteEmailHost != "") and ($GelenSiteLinki != "") and ($GelenSiteFacebook != "") and  ($GelenSiteTwitter != "") and ($GelenSiteLinkedIn != "") and ($GelenSiteInstagram != "") and ($GelenSitePinteres != "") and ($GelenSiteYoutube != "") and ($GelenClientID != "") and ($GelenStoreKey != "") and ($GelenApiKullanicisi != "") and ($GelenApiSifresi != "")){
    

    $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE ayarlar SET SiteAdi = ?, SiteTitle = ?, SiteDescription = ?, SiteKeywords = ?, SiteCapyrightMetni = ?, SiteLinki = ?, SiteEmailAdresi = ?, SiteEmailSifresi = ?, SiteEmailHost = ?, SiteFacebook  = ?, SiteTwitter  = ?, SiteLinkedIn  = ?, SiteInstagram  = ?, SitePinteres  = ?, SiteYoutube  = ?, ClientID = ?, StoreKey = ?, ApiKullanicisi = ?, ApiSifresi = ? LIMIT 1");
    $KayitGuncellemeQuery->bind_param("sssssssssssssssssss", $GelenSiteAdi, $GelenSiteTitle, $GelenSiteDescription, $GelenSiteKeywords, $GelenSiteCapyrightMetni, $GelenSiteLinki, $GelenSiteEmailAdresi, $GelenSiteEmailSiftesi, $GelenSiteEmailHost, $GelenSiteFacebook, $GelenSiteTwitter, $GelenSiteLinkedIn, $GelenSiteInstagram, $GelenSitePinteres, $GelenSiteYoutube, $GelenClientID, $GelenStoreKey, $GelenApiKullanicisi, $GelenApiSifresi);
    $KayitGuncellemeQuery->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    

    if(($GelenSiteLogosu["name"] != "") and ($GelenSiteLogosu["type"] != "") and ($GelenSiteLogosu["tmp_name"] != "") and ($GelenSiteLogosu["error"] == 0) and ($GelenSiteLogosu["size"] > 0)){
        
        $SiteLogosuYukle    = new upload($GelenSiteLogosu, "tr-TR");
        if($SiteLogosuYukle->uploaded){
            //$SiteLogosuYukle->mime_file = false;
            $SiteLogosuYukle->mime_magic_check       = true;            
            $SiteLogosuYukle->allowed                = array("image/*"); 
            $SiteLogosuYukle->image_convert          = "png";
            $SiteLogosuYukle->image_quality          = 100;
            $SiteLogosuYukle->file_overwrite         = true;
            $SiteLogosuYukle->image_background_color = null;
            $SiteLogosuYukle->file_new_name_body     = "Logo";
            $SiteLogosuYukle->image_resize           = true;
            $SiteLogosuYukle->image_x                = 74;
            $SiteLogosuYukle->image_y                = 100;

            $SiteLogosuYukle->process($VerotIcinKlasorYolu);        

            if($SiteLogosuYukle->processed) {
                //echo 'Logo Güncellendi <br /> Resimin adı Logo olarak değiştirildi <br /> Yeniden boyutlandırıldı x=100 y=74 <br /> png ye dönüştürüldü';
                $SiteLogosuYukle->clean();
            }else{
                header("Location:index.php?SKI=4");
                exit();
            } 
        }
            /* https://www.verot.net/php_class_upload.htm  */   
    }
    
    
    
    if($etkilenenKayitSayisi>0 or $SiteLogosuYukle->processed){
        header("Location:index.php?SKI=3");
        exit();
    }else{
        header("Location:index.php?SKI=4");
        exit();
    }
}else{
    /*echo $GelenSiteAdi."<br />";
    echo $GelenSiteTitle."<br />";
    echo $GelenSiteDescription."<br />";
    echo $GelenSiteKeywords."<br />";
    echo $GelenSiteCapyrightMetni."<br />";
    echo $GelenSiteEmailAdresi."<br />";
    echo $GelenSiteEmailSiftesi."<br />";
    echo $GelenSiteEmailHost."<br />";
    echo $GelenSiteLinki."<br />";
    echo $GelenApiSifresi."<br />";
    echo $GelenSiteFacebook."<br />";
    echo $GelenSiteTwitter."<br />";
    echo $GelenSiteLinkedIn."<br />";
    echo $GelenSiteInstagram."<br />";
    echo $GelenSitePinteres."<br />";
    echo $GelenSiteYoutube."<br />";
    echo $GelenClientID."<br />";
    echo $GelenStoreKey."<br />";
    echo $GelenApiKullanicisi."<br />";
    echo $GelenApiSifresi."<br /> BİTTİ";*/
    header("Location:index.php?SKI=4");
    exit();
}







}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>