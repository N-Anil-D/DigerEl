<?php namespace Verot\Upload;
    
if(isset($_SESSION["Yonetici"])){

if(isset($_FILES["KargoLogosu"])){
    $GelenKargoLogosu = $_FILES["KargoLogosu"];
}
//--------------------------------------------
if(isset($_POST["KargoAdi"])){
    $GelenKargoAdi = GuvenlikFiltresi($_POST["KargoAdi"]);
}else{
    $GelenKargoAdi = "";
}
//--------------------------------------------
    
if(($GelenKargoAdi != "") and ($GelenKargoLogosu["name"] != "") and  ($GelenKargoLogosu["type"] != "") and ($GelenKargoLogosu["tmp_name"] != "") and ($GelenKargoLogosu["error"] == 0) and ($GelenKargoLogosu["size"] > 0)){
    
    $ResimAdi       = isimOlustur();
    $YeniResimAdi           = $ResimAdi.".png";
    $DB_ye_eklenecek_isim   = "Resimler/".$YeniResimAdi;

    $BankaEkle = $DataBaseConnection->prepare("INSERT INTO kargofirmalari (KargoFirmasiLogosu,KargoFirmasiAdi) values(?,?) LIMIT 1");
    $BankaEkle->bind_param("ss", $DB_ye_eklenecek_isim, $GelenKargoAdi);
    $BankaEkle->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    

        
        $KargoLogosuYukle    = new upload($GelenKargoLogosu, "tr-TR");
        if($KargoLogosuYukle->uploaded){
            $KargoLogosuYukle->mime_magic_check       = true;            
            $KargoLogosuYukle->allowed                = array("image/*"); 
            $KargoLogosuYukle->image_convert          = "png";
            $KargoLogosuYukle->image_quality          = 100;
            $KargoLogosuYukle->file_overwrite         = true;
            $KargoLogosuYukle->image_background_color = null;
            $KargoLogosuYukle->file_new_name_body     = $ResimAdi;
            $KargoLogosuYukle->image_resize           = true;
            $KargoLogosuYukle->image_ratio            = true;
            $KargoLogosuYukle->image_y                = 30;

            $KargoLogosuYukle->process($VerotIcinKlasorYolu);        

            if($KargoLogosuYukle->processed) {
                $KargoLogosuYukle->clean();
            }else{
                header("Location:index.php?SKI=21");
                exit();
            } 
        }
            /* https://www.verot.net/php_class_upload.htm  */   

    
    
    
        if($etkilenenKayitSayisi>0 and $KargoLogosuYukle->processed){
            header("Location:index.php?SKI=17"); //çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=21");
            exit();
        }
    }else{
        header("Location:index.php?SKI=21");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>