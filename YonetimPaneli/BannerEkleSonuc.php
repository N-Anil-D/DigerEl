<?php namespace Verot\Upload;

    if(isset($_SESSION["Yonetici"])){

    if(isset($_FILES["BannerResmi"])){
        $GelenBannerResmi = $_FILES["BannerResmi"];
    }
    //--------------------------------------------
    if(isset($_POST["BannerAdi"])){
        $GelenBannerAdi = GuvenlikFiltresi($_POST["BannerAdi"]);
    }else{
        $GelenBannerAdi = "";
    }
    //--------------------------------------------
    if(isset($_POST["BannerAlani"])){
        $GelenBannerAlani = GuvenlikFiltresi($_POST["BannerAlani"]);
        if($GelenBannerAlani == ""){
            header("Location:index.php?SKI=31");
            exit();
        }
    }else{
        $GelenBannerAlani = "";
    }
    //--------------------------------------------

    if(($GelenBannerAdi != "") and ($GelenBannerAlani != "") and ($GelenBannerResmi["name"] != "") and  ($GelenBannerResmi["type"] != "") and ($GelenBannerResmi["tmp_name"] != "") and ($GelenBannerResmi["error"] == 0) and ($GelenBannerResmi["size"] > 0)){
    
    $ResimAdi       = isimOlustur();
    $YeniResimAdi           = $ResimAdi.".png";
    $DB_ye_eklenecek_isim   = "Resimler/".$YeniResimAdi;
    
    $GosterimSayisi = 0;
    
    $BannerEkle = $DataBaseConnection->prepare("INSERT INTO banner (BannerAlani,BannerAdi,BannerResmi,GösterimSayisi) values(?,?,?,?) LIMIT 1");
    $BannerEkle->bind_param("sssi", $GelenBannerAlani, $GelenBannerAdi, $DB_ye_eklenecek_isim, $GosterimSayisi);
    $BannerEkle->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
    
    if($GelenBannerAlani == "Ana Sayfa"){
        $Resim_X = 1065;
        $Resim_Y = 100;
    }elseif($GelenBannerAlani == "Menü Altı"){
        $Resim_X = 250;
        $Resim_Y = 500;
    }elseif($GelenBannerAlani == "Detay Sayfası Altı"){
        $Resim_X = 350;
        $Resim_Y = 120;
    }
    

        
        $BannerResmiYukle    = new upload($GelenBannerResmi, "tr-TR");
        if($BannerResmiYukle->uploaded){
            $BannerResmiYukle->mime_magic_check       = true;            
            $BannerResmiYukle->allowed                = array("image/*"); 
            $BannerResmiYukle->image_convert          = "png";
            $BannerResmiYukle->image_quality          = 100;
            $BannerResmiYukle->file_overwrite         = true;
            $BannerResmiYukle->image_background_color = "#FFFFFF";
            $BannerResmiYukle->file_new_name_body     = $ResimAdi;
            $BannerResmiYukle->image_resize           = true;
            //$BannerResmiYukle->image_ratio            = true;
            $BannerResmiYukle->image_y                = $Resim_Y;
            $BannerResmiYukle->image_x                = $Resim_X;

            $BannerResmiYukle->process($VerotIcinKlasorYolu);        

            if($BannerResmiYukle->processed) {
                $BannerResmiYukle->clean();
            }else{
                header("Location:index.php?SKI=33");
                exit();
            } 
        }
            /* https://www.verot.net/php_class_upload.htm  */   

    
    
    
        if($etkilenenKayitSayisi>0 and $BannerResmiYukle->processed){
            header("Location:index.php?SKI=17"); //çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=33");
            exit();
        }
    }else{
        header("Location:index.php?SKI=33");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>