<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="50">
      <td>&nbsp;</td>
  </tr>

  <tr height="150">
      <td align="center"><img src="Resimler/Tamam.png"></td>
  </tr>

  <tr>
      <td align="center"><b>TEBRİKLER Siparişiniz Alındı.</b></td>
  </tr>

  <tr height="80">
      <td align="center">Kredi karı ile ödeme işlemi sanal pos ve banka ile yapıldığı için sitemde bu özellik aktif halde değildir. Sanal pos verileri bankaya gönderilmekte ve site tarafından kayıt altına <b>alınmamakatır</b>.<br />Siparişiniz ve taksidiniz sisteme kaydedilmiştir</td>
  </tr>

  <tr height="40">
      <td class="SonucSayfalari" align="center">Siparişlerinizin durumuna göz atmak için >>><a href="Siparislerim/1" class="SonucSayfalari"><b>Siparişlerim</b></a></td>
  </tr>
</table>

<?php
if(isset($_SESSION["Kullanici"])){
    
    
    
            $SepeteQ     = $DataBaseConnection->query("SELECT * FROM sepet WHERE UyeID = '$Uyeid' ");
            $SepetVarMi  = $SepeteQ->num_rows;
                if($SepetVarMi>0){
                    $SepettekiToplamUrun = 0;
                    $KargoFiyatiHesapla = 0;
                    $EkleSil = 0;
                    while($SepetiYaz = $SepeteQ->fetch_assoc()){
                        $SepetID                            = GeriDöndür($SepetiYaz["id"]);
                        $SepettekiUrunSepetNumarasi         = GeriDöndür($SepetiYaz["SepetNumarasi"]);
                        $SepettekiUrunTabloAdi              = GeriDöndür($SepetiYaz["TabloAdi"]);
                        $SepettekiUrunUrunID                = GeriDöndür($SepetiYaz["UrunID"]);
                        $SepettekiUrunAdresID               = GeriDöndür($SepetiYaz["AdresID"]);
                        $SepettekiUrunAdedi                 = GeriDöndür($SepetiYaz["UrunAdedi"]);
                        $SepettekiUrunKargoFirmasiSecimiID  = GeriDöndür($SepetiYaz["KargoFirmasiSecimiID"]);
                        $SepettekiUrunVaryantSecimi         = GeriDöndür($SepetiYaz["VaryantSecimi"]);
                        $SepettekiUrunOdemeSecimi           = GeriDöndür($SepetiYaz["OdemeSecimi"]);
                        $SepettekiUrunTaksitSecimi          = GeriDöndür($SepetiYaz["TaksitSecimi"]);


                        
                        $UruneBaglan  = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1 ");
                        $UrunVarMi    = $UruneBaglan->num_rows;
                        $UrunTablosundakiUrunDegerleri = $UruneBaglan->fetch_assoc();
                        $UrunAdi             = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunAdi"]);
                        $UrunFiyati          = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunFiyati"]);
                        $UrunParaBirimi      = GeriDöndür($UrunTablosundakiUrunDegerleri["ParaBirimi"]);
                        $UrunKargoUcreti     = GeriDöndür($UrunTablosundakiUrunDegerleri["KargoUcreti"]);                            
                        $UrunVaryantBasligi  = GeriDöndür($UrunTablosundakiUrunDegerleri["VaryantBasligi"]);
                        $UrunResmi           = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunResmiBIR"]);

                        $AdreslereBaglan    = $DataBaseConnection->query("SELECT * FROM  adresler WHERE id = $SepettekiUrunAdresID LIMIT 1 ");
                        $AdresVarMi         = $AdreslereBaglan->num_rows;
                        $AdresDegerleri     = $AdreslereBaglan->fetch_assoc();
                        $AdresAdiSoyadi     = GeriDöndür($AdresDegerleri["AdiSoyadi"]);
                        $Adresil            = GeriDöndür($AdresDegerleri["il"]);
                        $Adresilce          = GeriDöndür($AdresDegerleri["ilce"]);
                        $AdresTelefon       = GeriDöndür($AdresDegerleri["Telefon"]);
                        $Adres              = GeriDöndür($AdresDegerleri["Adres"]);
                        $TamAdres           = $Adresil . " / " . $Adresilce . " -- " . $Adres;
                        
                        if($UrunVaryantBasligi != ""){
                            $StokIcin_urunvaryantlari_Sorgusu   = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = '$SepettekiUrunVaryantSecimi' AND TabloAdi = '$SepettekiUrunTabloAdi' AND UrunID = $SepettekiUrunUrunID LIMIT 1");
                            $StokIcin_urunvaryantlari_Sayisi    = $StokIcin_urunvaryantlari_Sorgusu->num_rows;
                            if($StokIcin_urunvaryantlari_Sayisi>0){
                                $StokIcin_urunvaryantlari_fetch = $StokIcin_urunvaryantlari_Sorgusu->fetch_assoc();
                                $UrunStokid       = GeriDöndür($StokIcin_urunvaryantlari_fetch["id"]);//Urun varyantı tablosundaki ürün miktarı
                                $UrunStokSayisi   = GeriDöndür($StokIcin_urunvaryantlari_fetch["StokAdedi"]);//Urun varyantı tablosundaki ürün miktarı
                                $UrunVaryanAdi    = GeriDöndür($StokIcin_urunvaryantlari_fetch["VaryanAdi"]);
                                if($UrunStokSayisi == 0){
                                    $DataBaseConnection->query("DELETE FROM sepet WHERE SepetNumarasi= '$SepettekiUrunSepetNumarasi' AND UyeID = '$Uyeid' AND TabloAdi = '$SepettekiUrunTabloAdi' AND UrunID = '$SepettekiUrunUrunID' LIMIT 1");
                                }elseif($SepettekiUrunAdedi>$UrunStokSayisi){
                                    $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi=$UrunStokSayisi WHERE SepetNumarasi= $SepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = $SepettekiUrunTabloAdi AND UrunID = $SepettekiUrunUrunID LIMIT 1");
                                    $StokAdediGuncelle = $DataBaseConnection->query("UPDATE urunvaryantlari SET StokAdedi=StokAdedi-$UrunStokSayisi WHERE id= $UrunStokid LIMIT 1");
                                }elseif($SepettekiUrunAdedi<=$UrunStokSayisi){
                                    // stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt ---
                                    $StokAdediGuncelle = $DataBaseConnection->query("UPDATE urunvaryantlari SET StokAdedi=StokAdedi-$SepettekiUrunAdedi WHERE id= $UrunStokid LIMIT 1");
                                    // stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt --- stoğu azalt ---
                                }
                            }
                        }else{
                            $StokIcin_UrunAdedi_Sorgusu   = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1");
                            $StokIcin_UrunAdedi_Sayisi    = $StokIcin_UrunAdedi_Sorgusu->num_rows;
                            if($StokIcin_UrunAdedi_Sayisi>0){
                                $StokIcin_UrunAdedi_fetch = $StokIcin_UrunAdedi_Sorgusu->fetch_assoc();
                                $UrunStokSayisi   = GeriDöndür($StokIcin_UrunAdedi_fetch["UrunAdedi"]);//Urunün kendi tablosundaki ürün miktarı
                                if($SepettekiUrunAdedi>$UrunStokSayisi){
                                    $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi= $UrunStokSayisi WHERE SepetNumarasi= $SepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = $SepettekiUrunTabloAdi AND UrunID = $SepettekiUrunUrunID LIMIT 1");
                                }
                            }

                        }

                        $KargoTablosunaBaglan  = $DataBaseConnection->query("SELECT * FROM  kargofirmalari WHERE id = $SepettekiUrunKargoFirmasiSecimiID LIMIT 1 ");
                        $KargoFirmasiVarMi     = $KargoTablosunaBaglan->num_rows;
                        if($KargoFirmasiVarMi){
                            $KargoTablosuDegerleri = $KargoTablosunaBaglan->fetch_assoc();
                            $KargoFirmasiAdi       = GeriDöndür($KargoTablosuDegerleri["KargoFirmasiAdi"]);
                        }
                        
                        $SepettekiToplamUrun  += $SepettekiUrunAdedi;

                        // ------------------------------------------------------ KUR HESAPLA ------------------------------------------------------
                        
                        if($UrunParaBirimi=="USD"){
                            $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                        }elseif($UrunParaBirimi=="EUR"){
                            $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                        }else{
                            $UrunFiyatiHesapla = $UrunFiyati;
                        }
                        // ------------------------------------------------------ KUR HESAPLA ------------------------------------------------------
                        
                        // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA
                        $CokluUrunFiyatiHesapla = ($UrunFiyatiHesapla * $SepettekiUrunAdedi);

                        // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA

                        
// -------------------------------- SIPARİSLER KISMINA AKTAR  -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR --------------------------------

                        $SiparisEkle      = $DataBaseConnection->query("INSERT INTO siparisler 
                        (UyeID, SiparisNumarasi, TabloAdi, UrunID, UrunAdi, UrunAdedi, UrunFiyati, ParaBirimi, ToplamUrunFiyati, KargoUcreti, KargoFirmasiSecimi, UrunResmiBIR, VaryantBasligi, VaryantSecimi, AdresAdiSoyadi, AdresDetay, AdresTelefon, OdemeSecimi, TaksitSecimi, SiparisTarihi, SiparisIPadresi) 
                        values ('$Uyeid', '$SepettekiUrunSepetNumarasi', '$SepettekiUrunTabloAdi', '$SepettekiUrunUrunID', '$UrunAdi', '$SepettekiUrunAdedi', '$UrunFiyati', 'TL', '$CokluUrunFiyatiHesapla', '$UrunKargoUcreti', '$SepettekiUrunKargoFirmasiSecimiID', '$UrunResmi', '$UrunVaryantBasligi', '$SepettekiUrunVaryantSecimi', '$AdresAdiSoyadi', '$TamAdres', '$AdresTelefon', 'KREDI KARTI', $SepettekiUrunTaksitSecimi, '$zaman', '$IPAdresi')");
                        if($SiparisEkle){
                            $SepetiTemizle  = $DataBaseConnection->query("DELETE FROM sepet WHERE id = '$SepetID' AND UyeID = '$Uyeid' LIMIT 1 ");
                            if($SepetiTemizle){
                                $UrunAdediGuncelle = $DataBaseConnection->query("UPDATE $SepettekiUrunTabloAdi SET UrunAdedi=UrunAdedi-$SepettekiUrunAdedi, ToplamSatisSayisi=ToplamSatisSayisi+$SepettekiUrunAdedi WHERE id='$SepettekiUrunUrunID' LIMIT 1");
                                if($UrunAdediGuncelle){$EkleSil++;}
                                }
                        }
// -------------------------------- SIPARİSLER KISMINA AKTAR  -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR -------------------------------- -------------------------------- SIPARİSLER KISMINA AKTAR --------------------------------
                        

                        
                    }//while kapatması
                    $UcretiKontrolEt   = $DataBaseConnection->query("SELECT SUM(ToplamUrunFiyati) AS ToplamFiyatURUNLER FROM siparisler WHERE UyeID = '$Uyeid' AND SiparisNumarasi = '$SepettekiUrunSepetNumarasi' ");
                    $FiyatlaraBak      = $UcretiKontrolEt->num_rows;
                    if($FiyatlaraBak){
                        $KargoFiyat         = $UcretiKontrolEt->fetch_assoc();
                        $ToplamFiyat        = $KargoFiyat["ToplamFiyatURUNLER"];
                        if($ToplamFiyat>100){
                            $KargoFiyatlariniSifirla = $DataBaseConnection->query("UPDATE siparisler SET KargoUcreti = 0 WHERE UyeID = '$Uyeid' AND SiparisNumarasi = '$SepettekiUrunSepetNumarasi' ");
                        }
                    }
                    if($EkleSil==$SepetVarMi){
                        $BittiyseDurumuGuncelle    = $DataBaseConnection->query("UPDATE $SepettekiUrunTabloAdi SET Durumu=0 WHERE UrunAdedi=0 ");
                        $UrunTablosu = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1");
                        $UrunTablosundakiBilgiler = $UrunTablosu->fetch_assoc();
                        $UrunMenuAdi = $UrunTablosundakiBilgiler["MenuAdi"];
                        $MenuErisimi  = $DataBaseConnection->query("SELECT * FROM menuler WHERE TabloAdi='$SepettekiUrunTabloAdi' AND MenuAdi = '$UrunMenuAdi' LIMIT 1");
                        $MenuBilgiler = $MenuErisimi->fetch_assoc();
                        $ustID  = $MenuBilgiler["ustID"];
                        $MenuGuncelle = $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi-1 WHERE TabloAdi='$SepettekiUrunTabloAdi' AND MenuAdi = '$UrunMenuAdi' LIMIT 1");
                        $MenuGuncelle2= $DataBaseConnection->query("UPDATE menuler SET UrunSayisi=UrunSayisi-1 WHERE id = $ustID LIMIT 1");
                        if($BittiyseDurumuGuncelle){
                            header("Location:HavaleTalebiAlindi"); //islem tamam 
                            exit();
                        }else{
                            header("Location:HavaleTalebiBasarisiz"); // hata sayfasına git
                            exit();
                        }
                    }else{
                        header("Location:HavaleTalebiBasarisiz"); // hata sayfasına git
                        exit();
                    }
                }//Banka havalesi içinde sepette ürün varsa ya kadar olan kısım        

}else{
    header("Location:AnaSayfa");
    exit();
}

?>