<?php if(isset($_SESSION["Yonetici"])){
                    
if(isset($_GET["BanID"])){
    $BannerID = SadeceSayilar($_GET["BanID"]);
}else{
    $BannerID = "";
}

if($BannerID != ""){
    
    $KayitCek = $DataBaseConnection->prepare("SELECT * FROM banner WHERE id = ? LIMIT 1");
    $KayitCek->bind_param("i", $BannerID);
    $KayitCek->execute();
    $KayitCek->bind_result($Banner_id,$BannerAlani,$BannerAdi,$BannerResmi,$GosterimSayisi);
    while($KayitCek->fetch()){
    
    $BuDosyayiSil = "../".$BannerResmi;
    }
    if($BuDosyayiSil != ""){
        
        $KayitSil = $DataBaseConnection->prepare("DELETE FROM banner WHERE id = ? LIMIT 1");
        $KayitSil->bind_param("i", $BannerID);
        $KayitSil->execute();
        $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

        if($SilinenKayitSayisi){
            $ResimSilindi = unlink($BuDosyayiSil);
            if($ResimSilindi=1){
                header("Location:index.php?SKI=3"); //çalıştı
                exit();
                }else{
                    header("Location:index.php?SKI=35"); //hata
                    exit();
                }
            }else{
                header("Location:index.php?SKI=35"); //hata
                exit();
            }
        }else{
            header("Location:index.php?SKI=35"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=35"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>