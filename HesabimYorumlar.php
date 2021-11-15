<?php 
if(isset($_SESSION["Kullanici"])){ 

$SYFSagSolButonSayisi               = 2;
$SYFBasinaGosterilenKayitSayisi     = 7;


$TumYorumlar                      = $DataBaseConnection->query("SELECT * FROM yorumlar WHERE UyeID = '$Uyeid' ORDER BY YorumTarihi DESC");
$KacFarkliYorumVar                = $TumYorumlar->num_rows;
    
$SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
$KacSayfaVar                        = ceil($KacFarkliYorumVar/$SYFBasinaGosterilenKayitSayisi);
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
                      <td colspan="4" style="color: #FF9900"><h3>Yorumlar</h3></td>
                  </tr>

                  <tr height="40">
                      <td colspan="4" valign="top">Tüm Yorumlarınızı Görüntüleyebilirsiniz</td>
                  </tr>
                                    
                  <tr height="30" style="background: #FFD1FE;">
                      <td width="70" align="center" style="border: 1px solid #AD0092;">Puan</td>
                      <td width="100" align="center" style="border: 1px solid #AD0092;">Resim</td>
                      <td width="900" align="left" style="border: 1px solid #AD0092;">&nbsp;Yorumunuz</td>
                      <td width="95" align="center" style="border: 1px solid #AD0092;">Gün.Ay.Yıl</td>


                  </tr>
                  <?php
                    $TumYorumlar2                      = $DataBaseConnection->query("SELECT * FROM yorumlar WHERE UyeID = '$Uyeid' ORDER BY YorumTarihi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
                    $yorumlariOku                      = $TumYorumlar2->num_rows;
                    if($yorumlariOku>0){
                        while($SiparisYorumlari = $TumYorumlar2->fetch_assoc()){
                        
                            if($SiparisYorumlari["Puan"]==5){
                                $UrunPuaniYildiz =  "YildizBesDolu.png";
                            }elseif($SiparisYorumlari["Puan"]==4){
                                $UrunPuaniYildiz =  "YildizDortDolu.png";
                            }elseif($SiparisYorumlari["Puan"]==3){
                                $UrunPuaniYildiz =  "YildizUcDolu.png";
                            }elseif($SiparisYorumlari["Puan"]==2){
                                $UrunPuaniYildiz =  "YildizIkiDolu.png";
                            }elseif($SiparisYorumlari["Puan"]==1){
                                $UrunPuaniYildiz =  "YildizBirDolu.png";
                            }
                            $TA      = GeriDöndür($SiparisYorumlari["TabloAdi"]);
                            $UID     = GeriDöndür($SiparisYorumlari["Urunid"]);
                            $YapilanYorum = GeriDöndür($SiparisYorumlari["Yorum"]);
                            
                            $UrunuGoster        = $DataBaseConnection->query("SELECT * FROM $TA WHERE id = $UID LIMIT 1");
                            $UrunBilgileri      = $UrunuGoster->fetch_assoc();
                            $UrunAdi   = GeriDöndür($UrunBilgileri["UrunAdi"]);
                            $URUNResmi = GeriDöndür($UrunBilgileri["UrunResmiBIR"]);
                        ?>
                  
                  
                        <tr height="30">
                            <td width="75" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; font-weight: bold;"><img src="Resimler/<?php echo $UrunPuaniYildiz; ?>"></td>
                            <td width="125" align="center" style="border-bottom: 1px solid #AD0092; text-align: center; padding: 10px 0; font-weight: bold;"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$TA."/".$UID; ?>"><img src="<?php echo $URUNResmi; ?>" height="69" width="80"></a></td>
                            <td align="center" style="border-bottom: 1px solid #AD0092; text-align: center; font-weight: bold;"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$TA."/".$UID; ?>" style="color: #C500BE; text-decoration: none;"><table align="center"><tr><td><?php echo $YapilanYorum; ?></td></tr></table></a></td>
                            <td width="50" align="center" style="border-bottom: 1px solid #AD0092; text-align: center;"><?php echo GunAyYil($SiparisYorumlari["YorumTarihi"]); ?></td>
                        </tr>                  
                  
                        <?php
                    }
                    ?>
                  <?php
                }else{ ?> <tr><td colspan="4">Sisteme Tanımlı Siparişiniz Bulunmamaktadır</td></tr> <?php }
                
                if($KacSayfaVar>1){
                ?>
                  
                  <tr height="50">
                      <td colspan="4" align="center">
                      
                          <div class="SayfalamaAlani">
                              <div class="SayfalamaAlaniIciMetinAlani">
                                  Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacFarkliYorumVar; ?> adet Kayıt var.
                              </div>
                              <div class="SayfalamaAlaniIciNumaraAlani">
                                  <?php 
                                        if($Sayfalama > 1){
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Yorumlarim/1'> << </a></span>";
                                        $sayfalamaEKSIbir = $Sayfalama - 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Yorumlarim/" . $sayfalamaEKSIbir . "'> < </a></span>";
                                        }
                
                                        for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                            if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                                if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                                    echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                                }else{
                                                    echo "<span class='SayfalamaLinkiPasif'><a href='Yorumlarim/" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                                }
                                            }
                                        }
                
                
                                        if($Sayfalama != $KacSayfaVar){
                                        $sayfalamaARTIbir = $Sayfalama + 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Yorumlarim/" . $sayfalamaARTIbir . "'> > </a></span>";
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Yorumlarim/" . $KacSayfaVar . "'> >> </a></span>";
                                        }
                                  ?>
                              </div>
                          </div>
                      </td>
                  </tr>
                  
            <?php
                } ?>
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