<?php if(isset($_SESSION["Yonetici"])){
                    
if(isset($_GET["BID"])){
    $BankaID = SadeceSayilar($_GET["BID"]);
}else{
    $BankaID = "";
}

if($BankaID != ""){
    
    $KayitCek = $DataBaseConnection->prepare("SELECT * FROM bankahesaplarimiz WHERE id = ? LIMIT 1");
    $KayitCek->bind_param("i", $BankaID);
    $KayitCek->execute();
    $KayitCek->bind_result($Banka_id,$Banka_Logosu,$Banka_Adi,$Banka_Sehir,$Banka_Ulke,$Banka_SubeAdi,$Banka_SubeKodu,$Banka_ParaBirimi,$Banka_HesapSahibi,$Banka_HesapNumarasi,$Banka_ibanNumarasi);
    while($KayitCek->fetch()){
    
    $BuDosyayiSil = "../".$Banka_Logosu;
    }
    if($BuDosyayiSil != ""){
        
        $KayitSil = $DataBaseConnection->prepare("DELETE FROM bankahesaplarimiz WHERE id = ? LIMIT 1");
        $KayitSil->bind_param("i", $BankaID);
        $KayitSil->execute();
        $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

        if($SilinenKayitSayisi){
            $ResimSilindi = unlink($BuDosyayiSil);
            if($ResimSilindi=1){
                header("Location:index.php?SKI=3"); //çalıştı
                exit();
                }else{
                    header("Location:index.php?SKI=16"); //hata
                    exit();
                }
            }else{
                header("Location:index.php?SKI=16"); //hata
                exit();
            }
        }else{
            header("Location:index.php?SKI=16"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=16"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>