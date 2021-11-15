<?php namespace Verot\Upload;

if(isset($_SESSION["Yonetici"])){
    
        if(isset($_FILES["BannerResim"])){
            $GelenBannerResim = $_FILES["BannerResim"];
        }

//--------------------------------------------
if(isset($_POST["BannerAlani"])){
    $GelenBannerAlani = GuvenlikFiltresi($_POST["BannerAlani"]);
}else{
    $GelenBannerAlani = "";
}
//--------------------------------------------
if(isset($_POST["BannerAdi"])){
    $GelenBannerAdi = GuvenlikFiltresi($_POST["BannerAdi"]);
}else{
    $GelenBannerAdi = "";
}
//--------------------------------------------
if(isset($_POST["BannerGS"])){
    $GelenBannerGS = SadeceSayilar($_POST["BannerGS"]);
}else{
    $GelenBannerGS = "";
}
//--------------------------------------------
if(isset($_POST["BannerKayitID"])){
    $GelenBannerKayitID = GuvenlikFiltresi($_POST["BannerKayitID"]);
}else{
    $GelenBannerKayitID = "";
}
//--------------------------------------------

if(($GelenBannerAdi != "") and ($GelenBannerGS != "") and ($GelenBannerKayitID != "") and ($GelenBannerAlani != "")){
    
    
    $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE banner SET BannerAlani = ?, BannerAdi = ?, GösterimSayisi = ? WHERE id=$GelenBannerKayitID");
    $KayitGuncellemeQuery->bind_param("ssi", $GelenBannerAlani, $GelenBannerAdi, $GelenBannerGS);
    $KayitGuncellemeQuery->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    

    if(($GelenBannerResim["name"] != "") and ($GelenBannerResim["type"] != "") and ($GelenBannerResim["tmp_name"] != "") and ($GelenBannerResim["error"] == 0) and ($GelenBannerResim["size"] > 0)){
        
        $KayitCek = $DataBaseConnection->query("SELECT * FROM banner WHERE id = $GelenBannerKayitID LIMIT 1");
        $CalistiMi = $KayitCek->num_rows;
          if($CalistiMi){ 
              while($BannerInfo = $KayitCek->fetch_assoc()){
                  $BannerResim = $BannerInfo["BannerResmi"];
                  $BuDosyayiSil = "../".$BannerResim;
                  $ResimSilindi = unlink($BuDosyayiSil);
              }
            }
        if($ResimSilindi == "1"){
            $ResimAdi       = isimOlustur();

            $YeniResimAdi           = $ResimAdi.".png";
            $DB_ye_eklenecek_isim   = "Resimler/".$YeniResimAdi;
            
            
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
            $BannerResimYukle    = new upload($GelenBannerResim, "tr-TR");
            if($BannerResimYukle->uploaded){
                $BannerResimYukle->mime_magic_check       = true;            
                $BannerResimYukle->allowed                = array("image/*"); 
                $BannerResimYukle->image_convert          = "png";
                $BannerResimYukle->image_quality          = 100;
                $BannerResimYukle->file_overwrite         = true;
                $BannerResimYukle->image_background_color = null;
                $BannerResimYukle->file_new_name_body     = $ResimAdi;
                $BannerResimYukle->image_resize           = true;
                $BannerResimYukle->image_ratio            = true;
                $BannerResimYukle->image_y                = $Resim_Y;
                $BannerResimYukle->image_x                = $Resim_X;

                $BannerResimYukle->process($VerotIcinKlasorYolu);        

                if($BannerResimYukle->processed){
                    $BannerResimYukle->clean();
                }else{
                    header("Location:index.php?SKI=30");
                    exit();
                } 
            }
        }/* Resim Silindiyse */
            /* https://www.verot.net/php_class_upload.htm  */   
    }
    
        if($BannerResimYukle->processed){
            $KayitGuncellemeQuery = $DataBaseConnection->query("UPDATE banner SET BannerResmi = '$DB_ye_eklenecek_isim' WHERE id=$GelenBannerKayitID");
        }    


        if($etkilenenKayitSayisi>0 or $KayitGuncellemeQuery){
            header("Location:index.php?SKI=17"); //Çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=30");
            exit();
        }
    }else{
        header("Location:index.php?SKI=30");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>