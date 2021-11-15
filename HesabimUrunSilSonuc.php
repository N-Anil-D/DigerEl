<?php 
if(isset($_SESSION["Kullanici"])){

    if(isset($_GET["TA"])){
    $TabloAdi = GuvenlikFiltresi($_GET["TA"]);
    }else{
        $TabloAdi = "";
    }

    if(isset($_GET["UrunID"])){
        $UrunID = SadeceSayilar($_GET["UrunID"]);
    }else{
        $UrunID = "";
    }
    if(($TabloAdi != "") and ($UrunID != "")){
    
        $KayitCek = $DataBaseConnection->query("SELECT * FROM $TabloAdi WHERE id = $UrunID LIMIT 1");
        $KayitVarsa = $KayitCek->num_rows;
        if($KayitVarsa){
            while($UrunKayitlariYaz = $KayitCek->fetch_assoc()){
                $UrunVaryantBasligi  = GeriDöndür($UrunKayitlariYaz["VaryantBasligi"]);
                $UrunMenuAdi         = GeriDöndür($UrunKayitlariYaz["MenuAdi"]);
                $UrunAdedi           = GeriDöndür($UrunKayitlariYaz["UrunAdedi"]);
                
                $UrunuKaldir     = $DataBaseConnection->query("UPDATE $TabloAdi SET Durumu = 0 WHERE id = $UrunID LIMIT 1");
                $UrunGuncelle    = $DataBaseConnection->affected_rows;
                
                $Menu            = $DataBaseConnection->query("SELECT * FROM menuler WHERE TabloAdi = '$TabloAdi' AND  MenuAdi = '$UrunMenuAdi' LIMIT 1");
                $MenuCek = $Menu->fetch_assoc();
                $UstId   = $MenuCek["ustID"];
                $MenudenKaldir   = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi = UrunSayisi-1 WHERE id = '$UstId' LIMIT 1");
                
                $MenudenKaldir   = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi = UrunSayisi-1 WHERE MenuAdi = '$UrunMenuAdi' LIMIT 1");
                $MenuGuncelle    = $DataBaseConnection->affected_rows;

                $VaryantiSifirla = $DataBaseConnection->query("UPDATE urunvaryantlari SET StokAdedi = 0 WHERE TabloAdi = '$TabloAdi' AND UrunID = $UrunID");
                $VaryantGuncelle = $DataBaseConnection->affected_rows;
                
                $SepetteVarsaSil = $DataBaseConnection->query("DELETE FROM sepet WHERE TabloAdi = '$TabloAdi' AND UrunID = $UrunID");
                $SepetSilSayisi  = $DataBaseConnection->affected_rows;

                $FavorideVarsaSil= $DataBaseConnection->query("DELETE FROM favoriler WHERE TabloAdi = '$TabloAdi' AND Urunid = $UrunID");
                $FavoriSilSayisi = $DataBaseConnection->affected_rows;
            
            }
                
            
            if($UrunGuncelle>0 or $SepetSilSayisi>0 or $FavoriSilSayisi>0){
                
                if($MenuGuncelle>0){
                    header("Location:Urunlerim/1");
                    exit();
                }else{
                    header("Location:UrunuKaldirHata/48 --- Ürün veritabanından silindi ama menülerde bir değişiklik yapılmadı "); //hata
                    exit();
                }
                
            }else{
                header("Location:UrunuKaldirHata/53 Hiç bir değişiklik yapılmadı"); //hata
                exit();
            }      
        }else{
            header("Location:UrunuKaldirHata/63 Kayıt Yok"); //hata
            exit();
        }
    }else{
        header("Location:UrunuKaldirHata/67 post verilerli boş"); // hata
        exit();
    }
}else{
    header("Location:AnaSayfa");
    exit();
} ?>