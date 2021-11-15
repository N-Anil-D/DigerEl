<?php 
if(isset($_SESSION["Kullanici"])){ 
    
    if(isset($_POST["TA"])){
        $AlinanUrunYorumYapTablo = GuvenlikFiltresi($_POST["TA"]);
    }else{
        $AlinanUrunYorumYapTablo = "";
    }
//--------------------------------------------

    if(isset($_POST["UID"])){
        $AlinanUruneYorumYapUrunID = SadeceSayilar($_POST["UID"]);
    }else{
        $AlinanUruneYorumYapUrunID = "";
    }
//--------------------------------------------

    if(isset($_POST["Puan"])){
        $AlicininUrunePuani = SadeceSayilar($_POST["Puan"]);
    }else{
        $AlicininUrunePuani = "";
    }
//-------------------------------------------------------------------------------------
    if(isset($_POST["yorum"])){
        $AlicininUruneYorumu = GuvenlikFiltresi($_POST["yorum"]);
    }else{
        $AlicininUruneYorumu = "";
    }
//-------------------------------------------------------------------------------------

    if(($AlinanUrunYorumYapTablo != "") and ($AlinanUruneYorumYapUrunID != "") and ($AlicininUrunePuani != "") and ($AlicininUruneYorumu != "")){
        
            $YorumEkleQuery = $DataBaseConnection->prepare("INSERT INTO yorumlar (TabloAdi, Urunid, UyeID, Puan, Yorum, YorumTarihi, YorumYapaninIPadresi) VALUES(?, ?, ?, ?, ?, ?, ?)");
            $YorumEkleQuery->bind_param("siiisis", $AlinanUrunYorumYapTablo, $AlinanUruneYorumYapUrunID, $Uyeid ,$AlicininUrunePuani, $AlicininUruneYorumu, $zaman, $IPAdresi);
            $YorumEkleQuery->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

            if($etkilenenKayitSayisi>0){
            
                $UrunGuncelleme = $DataBaseConnection->query("UPDATE $AlinanUrunYorumYapTablo SET YorumSayisi = YorumSayisi+1, ToplamYorumPuani=ToplamYorumPuani+$AlicininUrunePuani WHERE id = $AlinanUruneYorumYapUrunID LIMIT 1");
                $etkilenenKayitSayisi2 = $DataBaseConnection->affected_rows;
                if($etkilenenKayitSayisi2>0){
                    header("Location:SipariseYorumYapFBasarili");//tamam
                    exit();
                }

                header("Location:SipariseYorumYapFBasarisiz");//hata
                exit();

        }else{
            header("Location:SipariseYorumYapFBasarisiz");//hata
            exit();
        }
    }else{    
        header("Location:SipariseYorumYapFEksikVeri");//eksik bilgi
        exit();
    }
}else{    
    header("Location:AnaSayfa");
    exit();
}
?>