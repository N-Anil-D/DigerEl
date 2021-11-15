<?php 
if(isset($_SESSION["Yonetici"])){
                    
    if(isset($_GET["YorID"])){
        $YorumID = SadeceSayilar($_GET["YorID"]);
    }else{
        $YorumID = "";
    }

    if($YorumID != ""){

        $KayitCek = $DataBaseConnection->prepare("SELECT * FROM yorumlar WHERE id = ? LIMIT 1");
        $KayitCek->bind_param("i", $YorumID);
        $KayitCek->execute();
        $KayitCek->bind_result($Yorum_id,$Yorum_TabloAdi,$Yorum_Urunid,$Yorum_UyeID,$Yorum_Puan,$Yorum_Yorum,$Yorum_YorumTarihi,$Yorum_IPadresi);
        while($KayitCek->fetch()){

        $XX = "Silinecek";
        }
        if($XX == "Silinecek"){

            $KayitSil = $DataBaseConnection->prepare("DELETE FROM yorumlar WHERE id = ? LIMIT 1");
            $KayitSil->bind_param("i", $YorumID);
            $KayitSil->execute();
            $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

            if($SilinenKayitSayisi){
                header("Location:index.php?SKI=3"); //çalıştı
                exit();
            }else{
                header("Location:index.php?SKI=73"); //hata
                exit();
            }
        }else{
            header("Location:index.php?SKI=73"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=73"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>