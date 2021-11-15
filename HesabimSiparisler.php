<?php 
if(isset($_SESSION["Kullanici"])){ 

$SYFSagSolButonSayisi               = 2;
$SYFBasinaGosterilenKayitSayisi     = 5;


$ToplamKayitSayisiQuery             = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler WHERE UyeID = '$Uyeid' ORDER BY SiparisNumarasi DESC");
$KacFarkliSiparisVar                = $ToplamKayitSayisiQuery->num_rows;
    
$SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
$KacSayfaVar                        = ceil($KacFarkliSiparisVar/$SYFBasinaGosterilenKayitSayisi);
?>
    
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
        <td><hr /></td>
    </tr>
    
    <tr>
        <td>
            <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                <td width="203" style="border: 1px solid #6A00DF; text-align: center;" class="HesabimUstBolum"><input type="button" value="Üyelik Bilgilerim" onclick="location.href='Hesabim';" class="HesabimButonlari"></td>
                <td width="10">&nbsp;</td>
                <td width="203" style="border: 1px solid #6A00DF; text-align: center;" class="HesabimUstBolum"><input type="button" value="Adresler" onclick="location.href='Adreslerim';" class="HesabimButonlari"></td>
                <td width="10">&nbsp;</td>
                <td width="203" style="border: 1px solid #6A00DF; text-align: center;" class="HesabimUstBolum"><input type="button" value="Favoriler" onclick="location.href='Favorilerim/1';" class="HesabimButonlari"></td>
                <td width="10">&nbsp;</td>
                <td width="203" style="border: 1px solid #6A00DF; text-align: center;" class="HesabimUstBolum"><input type="button" value="Yorumlar" onclick="location.href='Yorumlarim/1';" class="HesabimButonlari"></td>
                <td width="10">&nbsp;</td>
                <td width="203" style="border: 1px solid #6A00DF; text-align: center;" class="HesabimUstBolum"><input type="button" value="Siparişler" onclick="location.href='Siparislerim/1';" class="HesabimButonlari"></td>
                <td width="10">&nbsp;</td>
                <td width="203" style="border: 1px solid #6A00DF; text-align: center;" class="HesabimUstBolum"><input type="button" value="Ürünlerim" onclick="location.href='Urunlerim/1';" class="HesabimButonlari"></td>
            </table>
        </td>
    </tr>
    

    <tr>
        <td><hr /></td>
    </tr>
    
  <tr>
      <td width="1065" valign="top">
              <table width="1065" align="left" border="0" cellpadding="0" cellspacing="0">
                  <tr height="50">
                      <td colspan="6" style="color: #FF9900"><h3>Siparişlerim</h3></td>
                  </tr>

                  <tr height="40">
                      <td colspan="6" valign="top">Tüm Siparişlerinizi Görüntüleyebilirsiniz</td>
                  </tr>
                                    
                  <tr height="30" style="background: #FFD1FE;">
                      <td width="125" align="center" style="border: 1px solid #AD0092;">&nbsp;Sipariş Numarası</td>
                      <td width="75" align="center" style="border: 1px solid #AD0092;">&nbsp;Resim</td>
                      <td width="60" align="center" style="border: 1px solid #AD0092;">&nbsp;Yorum</td>
                      <td width="500" align="left" style="border: 1px solid #AD0092;">&nbsp;Adı</td>
                      <td width="55" align="center" style="border: 1px solid #AD0092;">&nbsp;Adet</td>
                      <td width="100" align="center" style="border: 1px solid #AD0092;">&nbsp;Fiyat</td>
                      <td width="150" align="center" style="border: 1px solid #AD0092;">&nbsp;Kargo Durumu / Takip</td>
                  </tr>
                  <?php


            $SiparisNumaralari           = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler WHERE UyeID = '$Uyeid' ORDER BY SiparisNumarasi DESC
            LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
            $KayitliSiparisNumarasiVarsa = $SiparisNumaralari->num_rows;

            if($KayitliSiparisNumarasiVarsa>0){
                while($SiparisNoKayitlari = $SiparisNumaralari->fetch_assoc()){
                    $SiparisNO            = $SiparisNoKayitlari["SiparisNumarasi"];
                    
                    $SiparisIcerigi         = $DataBaseConnection->query("SELECT * FROM siparisler WHERE UyeID = '$Uyeid' AND SiparisNumarasi = '$SiparisNO' ORDER BY SiparisNumarasi ASC");
                    $SiparisDetayiVarsa     = $SiparisIcerigi->num_rows;
                    
                    while($SiparisKayitlari = $SiparisIcerigi->fetch_assoc()){
                        $UrunID         = GeriDöndür($SiparisKayitlari["UrunID"]);
                        $UrunAdi        = GeriDöndür($SiparisKayitlari["UrunAdi"]);
                        $UrunFiyati     = GeriDöndür($SiparisKayitlari["ToplamUrunFiyati"]);   
                        $UrunParaBirimi = GeriDöndür($SiparisKayitlari["ParaBirimi"]);
                        $UrunAdedi      = GeriDöndür($SiparisKayitlari["UrunAdedi"]);
                        $UrunTablusu    = GeriDöndür($SiparisKayitlari["TabloAdi"]);

                        if($UrunParaBirimi=="USD"){
                            $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                        }elseif($UrunParaBirimi=="EUR"){
                            $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                        }else{
                            $UrunFiyatiHesapla = $UrunFiyati;
                        }
                        

                        $SiparisinKargoDurumu = $SiparisKayitlari["KargoDurumu"];
                        if($SiparisinKargoDurumu == 0){
                            $KargomNeDurumda = "Bekelemede";
                        }elseif($SiparisinKargoDurumu == 8){
                            $KargomNeDurumda = "Elden Teslim";
                        }elseif($SiparisinKargoDurumu == 9){
                            $KargomNeDurumda = "Kargolanamaz";
                        }else{
                            $KargomNeDurumda = GeriDöndür($SiparisKayitlari["KargoGonderiKodu"]);
                        }
                        

                        ?>
                  
                  
                        <tr height="30" style="">
                            <td width="125" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; padding: 10px 0;">&nbsp;#<?php echo GeriDöndür($SiparisKayitlari["SiparisNumarasi"]); ?></td>
                            <td width="75" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; padding: 10px 0;"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$UrunTablusu."/".$UrunID; ?>"><img src="<?php echo GeriDöndür($SiparisKayitlari["UrunResmiBIR"]); ?>" border="0" width="69" height="80"></a></td>
                            <td width="60" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; padding: 10px 0; font-weight: bold;"><a href="SipariseYorumYap/<?php echo SEO($UrunAdi)."/".$UrunTablusu."/".$UrunID; ?> "><img src="Resimler/DokumanKirmiziKalemli20x20.png" border="0"></a></td>
                            <td width="500" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; font-weight: bold;">&nbsp;<a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$UrunTablusu."/".$UrunID; ?>" style="color: #C500BE; text-decoration: none;"><table align="center" height="100"><tr><td><?php echo GeriDöndür($SiparisKayitlari["UrunAdi"]); ?></td></tr></table></a></td>
                            <td width="55" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; padding: 10px 0; font-weight: bold;">&nbsp;<a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$UrunTablusu."/".$UrunID; ?>" style="color: #C500BE; text-decoration: none;"><?php echo $UrunAdedi; ?></a></td>
                            <td width="100" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; padding: 10px 0;">&nbsp;<a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$UrunTablusu."/".$UrunID; ?>" style="color: #C500BE; text-decoration: none;"><?php echo FiyatBicimlendir($UrunFiyatiHesapla); ?> TL</a></td>
                            <td width="150" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; padding: 10px 0;">&nbsp;<?php echo $KargomNeDurumda; ?></td>
                        </tr>                  
                  
                        <?php
                    }
                    ?>
                  <tr><td colspan="7"><hr /></td></tr>
                  <?php
                }
                
                if($KacSayfaVar>1){
                ?>
                  
                  <tr height="50">
                      <td colspan="7" align="center">
                      
                          <div class="SayfalamaAlani">
                              <div class="SayfalamaAlaniIciMetinAlani">
                                  Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacFarkliSiparisVar; ?> adet Kayıt var.
                              </div>
                              <div class="SayfalamaAlaniIciNumaraAlani">
                                  <?php 
                                        if($Sayfalama > 1){
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Siparislerim/1'> << </a></span>";
                                        $sayfalamaEKSIbir = $Sayfalama - 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Siparislerim/" . $sayfalamaEKSIbir . "'> < </a></span>";
                                        }
                
                                        for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                            if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                                if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                                    echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                                }else{
                                                    echo "<span class='SayfalamaLinkiPasif'><a href='Siparislerim/" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                                }
                                            }
                                        }
                
                
                                        if($Sayfalama != $KacSayfaVar){
                                        $sayfalamaARTIbir = $Sayfalama + 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Siparislerim/" . $sayfalamaARTIbir . "'> > </a></span>";
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Siparislerim/" . $KacSayfaVar . "'> >> </a></span>";
                                        }
                                  ?>
                              </div>
                          </div>
                      </td>
                  </tr>
                  
            <?php }
            }else{ ?> <tr><td colspan="7">Sisteme Tanımlı Siparişiniz Bulunmamaktadır</td></tr> <?php } ?>
              </table>
      </td>
    </tr>
</table>    
<?php    
}else{
    header("Location:AnaSayfa");
    exit();
}
?>