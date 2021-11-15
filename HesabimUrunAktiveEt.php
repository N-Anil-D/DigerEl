<?php 
if(isset($_SESSION["Kullanici"])){

    if(isset($_GET["UrunID"])){
        $UrunID = SadeceSayilar($_GET["UrunID"]);
    }else{
        $UrunID = "";
    }
    //--------------------------------------------
    if(isset($_GET["TA"])){
        $TabloAdi = GuvenlikFiltresi($_GET["TA"]);
    }else{
        $TabloAdi = "";
    }
    //--------------------------------------------
    if(($TabloAdi != "") and ($UrunID != "")){
    
        $KayitCek = $DataBaseConnection->query("SELECT * FROM $TabloAdi WHERE id = '$UrunID' LIMIT 1");
        $KayitVarsa = $KayitCek->num_rows;
        if($KayitVarsa){
            $UrunAktiveEt = $DataBaseConnection->query("UPDATE $TabloAdi SET Durumu=1 WHERE id= '$UrunID' LIMIT 1");
            $GuncellendiMi= $DataBaseConnection->affected_rows;
            if($GuncellendiMi>0){
                
                if($MenuGuncelle>0){
                    header("Location:Urunlerim/1");
                    exit();
                }else{
                    header("Location:Urunlerim/1"); //hata
                    exit();
                }
                
            }else{
                header("Location:Urunlerim/1"); //hata
                exit();
            }      
        }else{
            header("Location:Urunlerim/1"); //hata
            exit();
        }
    }else{
        header("Location:Urunlerim/1"); // hata
        exit();
    }
}else{
    header("Location:AnaSayfa");
    exit();
} ?>