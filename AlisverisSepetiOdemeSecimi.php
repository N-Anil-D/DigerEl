<?php 

if(isset($_POST["AdresSecimi"])){
    $AdresSecimi = SadeceSayilar($_POST["AdresSecimi"]);
}else{
    $AdresSecimi = "";
}
if(isset($_POST["KargoFirmasi"])){
    $KargoFirmasi = SadeceSayilar($_POST["KargoFirmasi"]);
}else{
    $KargoFirmasi = "";
}

    

if(isset($_SESSION["Kullanici"])){
    
    if($AdresSecimi != "" and $KargoFirmasi != ""){
        
        $SepetiGuncelle  = $DataBaseConnection->prepare("UPDATE sepet SET AdresID = ?, KargoFirmasiSecimiID = ? WHERE UyeID = ?");
        $SepetiGuncelle->bind_param("iii",$AdresSecimi,$KargoFirmasi,$Uyeid);
        $SepetiGuncelle->execute();
        if($SepetiGuncelle){
        

        $SepeteEklenenUrunler = $DataBaseConnection->query("SELECT * FROM sepet WHERE UyeID = '$Uyeid' ORDER BY id DESC");
        $SepetVarMi           = $SepeteEklenenUrunler->num_rows;
        if($SepetVarMi>0){ 
            $SepettekiToplamUrun = 0;
            $SepettekiToplamFiyat = 0;
            $KargoFiyatiHesapla = 0;
            while($SepetiYaz = $SepeteEklenenUrunler->fetch_assoc()){
                $SepettekiUrunTabloAdi        = GeriDöndür($SepetiYaz["TabloAdi"]);
                $SepettekiUrunUrunID          = GeriDöndür($SepetiYaz["UrunID"]);
                $SepettekiUrunUrunAdedi       = GeriDöndür($SepetiYaz["UrunAdedi"]);
                $SepettekiUrunVaryantSecimi   = GeriDöndür($SepetiYaz["VaryantSecimi"]);
                $SepettekiUrunSepetNumarasi   = GeriDöndür($SepetiYaz["SepetNumarasi"]);


                $UruneBaglan  = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1 ");
                $UrunVarMi    = $UruneBaglan->num_rows;
                $UrunTablosundakiUrunDegerleri = $UruneBaglan->fetch_assoc();
                $UrunFiyati          = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunFiyati"]);
                $UrunParaBirimi      = GeriDöndür($UrunTablosundakiUrunDegerleri["ParaBirimi"]);
                $UrunVaryantBasligi  = GeriDöndür($UrunTablosundakiUrunDegerleri["VaryantBasligi"]);
                $UrunKargoUcreti     = GeriDöndür($UrunTablosundakiUrunDegerleri["KargoUcreti"]);                            

                $VaryantaBaglan = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = '$SepettekiUrunVaryantSecimi' LIMIT 1 ");
                $VaryantVarMi   = $VaryantaBaglan->num_rows;
                $VaryantTablosundakiUrunDegerleri = $VaryantaBaglan->fetch_assoc();
                @$VaryantAdi       = GeriDöndür($VaryantTablosundakiUrunDegerleri["VaryanAdi"]);
                @$VaryantStokAdedi = GeriDöndür($VaryantTablosundakiUrunDegerleri["StokAdedi"]);

                $SepettekiToplamUrun  += $SepettekiUrunUrunAdedi;

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
                $CokluUrunFiyatiHesapla = ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);

                if($SepettekiUrunUrunAdedi>1){
                    $SepettekiToplamFiyat += ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);
                }else{
                    $SepettekiToplamFiyat += $UrunFiyatiHesapla; 
                }
                // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA

                $Taksit2    = number_format($SepettekiToplamFiyat/2,"2",",",".");
                $Taksit3    = number_format($SepettekiToplamFiyat/3,"2",",",".");
                $Taksit4    = number_format($SepettekiToplamFiyat/4,"2",",",".");
                $Taksit5    = number_format($SepettekiToplamFiyat/5,"2",",",".");
                $Taksit6    = number_format($SepettekiToplamFiyat/6,"2",",",".");
                $Taksit7    = number_format($SepettekiToplamFiyat/7,"2",",",".");
                $Taksit8    = number_format($SepettekiToplamFiyat/8,"2",",",".");
                $Taksit9    = number_format($SepettekiToplamFiyat/9,"2",",",".");
                // -------------------------------- TOPLAM KARGO FİYATI HESAPLA -------------------------------- TOPLAM KARGO FİYATI HESAPLA --------------------------------
                $KargoFiyatiHesapla += ($UrunKargoUcreti * $SepettekiUrunUrunAdedi);
                //$ToplamKargoFiyati      = FiyatBicimlendir($CokluUrunFiyatiHesapla);
                // --------------------------------TOPLAM KARGO FİYATI HESAPLA

            }//while kapatması
}else{ 
  header("Location:Sepetim");
  exit();
}

    $StokIcinSepettekiUrunlerSorgusu = $DataBaseConnection->query("SELECT * FROM sepet WHERE UyeID = $Uyeid ORDER BY id DESC");
    $StokIcinSepettekiUrunVarMi      = $StokIcinSepettekiUrunlerSorgusu->num_rows;
    if($StokIcinSepettekiUrunVarMi>0){
      while($StokIcinSepetiYaz = $StokIcinSepettekiUrunlerSorgusu->fetch_assoc()){
          $StokIcinSepettekiUrunTabloAdi        = GeriDöndür($StokIcinSepetiYaz["TabloAdi"]);
          $StokIcinSepettekiUrunUrunID          = GeriDöndür($StokIcinSepetiYaz["UrunID"]);
          $SepeteEkledigiUrunAdedi              = GeriDöndür($StokIcinSepetiYaz["UrunAdedi"]);
          $StokIcinSepettekiUrunVaryantSecimi   = GeriDöndür($StokIcinSepetiYaz["VaryantSecimi"]);
          $StokIcinSepettekiUrunSepetNumarasi   = GeriDöndür($StokIcinSepetiYaz["SepetNumarasi"]);
          
          if($StokIcinSepettekiUrunVaryantSecimi != ""){
              $StokIcin_urunvaryantlari_Sorgusu   = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = '$StokIcinSepettekiUrunVaryantSecimi' AND TabloAdi = '$StokIcinSepettekiUrunTabloAdi' AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");
              $StokIcin_urunvaryantlari_Sayisi    = $StokIcin_urunvaryantlari_Sorgusu->num_rows;
              if($StokIcin_urunvaryantlari_Sayisi>0){
                  $StokIcin_urunvaryantlari_fetch = $StokIcin_urunvaryantlari_Sorgusu->fetch_assoc();
                  $UrunStokSayisi   = GeriDöndür($StokIcin_urunvaryantlari_fetch["StokAdedi"]);//Urun varyantı tablosundaki ürün miktarı
                  
                  if($UrunStokSayisi == 0){
                      $DataBaseConnection->query("DELETE FROM sepet WHERE SepetNumarasi= '$StokIcinSepettekiUrunSepetNumarasi' AND UyeID = '$Uyeid' AND TabloAdi = '$StokIcinSepettekiUrunTabloAdi' AND UrunID = '$StokIcinSepettekiUrunUrunID' LIMIT 1");
                  }elseif($SepeteEkledigiUrunAdedi>$UrunStokSayisi){
                      $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi=$UrunStokSayisi WHERE SepetNumarasi= $StokIcinSepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = $StokIcinSepettekiUrunTabloAdi AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");
                  }
              }
          }else{
              $StokIcin_UrunAdedi_Sorgusu   = $DataBaseConnection->query("SELECT * FROM $StokIcinSepettekiUrunTabloAdi WHERE id = $StokIcinSepettekiUrunUrunID LIMIT 1");
              $StokIcin_UrunAdedi_Sayisi    = $StokIcin_UrunAdedi_Sorgusu->num_rows;
              if($StokIcin_UrunAdedi_Sayisi>0){
                  $StokIcin_UrunAdedi_fetch = $StokIcin_UrunAdedi_Sorgusu->fetch_assoc();
                  $UrunStokSayisi   = GeriDöndür($StokIcin_UrunAdedi_fetch["UrunAdedi"]);//Urunün kendi tablosundaki UrunAdedi
                  if($SepeteEkledigiUrunAdedi>$UrunStokSayisi){
                      $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi= $UrunStokSayisi WHERE SepetNumarasi= $StokIcinSepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = $StokIcinSepettekiUrunTabloAdi AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");
                  }
              }

          }
      
    
        $Durum0iseSil   = $DataBaseConnection->query("SELECT * FROM $StokIcinSepettekiUrunTabloAdi WHERE id = $StokIcinSepettekiUrunUrunID LIMIT 1");
        //$SilmeyeHazirMi = $Durum0iseSil->num_rows;
        $SilmeIcin_fetch = $Durum0iseSil->fetch_assoc();
        if($SilmeIcin_fetch["Durumu"] == 0){
            $DataBaseConnection->query("DELETE FROM sepet WHERE SepetNumarasi= '$StokIcinSepettekiUrunSepetNumarasi' AND UyeID = '$Uyeid' AND TabloAdi = '$StokIcinSepettekiUrunTabloAdi' AND UrunID = '$StokIcinSepettekiUrunUrunID' LIMIT 1");
        }
      }
    }

?>
    
<form action="OdemeSecimiF" method="post"><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    
  <tr>
      <td width="820" valign="top">
              <table width="820" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="50" bgcolor="#F9F9F9">
                  <td style="color: #FF9900" align="left"><h3>Ödeme Yöntemi Seçimi</h3></td><!-- *********************************************** Ödeme Yöntemi Seçimi *********************************************** -->
              </tr>
              <tr height="20">
                  <td><?php echo ""; ?></td>
              </tr>
                  <?php
                  // ************************** ÖDEME SEÇİMİ ********************************************************* ÖDEME SEÇİMİ  ****************************************** ÖDEME SEÇİMİ *****************************************
                  ?>

                  <tr>
                      <td>
                          <table width="820" align="center" border="0" cellpadding="0" cellspacing="0" style="margin-bottom: 10px;">
                            <tr>
                                <td width="400" align="left">
                                  <label for="KrediKartiResmi"><table width="400" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                      <tr>
                                          <td align="center"><img src="Resimler/KrediKarti92x75.png" border="0" style="margin: 20px 0px;"></td>
                                      </tr>
                                      <tr>
                                          <td><?php echo ""; ?></td>
                                      </tr>
                                      <tr>
                                          <td align="center"><input type="radio" name="OdemeTuruSecimi" value="KREDI KARTI" id="KrediKartiResmi" checked="checked" onClick="$.KrediKartiSecildi();"></td>
                                      </tr>
                                  </table></label>
                                </td>
                                <td width="20"><?php echo ""; ?></td>
                                <td width="400" align="right">
                                  <label for="BankaResmi"><table width="400" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                      <tr>
                                          <td align="center"><img src="Resimler/Banka80x75.png" border="0" style="margin: 20px 0px;"</td>
                                      </tr>
                                      <tr>
                                          <td><?php echo ""; ?></td>
                                      </tr>
                                      <tr>
                                          <td align="center"><input type="radio" name="OdemeTuruSecimi" value="BANKA HAVALESI" id="BankaResmi" onClick="$.BankaHavalesiSecildi();"></td>
                                      </tr>
                                  </table></label>
                                </td>
                            </tr>
                          </table>
                      </td>
                  </tr>
                  <?php
                  // ************************** ÖDEME SEÇİMİ ********************************************************* ÖDEME SEÇİMİ  ****************************************** ÖDEME SEÇİMİ *****************************************
                  ?>
                  <tr height="40" align="center">
                      <td><hr></td><!-- *********************************************** ÇİZİK *********************************************** -->
                  </tr>
                  
                  
                  <tr height="50" bgcolor="#F9F9F9" class="KrediKartiAlani"><!-- *********************************************** Kargo Seçimi *********************************************** -->
                      <td height="50" width="820" bgcolor="#FF9900" align="left"><h3>&nbsp;Kredi kartı ile ödeme</h3></td>
                  </tr>
                  <tr height="90" width="820" class="KrediKartiAlani">
                      <td height="90" width="820">
                          &nbsp;Lütfen ödeme işleminizde kullanmak istediğiniz kredi kartı marksını seçiniz.<br />
                          &nbsp;&nbsp;Kredi kartı markanız seçenekler arasında değilse "Diğer" i seçiniz.<br />
                          &nbsp;&nbsp;&nbsp;ATM(Bankamatik) kartı ile ödeme yapmak istiyorsanız "ATM Kart" seçeniğini kullanabilirsiniz.</td>
                  </tr>
                  <tr height="10" class="KrediKartiAlani">
                      <td></td>
                  </tr>
                  <tr class="KrediKartiAlani">
                      <td>
                          <table width="820" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                  <td width="197">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiAxessCard.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                                  <td width="10"></td>
                                  <td width="198">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiBonusCard.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                                  <td width="10"></td>
                                  <td width="197">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiCardFinans.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                                  <td width="10"></td>
                                  <td width="198">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiMaximumCard.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                              </tr>
                              <tr>
                                  <td width="197">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiParafCard.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                                  <td width="10"></td>
                                  <td width="198">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiWorldCard.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                                  <td width="10"></td>
                                  <td width="197">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiDigerKartlar.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                                  <td width="10"></td>
                                  <td width="198">
                                      <table width="197" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                          <tr>
                                              <td align="center"><img src="Resimler/OdemeSecimiATMKarti.png" border="0" style="margin: 20px 0px;"></td>
                                          </tr>
                                      </table>
                                  </td>
                              </tr>
                          </table>
                      </td>
                  </tr>
                  <tr class="KrediKartiAlani">
                      <td>
                          <table width="820" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                                  <td height="30" colspan="4" bgcolor="#FFB13D">Lütfen ödeme işleminde uygulanmasını istediğiniz <u>taksit sayısını</u> aşağıdaki taksit bilgilendirme formu yardımı ile seçiniz.</td>
                              </tr>
                              <tr height="30">
                                  <td colspan="2" width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><?php echo " Taksit Seçimi"; ?></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><?php echo "Taksitli Fiyatlandırma"; ?> TL</td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><?php echo "Toplam Fiyat TL"; ?></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="TekCekim" name="TaksitSecimiRadio" checked="checked" value="1"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="TekCekim">Tek Çekim</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="TekCekim"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="TekCekim"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="2Taksit" name="TaksitSecimiRadio" value="2"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="2Taksit">İki taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="2Taksit"><?php echo "2 x " .$Taksit2." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="2Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="3Taksit" name="TaksitSecimiRadio" value="3"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="3Taksit">Üç taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="3Taksit"><?php echo "3 x " .$Taksit3." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="3Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="4Taksit" name="TaksitSecimiRadio" value="4"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="4Taksit">Dört taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="4Taksit"><?php echo "4 x " .$Taksit4." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="4Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="5Taksit" name="TaksitSecimiRadio" value="5"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="5Taksit">Beş taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="5Taksit"><?php echo "5 x " .$Taksit5." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="5Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="6Taksit" name="TaksitSecimiRadio" value="6"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="6Taksit">Altı taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="6Taksit"><?php echo "6 x " .$Taksit6." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="6Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="7Taksit" name="TaksitSecimiRadio" value="7"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="7Taksit">Yedi taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="7Taksit"><?php echo "7 x " .$Taksit7." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="7Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="8Taksit" name="TaksitSecimiRadio" value="8"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="8Taksit">Sekiz taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="8Taksit"><?php echo "8 x " .$Taksit8." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="8Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                              <tr height="30">
                                  <td width="25" align="left" style="border-bottom: 1px solid #CC00CC;"><input type="radio" id="9Taksit" name="TaksitSecimiRadio" value="9"></td>
                                  <td width="265" align="left" style="border-bottom: 1px solid #CC00CC;"><label for="9Taksit">Dokuz taksit</label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="9Taksit"><?php echo "9 x " .$Taksit9." TL"; ?></label></td>
                                  <td width="265" align="right" style="border-bottom: 1px solid #CC00CC;"><label for="9Taksit"><?php echo FiyatBicimlendir($SepettekiToplamFiyat)." TL"; ?></label></td>
                              </tr>
                          </table>
                      </td>
                  </tr>
    
    
    
                              <tr height="50" width="820" class="BankaHavaleAlani" style="display: none;">
                                  <td height="50" width="820" bgcolor="#FF9900"><b>Banka Havalesi / EFT ile Ödeme</b></td>
                              </tr>
                              <tr class="BankaHavaleAlani" style="display: none;">
                                  <td height="30"></td>
                              </tr>
                              <tr height="50" width="820" class="BankaHavaleAlani" style="display: none;">
                                  <td height="30" width="820">
                                      Banka havalesi / EFT ile ürün satın alabilmek için prosedür:<br />
                                      1 ) Alışveriş sepet tutarını "Banka Hesaplarımız" sayfasında bulunun herhangi bir hesaba ödeme yapınız.<br />
                                      2 ) "Havale Bildirim Formu" aracılığı ile lütfen tarafımıza bildiriniz.
                                      Banka havalesi / EFT ödeme yöntemi için bilgilendirme : "ÖDEME YAP" butonuna tıkladığınızda siparişiniz sisteme kayıt edilecektir
                                  </td>
                              </tr>
    
    
    
    
    
          </table>
      </td>
      <td width="25"><?php echo ""; ?></td>
      <td width="220" valign="top">
          <table width="220" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="40">
                  <td style="color: #FF9900" align="right"><h3>Sipariş Özeti</h3></td>
              </tr>
              
              <tr height="30">
                  <td align="right">Toplam <b style="color: red; font-size:16px;"><?php echo $SepettekiToplamUrun; ?></b> adet ürün var</td>
              </tr>
              <tr height="20">
                  <td><?php echo ""; ?></td>
              </tr>
              <tr>
                  <td align="right">Toplam Ürün Ücreti</td>
              </tr>
              <tr>
                  <td height="60" align="right"><b style="color: #9639FF; font-size:20px;"><?php echo FiyatBicimlendir($SepettekiToplamFiyat); ?> TL</b>&nbsp;&nbsp;</td>
              </tr>
              <?php if($SepettekiToplamFiyat>=100){$KargoFiyatiHesapla = 0 ;} ?>
              <tr>
                  <td align="right">Toplam Kargo Ücreti</td>
              </tr>
              <tr>
                  <td height="60" align="right"><b style="color: #9639FF; font-size:20px;"><?php echo FiyatBicimlendir($KargoFiyatiHesapla); ?> TL</b>&nbsp;&nbsp;</td>
              </tr>
              
              <tr>
                  <td align="right">Ödenecek Toplam Tutar</td>
              </tr>
              <tr>
                  <td height="60" align="right"><b style="color: #9639FF; font-size:20px; text-decoration: underline;"><?php echo FiyatBicimlendir($KargoFiyatiHesapla + $SepettekiToplamFiyat); ?> TL</b>&nbsp;&nbsp;</td>
              </tr>
              <tr>
                  <td align="right"><div><input type="submit" value="ÖDEME YAP" class="OdemeSecimi"></div></td>
                      
              </tr>
              
         </table>
      </td>
    </tr>
</table></form>    
<?php
        }else{ //değerler boş gelirse
          header("Location:AdresVeKargoSecimi");
          exit();
        }
        
    }else{ // sepet güncellemesi yapamazsa
      header("Location:AdresVeKargoSecimi");
      exit();
    }
    
}else{//kullanıcı girişi yoksa
  header("Location:AnaSayfa");
  exit();
}
?>