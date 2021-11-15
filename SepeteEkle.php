<?php 
if(isset($_SESSION["Kullanici"])){
    if(isset($_POST["UID"]) and isset($_POST["TA"])){
        $GelenUrunID   = SadeceSayilar($_POST["UID"]);
        $GelenTabloAdi = GuvenlikFiltresi($_POST["TA"]);
    }else{    
        header("Location:SepeteEklemeBasarisiz");//eksik bilgi
        exit();
    }
//------------------------------------------------------------------------------------- 

    if(isset($_POST["varyant"])){
        $Gelenvaryant = SadeceSayilar($_POST["varyant"]);
    }else{
        $Gelenvaryant = "";
    }
//------------------------------------------------------------------------------------- 
    
    $UrunuKontrolEt    = $DataBaseConnection->query("SELECT * FROM $GelenTabloAdi WHERE id = $GelenUrunID AND Durumu>0 LIMIT 1");
    $StokVarMi         = $UrunuKontrolEt->num_rows;
    $UrunSayisinaBak   = $UrunuKontrolEt->fetch_assoc();
    $TablodanUrunAdedi = $UrunSayisinaBak["UrunAdedi"];
    
    if($StokVarMi>0 and $TablodanUrunAdedi>0){


        if(($GelenUrunID != "") and ($GelenTabloAdi != "")){

            $VaryantStokKontrol = $DataBaseConnection->query("SELECT * FROM sepet WHERE UyeID = $Uyeid ORDER BY id DESC LIMIT 1");
            $SepetteUrunVarMi   = $VaryantStokKontrol->num_rows;


            if($SepetteUrunVarMi>0){//Sepette eklenmiş herhangi bir ürün VARSA

                $BireBirAyniUrunVarmiQ = $DataBaseConnection->query("SELECT * FROM sepet WHERE UyeID = $Uyeid AND TabloAdi = '$GelenTabloAdi' AND UrunID = $GelenUrunID AND VaryantSecimi = '$Gelenvaryant' LIMIT 1");
                $BireBirAyniUrun       = $BireBirAyniUrunVarmiQ->num_rows;

                if($BireBirAyniUrun>0){//Eklenmek istenen ürünün birebir aynısı sepette zaten VARSA
                    $XX = $BireBirAyniUrunVarmiQ->fetch_assoc();
                    $VarOlanUrununIDsi = $XX["id"];
                    $SepetikiVarOlanUrunuGuncelle = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi = UrunAdedi+1 WHERE id = $VarOlanUrununIDsi");
                    $SepetGuncellendiMi = $DataBaseConnection->affected_rows;
                    if($SepetGuncellendiMi){
                        header("Location:Sepetim");//İşlem BAŞARILI SEPETİM E GİT
                        exit();
                    }else{    
                        header("Location:SepeteEklemeBasarisiz");//Hata
                        exit();
                    }


                }else{//Eklenmek istenen ürünün birebir aynısı sepette zaten YOKSA - AMA sepette ürün var
                    $bir="1";
                    $SepeteEkleQ = $DataBaseConnection->prepare("INSERT INTO sepet (UyeID, TabloAdi, UrunID, UrunAdedi, VaryantSecimi) VALUES(?, ?, ?, ?, ?) ");
                    $SepeteEkleQ->bind_param("isiis", $Uyeid, $GelenTabloAdi, $GelenUrunID, $bir,$Gelenvaryant);
                    $SepeteEkleQ->execute();
                    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
                    $SonEklenenKayitID    = $SepeteEkleQ->insert_id;

                    if($etkilenenKayitSayisi>0){
                        $SepetiGuncelle      = $DataBaseConnection->query("UPDATE sepet SET SepetNumarasi = $SonEklenenKayitID WHERE UyeID = $Uyeid");
                        $SepetGuncellendiMi  = $DataBaseConnection->affected_rows;

                    if($SepetGuncellendiMi){
                        header("Location:Sepetim");//İşlem BAŞARILI SEPETİM E GİT
                        exit();
                    }else{    
                        header("Location:SepeteEklemeBasarisiz");//Hata
                        exit();
                    }

                    }else{    
                        header("Location:SepeteEklemeBasarisiz");//Hata
                        exit();
                    }
                }


            }else{//Sepette eklenmiş herhangi bir ürün YOKSA - hiç yok

                $bir="1";
                $SepeteEkleQ = $DataBaseConnection->prepare("INSERT INTO sepet (UyeID, TabloAdi, UrunID, UrunAdedi, VaryantSecimi) VALUES(?, ?, ?, ?, ?) ");
                $SepeteEkleQ->bind_param("isiis", $Uyeid, $GelenTabloAdi, $GelenUrunID, $bir,$Gelenvaryant);
                $SepeteEkleQ->execute();
                $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
                $SonEklenenKayitID    = $SepeteEkleQ->insert_id;

                if($etkilenenKayitSayisi>0){
                    $SepetiGuncelle     = $DataBaseConnection->query("UPDATE sepet SET SepetNumarasi = $SonEklenenKayitID WHERE UyeID = $Uyeid");
                    $SepetGuncellendiMi = $DataBaseConnection->affected_rows;

                    if($SepetGuncellendiMi){
                        header("Location:Sepetim");//İşlem BAŞARILI SEPETİM E GİT
                        exit();
                    }else{    
                        header("Location:SepeteEklemeBasarisiz");//Hata
                        exit();
                    }
                }else{    
                    header("Location:SepeteEklemeBasarisiz");//Hata
                    exit();
                }

            }


        }else{    
            header("Location:SepeteEklemeBasarisiz");//eksik bilgi
            exit();
        }
    }else{    //Stok yoksa
        header("Location:UrunStoktaYok");
        exit();
    }
}else{    //Kullanıcı yoksa
    header("Location:UyeGirisiGerekli");
    exit();
}
  ?>