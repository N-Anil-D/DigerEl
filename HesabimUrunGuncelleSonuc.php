<?php namespace Verot\Upload;
    
if(isset($_SESSION["Kullanici"])){


    if(isset($_POST["Tablosu"])){
        $Tablosu = GuvenlikFiltresi($_POST["Tablosu"]);
    }else{
        $Tablosu = "";
    }
    if(isset($_POST["UrunID"])){
        $UrunIDNum = SadeceSayilar($_POST["UrunID"]);
    }else{
        $UrunIDNum = "";
    }
    /*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    if($Tablosu=="Arac"){
        
        if(isset($_POST["UrunAdi"])){
            $GelenUrunAdi = GuvenlikFiltresi($_POST["UrunAdi"]);
        }else{
            $GelenUrunAdi = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunAdedi"])){
            $GelenUrunAdedi = GuvenlikFiltresi($_POST["UrunAdedi"]);
        }else{
            $GelenUrunAdedi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Sehir"])){
            $GelenSehir = GuvenlikFiltresi($_POST["Sehir"]);
            $GelenSehir = mb_strtoupper($GelenSehir, "UTF-8");
        }else{
            $GelenSehir = "";
        }
        //--------------------------------------------
        if(isset($_POST["Konumu"])){
            $GelenKonumu = GuvenlikFiltresi($_POST["Konumu"]);
            $GelenKonumu = mb_strtoupper($GelenKonumu, "UTF-8");
        }else{
            $GelenKonumu = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunFiyati"])){
            $GelenUrunFiyati = GuvenlikFiltresi($_POST["UrunFiyati"]);
            $GelenUrunFiyati = SayiNokta($GelenUrunFiyati);
        }else{
            $GelenUrunFiyati = 0;
        }
        //--------------------------------------------
        if(isset($_POST["ParaBirimi"])){
            $GelenParaBirimi = GuvenlikFiltresi($_POST["ParaBirimi"]);
        }else{
            $GelenParaBirimi = "";
        }
        //--------------------------------------------
        if(isset($_POST["KargoUcreti"]) and ($_POST["KargoUcreti"] != "")){
            $GelenKargoUcreti = SadeceSayilar($_POST["KargoUcreti"]);
        }else{
            $GelenKargoUcreti = 0;
        }
        //--------------------------------------------
        if(isset($_POST["Kimden"])){
            $GelenKimden = GuvenlikFiltresi($_POST["Kimden"]);
        }else{
            $GelenKimden = "";
        }
        //--------------------------------------------
        if(isset($_POST["Marka"])){
            $GelenMarka = GuvenlikFiltresi($_POST["Marka"]);
        }else{
            $GelenMarka = "";
        }
        //--------------------------------------------
        if(isset($_POST["Seri"])){
            $GelenSeri = GuvenlikFiltresi($_POST["Seri"]);
        }else{
            $GelenSeri = "";
        }
        //--------------------------------------------
        if(isset($_POST["Model"])){
            $GelenModel = GuvenlikFiltresi($_POST["Model"]);
        }else{
            $GelenModel = "";
        }
        //--------------------------------------------
        if(isset($_POST["Yil"]) and ($_POST["Yil"] != "")){
            $GelenYil = SadeceSayilar($_POST["Yil"]);
        }else{
            $GelenYil = 0;
        }
        //--------------------------------------------
        if(isset($_POST["YakitTipi"])){
            $GelenYakitTipi = GuvenlikFiltresi($_POST["YakitTipi"]);
        }else{
            $GelenYakitTipi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VitesTipi"])){
            $GelenVitesTipi = GuvenlikFiltresi($_POST["VitesTipi"]);
        }else{
            $GelenVitesTipi = "";
        }
        //--------------------------------------------
        if(isset($_POST["MotorHacmi"])){
            $GelenMotorHacmi = GuvenlikFiltresi($_POST["MotorHacmi"]);
            $GelenMotorHacmi = $GelenMotorHacmi." cc";
        }else{
            $GelenMotorHacmi = "";
        }
        //--------------------------------------------
        if(isset($_POST["MotorGucu"])){
            $GelenMotorGucu = GuvenlikFiltresi($_POST["MotorGucu"]);
            $GelenMotorGucu = $GelenMotorGucu." HP";
        }else{
            $GelenMotorGucu = "";
        }
        //--------------------------------------------
        if(isset($_POST["KM"])){
            $GelenKM = SadeceSayilar($_POST["KM"]);
            $GelenKM = ceil($GelenKM);  
            $GelenKM = $GelenKM." KM";
        }else{
            $GelenKM = "";
        }
        //--------------------------------------------
        if(isset($_POST["Renk"])){
            $GelenRenk = GuvenlikFiltresi($_POST["Renk"]);
        }else{
            $GelenRenk = "";
        }

        //--------------------------------------------
        if(isset($_POST["Takas"])){
            $GelenTakas = SadeceSayilar($_POST["Takas"]);
        }else{
            $GelenTakas = "";
        }
        //--------------------------------------------
        if(isset($_POST["DegisenParca"])){
            $GelenDegisenParca = GuvenlikFiltresi($_POST["DegisenParca"]);
        }else{
            $GelenDegisenParca = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunAciklamasi"])){
            $UrunAciklamasi = GuvenlikFiltresi($_POST["UrunAciklamasi"]);
        }else{
            $UrunAciklamasi = "";
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiBIR"])){
            $UrunResmiBIR = $_FILES["UrunResmiBIR"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiIKI"])){
            $UrunResmiIKI = $_FILES["UrunResmiIKI"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiUC"])){
            $UrunResmiUC = $_FILES["UrunResmiUC"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiDORT"])){
            $UrunResmiDORT = $_FILES["UrunResmiDORT"];
        }
        //--------------------------------------------
        if(isset($_POST["VaryantSayisi"])){
            $VaryantSayisi = GuvenlikFiltresi($_POST["VaryantSayisi"]);
        }else{
            $VaryantSayisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantBasligi"])){
            $VaryantBasligi = GuvenlikFiltresi($_POST["VaryantBasligi"]);
        }else{
            $VaryantBasligi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi1"])){
            $VaryantIcerigi1 = GuvenlikFiltresi($_POST["VaryantIcerigi1"]);
        }else{
            $VaryantIcerigi1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi2"])){
            $VaryantIcerigi2 = GuvenlikFiltresi($_POST["VaryantIcerigi2"]);
        }else{
            $VaryantIcerigi2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi3"])){
            $VaryantIcerigi3 = GuvenlikFiltresi($_POST["VaryantIcerigi3"]);
        }else{
            $VaryantIcerigi3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi4"])){
            $VaryantIcerigi4 = GuvenlikFiltresi($_POST["VaryantIcerigi4"]);
        }else{
            $VaryantIcerigi4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi5"])){
            $VaryantIcerigi5 = GuvenlikFiltresi($_POST["VaryantIcerigi5"]);
        }else{
            $VaryantIcerigi5 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari1"])){
            $VaryantMiktari1 = SadeceSayilar($_POST["VaryantMiktari1"]);
        }else{
            $VaryantMiktari1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari2"])){
            $VaryantMiktari2 = SadeceSayilar($_POST["VaryantMiktari2"]);
        }else{
            $VaryantMiktari2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari3"])){
            $VaryantMiktari3 = SadeceSayilar($_POST["VaryantMiktari3"]);
        }else{
            $VaryantMiktari3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari4"])){
            $VaryantMiktari4 = SadeceSayilar($_POST["VaryantMiktari4"]);
        }else{
            $VaryantMiktari4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari5"])){
            $VaryantMiktari5 = SadeceSayilar($_POST["VaryantMiktari5"]);
        }else{
            $VaryantMiktari5 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID1"])){
            $EskiVaryantID1 = SadeceSayilar($_POST["EskiVaryantID1"]);
        }else{
            $EskiVaryantID1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID2"])){
            $EskiVaryantID2 = SadeceSayilar($_POST["EskiVaryantID2"]);
        }else{
            $EskiVaryantID2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID3"])){
            $EskiVaryantID3 = SadeceSayilar($_POST["EskiVaryantID3"]);
        }else{
            $EskiVaryantID3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID4"])){
            $EskiVaryantID4 = SadeceSayilar($_POST["EskiVaryantID4"]);
        }else{
            $EskiVaryantID4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID5"])){
            $EskiVaryantID5 = SadeceSayilar($_POST["EskiVaryantID5"]);
        }else{
            $EskiVaryantID5 = "";
        }

        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenKonumu!="") and ($GelenSehir!="")  and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="") and ($GelenKimden!="") and ($GelenMarka!="") and ($GelenYakitTipi!="")){
            
            $UrunKonumu = $GelenSehir." / ".$GelenKonumu;

            $AracGuncelle = $DataBaseConnection->prepare("UPDATE arac SET UrunAdi = ?, UrunAdedi = ?, Konumu = ?, UrunFiyati = ?, ParaBirimi = ?, KargoUcreti = ?, Kimden = ?, Marka = ?, Seri = ?, Model = ?, Yil = ?, YakitTipi = ?, VitesTipi = ?, MotorHacmi = ?, MotorGucu = ?, KM = ?, Renk = ?, Takas = ?, BoyaDegisen = ?,  UrunAciklamasi = ?, VaryantBasligi = ?, MenuAdi = ? WHERE id = $UrunIDNum");
            $AracGuncelle->bind_param("sisssissssissssssissss", $GelenUrunAdi, $GelenUrunAdedi, $UrunKonumu, $GelenUrunFiyati, $GelenParaBirimi, $GelenKargoUcreti, $GelenKimden, $GelenMarka, $GelenSeri, $GelenModel, $GelenYil, $GelenYakitTipi, $GelenVitesTipi, $GelenMotorHacmi, $GelenMotorGucu, $GelenKM, $GelenRenk, $GelenTakas, $GelenDegisenParca, $UrunAciklamasi, $VaryantBasligi, $GelenMarka);
            $AracGuncelle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

            $KayitCek = $DataBaseConnection->query("SELECT * FROM arac WHERE id = $UrunIDNum LIMIT 1");
            $CalistiMi = $KayitCek->num_rows;
            if($CalistiMi){ 
                $UrunInfo   = $KayitCek->fetch_assoc();
                $UrunResmi1 = $UrunInfo["UrunResmiBIR"];
                $UrunResmi2 = $UrunInfo["UrunResmiIKI"];
                $UrunResmi3 = $UrunInfo["UrunResmiUC"];
                $UrunResmi4 = $UrunInfo["UrunResmiDORT"];
                $UrunMenuAdi= $UrunInfo["MenuAdi"];
            }
            
            if(($UrunResmiBIR["name"] != "") and ($UrunResmiBIR["type"] != "") and ($UrunResmiBIR["tmp_name"] != "") and ($UrunResmiBIR["error"] == 0) and ($UrunResmiBIR["size"] > 0)){
                $ResimAdi1              = CokluisimOlustur(time()-5);
                $YeniResimAdi1          = $ResimAdi1.".png";
                $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi1;
                
                $BuDosyayiSil   = $UrunResmi1;
                $ResimSilindi1  = unlink($BuDosyayiSil);
                if($ResimSilindi1 == 1){
                    $UrunResmiBIR    = new upload($UrunResmiBIR, "tr-TR");
                    if($UrunResmiBIR->uploaded){
                        $UrunResmiBIR->mime_magic_check       = true;            
                        $UrunResmiBIR->allowed                = array("image/*"); 
                        $UrunResmiBIR->image_convert          = "png";
                        $UrunResmiBIR->image_quality          = 100;
                        $UrunResmiBIR->file_overwrite         = true;
                        $UrunResmiBIR->image_background_color = null;
                        $UrunResmiBIR->file_new_name_body     = $ResimAdi1;
                        $UrunResmiBIR->image_resize           = true;
                        $UrunResmiBIR->image_ratio            = true;
                        $UrunResmiBIR->image_y                = 440;
                        $UrunResmiBIR->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMarka);        
                        if($UrunResmiBIR->processed){
                            $Resim1Guncelle = $DataBaseConnection->query("UPDATE arac SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE id = $UrunIDNum");
                            $SiparisResim1  = $DataBaseConnection->query("UPDATE siparisler SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE UrunID = $UrunIDNum AND TabloAdi='arac' ");
                            $UrunResmiBIR->clean();
                        }else{
                            header("Location:UrunGuncelleBasarisiz/316");
                            exit();
                        }
                    }
                }
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
                $ResimAdi2              = CokluisimOlustur(time()-13);
                $YeniResimAdi2          = $ResimAdi2.".png";
                $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi2;
                
                $BuDosyayiSil   = $UrunResmi2;
                $ResimSilindi2  = unlink($BuDosyayiSil);
                $UrunResmiIKI    = new upload($UrunResmiIKI, "tr-TR");
                if($UrunResmiIKI->uploaded){
                    $UrunResmiIKI->mime_magic_check       = true;            
                    $UrunResmiIKI->allowed                = array("image/*"); 
                    $UrunResmiIKI->image_convert          = "png";
                    $UrunResmiIKI->image_quality          = 100;
                    $UrunResmiIKI->file_overwrite         = true;
                    $UrunResmiIKI->image_background_color = null;
                    $UrunResmiIKI->file_new_name_body     = $ResimAdi2;
                    $UrunResmiIKI->image_resize           = true;
                    $UrunResmiIKI->image_ratio            = true;
                    $UrunResmiIKI->image_y                = 440;
                    $UrunResmiIKI->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMarka);        
                    if($UrunResmiIKI->processed){
                        $Resim2Guncelle = $DataBaseConnection->query("UPDATE arac SET UrunResmiIKI = '$Resim2_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiIKI->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/347");
                        exit();
                    }
                }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
                $ResimAdi3              = CokluisimOlustur(time()-57);
                $YeniResimAdi3          = $ResimAdi3.".png";
                $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi3;
                
                $BuDosyayiSil   = $UrunResmi3;
                $ResimSilindi3  = unlink($BuDosyayiSil);
                $UrunResmiUC    = new upload($UrunResmiUC, "tr-TR");
                if($UrunResmiUC->uploaded){
                    $UrunResmiUC->mime_magic_check       = true;            
                    $UrunResmiUC->allowed                = array("image/*"); 
                    $UrunResmiUC->image_convert          = "png";
                    $UrunResmiUC->image_quality          = 100;
                    $UrunResmiUC->file_overwrite         = true;
                    $UrunResmiUC->image_background_color = null;
                    $UrunResmiUC->file_new_name_body     = $ResimAdi3;
                    $UrunResmiUC->image_resize           = true;
                    $UrunResmiUC->image_ratio            = true;
                    $UrunResmiUC->image_y                = 440;
                    $UrunResmiUC->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMarka);     
                    if($UrunResmiUC->processed){
                        $Resim3Guncelle = $DataBaseConnection->query("UPDATE arac SET UrunResmiUC = '$Resim3_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiUC->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/377");
                        exit();
                    } 
                }
            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
                $ResimAdi4              = CokluisimOlustur(time()+7);
                $YeniResimAdi4          = $ResimAdi4.".png";
                $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi4;
                
                $BuDosyayiSil   = $UrunResmi4;
                $ResimSilindi4  = unlink($BuDosyayiSil);
                $UrunResmiDORT    = new upload($UrunResmiDORT, "tr-TR");
                if($UrunResmiDORT->uploaded){
                    $UrunResmiDORT->mime_magic_check       = true;            
                    $UrunResmiDORT->allowed                = array("image/*"); 
                    $UrunResmiDORT->image_convert          = "png";
                    $UrunResmiDORT->image_quality          = 100;
                    $UrunResmiDORT->file_overwrite         = true;
                    $UrunResmiDORT->image_background_color = null;
                    $UrunResmiDORT->file_new_name_body     = $ResimAdi4;
                    $UrunResmiDORT->image_resize           = true;
                    $UrunResmiDORT->image_ratio            = true;
                    $UrunResmiDORT->image_y                = 440;
                    $UrunResmiDORT->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMarka);    
                    if($UrunResmiDORT->processed){
                        $Resim4Guncelle = $DataBaseConnection->query("UPDATE arac SET UrunResmiDORT = '$Resim4_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiDORT->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/407");
                        exit();
                    } 
                }
            }
                if($etkilenenKayitSayisi or ($VaryantIcerigi1 != "") or ($VaryantIcerigi2 != "") or ($VaryantIcerigi3 != "") or ($VaryantIcerigi4 != "") or ($VaryantIcerigi5 != "") or ($UrunResmiBIR->processed) or ($UrunResmiIKI->processed) or ($UrunResmiUC->processed) or ($UrunResmiDORT->processed)){
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi1',  StokAdedi = $VaryantMiktari1 WHERE id = $EskiVaryantID1");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi2',  StokAdedi = $VaryantMiktari2 WHERE id = $EskiVaryantID2");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi3',  StokAdedi = $VaryantMiktari3 WHERE id = $EskiVaryantID3");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi4',  StokAdedi = $VaryantMiktari4 WHERE id = $EskiVaryantID4");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi5',  StokAdedi = $VaryantMiktari5 WHERE id = $EskiVaryantID5");
                    }
                    header("Location:Urunlerim/1"); //çalıştı
                    exit();
                }else{
                    header("Location:UrunGuncelleBasarisiz/431");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:UrunGuncelleBasarisiz/435"); /* değerler eksik*/
            exit();
        }
    /*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    }elseif($Tablosu=="Konut"){
        
        if(isset($_POST["UrunAdi"])){
            $GelenUrunAdi = GuvenlikFiltresi($_POST["UrunAdi"]);
        }else{
            $GelenUrunAdi = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunAdedi"])){
            $GelenUrunAdedi = GuvenlikFiltresi($_POST["UrunAdedi"]);
        }else{
            $GelenUrunAdedi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Sehir"])){
            $GelenSehir = GuvenlikFiltresi($_POST["Sehir"]);
            $GelenSehir = mb_strtoupper($GelenSehir, "UTF-8");
        }else{
            $GelenSehir = "";
        }
        //--------------------------------------------
        if(isset($_POST["Konumu"])){
            $GelenKonumu = GuvenlikFiltresi($_POST["Konumu"]);
            $GelenKonumu = mb_strtoupper($GelenKonumu, "UTF-8");
        }else{
            $GelenKonumu = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunFiyati"])){
            $GelenUrunFiyati = GuvenlikFiltresi($_POST["UrunFiyati"]);
            $GelenUrunFiyati = SayiNokta($GelenUrunFiyati);
        }else{
            $GelenUrunFiyati = 0;
        }
        //--------------------------------------------
        if(isset($_POST["ParaBirimi"])){
            $GelenParaBirimi = GuvenlikFiltresi($_POST["ParaBirimi"]);
        }else{
            $GelenParaBirimi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Odasayisi"])){
            $GelenOdasayisi = SadeceSayilar($_POST["Odasayisi"]);
        }else{
            $GelenOdasayisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Salonsayisi"])){
            $GelenSalonsayisi = SadeceSayilar($_POST["Salonsayisi"]);
        }else{
            $GelenSalonsayisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Brutm2"])){
            $GelenBrutm2 = SadeceSayilar($_POST["Brutm2"]);
        }else{
            $GelenBrutm2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["Netm2"])){
            $GelenNetm2 = SadeceSayilar($_POST["Netm2"]);
        }else{
            $GelenNetm2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["IsinmaTipi"])){
            $GelenIsinmaTipi = GuvenlikFiltresi($_POST["IsinmaTipi"]);
        }else{
            $GelenIsinmaTipi = "";
        }
        //--------------------------------------------
        if(isset($_POST["MobilyaliMi"])){
            $GelenMobilyaliMi = SadeceSayilar($_POST["MobilyaliMi"]);
        }else{
            $GelenMobilyaliMi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Balkon"])){
            $GelenBalkon = SadeceSayilar($_POST["Balkon"]);
        }else{
            $GelenBalkon = "";
        }
        //--------------------------------------------
        if(isset($_POST["BanyoSayisi"])){
            $GelenBanyoSayisi = SadeceSayilar($_POST["BanyoSayisi"]);
        }else{
            $GelenBanyoSayisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["BoyaliMi"]) and ($_POST["BoyaliMi"]!="")){
            $GelenBoyaliMi = SadeceSayilar($_POST["BoyaliMi"]);
        }else{
            $GelenBoyaliMi = 9;
        }
        //--------------------------------------------
        if(isset($_POST["BinaYasi"]) and ($_POST["BinaYasi"]!="")){
            $GelenBinaYasi = SadeceSayilar($_POST["BinaYasi"]);
        }else{
            $GelenBinaYasi = 999;
        }
        //--------------------------------------------
        if(isset($_POST["Kat"]) and ($_POST["Kat"]!="")){
            $GelenKat = SadeceSayilar($_POST["Kat"]);
        }else{
            $GelenKat = 99;
        }
        //--------------------------------------------
        if(isset($_POST["BinadakiToplamKat"]) and ($_POST["BinadakiToplamKat"]!="")){
            $GelenBinadakiToplamKat = SadeceSayilar($_POST["BinadakiToplamKat"]);
        }else{
            $GelenBinadakiToplamKat = 999;
        }
        //--------------------------------------------
        if(isset($_POST["KrediyeUygunMu"])){
            $GelenKrediyeUygunMu = SadeceSayilar($_POST["KrediyeUygunMu"]);
        }else{
            $GelenKrediyeUygunMu = "";
        }
        //--------------------------------------------
        if(isset($_POST["SuAnkiKullanimDurumu"])){
            $GelenSuAnkiKullanimDurumu = SadeceSayilar($_POST["SuAnkiKullanimDurumu"]);
        }else{
            $GelenSuAnkiKullanimDurumu = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunAciklamasi"])){
            $UrunAciklamasi = GuvenlikFiltresi($_POST["UrunAciklamasi"]);
        }else{
            $UrunAciklamasi = "";
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiBIR"])){
            $UrunResmiBIR = $_FILES["UrunResmiBIR"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiIKI"])){
            $UrunResmiIKI = $_FILES["UrunResmiIKI"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiUC"])){
            $UrunResmiUC = $_FILES["UrunResmiUC"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiDORT"])){
            $UrunResmiDORT = $_FILES["UrunResmiDORT"];
        }
        //--------------------------------------------
        if(isset($_POST["VaryantSayisi"])){
            $VaryantSayisi = GuvenlikFiltresi($_POST["VaryantSayisi"]);
        }else{
            $VaryantSayisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantBasligi"])){
            $VaryantBasligi = GuvenlikFiltresi($_POST["VaryantBasligi"]);
        }else{
            $VaryantBasligi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi1"])){
            $VaryantIcerigi1 = GuvenlikFiltresi($_POST["VaryantIcerigi1"]);
        }else{
            $VaryantIcerigi1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi2"])){
            $VaryantIcerigi2 = GuvenlikFiltresi($_POST["VaryantIcerigi2"]);
        }else{
            $VaryantIcerigi2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi3"])){
            $VaryantIcerigi3 = GuvenlikFiltresi($_POST["VaryantIcerigi3"]);
        }else{
            $VaryantIcerigi3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi4"])){
            $VaryantIcerigi4 = GuvenlikFiltresi($_POST["VaryantIcerigi4"]);
        }else{
            $VaryantIcerigi4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi5"])){
            $VaryantIcerigi5 = GuvenlikFiltresi($_POST["VaryantIcerigi5"]);
        }else{
            $VaryantIcerigi5 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari1"])){
            $VaryantMiktari1 = SadeceSayilar($_POST["VaryantMiktari1"]);
        }else{
            $VaryantMiktari1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari2"])){
            $VaryantMiktari2 = SadeceSayilar($_POST["VaryantMiktari2"]);
        }else{
            $VaryantMiktari2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari3"])){
            $VaryantMiktari3 = SadeceSayilar($_POST["VaryantMiktari3"]);
        }else{
            $VaryantMiktari3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari4"])){
            $VaryantMiktari4 = SadeceSayilar($_POST["VaryantMiktari4"]);
        }else{
            $VaryantMiktari4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari5"])){
            $VaryantMiktari5 = SadeceSayilar($_POST["VaryantMiktari5"]);
        }else{
            $VaryantMiktari5 = "";
        }        
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID1"])){
            $EskiVaryantID1 = SadeceSayilar($_POST["EskiVaryantID1"]);
        }else{
            $EskiVaryantID1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID2"])){
            $EskiVaryantID2 = SadeceSayilar($_POST["EskiVaryantID2"]);
        }else{
            $EskiVaryantID2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID3"])){
            $EskiVaryantID3 = SadeceSayilar($_POST["EskiVaryantID3"]);
        }else{
            $EskiVaryantID3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID4"])){
            $EskiVaryantID4 = SadeceSayilar($_POST["EskiVaryantID4"]);
        }else{
            $EskiVaryantID4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID5"])){
            $EskiVaryantID5 = SadeceSayilar($_POST["EskiVaryantID5"]);
        }else{
            $EskiVaryantID5 = "";
        }

        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenKonumu!="") and ($GelenSehir!="") and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="") and ($GelenOdasayisi!="") and ($GelenSalonsayisi!="") and ($GelenBrutm2!="") and ($GelenNetm2!="") and ($GelenIsinmaTipi!="") and ($GelenMobilyaliMi!="") and ($GelenBalkon!="") and ($GelenBanyoSayisi!="") and ($GelenSuAnkiKullanimDurumu!="")){
            
            $UrunKonumu = $GelenSehir." / ".$GelenKonumu;
            $OdaSalon = $GelenOdasayisi."-".$GelenSalonsayisi;
            $DosyaAdi = $GelenOdasayisi."+".$GelenSalonsayisi;

            $KonutGuncelle = $DataBaseConnection->prepare("UPDATE konut SET UrunAdi = ?,  UrunAdedi = ?,  Konumu = ?,  UrunFiyati = ?,  ParaBirimi = ?,  odasayisi = ?,  Brutm2 = ?,  Netm2 = ?,  isinmaTipi = ?,  MobilyaliMi = ?,  Balkon = ?,  BanyoSayisi = ?,  BoyaliMi = ?,  BinaYasi = ?,  Kat = ?,  BinadakiToplamKat = ?,  KrediyeUygunMu = ?,  SuAnkiKullanimDurumu = ?,  UrunAciklamasi = ?, VaryantBasligi = ?,  MenuAdi = ? WHERE id = $UrunIDNum");
            $KonutGuncelle->bind_param("sissssiisiiiiiiiiisss", $GelenUrunAdi, $GelenUrunAdedi, $UrunKonumu, $GelenUrunFiyati, $GelenParaBirimi, $OdaSalon, $GelenBrutm2, $GelenNetm2, $GelenIsinmaTipi, $GelenMobilyaliMi, $GelenBalkon, $GelenBanyoSayisi, $GelenBoyaliMi, $GelenBinaYasi, $GelenKat, $GelenBinadakiToplamKat, $GelenKrediyeUygunMu, $GelenSuAnkiKullanimDurumu, $UrunAciklamasi, $VaryantBasligi, $OdaSalon);
            $KonutGuncelle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
                
            $KayitCek = $DataBaseConnection->query("SELECT * FROM konut WHERE id = $UrunIDNum LIMIT 1");
            $CalistiMi = $KayitCek->num_rows;
            if($CalistiMi){ 
                $UrunInfo   = $KayitCek->fetch_assoc();
                $UrunResmi1 = $UrunInfo["UrunResmiBIR"];
                $UrunResmi2 = $UrunInfo["UrunResmiIKI"];
                $UrunResmi3 = $UrunInfo["UrunResmiUC"];
                $UrunResmi4 = $UrunInfo["UrunResmiDORT"];
                $UrunMenuAdi= $UrunInfo["MenuAdi"];
            }
            
            if(($UrunResmiBIR["name"] != "") and ($UrunResmiBIR["type"] != "") and ($UrunResmiBIR["tmp_name"] != "") and ($UrunResmiBIR["error"] == 0) and ($UrunResmiBIR["size"] > 0)){
                $ResimAdi1              = CokluisimOlustur(time()-5);
                $YeniResimAdi1          = $ResimAdi1.".png";
                $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi1;
                
                $BuDosyayiSil   = $UrunResmi1;
                $ResimSilindi1  = unlink($BuDosyayiSil);
                if($ResimSilindi1 == 1){
                    $UrunResmiBIR    = new upload($UrunResmiBIR, "tr-TR");
                    if($UrunResmiBIR->uploaded){
                        $UrunResmiBIR->mime_magic_check       = true;            
                        $UrunResmiBIR->allowed                = array("image/*"); 
                        $UrunResmiBIR->image_convert          = "png";
                        $UrunResmiBIR->image_quality          = 100;
                        $UrunResmiBIR->file_overwrite         = true;
                        $UrunResmiBIR->image_background_color = null;
                        $UrunResmiBIR->file_new_name_body     = $ResimAdi1;
                        $UrunResmiBIR->image_resize           = true;
                        $UrunResmiBIR->image_ratio            = true;
                        $UrunResmiBIR->image_y                = 440;
                        $UrunResmiBIR->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$DosyaAdi);        
                        if($UrunResmiBIR->processed){
                            $Resim1Guncelle = $DataBaseConnection->query("UPDATE konut SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE id = $UrunIDNum");
                            $SiparisResim1  = $DataBaseConnection->query("UPDATE siparisler SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE UrunID = $UrunIDNum AND TabloAdi='konut' ");
                            $UrunResmiBIR->clean();
                        }else{
                            header("Location:UrunGuncelleBasarisiz/735");
                            exit();
                        }
                    }
                }
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
                $ResimAdi2              = CokluisimOlustur(time()-13);
                $YeniResimAdi2          = $ResimAdi2.".png";
                $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi2;
                
                $BuDosyayiSil   = $UrunResmi2;
                $ResimSilindi2  = unlink($BuDosyayiSil);
                $UrunResmiIKI    = new upload($UrunResmiIKI, "tr-TR");
                if($UrunResmiIKI->uploaded){
                    $UrunResmiIKI->mime_magic_check       = true;            
                    $UrunResmiIKI->allowed                = array("image/*"); 
                    $UrunResmiIKI->image_convert          = "png";
                    $UrunResmiIKI->image_quality          = 100;
                    $UrunResmiIKI->file_overwrite         = true;
                    $UrunResmiIKI->image_background_color = null;
                    $UrunResmiIKI->file_new_name_body     = $ResimAdi2;
                    $UrunResmiIKI->image_resize           = true;
                    $UrunResmiIKI->image_ratio            = true;
                    $UrunResmiIKI->image_y                = 440;
                    $UrunResmiIKI->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$DosyaAdi);        
                    if($UrunResmiIKI->processed){
                        $Resim2Guncelle = $DataBaseConnection->query("UPDATE konut SET UrunResmiIKI = '$Resim2_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiIKI->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/766");
                        exit();
                    }
                }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
                $ResimAdi3              = CokluisimOlustur(time()-57);
                $YeniResimAdi3          = $ResimAdi3.".png";
                $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi3;
                
                $BuDosyayiSil   = $UrunResmi3;
                $ResimSilindi3  = unlink($BuDosyayiSil);
                $UrunResmiUC    = new upload($UrunResmiUC, "tr-TR");
                if($UrunResmiUC->uploaded){
                    $UrunResmiUC->mime_magic_check       = true;            
                    $UrunResmiUC->allowed                = array("image/*"); 
                    $UrunResmiUC->image_convert          = "png";
                    $UrunResmiUC->image_quality          = 100;
                    $UrunResmiUC->file_overwrite         = true;
                    $UrunResmiUC->image_background_color = null;
                    $UrunResmiUC->file_new_name_body     = $ResimAdi3;
                    $UrunResmiUC->image_resize           = true;
                    $UrunResmiUC->image_ratio            = true;
                    $UrunResmiUC->image_y                = 440;
                    $UrunResmiUC->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$DosyaAdi);     
                    if($UrunResmiUC->processed){
                        $Resim3Guncelle = $DataBaseConnection->query("UPDATE konut SET UrunResmiUC = '$Resim3_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiUC->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/796");
                        exit();
                    } 
                }
            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
                $ResimAdi4              = CokluisimOlustur(time()+7);
                $YeniResimAdi4          = $ResimAdi4.".png";
                $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi4;
                
                $BuDosyayiSil   = $UrunResmi4;
                $ResimSilindi4  = unlink($BuDosyayiSil);
                $UrunResmiDORT    = new upload($UrunResmiDORT, "tr-TR");
                if($UrunResmiDORT->uploaded){
                    $UrunResmiDORT->mime_magic_check       = true;            
                    $UrunResmiDORT->allowed                = array("image/*"); 
                    $UrunResmiDORT->image_convert          = "png";
                    $UrunResmiDORT->image_quality          = 100;
                    $UrunResmiDORT->file_overwrite         = true;
                    $UrunResmiDORT->image_background_color = null;
                    $UrunResmiDORT->file_new_name_body     = $ResimAdi4;
                    $UrunResmiDORT->image_resize           = true;
                    $UrunResmiDORT->image_ratio            = true;
                    $UrunResmiDORT->image_y                = 440;
                    $UrunResmiDORT->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$DosyaAdi);    
                    if($UrunResmiDORT->processed){
                        $Resim4Guncelle = $DataBaseConnection->query("UPDATE konut SET UrunResmiDORT = '$Resim4_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiDORT->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/825");
                        exit();
                    } 
                }
            }
                if($etkilenenKayitSayisi or ($VaryantIcerigi1 != "") or ($VaryantIcerigi2 != "") or ($VaryantIcerigi3 != "") or ($VaryantIcerigi4 != "") or ($VaryantIcerigi5 != "") or ($UrunResmiBIR->processed) or ($UrunResmiIKI->processed) or ($UrunResmiUC->processed) or ($UrunResmiDORT->processed)){
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi1',  StokAdedi = $VaryantMiktari1 WHERE id = $EskiVaryantID1");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi2',  StokAdedi = $VaryantMiktari2 WHERE id = $EskiVaryantID2");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi3',  StokAdedi = $VaryantMiktari3 WHERE id = $EskiVaryantID3");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi4',  StokAdedi = $VaryantMiktari4 WHERE id = $EskiVaryantID4");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi5',  StokAdedi = $VaryantMiktari5 WHERE id = $EskiVaryantID5");
                    }
                    header("Location:Urunlerim/1"); //çalıştı
                    exit();
                }else{
                    header("Location:UrunGuncelleBasarisiz/850");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:UrunGuncelleBasarisiz/854"); /* veri eksik */ 
            exit();
        }
        
    /*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
    }elseif($Tablosu=="Giyim"){
        
        if(isset($_POST["UrunAdi"])){
            $GelenUrunAdi = GuvenlikFiltresi($_POST["UrunAdi"]);
        }else{
            $GelenUrunAdi = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunAdedi"])){
            $GelenUrunAdedi = GuvenlikFiltresi($_POST["UrunAdedi"]);
        }else{
            $GelenUrunAdedi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Marka"])){
            $GelenMarka = GuvenlikFiltresi($_POST["Marka"]);
        }else{
            $GelenMarka = "";
        }
        //--------------------------------------------
        if(isset($_POST["Kullanilabilirlik"])){
            $GelenKullanilabilirlik = SadeceSayilar($_POST["Kullanilabilirlik"]);
        }else{
            $GelenKullanilabilirlik = "";
        }
        //--------------------------------------------
        if(isset($_POST["Beden"])){
            $GelenBeden = GuvenlikFiltresi($_POST["Beden"]);
            $GelenBeden = mb_strtoupper($GelenBeden, "UTF-8");
        }else{
            $GelenBeden = "";
        }
        //--------------------------------------------
        if(isset($_POST["Renk"])){
            $GelenRenk = GuvenlikFiltresi($_POST["Renk"]);
            $GelenRenk = HerKelimeninIlkHarfiniBuyukHarfYap($GelenRenk);
        }else{
            $GelenRenk = "";
        }
        //--------------------------------------------
        if(isset($_POST["Desen"])){
            $GelenDesen = GuvenlikFiltresi($_POST["Desen"]);
        }else{
            $GelenDesen = "";
        }
        //--------------------------------------------
        if(isset($_POST["MenuAdi"])){
            $GelenMenuAdi = GuvenlikFiltresi($_POST["MenuAdi"]);
        }else{
            $GelenMenuAdi = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunFiyati"])){
            $GelenUrunFiyati = GuvenlikFiltresi($_POST["UrunFiyati"]);
            $GelenUrunFiyati = SayiNokta($GelenUrunFiyati);
        }else{
            $GelenUrunFiyati = 0;
        }
        //--------------------------------------------
        if(isset($_POST["ParaBirimi"])){
            $GelenParaBirimi = GuvenlikFiltresi($_POST["ParaBirimi"]);
        }else{
            $GelenParaBirimi = "";
        }
        //--------------------------------------------
        if(isset($_POST["KargoUcreti"])){
            $GelenKargoUcreti = SadeceSayilar($_POST["KargoUcreti"]);
            $GelenKargoUcreti = SayiNokta($GelenKargoUcreti);
        }else{
            $GelenKargoUcreti = "";
        }
        if($GelenKargoUcreti == ""){$GelenKargoUcreti = 0;}
        //--------------------------------------------
        if(isset($_POST["UrunAciklamasi"])){
            $UrunAciklamasi = GuvenlikFiltresi($_POST["UrunAciklamasi"]);
        }else{
            $UrunAciklamasi = "";
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiBIR"])){
            $UrunResmiBIR = $_FILES["UrunResmiBIR"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiIKI"])){
            $UrunResmiIKI = $_FILES["UrunResmiIKI"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiUC"])){
            $UrunResmiUC = $_FILES["UrunResmiUC"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiDORT"])){
            $UrunResmiDORT = $_FILES["UrunResmiDORT"];
        }
        //--------------------------------------------
        if(isset($_POST["VaryantSayisi"])){
            $VaryantSayisi = GuvenlikFiltresi($_POST["VaryantSayisi"]);
        }else{
            $VaryantSayisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantBasligi"])){
            $VaryantBasligi = GuvenlikFiltresi($_POST["VaryantBasligi"]);
        }else{
            $VaryantBasligi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi1"])){
            $VaryantIcerigi1 = GuvenlikFiltresi($_POST["VaryantIcerigi1"]);
        }else{
            $VaryantIcerigi1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi2"])){
            $VaryantIcerigi2 = GuvenlikFiltresi($_POST["VaryantIcerigi2"]);
        }else{
            $VaryantIcerigi2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi3"])){
            $VaryantIcerigi3 = GuvenlikFiltresi($_POST["VaryantIcerigi3"]);
        }else{
            $VaryantIcerigi3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi4"])){
            $VaryantIcerigi4 = GuvenlikFiltresi($_POST["VaryantIcerigi4"]);
        }else{
            $VaryantIcerigi4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi5"])){
            $VaryantIcerigi5 = GuvenlikFiltresi($_POST["VaryantIcerigi5"]);
        }else{
            $VaryantIcerigi5 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari1"])){
            $VaryantMiktari1 = SadeceSayilar($_POST["VaryantMiktari1"]);
        }else{
            $VaryantMiktari1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari2"])){
            $VaryantMiktari2 = SadeceSayilar($_POST["VaryantMiktari2"]);
        }else{
            $VaryantMiktari2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari3"])){
            $VaryantMiktari3 = SadeceSayilar($_POST["VaryantMiktari3"]);
        }else{
            $VaryantMiktari3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari4"])){
            $VaryantMiktari4 = SadeceSayilar($_POST["VaryantMiktari4"]);
        }else{
            $VaryantMiktari4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantMiktari5"])){
            $VaryantMiktari5 = SadeceSayilar($_POST["VaryantMiktari5"]);
        }else{
            $VaryantMiktari5 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID1"])){
            $EskiVaryantID1 = SadeceSayilar($_POST["EskiVaryantID1"]);
        }else{
            $EskiVaryantID1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID2"])){
            $EskiVaryantID2 = SadeceSayilar($_POST["EskiVaryantID2"]);
        }else{
            $EskiVaryantID2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID3"])){
            $EskiVaryantID3 = SadeceSayilar($_POST["EskiVaryantID3"]);
        }else{
            $EskiVaryantID3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID4"])){
            $EskiVaryantID4 = SadeceSayilar($_POST["EskiVaryantID4"]);
        }else{
            $EskiVaryantID4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID5"])){
            $EskiVaryantID5 = SadeceSayilar($_POST["EskiVaryantID5"]);
        }else{
            $EskiVaryantID5 = "";
        }

        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenMarka!="") and ($GelenKullanilabilirlik!="") and ($GelenRenk!="") and ($GelenMenuAdi!="") and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="")){
            
            $GiyimGuncelle = $DataBaseConnection->prepare("UPDATE giyim SET UrunAdi = ?,  UrunAdedi = ?,  Marka = ?,  Kullanilabilirlik = ?,  Beden = ?,  Renk = ?,  Desen = ?,  UrunFiyati = ?,  ParaBirimi = ?,  KargoUcreti = ?,  UrunAciklamasi = ?,  VaryantBasligi = ?,  MenuAdi = ? WHERE id = $UrunIDNum");
            $GiyimGuncelle->bind_param("sisisssisisss", $GelenUrunAdi, $GelenUrunAdedi, $GelenMarka, $GelenKullanilabilirlik, $GelenBeden, $GelenRenk, $GelenDesen, $GelenUrunFiyati, $GelenParaBirimi, $GelenKargoUcreti, $UrunAciklamasi, $VaryantBasligi, $GelenMenuAdi);
            $GiyimGuncelle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
                
            $KayitCek = $DataBaseConnection->query("SELECT * FROM giyim WHERE id = $UrunIDNum LIMIT 1");
            $CalistiMi = $KayitCek->num_rows;
            if($CalistiMi){ 
                $UrunInfo   = $KayitCek->fetch_assoc();
                $UrunResmi1 = $UrunInfo["UrunResmiBIR"];
                $UrunResmi2 = $UrunInfo["UrunResmiIKI"];
                $UrunResmi3 = $UrunInfo["UrunResmiUC"];
                $UrunResmi4 = $UrunInfo["UrunResmiDORT"];
                $UrunMenuAdi= $UrunInfo["MenuAdi"];
            }
            
            if(($UrunResmiBIR["name"] != "") and ($UrunResmiBIR["type"] != "") and ($UrunResmiBIR["tmp_name"] != "") and ($UrunResmiBIR["error"] == 0) and ($UrunResmiBIR["size"] > 0)){
                $ResimAdi1              = CokluisimOlustur(time()-5);
                $YeniResimAdi1          = $ResimAdi1.".png";
                $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi1;
                
                $BuDosyayiSil   = $UrunResmi1;
                $ResimSilindi1  = unlink($BuDosyayiSil);
                if($ResimSilindi1 == 1){
                    $UrunResmiBIR    = new upload($UrunResmiBIR, "tr-TR");
                    if($UrunResmiBIR->uploaded){
                        $UrunResmiBIR->mime_magic_check       = true;            
                        $UrunResmiBIR->allowed                = array("image/*"); 
                        $UrunResmiBIR->image_convert          = "png";
                        $UrunResmiBIR->image_quality          = 100;
                        $UrunResmiBIR->file_overwrite         = true;
                        $UrunResmiBIR->image_background_color = null;
                        $UrunResmiBIR->file_new_name_body     = $ResimAdi1;
                        $UrunResmiBIR->image_resize           = true;
                        $UrunResmiBIR->image_ratio            = true;
                        $UrunResmiBIR->image_y                = 440;
                        $UrunResmiBIR->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);        
                        if($UrunResmiBIR->processed){
                            $Resim1Guncelle = $DataBaseConnection->query("UPDATE giyim SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE id = $UrunIDNum");
                            $SiparisResim1  = $DataBaseConnection->query("UPDATE siparisler SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE UrunID = $UrunIDNum AND TabloAdi='giyim' ");                            
                            $UrunResmiBIR->clean();
                        }else{
                            header("Location:UrunGuncelleBasarisiz/1099");
                            exit();
                        }
                    }
                }
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
                $ResimAdi2              = CokluisimOlustur(time()-13);
                $YeniResimAdi2          = $ResimAdi2.".png";
                $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi2;
                
                if($UrunResmi2!=""){
                    $BuDosyayiSil   = $UrunResmi2;
                    $ResimSilindi2  = unlink($BuDosyayiSil);
                }else{$ResimSilindi2 = 0;}
                $UrunResmiIKI    = new upload($UrunResmiIKI, "tr-TR");
                if($UrunResmiIKI->uploaded){
                    $UrunResmiIKI->mime_magic_check       = true;            
                    $UrunResmiIKI->allowed                = array("image/*"); 
                    $UrunResmiIKI->image_convert          = "png";
                    $UrunResmiIKI->image_quality          = 100;
                    $UrunResmiIKI->file_overwrite         = true;
                    $UrunResmiIKI->image_background_color = null;
                    $UrunResmiIKI->file_new_name_body     = $ResimAdi2;
                    $UrunResmiIKI->image_resize           = true;
                    $UrunResmiIKI->image_ratio            = true;
                    $UrunResmiIKI->image_y                = 440;
                    $UrunResmiIKI->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);        
                    if($UrunResmiIKI->processed){
                        $Resim2Guncelle = $DataBaseConnection->query("UPDATE giyim SET UrunResmiIKI = '$Resim2_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiIKI->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/1132");
                        exit();
                    }
                }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
                $ResimAdi3              = CokluisimOlustur(time()-57);
                $YeniResimAdi3          = $ResimAdi3.".png";
                $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi3;
                
                if($UrunResmi3!=""){
                    $BuDosyayiSil   = $UrunResmi3;
                    $ResimSilindi3  = unlink($BuDosyayiSil);
                }else{$ResimSilindi3 = 0;}
                $UrunResmiUC    = new upload($UrunResmiUC, "tr-TR");
                if($UrunResmiUC->uploaded){
                    $UrunResmiUC->mime_magic_check       = true;            
                    $UrunResmiUC->allowed                = array("image/*"); 
                    $UrunResmiUC->image_convert          = "png";
                    $UrunResmiUC->image_quality          = 100;
                    $UrunResmiUC->file_overwrite         = true;
                    $UrunResmiUC->image_background_color = null;
                    $UrunResmiUC->file_new_name_body     = $ResimAdi3;
                    $UrunResmiUC->image_resize           = true;
                    $UrunResmiUC->image_ratio            = true;
                    $UrunResmiUC->image_y                = 440;
                    $UrunResmiUC->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);     
                    if($UrunResmiUC->processed){
                        $Resim3Guncelle = $DataBaseConnection->query("UPDATE giyim SET UrunResmiUC = '$Resim3_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiUC->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/1164");
                        exit();
                    } 
                }
            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
                $ResimAdi4              = CokluisimOlustur(time()+7);
                $YeniResimAdi4          = $ResimAdi4.".png";
                $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi4;
                
                if($UrunResmi4!=""){
                    $BuDosyayiSil   = $UrunResmi4;
                    $ResimSilindi4  = unlink($BuDosyayiSil);
                }else{$ResimSilindi4 = 0;}
                $UrunResmiDORT    = new upload($UrunResmiDORT, "tr-TR");
                if($UrunResmiDORT->uploaded){
                    $UrunResmiDORT->mime_magic_check       = true;            
                    $UrunResmiDORT->allowed                = array("image/*"); 
                    $UrunResmiDORT->image_convert          = "png";
                    $UrunResmiDORT->image_quality          = 100;
                    $UrunResmiDORT->file_overwrite         = true;
                    $UrunResmiDORT->image_background_color = null;
                    $UrunResmiDORT->file_new_name_body     = $ResimAdi4;
                    $UrunResmiDORT->image_resize           = true;
                    $UrunResmiDORT->image_ratio            = true;
                    $UrunResmiDORT->image_y                = 440;
                    $UrunResmiDORT->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);    
                    if($UrunResmiDORT->processed){
                        $Resim4Guncelle = $DataBaseConnection->query("UPDATE giyim SET UrunResmiDORT = '$Resim4_DB_Adi' WHERE id = $UrunIDNum");
                        $UrunResmiDORT->clean();
                    }else{
                        header("Location:UrunGuncelleBasarisiz/1196");
                        exit();
                    } 
                }
            }
                if($etkilenenKayitSayisi or ($VaryantIcerigi1 != "") or ($VaryantIcerigi2 != "") or ($VaryantIcerigi3 != "") or ($VaryantIcerigi4 != "") or ($VaryantIcerigi5 != "") or ($UrunResmiBIR->processed) or ($UrunResmiIKI->processed) or ($UrunResmiUC->processed) or ($UrunResmiDORT->processed)){
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != "" and $EskiVaryantID1 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi1',  StokAdedi = $VaryantMiktari1 WHERE id = $EskiVaryantID1");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != "" and $EskiVaryantID2 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi2',  StokAdedi = $VaryantMiktari2 WHERE id = $EskiVaryantID2");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != "" and $EskiVaryantID3 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi3',  StokAdedi = $VaryantMiktari3 WHERE id = $EskiVaryantID3");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != "" and $EskiVaryantID4 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi4',  StokAdedi = $VaryantMiktari4 WHERE id = $EskiVaryantID4");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != "" and $EskiVaryantID5 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi5',  StokAdedi = $VaryantMiktari5 WHERE id = $EskiVaryantID5");
                    }
                    header("Location:Urunlerim/1"); //çalıştı
                    exit();
                }else{
                    header("Location:UrunGuncelleBasarisiz/1220");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:UrunGuncelleBasarisiz/1224"); /* değerler eksik*/
            exit();
        }
        
    /*--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
        
    }elseif($Tablosu=="Teknoloji"){
        
        if(isset($_POST["UrunAdi"])){
            $GelenUrunAdi = GuvenlikFiltresi($_POST["UrunAdi"]);
        }else{
            $GelenUrunAdi = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunAdedi"])){
            $GelenUrunAdedi = GuvenlikFiltresi($_POST["UrunAdedi"]);
        }else{
            $GelenUrunAdedi = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunFiyati"])){
            $GelenUrunFiyati = GuvenlikFiltresi($_POST["UrunFiyati"]);
            $GelenUrunFiyati = SayiNokta($GelenUrunFiyati);
        }else{
            $GelenUrunFiyati = 0;
        }
        //--------------------------------------------
        if(isset($_POST["ParaBirimi"])){
            $GelenParaBirimi = GuvenlikFiltresi($_POST["ParaBirimi"]);
        }else{
            $GelenParaBirimi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Sehir"])){
            $GelenSehir = GuvenlikFiltresi($_POST["Sehir"]);
            $GelenSehir = mb_strtoupper($GelenSehir, "UTF-8");
        }else{
            $GelenSehir = "";
        }
        //--------------------------------------------
        if(isset($_POST["Konumu"])){
            $GelenKonumu = GuvenlikFiltresi($_POST["Konumu"]);
            $GelenKonumu = mb_strtoupper($GelenKonumu, "UTF-8");
        }else{
            $GelenKonumu = "";
        }
        //--------------------------------------------
        if(isset($_POST["Kimden"])){
            $GelenKimden = GuvenlikFiltresi($_POST["Kimden"]);
        }else{
            $GelenKimden = "";
        }
        //--------------------------------------------
        if(isset($_POST["MenuAdi"])){
            $GelenMenuAdi = GuvenlikFiltresi($_POST["MenuAdi"]);
        }else{
            $GelenMenuAdi = "";
        }
        //--------------------------------------------
        if(isset($_POST["Marka"])){
            $GelenMarka = GuvenlikFiltresi($_POST["Marka"]);
        }else{
            $GelenMarka = "";
        }
        //--------------------------------------------
        if(isset($_POST["Model"])){
            $GelenModel = GuvenlikFiltresi($_POST["Model"]);
        }else{
            $GelenModel = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunSerisi"])){
            $GelenUrunSerisi = GuvenlikFiltresi($_POST["UrunSerisi"]);
        }else{
            $GelenUrunSerisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["isletimSistemi"])){
            $GelenisletimSistemi = GuvenlikFiltresi($_POST["isletimSistemi"]);
        }else{
            $GelenisletimSistemi = "";
        }
        //--------------------------------------------
        if(isset($_POST["RAM"])){
            $GelenRAM = GuvenlikFiltresi($_POST["RAM"]);
        }else{
            $GelenRAM = "";
        }
        //--------------------------------------------
        if(isset($_POST["EkranBoyutu"])){
            $GelenEkranBoyutu = GuvenlikFiltresi($_POST["EkranBoyutu"]);
        }else{
            $GelenEkranBoyutu = "";
        }
        //--------------------------------------------
       if(isset($_POST["Cozunurluluk"])){
            $GelenCozunurluluk = GuvenlikFiltresi($_POST["Cozunurluluk"]);
        }else{
            $GelenCozunurluluk = "";
        }
        //--------------------------------------------
        if(isset($_POST["CPU"])){
            $GelenCPU = GuvenlikFiltresi($_POST["CPU"]);
        }else{
            $GelenCPU = "";
        }
        //--------------------------------------------
        if(isset($_POST["CPUhizi"])){
            $GelenCPUhizi = SadeceSayilar($_POST["CPUhizi"]);
            $GelenCPUhizi = preg_replace("/,/",".",$GelenCPUhizi);
        }else{
            $GelenCPUhizi = "";
        }
        //--------------------------------------------
        if(isset($_POST["GPU"])){
            $GelenGPU = GuvenlikFiltresi($_POST["GPU"]);
        }else{
            $GelenGPU = "";
        }
        //--------------------------------------------
        if(isset($_POST["DiskTuru"])){
            $GelenDiskTuru = GuvenlikFiltresi($_POST["DiskTuru"]);
        }else{
            $GelenDiskTuru = "";
        }
        //--------------------------------------------
        if(isset($_POST["DiskBoyutu"])){
            $GelenDiskBoyutu = SadeceSayilar($_POST["DiskBoyutu"]);
        }else{
            $GelenDiskBoyutu = "";
        }
        //--------------------------------------------
        if(isset($_POST["Renk"])){
            $GelenRenk = GuvenlikFiltresi($_POST["Renk"]);
            $GelenRenk = HerKelimeninIlkHarfiniBuyukHarfYap($GelenRenk);
        }else{
            $GelenRenk = "";
        }
        //--------------------------------------------
        if(isset($_POST["OnKamera"])){
            $GelenOnKamera = GuvenlikFiltresi($_POST["OnKamera"]);
            $GelenOnKamera = SayiNokta($GelenOnKamera);

        }else{
            $GelenOnKamera = "";
        }
        //--------------------------------------------
        if(isset($_POST["ArkaKamera"])){
            $GelenArkaKamera = GuvenlikFiltresi($_POST["ArkaKamera"]);
            $GelenArkaKamera = SayiNokta($GelenArkaKamera);
        }else{
            $GelenArkaKamera = "";
        }
        //--------------------------------------------
        if(isset($_POST["KargoUcreti"])){
            $GelenKargoUcreti = SadeceSayilar($_POST["KargoUcreti"]);
            $GelenKargoUcreti = SayiNokta($GelenKargoUcreti);
        }else{
            $GelenKargoUcreti = "";
        }
        if($GelenKargoUcreti == ""){$GelenKargoUcreti = 0;}
        //--------------------------------------------
        if(isset($_POST["SifirMi"])){
            $GelenSifirMi = GuvenlikFiltresi($_POST["SifirMi"]);
        }else{
            $GelenSifirMi = "";
        }
        //--------------------------------------------
         if(isset($_POST["TamirGorduMu"])){
            $GelenTamirGorduMu = GuvenlikFiltresi($_POST["TamirGorduMu"]);
        }else{
            $GelenTamirGorduMu = "";
        }
        //--------------------------------------------
        if(isset($_POST["UrunAciklamasi"])){
            $UrunAciklamasi = GuvenlikFiltresi($_POST["UrunAciklamasi"]);
        }else{
            $UrunAciklamasi = "";
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiBIR"])){
            $UrunResmiBIR = $_FILES["UrunResmiBIR"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiIKI"])){
            $UrunResmiIKI = $_FILES["UrunResmiIKI"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiUC"])){
            $UrunResmiUC = $_FILES["UrunResmiUC"];
        }
        //--------------------------------------------
        if(isset($_FILES["UrunResmiDORT"])){
            $UrunResmiDORT = $_FILES["UrunResmiDORT"];
        }
        //--------------------------------------------
        if(isset($_POST["VaryantSayisi"])){
            $VaryantSayisi = GuvenlikFiltresi($_POST["VaryantSayisi"]);
        }else{
            $VaryantSayisi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantBasligi"])){
            $VaryantBasligi = GuvenlikFiltresi($_POST["VaryantBasligi"]);
        }else{
            $VaryantBasligi = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi1"])){
            $VaryantIcerigi1 = GuvenlikFiltresi($_POST["VaryantIcerigi1"]);
        }else{
            $VaryantIcerigi1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi2"])){
            $VaryantIcerigi2 = GuvenlikFiltresi($_POST["VaryantIcerigi2"]);
        }else{
            $VaryantIcerigi2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi3"])){
            $VaryantIcerigi3 = GuvenlikFiltresi($_POST["VaryantIcerigi3"]);
        }else{
            $VaryantIcerigi3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi4"])){
            $VaryantIcerigi4 = GuvenlikFiltresi($_POST["VaryantIcerigi4"]);
        }else{
            $VaryantIcerigi4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["VaryantIcerigi5"])){
            $VaryantIcerigi5 = GuvenlikFiltresi($_POST["VaryantIcerigi5"]);
        }else{
            $VaryantIcerigi5 = "";
        }        
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID1"])){
            $EskiVaryantID1 = SadeceSayilar($_POST["EskiVaryantID1"]);
        }else{
            $EskiVaryantID1 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID2"])){
            $EskiVaryantID2 = SadeceSayilar($_POST["EskiVaryantID2"]);
        }else{
            $EskiVaryantID2 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID3"])){
            $EskiVaryantID3 = SadeceSayilar($_POST["EskiVaryantID3"]);
        }else{
            $EskiVaryantID3 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID4"])){
            $EskiVaryantID4 = SadeceSayilar($_POST["EskiVaryantID4"]);
        }else{
            $EskiVaryantID4 = "";
        }
        //--------------------------------------------
        if(isset($_POST["EskiVaryantID5"])){
            $EskiVaryantID5 = SadeceSayilar($_POST["EskiVaryantID5"]);
        }else{
            $EskiVaryantID5 = "";
        }

        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenKonumu!="") and ($GelenSehir!="") and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="") and ($GelenMenuAdi!="") and ($GelenKimden!="") and ($GelenMarka!="") and ($GelenModel!="")){
            $UrunKonumu = $GelenSehir." / ".$GelenKonumu;
            
            $TeknolojiGuncelle = $DataBaseConnection->prepare("UPDATE teknoloji SET UrunAdi = ?, UrunAdedi = ?, Konumu = ?, UrunFiyati = ?, ParaBirimi = ?, Marka = ?, Model = ?, UrunSerisi = ?, isletimSistemi = ?, RAM = ?, EkranBoyutu = ?, Cozunurluluk = ?, CPU = ?, CPUhizi = ?, GPU = ?, DiskTuru = ?, DiskBoyutu = ?, Renk = ?,  OnKamera = ?, ArkaKamera = ?, KargoUcreti = ?, Kimden = ?, SifirMi = ?, TamirGorduMu = ?, UrunAciklamasi = ?, VaryantBasligi = ?, MenuAdi = ? WHERE id = $UrunIDNum");
            $TeknolojiGuncelle->bind_param("sissssssssssssssssssisiisss", $GelenUrunAdi, $GelenUrunAdedi, $UrunKonumu, $GelenUrunFiyati, $GelenParaBirimi, $GelenMarka, $GelenModel, $GelenUrunSerisi, $GelenisletimSistemi, $GelenRAM, $GelenEkranBoyutu, $GelenCozunurluluk, $GelenCPU, $GelenCPUhizi, $GelenGPU, $GelenDiskTuru, $GelenDiskBoyutu, $GelenRenk, $GelenOnKamera, $GelenArkaKamera, $GelenKargoUcreti, $GelenKimden, $GelenSifirMi, $GelenTamirGorduMu, $UrunAciklamasi, $VaryantBasligi, $GelenMenuAdi);
            $TeknolojiGuncelle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;
            
            $KayitCek = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE id = $UrunIDNum LIMIT 1");
            $CalistiMi = $KayitCek->num_rows;
            if($CalistiMi){ 
                $UrunInfo   = $KayitCek->fetch_assoc();
                $UrunResmi1 = $UrunInfo["UrunResmiBIR"];
                $UrunResmi2 = $UrunInfo["UrunResmiIKI"];
                $UrunResmi3 = $UrunInfo["UrunResmiUC"];
                $UrunResmi4 = $UrunInfo["UrunResmiDORT"];
                $UrunMenuAdi= $UrunInfo["MenuAdi"];
            }
            
            if(($UrunResmiBIR["name"] != "") and ($UrunResmiBIR["type"] != "") and ($UrunResmiBIR["tmp_name"] != "") and ($UrunResmiBIR["error"] == 0) and ($UrunResmiBIR["size"] > 0)){
                $ResimAdi1              = CokluisimOlustur(time()-5);
                $YeniResimAdi1          = $ResimAdi1.".png";
                $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi1;
                
                $BuDosyayiSil   = $UrunResmi1;
                $ResimSilindi1  = unlink($BuDosyayiSil);
                if($ResimSilindi1 == 1){
                    $UrunResmiBIR    = new upload($UrunResmiBIR, "tr-TR");
                    if($UrunResmiBIR->uploaded){
                        $UrunResmiBIR->mime_magic_check       = true;            
                        $UrunResmiBIR->allowed                = array("image/*"); 
                        $UrunResmiBIR->image_convert          = "png";
                        $UrunResmiBIR->image_quality          = 100;
                        $UrunResmiBIR->file_overwrite         = true;
                        $UrunResmiBIR->image_background_color = null;
                        $UrunResmiBIR->file_new_name_body     = $ResimAdi1;
                        $UrunResmiBIR->image_resize           = true;
                        $UrunResmiBIR->image_ratio            = true;
                        $UrunResmiBIR->image_y                = 440;
                        $UrunResmiBIR->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);        

                        if($UrunResmiBIR->processed){
                            $Resim1Guncelle = $DataBaseConnection->query("UPDATE teknoloji SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE id = $UrunIDNum");
                            $SiparisResim1  = $DataBaseConnection->query("UPDATE siparisler SET UrunResmiBIR = '$Resim1_DB_Adi' WHERE UrunID = $UrunIDNum AND TabloAdi='teknoloji' ");                            
                            $UrunResmiBIR->clean();
                        }else{
                            header("Location:UrunGuncelleBasarisiz/1537");
                            exit();
                        }
                    }
                }
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
                $ResimAdi2              = CokluisimOlustur(time()-13);
                $YeniResimAdi2          = $ResimAdi2.".png";
                $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi2;
                
                if($UrunResmi2!=""){
                    $BuDosyayiSil   = $UrunResmi2;
                    $ResimSilindi2  = unlink($BuDosyayiSil);
                }else{$ResimSilindi2 = 0;}
                if($ResimSilindi2 == 1 or $UrunResmi2==""){
                    $UrunResmiIKI    = new upload($UrunResmiIKI, "tr-TR");
                    if($UrunResmiIKI->uploaded){
                        $UrunResmiIKI->mime_magic_check       = true;            
                        $UrunResmiIKI->allowed                = array("image/*"); 
                        $UrunResmiIKI->image_convert          = "png";
                        $UrunResmiIKI->image_quality          = 100;
                        $UrunResmiIKI->file_overwrite         = true;
                        $UrunResmiIKI->image_background_color = null;
                        $UrunResmiIKI->file_new_name_body     = $ResimAdi2;
                        $UrunResmiIKI->image_resize           = true;
                        $UrunResmiIKI->image_ratio            = true;
                        $UrunResmiIKI->image_y                = 440;
                        $UrunResmiIKI->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);        
                        if($UrunResmiIKI->processed){
                            $Resim2Guncelle = $DataBaseConnection->query("UPDATE teknoloji SET UrunResmiIKI = '$Resim2_DB_Adi' WHERE id = $UrunIDNum");
                            $UrunResmiIKI->clean();
                        }else{
                            header("Location:UrunGuncelleBasarisiz/1571");
                            exit();
                        }
                    }
                }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
                $ResimAdi3              = CokluisimOlustur(time()-57);
                $YeniResimAdi3          = $ResimAdi3.".png";
                $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi3;
                
                if($UrunResmi3!=""){
                    $BuDosyayiSil   = $UrunResmi3;
                    $ResimSilindi3  = unlink($BuDosyayiSil);
                }else{$ResimSilindi3 = 0;}
                if($ResimSilindi3 == 1 or $UrunResmi3==""){
                    $UrunResmiUC    = new upload($UrunResmiUC, "tr-TR");
                    if($UrunResmiUC->uploaded){
                        $UrunResmiUC->mime_magic_check       = true;            
                        $UrunResmiUC->allowed                = array("image/*"); 
                        $UrunResmiUC->image_convert          = "png";
                        $UrunResmiUC->image_quality          = 100;
                        $UrunResmiUC->file_overwrite         = true;
                        $UrunResmiUC->image_background_color = null;
                        $UrunResmiUC->file_new_name_body     = $ResimAdi3;
                        $UrunResmiUC->image_resize           = true;
                        $UrunResmiUC->image_ratio            = true;
                        $UrunResmiUC->image_y                = 440;
                        $UrunResmiUC->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);     
                        if($UrunResmiUC->processed){
                            $Resim3Guncelle = $DataBaseConnection->query("UPDATE teknoloji SET UrunResmiUC = '$Resim3_DB_Adi' WHERE id = $UrunIDNum");
                            $UrunResmiUC->clean();
                        }else{
                            header("Location:UrunGuncelleBasarisiz/1605");
                            exit();
                        } 
                    }
                }
            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
                $ResimAdi4              = CokluisimOlustur(time()+7);
                $YeniResimAdi4          = $ResimAdi4.".png";
                $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi4;
                
                if($UrunResmi4!=""){
                    $BuDosyayiSil   = $UrunResmi4;
                    $ResimSilindi4  = unlink($BuDosyayiSil);
                }else{$ResimSilindi4 = 0;}
                if($ResimSilindi4 == 1 or $UrunResmi4==""){
                    $UrunResmiDORT    = new upload($UrunResmiDORT, "tr-TR");
                    if($UrunResmiDORT->uploaded){
                        $UrunResmiDORT->mime_magic_check       = true;            
                        $UrunResmiDORT->allowed                = array("image/*"); 
                        $UrunResmiDORT->image_convert          = "png";
                        $UrunResmiDORT->image_quality          = 100;
                        $UrunResmiDORT->file_overwrite         = true;
                        $UrunResmiDORT->image_background_color = null;
                        $UrunResmiDORT->file_new_name_body     = $ResimAdi4;
                        $UrunResmiDORT->image_resize           = true;
                        $UrunResmiDORT->image_ratio            = true;
                        $UrunResmiDORT->image_y                = 440;
                        $UrunResmiDORT->process($VerotIcinKlasorYolu."UrunResimleri/".$Tablosu."/".$GelenMenuAdi);    
                        if($UrunResmiDORT->processed){
                            $Resim4Guncelle = $DataBaseConnection->query("UPDATE teknoloji SET UrunResmiDORT = '$Resim4_DB_Adi' WHERE id = $UrunIDNum");
                            $UrunResmiDORT->clean();
                        }else{
                            header("Location:UrunGuncelleBasarisiz/1639");
                            exit();
                        } 
                    }
                }
            }
                if($etkilenenKayitSayisi or ($VaryantIcerigi1 != "") or ($VaryantIcerigi2 != "") or ($VaryantIcerigi3 != "") or ($VaryantIcerigi4 != "") or ($VaryantIcerigi5 != "") or ($UrunResmiBIR->processed) or ($UrunResmiIKI->processed) or ($UrunResmiUC->processed) or ($UrunResmiDORT->processed)){
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi1',  StokAdedi = $VaryantMiktari1 WHERE id = $EskiVaryantID1");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi2',  StokAdedi = $VaryantMiktari2 WHERE id = $EskiVaryantID2");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi3',  StokAdedi = $VaryantMiktari3 WHERE id = $EskiVaryantID3");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi4',  StokAdedi = $VaryantMiktari4 WHERE id = $EskiVaryantID4");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != ""){
                        $VaryantGuncelle   = $DataBaseConnection->query("UPDATE urunvaryantlari SET VaryanAdi = '$VaryantIcerigi5',  StokAdedi = $VaryantMiktari5 WHERE id = $EskiVaryantID5");
                    }
                    header("Location:Urunlerim/1"); //çalıştı
                    exit();
                }else{
                    header("Location:UrunGuncelleBasarisiz/1664");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:UrunGuncelleBasarisiz/1668"); /* değerler eksik*/
            exit();
        }
    }    
    
}else{
    header("Location:AnaSayfa");
    exit();
} ?>