<?php namespace Verot\Upload;

if(isset($_SESSION["Yonetici"])){
    
        if(isset($_FILES["KargoFirmasiLogosu"])){
            $GelenKargoFirmasiLogosu = $_FILES["KargoFirmasiLogosu"];
        }

//--------------------------------------------
if(isset($_POST["KargoFirmasiKayitID"])){
    $GelenKargoFirmasiKayitID = SadeceSayilar($_POST["KargoFirmasiKayitID"]);
}else{
    $GelenKargoFirmasiKayitID = "";
}
//--------------------------------------------
if(isset($_POST["KargoFirmasiAdi"])){
    $GelenKargoFirmasiAdi = GuvenlikFiltresi($_POST["KargoFirmasiAdi"]);
}else{
    $GelenKargoFirmasiAdi = "";
}
//--------------------------------------------


if(($GelenKargoFirmasiAdi != "") and ($GelenKargoFirmasiKayitID != "")){
    
    
    $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE kargofirmalari SET KargoFirmasiAdi = ? WHERE id=$GelenKargoFirmasiKayitID");
    $KayitGuncellemeQuery->bind_param("s", $GelenKargoFirmasiAdi);
    $KayitGuncellemeQuery->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    if(($GelenKargoFirmasiLogosu["name"] != "") and ($GelenKargoFirmasiLogosu["type"] != "") and ($GelenKargoFirmasiLogosu["tmp_name"] != "") and ($GelenKargoFirmasiLogosu["error"] == 0) and ($GelenKargoFirmasiLogosu["size"] > 0)){
        
        $KayitCek = $DataBaseConnection->query("SELECT * FROM kargofirmalari WHERE id = $GelenKargoFirmasiKayitID LIMIT 1");
        $CalistiMi = $KayitCek->num_rows;
          if($CalistiMi){ 
              while($BankaInfo = $KayitCek->fetch_assoc()){
                  $Banka_Logosu = $BankaInfo["KargoFirmasiLogosu"];
                  $BuDosyayiSil = "../".$Banka_Logosu;
                  $ResimSilindi = unlink($BuDosyayiSil);
              }
            }
        if($ResimSilindi == 1){
            $ResimAdi       = isimOlustur();
            
            $YeniResimAdi           = $ResimAdi.".png";
            $DB_ye_eklenecek_isim   = "Resimler/".$YeniResimAdi;

            $KargoFirmasiLogosuYukle    = new upload($GelenKargoFirmasiLogosu, "tr-TR");
            if($KargoFirmasiLogosuYukle->uploaded){
                $KargoFirmasiLogosuYukle->mime_magic_check       = true;            
                $KargoFirmasiLogosuYukle->allowed                = array("image/*"); 
                $KargoFirmasiLogosuYukle->image_convert          = "png";
                $KargoFirmasiLogosuYukle->image_quality          = 100;
                $KargoFirmasiLogosuYukle->file_overwrite         = true;
                $KargoFirmasiLogosuYukle->image_background_color = "#FFFFFF";
                $KargoFirmasiLogosuYukle->file_new_name_body     = $ResimAdi;
                $KargoFirmasiLogosuYukle->image_resize           = true;
                $KargoFirmasiLogosuYukle->image_ratio            = true;
                $KargoFirmasiLogosuYukle->image_y                = 30;

                $KargoFirmasiLogosuYukle->process($VerotIcinKlasorYolu);        

                if($KargoFirmasiLogosuYukle->processed){
                    $KargoFirmasiLogosuYukle->clean();
                }else{
                    header("Location:index.php?SKI=24");
                    exit();
                } 
            }
        }/* Resim Silindiyse */
            /* https://www.verot.net/php_class_upload.htm  */   
    }
    
    if($KargoFirmasiLogosuYukle->processed){
        $KayitGuncellemeQuery = $DataBaseConnection->query("UPDATE kargofirmalari SET KargoFirmasiLogosu = '$DB_ye_eklenecek_isim' WHERE id=$GelenKargoFirmasiKayitID");
    }    

    
    if($etkilenenKayitSayisi>0 or $KayitGuncellemeQuery){
        header("Location:index.php?SKI=17"); //Çalıştı
        exit();
    }else{
        header("Location:index.php?SKI=24");
        exit();
    }
}else{
    header("Location:index.php?SKI=24");
    exit();
}
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>