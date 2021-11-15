<?php if(isset($_SESSION["Yonetici"])){
                    
if(isset($_GET["SiparisNum"])){
    $SiparisNum = SadeceSayilar($_GET["SiparisNum"]);
}else{
    $SiparisNum = "";
}

    if($SiparisNum != ""){
    $TabloGuncelle =0;
    $Urun = $DataBaseConnection->query("SELECT * FROM siparisler WHERE SiparisNumarasi = $SiparisNum");
    while($UrunBilgileri = $Urun->fetch_assoc()){
        $Sip_TabloAdi           = GeriDöndür($UrunBilgileri["TabloAdi"]);
        $Sip_UrunID             = GeriDöndür($UrunBilgileri["UrunID"]);
        $Sip_UrunAdedi          = GeriDöndür($UrunBilgileri["UrunAdedi"]);
        $Sip_VaryantBasligi     = GeriDöndür($UrunBilgileri["VaryantBasligi"]);
        $Sip_VaryantSecimi      = GeriDöndür($UrunBilgileri["VaryantSecimi"]);
        
        $UrunTablosu = $DataBaseConnection->query("SELECT * FROM $Sip_TabloAdi WHERE id = $Sip_UrunID LIMIT 1");
        $UrunTablosundakiBilgiler = $UrunTablosu->fetch_assoc();
        $UrunDurumu  = $UrunTablosundakiBilgiler["Durumu"];
        $UrunMenuAdi = $UrunTablosundakiBilgiler["MenuAdi"];

        if($UrunDurumu==0){
            $MenuErisimi  = $DataBaseConnection->query("SELECT * FROM menuler WHERE TabloAdi='$Sip_TabloAdi' AND MenuAdi = '$UrunMenuAdi' LIMIT 1");
            $MenuBilgiler = $MenuErisimi->fetch_assoc();
            $ustID  = $MenuBilgiler["ustID"];
            $MenuGuncelle = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi+1 WHERE TabloAdi='$Sip_TabloAdi' AND MenuAdi = '$UrunMenuAdi' LIMIT 1");
            $MenuGuncelle2= $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi+1 WHERE id = $ustID LIMIT 1");
        }
        
        $UrunAdediGuncelle = $DataBaseConnection->query("UPDATE $Sip_TabloAdi SET UrunAdedi=UrunAdedi+$Sip_UrunAdedi, Durumu = 1, ToplamSatisSayisi=ToplamSatisSayisi-$Sip_UrunAdedi WHERE id='$Sip_UrunID' LIMIT 1");
        
        if($Sip_VaryantBasligi!= "" and $Sip_VaryantSecimi!= ""){
            $SiparisVaryant     = $DataBaseConnection->query("UPDATE urunvaryantlari SET StokAdedi=StokAdedi+$Sip_UrunAdedi WHERE id = '$Sip_VaryantSecimi' LIMIT 1");
        }
        $TabloGuncelle++;
    }
    
    if($TabloGuncelle>0){
    
        $sifir = 0;
        $KayitSil = $DataBaseConnection->prepare("DELETE FROM siparisler WHERE KargoDurumu = ? AND SiparisNumarasi = ? AND OnayDurumu = ?");
        $KayitSil->bind_param("iii", $sifir,$SiparisNum,$sifir);
        $KayitSil->execute();
        $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

        if($SilinenKayitSayisi){
                header("Location:index.php?SKI=3"); //çalıştı
                exit();
            }else{
                header("Location:index.php?SKI=102"); //hata
                exit();
            }
        }else{
            header("Location:index.php?SKI=102"); // hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=102"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>