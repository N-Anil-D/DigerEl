<?php namespace Verot\Upload;
    
if(isset($_SESSION["Yonetici"])){
    

    if(isset($_POST["Tablosu"])){
        $Tablosu = GuvenlikFiltresi($_POST["Tablosu"]);
    }else{
        $Tablosu = "";
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
            $GelenUrunFiyati = "";
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
        }else{
            $GelenKargoUcreti = "";
        }
        if($GelenKargoUcreti == ""){$GelenKargoUcreti = 0;}
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
        if(isset($_POST["Yil"])){
            $GelenYil = SadeceSayilar($_POST["Yil"]);
        }else{
            $GelenYil = "";
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
        
        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenKonumu!="") and ($GelenSehir!="")  and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="") and ($GelenKimden!="") and ($GelenMarka!="") and ($GelenYakitTipi!="") and ($UrunResmiBIR["name"] != "") and ($UrunResmiBIR["type"] != "") and ($UrunResmiBIR["tmp_name"] != "") and ($UrunResmiBIR["error"] == 0) and ($UrunResmiBIR["size"] > 0)){
            
            $sifir  = 0;
            $Durumu = 1;
            $UrunKonumu = $GelenSehir." / ".$GelenKonumu;
            $ResimAdi1              = CokluisimOlustur(time()-5);
            $YeniResimAdi1          = $ResimAdi1.".png";
            $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi1;
            /*----------------------------------------------*/
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
            $ResimAdi2              = CokluisimOlustur(time()-13);
            $YeniResimAdi2          = $ResimAdi2.".png";
            $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi2;
            }else{$Resim2_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
            $ResimAdi3              = CokluisimOlustur(time()-57);
            $YeniResimAdi3          = $ResimAdi3.".png";
            $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi3;
            }else{$Resim3_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
            $ResimAdi4              = CokluisimOlustur(time()+7);
            $YeniResimAdi4          = $ResimAdi4.".png";
            $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMarka."/".$YeniResimAdi4;
            }else{$Resim4_DB_Adi = "";}
            /*----------------------------------------------*/

            $AracEkle = $DataBaseConnection->prepare("INSERT INTO arac (UrunAdi,UrunAdedi,Konumu,UrunFiyati,ParaBirimi,KargoUcreti,Kimden,Marka,Seri,Model,Yil,YakitTipi,VitesTipi,MotorHacmi,MotorGucu,KM,Renk,Takas,BoyaDegisen, UrunAciklamasi,UrunResmiBIR,UrunResmiIKI,UrunResmiUC,UrunResmiDORT,Durumu,VaryantBasligi,MenuAdi,ToplamSatisSayisi,YorumSayisi,ToplamYorumPuani,GoruntulenmeSayisi,ilanTarihi, EkleyenUye) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $AracEkle->bind_param("sisssissssissssssissssssissiiiii", $GelenUrunAdi, $GelenUrunAdedi, $UrunKonumu, $GelenUrunFiyati, $GelenParaBirimi, $GelenKargoUcreti, $GelenKimden, $GelenMarka, $GelenSeri, $GelenModel, $GelenYil, $GelenYakitTipi, $GelenVitesTipi, $GelenMotorHacmi, $GelenMotorGucu, $GelenKM, $GelenRenk, $GelenTakas, $GelenDegisenParca, $UrunAciklamasi, $Resim1_DB_Adi, $Resim2_DB_Adi, $Resim3_DB_Adi, $Resim4_DB_Adi, $Durumu, $VaryantBasligi, $GelenMarka, $sifir, $sifir, $sifir, $sifir, $zaman, $YoneticiID);
            $AracEkle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

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

                if($UrunResmiBIR->processed) {
                    $UrunResmiBIR->clean();
                }else{
                    header("Location:index.php?SKI=86&eror=288");
                    exit();
                } 
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){

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
                            $UrunResmiIKI->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=313");
                            exit();
                        } 
                    }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){

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
                            $UrunResmiUC->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=339");
                            exit();
                        } 
                    }
            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){

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
                            $UrunResmiDORT->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=365");
                            exit();
                        } 
                    }
            }
    
                if($etkilenenKayitSayisi>0 and $UrunResmiBIR->processed){
                    $SonKaydiAl = $DataBaseConnection->query("SELECT * FROM arac ORDER BY id DESC LIMIT 1");
                    $SonKayitFetch = $SonKaydiAl->fetch_assoc();
                    $SonKayitID    = $SonKayitFetch["id"];
                    $SonKayitMenuAdi    = $SonKayitFetch["MenuAdi"];
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('arac', $SonKayitID, '$VaryantIcerigi1', $VaryantMiktari1)");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('arac', $SonKayitID, '$VaryantIcerigi2', $VaryantMiktari2)");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('arac', $SonKayitID, '$VaryantIcerigi3', $VaryantMiktari3)");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('arac', $SonKayitID, '$VaryantIcerigi4', $VaryantMiktari4)");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('arac', $SonKayitID, '$VaryantIcerigi5', $VaryantMiktari5)");
                    }
                    if($GelenMarka!="Yamaha"){
                        $MenuKontrol = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi+1 WHERE MenuAdi = '$GelenMarka' OR MenuAdi = 'Otomobil'");
                    }else{
                        $MenuKontrol = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi+1 WHERE MenuAdi = '$GelenMarka' OR MenuAdi = 'Motorsiklet'");
                        }
                    header("Location:index.php?SKI=92"); //çalıştı
                    exit();
                }else{
                    header("Location:index.php?SKI=86&eror=399");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:index.php?SKI=86&eror=403"); /* değerler eksik*/
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
            $GelenUrunFiyati = "";
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
        
        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenKonumu!="") and ($GelenSehir!="") and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="") and ($GelenOdasayisi!="") and ($GelenSalonsayisi!="") and ($GelenBrutm2!="") and ($GelenNetm2!="") and ($GelenIsinmaTipi!="") and ($GelenMobilyaliMi!="") and ($GelenBalkon!="") and ($GelenBanyoSayisi!="") and ($GelenSuAnkiKullanimDurumu!="") and ($UrunResmiBIR["name"]!="")){
            
            $sifir  = 0;
            $Durumu = 1;
            $UrunKonumu = $GelenSehir." / ".$GelenKonumu;
            $OdaSalon = $GelenOdasayisi."-".$GelenSalonsayisi;
            $DosyaAdi = $GelenOdasayisi."+".$GelenSalonsayisi;
            
            $ResimAdi1              = CokluisimOlustur(time()-5);
            $YeniResimAdi1          = $ResimAdi1.".png";
            $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi1;
            /*----------------------------------------------*/
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
            $ResimAdi2              = CokluisimOlustur(time()-13);
            $YeniResimAdi2          = $ResimAdi2.".png";
            $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi2;
            }else{$Resim2_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
            $ResimAdi3              = CokluisimOlustur(time()-57);
            $YeniResimAdi3          = $ResimAdi3.".png";
            $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi3;
            }else{$Resim3_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
            $ResimAdi4              = CokluisimOlustur(time()+7);
            $YeniResimAdi4          = $ResimAdi4.".png";
            $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$DosyaAdi."/".$YeniResimAdi4;
            }else{$Resim4_DB_Adi = "";}
            /*----------------------------------------------*/

            $KonutEkle = $DataBaseConnection->prepare("INSERT INTO konut (UrunAdi, UrunAdedi, Konumu, UrunFiyati, ParaBirimi, odasayisi, Brutm2, Netm2, isinmaTipi, MobilyaliMi, Balkon, BanyoSayisi, BoyaliMi, BinaYasi, Kat, BinadakiToplamKat, KrediyeUygunMu, SuAnkiKullanimDurumu, UrunAciklamasi, UrunResmiBIR, UrunResmiIKI, UrunResmiUC, UrunResmiDORT, Durumu, VaryantBasligi, MenuAdi, ToplamSatisSayisi, YorumSayisi, ToplamYorumPuani, GoruntulenmeSayisi, ilanTarihi, EkleyenUye) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $KonutEkle->bind_param("sissssiisiiiiiiiiisssssissiiiii", $GelenUrunAdi, $GelenUrunAdedi, $UrunKonumu, $GelenUrunFiyati, $GelenParaBirimi, $OdaSalon, $GelenBrutm2, $GelenNetm2, $GelenIsinmaTipi, $GelenMobilyaliMi, $GelenBalkon, $GelenBanyoSayisi, $GelenBoyaliMi, $GelenBinaYasi, $GelenKat, $GelenBinadakiToplamKat, $GelenKrediyeUygunMu, $GelenSuAnkiKullanimDurumu, $UrunAciklamasi, $Resim1_DB_Adi, $Resim2_DB_Adi, $Resim3_DB_Adi, $Resim4_DB_Adi, $Durumu, $VaryantBasligi, $OdaSalon, $sifir, $sifir, $sifir, $sifir, $zaman, $YoneticiID);
            $KonutEkle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

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

                if($UrunResmiBIR->processed) {
                    $UrunResmiBIR->clean();
                }else{
                    header("Location:index.php?SKI=86&eror=680");
                    exit();
                } 
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){

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
                            $UrunResmiIKI->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=705");
                            exit();
                        } 
                    }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){

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
                            $UrunResmiUC->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=731");
                            exit();
                        } 
                    }
            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){

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
                            $UrunResmiDORT->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=757");
                            exit();
                        } 
                    }
            }
    
                if($etkilenenKayitSayisi>0 and $UrunResmiBIR->processed){
                    $SonKaydiAl = $DataBaseConnection->query("SELECT * FROM konut ORDER BY id DESC LIMIT 1");
                    $SonKayitFetch = $SonKaydiAl->fetch_assoc();
                    $SonKayitID    = $SonKayitFetch["id"];
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('konut', $SonKayitID, '$VaryantIcerigi1', $VaryantMiktari1)");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('konut', $SonKayitID, '$VaryantIcerigi2', $VaryantMiktari2)");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('konut', $SonKayitID, '$VaryantIcerigi3', $VaryantMiktari3)");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('konut', $SonKayitID, '$VaryantIcerigi4', $VaryantMiktari4)");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('konut', $SonKayitID, '$VaryantIcerigi5', $VaryantMiktari5)");
                    }
                     $MenuKontrol = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi+1 WHERE MenuAdi = '$OdaSalon' OR MenuAdi = 'Konut'");
                    header("Location:index.php?SKI=92"); //çalıştı
                    exit();
                }else{
                    header("Location:index.php?SKI=86&eror=786");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:index.php?SKI=86&eror=790"); /* veri eksik */ 
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
            $GelenUrunFiyati = "";
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
           
        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenMarka!="") and ($GelenKullanilabilirlik!="") and ($GelenRenk!="") and ($GelenMenuAdi!="") and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="") and ($UrunResmiBIR["name"]!="")){
            
            $sifir  = 0;
            $Durumu = 1;
            
            $ResimAdi1              = CokluisimOlustur(time()-5);
            $YeniResimAdi1          = $ResimAdi1.".png";
            $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi1;
            /*----------------------------------------------*/
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
            $ResimAdi2              = CokluisimOlustur(time()-13);
            $YeniResimAdi2          = $ResimAdi2.".png";
            $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi2;
            }else{$Resim2_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
            $ResimAdi3              = CokluisimOlustur(time()-57);
            $YeniResimAdi3          = $ResimAdi3.".png";
            $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi3;
            }else{$Resim3_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
            $ResimAdi4              = CokluisimOlustur(time()+7);
            $YeniResimAdi4          = $ResimAdi4.".png";
            $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi4;
            }else{$Resim4_DB_Adi = "";}
            /*----------------------------------------------*/
            
            $GiyimEkle = $DataBaseConnection->prepare("INSERT INTO giyim (UrunAdi, UrunAdedi, Marka, Kullanilabilirlik, Beden, Renk, Desen, UrunFiyati, ParaBirimi, KargoUcreti, UrunAciklamasi, UrunResmiBIR, UrunResmiIKI, UrunResmiUC, UrunResmiDORT, Durumu, VaryantBasligi, MenuAdi, ToplamSatisSayisi, YorumSayisi, ToplamYorumPuani, GoruntulenmeSayisi, ilanTarihi, EkleyenUye) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $GiyimEkle->bind_param("sisisssssisssssissiiiii", $GelenUrunAdi, $GelenUrunAdedi, $GelenMarka, $GelenKullanilabilirlik, $GelenBeden, $GelenRenk, $GelenDesen, $GelenUrunFiyati, $GelenParaBirimi, $GelenKargoUcreti, $UrunAciklamasi, $Resim1_DB_Adi, $Resim2_DB_Adi, $Resim3_DB_Adi, $Resim4_DB_Adi, $Durumu, $VaryantBasligi, $GelenMenuAdi, $sifir, $sifir, $sifir, $sifir, $zaman, $YoneticiID);
            $GiyimEkle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

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

                if($UrunResmiBIR->processed) {
                    $UrunResmiBIR->clean();
                }else{
                    header("Location:index.php?SKI=86&eror=1012");
                    exit();
                } 
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){

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
                            $UrunResmiIKI->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=1037");
                            exit();
                        } 
                    }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){

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
                            $UrunResmiUC->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=1063");
                            exit();
                        } 
                    }

            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){

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
                            $UrunResmiDORT->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=1089");
                            exit();
                        } 
                    }
            }
    
                if($etkilenenKayitSayisi>0 and $UrunResmiBIR->processed){
                    $SonKaydiAl = $DataBaseConnection->query("SELECT * FROM giyim ORDER BY id DESC LIMIT 1");
                    $SonKayitFetch = $SonKaydiAl->fetch_assoc();
                    $SonKayitID    = $SonKayitFetch["id"];
                    $SonKayitMenuAdi    = $SonKayitFetch["MenuAdi"];
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('giyim', $SonKayitID, '$VaryantIcerigi1', $VaryantMiktari1)");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('giyim', $SonKayitID, '$VaryantIcerigi2', $VaryantMiktari2)");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('giyim', $SonKayitID, '$VaryantIcerigi3', $VaryantMiktari3)");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('giyim', $SonKayitID, '$VaryantIcerigi4', $VaryantMiktari4)");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('giyim', $SonKayitID, '$VaryantIcerigi5', $VaryantMiktari5)");
                    }
                    
                    $MenuKontrol = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi+1 WHERE MenuAdi = '$GelenMenuAdi' OR MenuAdi = 'Giyim'");

                    header("Location:index.php?SKI=92"); //çalıştı
                    exit();
                }else{
                    header("Location:index.php?SKI=86&eror=1121");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:index.php?SKI=86&eror=1125"); /* değerler eksik*/
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
            $GelenUrunFiyati = "";
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
        
        
        
    
        if(($GelenUrunAdi!="") and ($GelenUrunAdedi!="") and ($GelenKonumu!="") and ($GelenSehir!="") and ($GelenUrunFiyati!="") and ($GelenParaBirimi!="") and ($GelenMenuAdi!="") and ($GelenKimden!="") and ($GelenMarka!="") and ($GelenModel!="") and ($UrunResmiBIR["name"]!="")){
            
            $sifir  = 0;
            $Durumu = 1;
            $UrunKonumu = $GelenSehir." / ".$GelenKonumu;
            $ResimAdi1              = CokluisimOlustur(time()-5);
            $YeniResimAdi1          = $ResimAdi1.".png";
            $Resim1_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi1;
            /*----------------------------------------------*/
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){
            $ResimAdi2              = CokluisimOlustur(time()-13);
            $YeniResimAdi2          = $ResimAdi2.".png";
            $Resim2_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi2;
            }else{$Resim2_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){
            $ResimAdi3              = CokluisimOlustur(time()-57);
            $YeniResimAdi3          = $ResimAdi3.".png";
            $Resim3_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi3;
            }else{$Resim3_DB_Adi = "";}
            /*----------------------------------------------*/
            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){
            $ResimAdi4              = CokluisimOlustur(time()+7);
            $YeniResimAdi4          = $ResimAdi4.".png";
            $Resim4_DB_Adi          = "Resimler/UrunResimleri/".$Tablosu."/".$GelenMenuAdi."/".$YeniResimAdi4;
            }else{$Resim4_DB_Adi = "";}
            /*----------------------------------------------*/

            $TeknolojiEkle = $DataBaseConnection->prepare("INSERT INTO teknoloji (UrunAdi, UrunAdedi, Konumu, UrunFiyati, ParaBirimi, Marka, Model, UrunSerisi, isletimSistemi, RAM, EkranBoyutu, Cozunurluluk, CPU, CPUhizi, GPU, DiskTuru, DiskBoyutu, Renk,  OnKamera, ArkaKamera, KargoUcreti, Kimden, SifirMi, TamirGorduMu, UrunAciklamasi, UrunResmiBIR, UrunResmiIKI, UrunResmiUC, UrunResmiDORT, Durumu, VaryantBasligi, MenuAdi, ToplamSatisSayisi, YorumSayisi, ToplamYorumPuani, GoruntulenmeSayisi, ilanTarihi, EkleyenUye) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $TeknolojiEkle->bind_param("sissssssssssssssssssisiisssssissiiiii", $GelenUrunAdi, $GelenUrunAdedi, $GelenKonumu, $GelenUrunFiyati, $GelenParaBirimi, $GelenMarka, $GelenModel, $GelenUrunSerisi, $GelenisletimSistemi, $GelenRAM, $GelenEkranBoyutu, $GelenCozunurluluk, $GelenCPU, $GelenCPUhizi, $GelenGPU, $GelenDiskTuru, $GelenDiskBoyutu, $GelenRenk, $GelenOnKamera, $GelenArkaKamera, $GelenKargoUcreti, $GelenKimden, $GelenSifirMi, $GelenTamirGorduMu, $UrunAciklamasi, $Resim1_DB_Adi, $Resim2_DB_Adi, $Resim3_DB_Adi, $Resim4_DB_Adi, $Durumu, $VaryantBasligi, $GelenMenuAdi, $sifir, $sifir, $sifir, $sifir, $zaman, $YoneticiID);
            $TeknolojiEkle->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

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

                if($UrunResmiBIR->processed) {
                    $UrunResmiBIR->clean();
                }else{
                    header("Location:index.php?SKI=86&eror=1417");
                    exit();
                } 
            }
            
            if(($UrunResmiIKI["name"] != "") and ($UrunResmiIKI["type"] != "") and ($UrunResmiIKI["tmp_name"] != "") and ($UrunResmiIKI["error"] == 0) and ($UrunResmiIKI["size"] > 0)){

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
                            $UrunResmiIKI->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=1442");
                            exit();
                        } 
                    }
            }

            if(($UrunResmiUC["name"] != "") and ($UrunResmiUC["type"] != "") and ($UrunResmiUC["tmp_name"] != "") and ($UrunResmiUC["error"] == 0) and ($UrunResmiUC["size"] > 0)){

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
                            $UrunResmiUC->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=1468");
                            exit();
                        } 
                    }
            }

            if(($UrunResmiDORT["name"] != "") and ($UrunResmiDORT["type"] != "") and ($UrunResmiDORT["tmp_name"] != "") and ($UrunResmiDORT["error"] == 0) and ($UrunResmiDORT["size"] > 0)){

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
                            $UrunResmiDORT->clean();
                        }else{
                            header("Location:index.php?SKI=86&eror=1494");
                            exit();
                        } 
                    }
            }
    
                if($etkilenenKayitSayisi>0 and $UrunResmiBIR->processed){
                    $SonKaydiAl = $DataBaseConnection->query("SELECT * FROM teknoloji ORDER BY id DESC LIMIT 1");
                    $SonKayitFetch = $SonKaydiAl->fetch_assoc();
                    $SonKayitID    = $SonKayitFetch["id"];
                    $SonKayitMenuAdi    = $SonKayitFetch["MenuAdi"];
                    if($VaryantIcerigi1 != "" and $VaryantMiktari1 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('teknoloji', $SonKayitID, '$VaryantIcerigi1', $VaryantMiktari1)");
                    }
                    if($VaryantIcerigi2 != "" and $VaryantMiktari2 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('teknoloji', $SonKayitID, '$VaryantIcerigi2', $VaryantMiktari2)");
                    }
                    if($VaryantIcerigi3 != "" and $VaryantMiktari3 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('teknoloji', $SonKayitID, '$VaryantIcerigi3', $VaryantMiktari3)");
                    }
                    if($VaryantIcerigi4 != "" and $VaryantMiktari4 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('teknoloji', $SonKayitID, '$VaryantIcerigi4', $VaryantMiktari4)");
                    }
                    if($VaryantIcerigi5 != "" and $VaryantMiktari5 != ""){
                        $VaryantEkle   = $DataBaseConnection->query("INSERT INTO urunvaryantlari (TabloAdi, UrunID, VaryanAdi, StokAdedi) VALUES('teknoloji', $SonKayitID, '$VaryantIcerigi5', $VaryantMiktari5)");
                    }
                    $MenudekiUrunSayisiniArttir = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi+1 WHERE MenuAdi = '$GelenMenuAdi'");
                    $Menu                       = $DataBaseConnection->query("SELECT * FROM menuler WHERE TabloAdi = 'teknoloji' AND MenuAdi = '$GelenMenuAdi' LIMIT 1");
                    $MenuCek                    = $Menu->fetch_assoc();
                    $UstId                      = $MenuCek["ustID"];
                    $GenelUrunSayisiniArttir    = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi = UrunSayisi+1 WHERE id = '$UstId' LIMIT 1");
                    header("Location:index.php?SKI=92"); //çalıştı
                    exit();
                }else{
                    header("Location:index.php?SKI=86&eror=1528");/*ya resim yüklenmedi ya da sql e yüklenmedi*/
                    exit();
                }
        }else{
            header("Location:index.php?SKI=86&eror=1532"); /* değerler eksik*/
            exit();
        }
    }    
    
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>