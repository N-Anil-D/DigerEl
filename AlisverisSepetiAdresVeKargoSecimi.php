<?php 
if(isset($_SESSION["Kullanici"])){ 
    
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
              $StokIcin_Urun_Sorgusu        = $DataBaseConnection->query("SELECT * FROM $StokIcinSepettekiUrunTabloAdi WHERE id = $StokIcinSepettekiUrunUrunID LIMIT 1");
              $StokIcin_UrunAdedi_Sayisi    = $StokIcin_Urun_Sorgusu->num_rows;
              if($StokIcin_UrunAdedi_Sayisi>0){
                  $StokIcin_UrunAdedi_fetch = $StokIcin_Urun_Sorgusu->fetch_assoc();
                  $UrunStokSayisi   = GeriDöndür($StokIcin_UrunAdedi_fetch["UrunAdedi"]);//Urunün kendi tablosundaki UrunAdedi
                  if($SepeteEkledigiUrunAdedi>$UrunStokSayisi){
                      $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi= $UrunStokSayisi WHERE SepetNumarasi= $StokIcinSepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = $StokIcinSepettekiUrunTabloAdi AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");
                  }
              }else{$DataBaseConnection->query("DELETE FROM sepet WHERE SepetNumarasi= $StokIcinSepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = $StokIcinSepettekiUrunTabloAdi AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");}

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
    
<form action="OdemeSecimineIlerle" method="post"><table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    
  <tr>
      <td width="820" valign="top">
              <table width="820" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="50" bgcolor="#F9F9F9">
                  <td style="color: #FF9900" align="left"><h3>Adres Seçimi</h3></td><!-- *********************************************** Adres Seçimi *********************************************** -->
              </tr>
                  <?php 
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
                            if($SepettekiUrunTabloAdi == "konut"){$UrunKargoUcreti = 0;}else{ $UrunKargoUcreti     = GeriDöndür($UrunTablosundakiUrunDegerleri["KargoUcreti"]);}                           


                            $VaryantaBaglan = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = '$SepettekiUrunVaryantSecimi' LIMIT 1 ");
                            $VaryantVarMi   = $VaryantaBaglan->num_rows;
                            $VaryantTablosundakiUrunDegerleri = $VaryantaBaglan->fetch_assoc();
                            @$VaryantAdi       = GeriDöndür($VaryantTablosundakiUrunDegerleri["VaryanAdi"]);
                            @$VaryantStokAdedi = GeriDöndür($VaryantTablosundakiUrunDegerleri["StokAdedi"]);

                            $SepettekiToplamUrun  += $SepettekiUrunUrunAdedi;
                            
                            // ------------------------------------------------------KUR HESAPLA
                            if($UrunParaBirimi=="USD"){
                                $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                            }elseif($UrunParaBirimi=="EUR"){
                                $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                            }else{
                                $UrunFiyatiHesapla = $UrunFiyati;
                            }
                            // ------------------------------------------------------KUR HESAPLA

                            // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA
                            $CokluUrunFiyatiHesapla = ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);

                            if($SepettekiUrunUrunAdedi>1){
                                $SepettekiToplamFiyat += ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);
                            }else{
                                $SepettekiToplamFiyat += $UrunFiyatiHesapla; 
                            }
                            // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA
                            
                            
                            // --------------------------------TOPLAM KARGO FİYATI HESAPLA
                            $KargoFiyatiHesapla += ($UrunKargoUcreti * $SepettekiUrunUrunAdedi);
                            //$ToplamKargoFiyati      = FiyatBicimlendir($CokluUrunFiyatiHesapla);
                            // --------------------------------TOPLAM KARGO FİYATI HESAPLA

                        }//while kapatması
                  }else{ 
                      header("Location:Sepetim");
                      exit();
                  } ?>
                            <tr height="40">
                                <td class="SonucSayfalari" align="center"><a href="AdresEkle"><b>+ Yeni Adres Eklemek İstiyorum</b></a></td>
                            </tr> 
                  <?php
                  // ************************** ADRES SEÇİMİ ********************************************************* ADRES SEÇİMİ  ****************************************** ADRES SEÇİMİ *****************************************
                  $AdreslereBaglan = $DataBaseConnection->query("SELECT * FROM adresler WHERE UyeID = $Uyeid ORDER BY id ASC");
                  $AdresVarMi      = $AdreslereBaglan->num_rows;
                  if($AdresVarMi>0){
                      while($AdresleriYaz = $AdreslereBaglan->fetch_assoc()){
                        $adres_id       = GeriDöndür($AdresleriYaz["id"]);
                        $adres_UyeID    = GeriDöndür($AdresleriYaz["UyeID"]);
                        $adres_AdSoyad  = GeriDöndür($AdresleriYaz["AdiSoyadi"]);
                        $adres_il       = GeriDöndür($AdresleriYaz["il"]);
                        $adres_ilce     = GeriDöndür($AdresleriYaz["ilce"]);
                        $adres_Telefon  = GeriDöndür($AdresleriYaz["Telefon"]);
                        $adres_Adres    = GeriDöndür($AdresleriYaz["Adres"]);
                  
                  ?>

                  <tr height="100">
                      <td>
                          <label for="adres<?php echo $adres_id; ?>"><table width="820" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">
                            <tr>
                                <td align="center" width="50">
                                    <input type="radio" id="adres<?php echo $adres_id; ?>" name="AdresSecimi" value="<?php echo $adres_id; ?>">
                                </td>
                                <td>
                                    <?php echo "<b>İsim Soyisim :</b> " . $adres_AdSoyad . "<br /> <b> İl :</b> " . $adres_il . "  <b> İlçe :</b> " . $adres_ilce . " <b> Adres :</b> " . $adres_Adres . "<br /> <b>Telefon :</b> " . $adres_Telefon; ?></label>
                                </td>
                            </tr>
                          </table></label>
                      </td>
                  </tr>
                  <?php } //while bitişi
                  }else{ ?>
                  <tr height="40" align="center">
                      <td class="SonucSayfalari">Sisteme kayıtlı Adresiniz bulunmamaktadır.<br />Lütfen öncelikle <a href="AdresEkle"><b>Adres Ekleyiniz</b></a></td>
                  </tr>
                  <?php } //if bitişi
                  // ************************** ADRES SEÇİMİ ********************************************************* ADRES SEÇİMİ  ****************************************** ADRES SEÇİMİ *****************************************
                  ?>
                  <tr height="40" align="center">
                      <td><hr></td><!-- *********************************************** ÇİZİK *********************************************** -->
                  </tr>
                  
                  
                  <tr height="50" bgcolor="#F9F9F9"><!-- *********************************************** Kargo Seçimi *********************************************** -->
                      <td style="color: #FF9900" align="left"><h3>Kargo Seçimi</h3></td>
                  </tr>
                  <tr height="10">
                      <td><?php echo ""; ?></td>
                  </tr>
                  <tr>
                      <td>
                        <table width="820" align="center" border="0" cellpadding="0" cellspacing="0">
                          <tr><?php
                              $KargoQuery           = $DataBaseConnection->query("SELECT * FROM kargofirmalari");
                              $Kargokayitsayisi     = $KargoQuery->num_rows;

                              $dongusayisi=1;
                              $StunAdetSayisi=3;

                              while($KargolariYaz = $KargoQuery->fetch_assoc()){
                              ?>
                              <td width="260">
                                  <label for="KF<?php echo GeriDöndür($KargolariYaz["id"]); ?>"><table width="260" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #CC00CC; margin-bottom: 20px;">
                                      <tr height="40">
                                          <td align="center"><input type="radio" name="KargoFirmasi" id="KF<?php echo GeriDöndür($KargolariYaz["id"]); ?>" value="<?php echo GeriDöndür($KargolariYaz["id"]); ?>"></td><!-- !!!!!!!!!!!!!!!!!!!!!! KARGO FİRMASI SEÇİMİ !!!!!!!!!!!!!!!!!!!!!! -->
                                      </tr>
                                      <tr>
                                          <td align="center"><img src="<?php echo GeriDöndür($KargolariYaz["KargoFirmasiLogosu"]); ?>"></td>
                                      </tr>

                                  </table></label>
                              </td>

                                <?php if($dongusayisi<$StunAdetSayisi){ ?>
                              <td width="20"><?php echo ""; ?></td>
                              <?php }

                                  $dongusayisi++;
                                  if($dongusayisi > $StunAdetSayisi){
                                      echo "</tr><tr>";
                                      $dongusayisi = 1;
                                  }

                              }
                              ?>
                          </tr>
                        </table>
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
                  <td align="right"><div><input type="submit" value="ÖDEME SEÇİMİ" class="OdemeSecimi"></div></td>
                      
              </tr>
              
         </table>
      </td>
      
    </tr>
</table></form>    
<?php    
}else{
    header("Location:AnaSayfa");
    exit();
}
?>