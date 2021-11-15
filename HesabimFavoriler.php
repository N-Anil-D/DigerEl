<?php 
if(isset($_SESSION["Kullanici"])){ 

$SYFSagSolButonSayisi               = 2;
$SYFBasinaGosterilenKayitSayisi     = 5;


$ToplamKayitSayisiQuery             = $DataBaseConnection->query("SELECT * FROM favoriler WHERE UyeID = '$Uyeid' ORDER BY id DESC");
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
                      <td colspan="4" style="color: #FF9900"><h3>Favoriler</h3></td>
                  </tr>

                  <tr height="40">
                      <td colspan="4" valign="top">Tüm Favori ürünlerinizi buradan Görüntüleyebilirsiniz</td>
                  </tr>
                                    
                  <tr height="30" style="background: #FFD1FE;">
                      <td width="100" align="center" style="border: 1px solid #AD0092;">Resim</td>
                      <td width="70" align="center" style="border: 1px solid #AD0092;">Sil</td>
                      <td width="710" align="left" style="border: 1px solid #AD0092;">&nbsp;Adı</td>
                      <td width="155" align="center" style="border: 1px solid #AD0092;">Fiyat</td>

                  </tr>
                  <?php


            $Favoriler           = $DataBaseConnection->query("SELECT * FROM favoriler WHERE UyeID = '$Uyeid' ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
            $KayitliFavori       = $Favoriler->num_rows;

            if($KayitliFavori>0){
                
                while($FavoriKayitlari = $Favoriler->fetch_assoc()){
                    
                    $tabloadi = GeriDöndür($FavoriKayitlari["TabloAdi"]);
                    $urunNum  = GeriDöndür($FavoriKayitlari["Urunid"]);
                    
                    $FavorilerdekiUrun        = $DataBaseConnection->query("SELECT * FROM $tabloadi WHERE id = $urunNum LIMIT 1");
                    $FavorilerdekiUrunSayisi  = $FavorilerdekiUrun->num_rows;
                    
                    while($FavoriUrunuSEC = $FavorilerdekiUrun->fetch_assoc()){
                    $UrunID         = GeriDöndür($FavoriUrunuSEC["id"]);
                    $UrunAdi        = GeriDöndür($FavoriUrunuSEC["UrunAdi"]);   
                    $UrunFiyati     = GeriDöndür($FavoriUrunuSEC["UrunFiyati"]);   
                    $UrunParaBirimi = GeriDöndür($FavoriUrunuSEC["ParaBirimi"]);
                        
                        if($UrunParaBirimi=="USD"){
                            $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                        }elseif($UrunParaBirimi=="EUR"){
                            $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                        }else{
                            $UrunFiyatiHesapla = $UrunFiyati;
                        }
                        

                  ?>
                  
                  
                        <tr height="30">
                            <td width="100" align="center" style="border-bottom: 1px dashed #C500BE; padding: 7px 0px;"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$tabloadi."/".$urunNum; ?>"><img src="<?php echo GeriDöndür($FavoriUrunuSEC["UrunResmiBIR"]); ?>" border="0" width="69" height="80"></a></td>
                            <td width="70" align="center" style="border-bottom: 1px dashed #C500BE"><a href="FavoriSil/<?php echo $UrunID."/".$tabloadi ?>"><img src="Resimler/Sil20x20.png"></a></td>
                            <td width="710" align="center" style="border-bottom: 1px dashed #C500BE"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$tabloadi."/".$urunNum; ?>" style="color: #C500BE; text-decoration: none;"><table align="center" height="100"><tr><td><?php echo GeriDöndür($FavoriUrunuSEC["UrunAdi"]); ?></td></tr></table></a></td>
                            <td width="155" align="center" style="border-bottom: 1px dashed #C500BE"><a href="UrunDetaylari/<?php echo SEO($UrunAdi)."/".$tabloadi."/".$urunNum; ?>" style="color: #C500BE; text-decoration: none;"><?php echo FiyatBicimlendir($UrunFiyatiHesapla); ?> TL</a></td>
                        </tr>                  
                  
                        <?php
                    }

                }
                
                if($KacSayfaVar>1){
                ?>
                  
                  <tr height="50">
                      <td colspan="4" align="center">
                      
                          <div class="SayfalamaAlani">
                              <div class="SayfalamaAlaniIciMetinAlani">
                                  Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacFarkliSiparisVar; ?> adet Kayıt var.
                              </div>
                              <div class="SayfalamaAlaniIciNumaraAlani">
                                  <?php 
                                        if($Sayfalama > 1){
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Favorilerim/1'> << </a></span>";
                                        $sayfalamaEKSIbir = $Sayfalama - 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Favorilerim/" . $sayfalamaEKSIbir . "'> < </a></span>";
                                        }
                
                                        for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                            if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                                if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                                    echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                                }else{
                                                    echo "<span class='SayfalamaLinkiPasif'><a href='Favorilerim/" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                                }
                                            }
                                        }
                
                
                                        if($Sayfalama != $KacSayfaVar){
                                        $sayfalamaARTIbir = $Sayfalama + 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Favorilerim/" . $sayfalamaARTIbir . "'> > </a></span>";
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Favorilerim/" . $KacSayfaVar . "'> >> </a></span>";
                                        }
                                  ?>
                              </div>
                          </div>
                      </td>
                  </tr>
                  
            <?php }
            }else{ ?> <tr><td colspan="4">Sisteme Tanımlı Favori ürününüz Bulunmamaktadır</td></tr> <?php } ?>
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