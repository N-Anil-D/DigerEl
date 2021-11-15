<?php 
if(isset($_SESSION["Yonetici"])){
                    
    if(isset($_GET["UID"])){
        $UyeID = SadeceSayilar($_GET["UID"]);
    }else{
        $UyeID = "";
    }

    if($UyeID != ""){
        
        $KayitCek = $DataBaseConnection->prepare("SELECT * FROM uyeler WHERE id = ? LIMIT 1");
        $KayitCek->bind_param("i", $UyeID);
        $KayitCek->execute();
        $KayitCek->bind_result($Uye_id,$Uye_isimSoyisim,$Uye_KullaniciAdi,$Uye_Email,$Uye_Sifre,$Uye_TelefonNum,$Uye_Durumu,$Uye_KayitTarihi,$Uye_KayitIPadresi,$Uye_AktivasyonKodu);
        while($KayitCek->fetch()){
            $X = "Kayitli";
        }
        if($X == "Kayitli"){
            
            $DurumunuGuncelle   = "Aktif";
            $AktiveEt = $DataBaseConnection->prepare("UPDATE uyeler SET Durumu = ? WHERE id = ? LIMIT 1");
            $AktiveEt->bind_param("si", $DurumunuGuncelle,$UyeID);
            $AktiveEt->execute();
            $KayitSayisi = $DataBaseConnection->affected_rows;

            if($KayitSayisi){
                header("Location:index.php?SKI=3");
                exit();
            }else{
                header("Location:index.php?SKI=64"); //hata
                exit();
            }
         }else{
            header("Location:index.php?SKI=64"); //hata
            exit();
         }
    }else{
        header("Location:index.php?SKI=64"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
}


?>