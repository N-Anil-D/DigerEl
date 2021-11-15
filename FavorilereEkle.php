<?php 
if(isset($_SESSION["Kullanici"])){
    if(isset($_GET["UID"]) and isset($_GET["TA"])){
        $GelenUrunID   = SadeceSayilar($_GET["UID"]);
        $GelenTabloAdi = GuvenlikFiltresi($_GET["TA"]);

//-------------------------------------------------------------------------------------

    
        if(($GelenUrunID != "") and ($GelenTabloAdi != "")){
        
   
            $FavoriVarmi   = $DataBaseConnection->query("SELECT * FROM favoriler WHERE TabloAdi = '$GelenTabloAdi' AND Urunid = $GelenUrunID AND UyeID = $Uyeid ");
            $BuFavoriVarsa = $FavoriVarmi->num_rows;
            if($BuFavoriVarsa>0){
                header("Location:ZatenFavorim");//Favori zaten ekliyse
                exit();
            }
        
        
            $FavoriEkleQuery = $DataBaseConnection->prepare("INSERT INTO favoriler (TabloAdi, Urunid, UyeID, FavEklemeTarihi) VALUES(?, ?, ?, ?) ");
            $FavoriEkleQuery->bind_param("siii", $GelenTabloAdi, $GelenUrunID ,$Uyeid, $zaman);
            $FavoriEkleQuery->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

        if($etkilenenKayitSayisi>0){
            header("Location:FavorilereEkleBasarili");//tamam
            exit();
        }else{
            header("Location:FavorilereEkleBasarisiz");//hata
            exit();
        }
    }else{    
        header("Location:FavorilereEkleBasarisiz");//eksik bilgi
        exit();
    }
}else{    //Get verileri yoksa    
    header("Location:AnaSayfa");
    exit();
}
}else{    //Kullanıcı yoksa
    header("Location:AnaSayfa");
    exit();
}
?>