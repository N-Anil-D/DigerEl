<?php if(isset($_SESSION["Yonetici"])){
                    
if(isset($_GET["KFid"])){
    $KargoFirmasiID = SadeceSayilar($_GET["KFid"]);
}else{
    $KargoFirmasiID = "";
}

if($KargoFirmasiID != ""){
    
    $KayitCek = $DataBaseConnection->prepare("SELECT * FROM kargofirmalari WHERE id = ? LIMIT 1");
    $KayitCek->bind_param("i", $KargoFirmasiID);
    $KayitCek->execute();
    $KayitCek->bind_result($Kargo_id,$Kargo_Logosu,$Kargo_Adi);
    while($KayitCek->fetch()){
    
    $BuDosyayiSil = "../".$Kargo_Logosu;
    }
    if($BuDosyayiSil != ""){
        
        $KayitSil = $DataBaseConnection->prepare("DELETE FROM kargofirmalari WHERE id = ? LIMIT 1");
        $KayitSil->bind_param("i", $KargoFirmasiID);
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