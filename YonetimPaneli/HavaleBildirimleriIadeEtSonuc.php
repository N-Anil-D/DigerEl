<?php 
if(isset($_SESSION["Yonetici"])){
                    
    if(isset($_GET["HBID"])){
        $HB_ID = SadeceSayilar($_GET["HBID"]);
    }else{
        $HB_ID = "";
    }

    if($HB_ID != ""){
    
        $KayitCek = $DataBaseConnection->prepare("SELECT * FROM havalebildirimleri WHERE id = ? AND durum NOT LIKE '%İade%' LIMIT 1");
        $KayitCek->bind_param("i", $HB_ID);
        $KayitCek->execute();
        $KayitCek->bind_result($HB_id,$HB_BankaAdi,$HB_AdiSoyadi,$HB_EmailAdresi,$HB_TelefonNum,$HB_Aciklama,$HB_islemTarihi,$HB_durum);
        while($KayitCek->fetch()){
            $X = "Kayitli";
        }
        if($X == "Kayitli"){
            
            $Durumu   = "İade";
            $KayitSil = $DataBaseConnection->prepare("UPDATE havalebildirimleri SET durum = ? WHERE id = ? LIMIT 1");
            $KayitSil->bind_param("si", $Durumu,$HB_ID);
            $KayitSil->execute();
            $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

            
            if($SilinenKayitSayisi){
                header("Location:index.php?SKI=3");
                exit();
            }else{
                header("Location:index.php?SKI=78"); //hata
                exit();
            }
         }else{
            header("Location:index.php?SKI=78"); //hata
            exit();
         }
    }else{
        header("Location:index.php?SKI=78"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
}


?>