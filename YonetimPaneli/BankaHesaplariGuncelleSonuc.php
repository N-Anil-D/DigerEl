<?php namespace Verot\Upload;

if(isset($_SESSION["Yonetici"])){
    
        if(isset($_FILES["BankaLogosu"])){
            $GelenBankaLogosu = $_FILES["BankaLogosu"];
        }

//--------------------------------------------
if(isset($_POST["BankaKayitID"])){
    $GelenBankaKayitID = SadeceSayilar($_POST["BankaKayitID"]);
}else{
    $GelenBankaKayitID = "";
}
//--------------------------------------------
if(isset($_POST["BankaAdi"])){
    $GelenBankaAdi = GuvenlikFiltresi($_POST["BankaAdi"]);
}else{
    $GelenBankaAdi = "";
}
//--------------------------------------------
if(isset($_POST["BankaUlke"])){
    $GelenBankaUlke = GuvenlikFiltresi($_POST["BankaUlke"]);
}else{
    $GelenBankaUlke = "";
}
//--------------------------------------------
if(isset($_POST["BankaSehir"])){
    $GelenBankaSehir = GuvenlikFiltresi($_POST["BankaSehir"]);
}else{
    $GelenBankaSehir = "";
}
//--------------------------------------------
if(isset($_POST["BankaSubeAdi"])){
    $GelenBankaSubeAdi = GuvenlikFiltresi($_POST["BankaSubeAdi"]);
}else{
    $GelenBankaSubeAdi = "";
}
//--------------------------------------------
if(isset($_POST["BankaSubeKodu"])){
    $GelenBankaSubeKodu = GuvenlikFiltresi($_POST["BankaSubeKodu"]);
}else{
    $GelenBankaSubeKodu = "";
}
//--------------------------------------------

if(isset($_POST["ParaBirimi"])){
    $GelenParaBirimi = GuvenlikFiltresi($_POST["ParaBirimi"]);
}else{
    $GelenParaBirimi = "";
}
//--------------------------------------------
if(isset($_POST["HesapSahibi"])){
    $GelenHesapSahibi = GuvenlikFiltresi($_POST["HesapSahibi"]);
}else{
    $GelenHesapSahibi = "";
}
//--------------------------------------------
if(isset($_POST["HesapNumarasi"])){
    $GelenHesapNumarasi = GuvenlikFiltresi($_POST["HesapNumarasi"]);
}else{
    $GelenHesapNumarasi = "";
}
//--------------------------------------------
if(isset($_POST["iBanNumarasi"])){
    $GeleniBanNumarasi = GuvenlikFiltresi($_POST["iBanNumarasi"]);
}else{
    $GeleniBanNumarasi = "";
}


if(($GelenBankaAdi != "") and ($GelenBankaUlke != "") and ($GelenBankaSehir != "") and ($GelenBankaSubeAdi != "") and ($GelenBankaSubeKodu != "") and ($GelenParaBirimi != "") and ($GelenHesapSahibi != "") and ($GelenHesapNumarasi != "") and ($GeleniBanNumarasi != "")){
    
    
    $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE bankahesaplarimiz SET BankaAdi = ?, KonumSehir = ?, KonumUlke = ?, SubeAdi = ?, SubeKodu = ?, ParaBirimi = ?, HesapSahibi = ?, HesapNumarasi = ?, ibanNumarasi = ? WHERE id=$GelenBankaKayitID");
    $KayitGuncellemeQuery->bind_param("sssssssss", $GelenBankaAdi, $GelenBankaSehir, $GelenBankaUlke, $GelenBankaSubeAdi, $GelenBankaSubeKodu, $GelenParaBirimi,  $GelenHesapSahibi, $GelenHesapNumarasi, $GeleniBanNumarasi);
    $KayitGuncellemeQuery->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    

    if(($GelenBankaLogosu["name"] != "") and ($GelenBankaLogosu["type"] != "") and ($GelenBankaLogosu["tmp_name"] != "") and ($GelenBankaLogosu["error"] == 0) and ($GelenBankaLogosu["size"] > 0)){
        
        $KayitCek = $DataBaseConnection->query("SELECT * FROM bankahesaplarimiz WHERE id = $GelenBankaKayitID LIMIT 1");
        $CalistiMi = $KayitCek->num_rows;
          if($CalistiMi){ 
              while($BankaInfo = $KayitCek->fetch_assoc()){
                  $Banka_Logosu = $BankaInfo["BankaLogosu"];
                  $BuDosyayiSil = "../".$Banka_Logosu;
                  $ResimSilindi = unlink($BuDosyayiSil);
              }
            }
        if($ResimSilindi == 1){
            $ResimAdi       = isimOlustur();

            $YeniResimAdi           = $ResimAdi.".png";
            $DB_ye_eklenecek_isim   = "Resimler/".$YeniResimAdi;

            $BankaLogosuYukle    = new upload($GelenBankaLogosu, "tr-TR");
            if($BankaLogosuYukle->uploaded){
                //$BankaLogosuYukle->mime_file = false;
                $BankaLogosuYukle->mime_magic_check       = true;            
                $BankaLogosuYukle->allowed                = array("image/*"); 
                $BankaLogosuYukle->image_convert          = "png";
                $BankaLogosuYukle->image_quality          = 100;
                $BankaLogosuYukle->file_overwrite         = true;
                $BankaLogosuYukle->image_background_color = "#FFFFFF";
                $BankaLogosuYukle->file_new_name_body     = $ResimAdi;
                $BankaLogosuYukle->image_resize           = true;
                $BankaLogosuYukle->image_ratio            = true;
                $BankaLogosuYukle->image_y                = 30;

                $BankaLogosuYukle->process($VerotIcinKlasorYolu);        

                if($BankaLogosuYukle->processed){
                    $BankaLogosuYukle->clean();
                }else{
                    header("Location:index.php?SKI=11");
                    exit();
                } 
            }
        }/* Resim Silindiyse */
    }
    
        if($BankaLogosuYukle->processed){
            $KayitGuncellemeQuery = $DataBaseConnection->query("UPDATE bankahesaplarimiz SET BankaLogosu = '$DB_ye_eklenecek_isim' WHERE id=$GelenBankaKayitID");
        }    


        if($etkilenenKayitSayisi>0 or $KayitGuncellemeQuery){
            header("Location:index.php?SKI=17"); //Çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=11");
            exit();
        }
    }else{
        header("Location:index.php?SKI=11");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>