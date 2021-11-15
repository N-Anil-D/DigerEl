<?php if(isset($_SESSION["Yonetici"])){
                    
if(isset($_GET["YID"])){
    $YoneticiID = SadeceSayilar($_GET["YID"]);
}else{
    $YoneticiID = "";
}
    
if($YoneticiID != ""){

    $YoneticiCek = $DataBaseConnection->query("SELECT * FROM yoneticiler");
    $ToplamYoneticiSayisi = $YoneticiCek->num_rows;
    
    if($ToplamYoneticiSayisi>1){
    
        $KayitCek = $DataBaseConnection->prepare("SELECT * FROM yoneticiler WHERE id = ? LIMIT 1");
        $KayitCek->bind_param("i", $YoneticiID);
        $KayitCek->execute();
        $KayitCek->bind_result($YoneticiID,$YoneticiKimligi,$YoneticiSifre,$YoneticiisimSoyisim,$YoneticiEmailAdresi,$YoneticiTelNum);
        while($KayitCek->fetch()){
            $X = "Kayitli";
        }

        if($X == "Kayitli"){

            $KayitSil = $DataBaseConnection->prepare("DELETE FROM yoneticiler WHERE id = ? LIMIT 1");
            $KayitSil->bind_param("i", $YoneticiID);
            $KayitSil->execute();
            $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

            if($SilinenKayitSayisi){
                    header("Location:index.php?SKI=3"); //Çalıştı
                    exit();
                }
            }else{
                header("Location:index.php?SKI=61"); //hata
                exit();
            }
    }else{
        header("Location:index.php?SKI=61"); // hata
        exit();
    }
    }else{
        header("Location:index.php?SKI=61"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>