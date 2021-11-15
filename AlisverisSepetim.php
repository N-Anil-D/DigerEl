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
                      $DataBaseConnection->query("DELETE FROM sepet WHERE SepetNumarasi= $StokIcinSepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = $StokIcinSepettekiUrunTabloAdi AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");
                  }elseif($SepeteEkledigiUrunAdedi>$UrunStokSayisi){
                      $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi= $UrunStokSayisi WHERE SepetNumarasi= $StokIcinSepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = '$StokIcinSepettekiUrunTabloAdi' AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");
                  }
              }
          }else{
              $StokIcin_Urun_Sorgusu        = $DataBaseConnection->query("SELECT * FROM $StokIcinSepettekiUrunTabloAdi WHERE id = $StokIcinSepettekiUrunUrunID LIMIT 1");
              $StokIcin_UrunAdedi_Sayisi    = $StokIcin_Urun_Sorgusu->num_rows;
              if($StokIcin_UrunAdedi_Sayisi>0){
                  $StokIcin_UrunAdedi_fetch = $StokIcin_Urun_Sorgusu->fetch_assoc();
                  $UrunStokSayisi   = GeriDöndür($StokIcin_UrunAdedi_fetch["UrunAdedi"]);//Urunün kendi tablosundaki UrunAdedi
                  if($SepeteEkledigiUrunAdedi>$UrunStokSayisi){
                      $SepetUrunAdedi_VaryantStogundan_FazlaOlamaz  = $DataBaseConnection->query("UPDATE sepet SET UrunAdedi= $UrunStokSayisi WHERE SepetNumarasi= $StokIcinSepettekiUrunSepetNumarasi AND UyeID = $Uyeid AND TabloAdi = '$StokIcinSepettekiUrunTabloAdi' AND UrunID = $StokIcinSepettekiUrunUrunID LIMIT 1");
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
    
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    
  <tr>
      <td width="820" valign="top">
              <table width="820" align="left" border="0" cellpadding="0" cellspacing="0">
              <tr height="50">
                  <td style="color: #FF9900" align="left"><h3>Alışveriş Sepetim</h3></td>
              </tr>
              <tr height="50">
                  <td align="left">! Kargo ücretleri sonraki sayfada dahil edilecektir.</td>
              </tr>
                  <?php 
                    $SepeteEklenenUrunler = $DataBaseConnection->query("SELECT * FROM sepet WHERE UyeID = $Uyeid ORDER BY id DESC");
                    $SepetVarMi           = $SepeteEklenenUrunler->num_rows;
                    if($SepetVarMi>0){ 
                        $SepettekiToplamUrun = 0;
                        $SepettekiToplamFiyat = 0;
                  while($SepetiYaz = $SepeteEklenenUrunler->fetch_assoc()){
                      $SepettekiUrunTabloAdi        = GeriDöndür($SepetiYaz["TabloAdi"]);
                      $SepettekiUrunUrunID          = GeriDöndür($SepetiYaz["UrunID"]);
                      $SepettekiUrunUrunAdedi       = GeriDöndür($SepetiYaz["UrunAdedi"]);
                      $SepettekiUrunVaryantSecimi   = GeriDöndür($SepetiYaz["VaryantSecimi"]);
                      $SepettekiUrunSepetNumarasi   = GeriDöndür($SepetiYaz["SepetNumarasi"]);
                      
                      
                      $UruneBaglan  = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1 ");
                      $UrunVarMi    = $UruneBaglan->num_rows;
                      $UrunTablosundakiUrunDegerleri = $UruneBaglan->fetch_assoc();
                      $UrunResmi           = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunResmiBIR"]);
                      $UrunAdi             = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunAdi"]);
                      $UrunFiyati          = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunFiyati"]);
                      $UrunParaBirimi      = GeriDöndür($UrunTablosundakiUrunDegerleri["ParaBirimi"]);
                      $UrunVaryantBasligi  = GeriDöndür($UrunTablosundakiUrunDegerleri["VaryantBasligi"]);
                      
                      $VaryantaBaglan = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = '$SepettekiUrunVaryantSecimi' LIMIT 1 ");
                      $VaryantVarMi   = $VaryantaBaglan->num_rows;
                      $VaryantTablosundakiUrunDegerleri = $VaryantaBaglan->fetch_assoc();
                      @$VaryantAdi       = GeriDöndür($VaryantTablosundakiUrunDegerleri["VaryanAdi"]);
                      @$VaryantStokAdedi = GeriDöndür($VaryantTablosundakiUrunDegerleri["StokAdedi"]);
                      
                      $SepettekiToplamUrun  += $SepettekiUrunUrunAdedi;
                  ?>
                      <tr height="100">
                          <td>
                              <table width="820" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">
                                <tr>
                                    <td align="center" width="140"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$SepettekiUrunTabloAdi."/".$SepettekiUrunUrunID; ?>"><img src="<?php echo $UrunResmi; ?>" border="0" width="70" height="100"></a></td>
                                    
                                    <td align="center" width="60">
                                    <a href="SepetimdenKaldir/<?php echo $SepettekiUrunTabloAdi."/".$SepettekiUrunUrunID."/".$SepettekiUrunSepetNumarasi; ?>"><img src="Resimler/SilDaireli20x20.png" style="margin-top: 5px;"></a>
                                    </td>
                                    
                                    <td align="center" style="width: 400px; max-width: 400px; height: 20px; overflow: hidden; line-height: 20px;"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$SepettekiUrunTabloAdi."/".$SepettekiUrunUrunID; ?>" style="color: #C500BE; text-decoration: none;">
                                    <?php echo $UrunAdi; if($UrunVaryantBasligi != "" and $VaryantAdi!= ""){ echo "<br />--- " . $UrunVaryantBasligi . " : " . $VaryantAdi . " ---";} ?>
                                    </a></td>
                                    
                                    <td width="80" align="center">
                                        <table width="80" align="center" border="0" cellpadding="0" cellspacing="0">
                                          <tr>
                                            <td width="30" align="right"><?php if($SepettekiUrunUrunAdedi>1){ ?><a href="Eksi/<?php echo $SepettekiUrunTabloAdi."/".$SepettekiUrunUrunID."/".$SepettekiUrunSepetNumarasi; ?>"><img src="Resimler/AzaltDaireli20x20.png" style="margin-top: 5px;"></a><?php }else{echo " ";} ?></td>
                                            <td width="20" align="center"><?php echo $SepettekiUrunUrunAdedi; ?></td>
                                            <td width="30" align="left"><a href="Arti/<?php echo $SepettekiUrunTabloAdi."/".$SepettekiUrunUrunID."/".$SepettekiUrunSepetNumarasi; ?>"><img src="Resimler/ArttirDaireli20x20.png" style="margin-top: 5px;"></a></td>
                                          </tr>
                                        </table>
                                    </td>
                                    
                                    <td align="center" width="120">
                                     <?php 

                                          if($UrunParaBirimi=="USD"){
                                              $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                                          }elseif($UrunParaBirimi=="EUR"){
                                              $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                                          }else{
                                              $UrunFiyatiHesapla = $UrunFiyati;
                                          }
                      
                                              $CokluUrunFiyatiHesapla = ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);
                                              echo FiyatBicimlendir($CokluUrunFiyatiHesapla) . " TL";
                                    ?>
                                    </td>
                                </tr>
                              </table>
                          </td>
                      </tr>
                    <?php 
                      if($SepettekiUrunUrunAdedi>1){
                          $SepettekiToplamFiyat += ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);
                      }else{
                      $SepettekiToplamFiyat += $UrunFiyatiHesapla; }

                  } 
                    ?>
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
              
              <tr>
                  <td align="right">Ödenecek Toplam Tutar</td>
              </tr>
              <tr>
                  <td height="60" align="right"><b style="color: #9639FF; font-size:20px;"><?php echo FiyatBicimlendir($SepettekiToplamFiyat); ?> TL</b>&nbsp;&nbsp;</td>
              </tr>
              <tr>
                  <td align="right"><div><a href="AdresVeKargoSecimi" class="SepetIciDEVAMET" style="font-size:20px;"><img src="Resimler/SepetBeyaz21x20.png" border="0">DEVAM ET</a></div></td>
              </tr>
         </table>
      </td>
              <?php }else{ ?>
                      <tr height="75">
                          <td valign="top">Sepette Urününüz bulunmamaktadır.</td>
                      </tr>
                      <tr height="40">
                          <td class="SonucSayfalari" align="left">Siparişlerinizin durumuna göz atmak için >>><a href="index.php?SK=61" class="SonucSayfalari"><b>Siparişlerim</b></a></td>
                      </tr>
                    <?php } ?>    </tr>
</table>    
<?php    
}else{
    header("Location:index.php");
    exit();
}
?>