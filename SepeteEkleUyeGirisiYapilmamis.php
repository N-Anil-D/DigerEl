<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">

  <tr height="150">
      <td align="center"><img src="Resimler/Dikkat.png"></td>
  </tr>

  <tr>
      <td align="center"><b>DİKKAT! Sepet işlemiş üye girişi olmadan yapılamaz</b></td>
  </tr>

  <tr height="80">
      <td align="center">Site üzerinden alışveriş yapabilmek için üye girişi yapmanız gerekiyor.</td>
  </tr>

  <tr height="40">
      <td class="SonucSayfalari" align="center">Üye olmak için >>><a href="index.php?SK=24" class="SonucSayfalari"><b>Üye Ol</b></a></td>
  </tr>
    
  <tr height="40">
      <td class="SonucSayfalari" align="center">Giriş yapmak için >>><a href="index.php?SK=31" class="SonucSayfalari"><b>Giriş Yap</b></a></td>
  </tr>
  <tr height="40">
      <td>&nbsp;</td>
  </tr>
</table>











<?php
    if(isset($_COOKIE["83CerezUID"]) and isset($_COOKIE["83CerezTA"])){

    $GelenUrunID   = GuvenlikFiltresi($_COOKIE["83CerezUID"]);
    $GelenTabloAdi = GuvenlikFiltresi($_COOKIE["83CerezTA"]);
//--------------------------------------------
    
$Durumu         = 1;
$Limit          = 1;      
$UrunHitGuncelle    = $DataBaseConnection->prepare("UPDATE $GelenTabloAdi SET GoruntulenmeSayisi=GoruntulenmeSayisi+1 WHERE id = ? AND Durumu = ? LIMIT ?");
$UrunHitGuncelle->bind_param("iii", $GelenUrunID,$Durumu,$Limit);
$UrunHitGuncelle->execute();    
    
$UrunDetaySorgusu   = $DataBaseConnection->query("SELECT * FROM $GelenTabloAdi WHERE id = $GelenUrunID AND Durumu = 1 LIMIT 1");
$UrunAktifMi        = $UrunDetaySorgusu->num_rows;

 if($UrunAktifMi>0){
     
     while($UrunuGetir = $UrunDetaySorgusu->fetch_assoc()){
?>
<table width="1065" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
 <?php //------------------------------------------------------------------------------------------------ SOLDAKİ KISIM ------------------------------------------------------------------------------------------------ ?>
        <td width="350">
            <table width="350" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr valign="top">
                    <td align="center"><img id="BuyukResim" src="<?php echo $UrunuGetir["UrunResmiBIR"]; ?>" border="0" width="350" height="440"></td>
                </tr>
                
                <tr height="10"><td>&nbsp;</td></tr>
                <tr>
                    <td>
                        <table width="350" align="center" cellpadding="0" cellspacing="0" border="0">
                            <tr>
                                <td width="10">&nbsp;</td>
                                <td width="70" align="center"><img src="<?php echo GeriDöndür($UrunuGetir["UrunResmiBIR"]); ?>" border="0" width="70" height="100" onClick="$.UrunDetayResmiDegistir('<?php echo GeriDöndür($UrunuGetir["UrunResmiBIR"]); ?>');"></td>
                                <td width="10">&nbsp;</td>
                                
                                <?php if(GeriDöndür($UrunuGetir["UrunResmiIKI"])!=""){ ?>
                                <td width="70" align="center"><img src="<?php echo GeriDöndür($UrunuGetir["UrunResmiIKI"]); ?>" border="0" width="70" height="100" onClick="$.UrunDetayResmiDegistir('<?php echo GeriDöndür($UrunuGetir["UrunResmiIKI"]); ?>');"></td>
                                <td width="10">&nbsp;</td>
                                <?php } ?>

                                <?php if(GeriDöndür($UrunuGetir["UrunResmiUC"])!=""){ ?>
                                <td width="70" align="center"><img src="<?php echo GeriDöndür($UrunuGetir["UrunResmiUC"]); ?>" border="0" width="70" height="100" onClick="$.UrunDetayResmiDegistir('<?php echo GeriDöndür($UrunuGetir["UrunResmiUC"]); ?>');"></td>
                                <td width="10">&nbsp;</td>
                                <?php } ?>
                                
                                <?php if(GeriDöndür($UrunuGetir["UrunResmiDORT"])!=""){ ?>
                                <td width="70" align="center"><img src="<?php echo GeriDöndür($UrunuGetir["UrunResmiDORT"]); ?>" border="0" width="70" height="100" onClick="$.UrunDetayResmiDegistir('<?php echo GeriDöndür($UrunuGetir["UrunResmiDORT"]); ?>');"></td>
                                <td width="10">&nbsp;</td>
                                <?php } ?>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr height="10"><td>&nbsp;</td></tr>
                
                
                
                
                
                
                <tr> <?php //------------------------------------------------------------------------------------------------REKLAM------------------------------------------------------------------------------------------------ ?>
                    
                    <?php 
                    $BannerQuery  = $DataBaseConnection->query("SELECT * FROM banner WHERE BannerAlani = 'Detay Sayfası Altı' ORDER BY GösterimSayisi ASC LIMIT 1");
                    $BannerSayisi = $BannerQuery->num_rows;


                    if($BannerSayisi){
                        $BannerCek = $BannerQuery->fetch_assoc()
                          ?>
                            <td>
                                <img src="<?php echo $BannerCek["BannerResmi"] ?>">
                            </td>
                        <?php
                        $BannerinIDsi = GeriDöndür($BannerCek["id"]);
                        $BannerGosterimSayisiARTTIR  = $DataBaseConnection->query("UPDATE banner SET GösterimSayisi=GösterimSayisi+1 WHERE id= '$BannerinIDsi' LIMIT 1");
                    }
                    ?>                    
                </tr> <?php //------------------------------------------------------------------------------------------------ REKLAM BİTİŞ ------------------------------------------------------------------------------------------------ ?>
                
            </table>
                </td>
                 <?php //------------------------------------------------------------------------------------------------ SOLDAKİ KISIM BİTİŞ ------------------------------------------------------------------------------------------------ ?>
                <td width="10">&nbsp;</td>

        
                 <?php //------------------------------------------------------------------------------------------------ SAĞDAKİ KISIM ------------------------------------------------------------------------------------------------ ?>
                <td width="705" valign="top">
                    <table width="705" cellpadding="0" cellspacing="0" border="0">
                        <tr height="50" bgcolor="F1F1F1"><td style="text-align: left; font-size: 18px; font-weight: bold;">&nbsp;<?php echo GeriDöndür($UrunuGetir["UrunAdi"]); ?></td></tr>
                        <tr>
                            <td>
                                <form action="index.php?SK=88" method="post">
                                    <input type="hidden" value="<?php echo $GelenTabloAdi; ?>" name="TA">
                                    <input type="hidden" value="<?php echo $GelenUrunID; ?>" name="UID">
                                    <table width="705" align="center" cellpadding="0" cellspacing="0" border="0">
                                        <tr height="40">
                                            <td width="10">&nbsp;</td>
                                            <td width="30" align="center"><a href="<?php echo GeriDöndür($SiteFacebook) ?>"><img src="Resimler/Facebook24x24.png" border="0" style="margin-top: 5px" target="_blank" rel="noopener noreferrer"></a></td>
                                            <td width="10">&nbsp;</td>
                                            <td width="30" align="center"><a href="<?php echo GeriDöndür($SiteInstagram) ?>"><img src="Resimler/Instagram24x24.png" border="0" style="margin-top: 5px" target="_blank" rel="noopener noreferrer"></a></td>
                                            <td width="250">&nbsp;</td>                                       
                                            <?php if(isset($_SESSION["Kullanici"])){ ?>
                                            <td width="30" align="center"><a href="index.php?SK=84&TA=<?php echo $GelenTabloAdi . "&UID=" . $GelenUrunID ?>"><img src="Resimler/KalpKirmiziDaireliBeyaz24x24.png" border="0" style="margin-top: 5px"></a></td>
                                            <?php }else{ ?>
                                            <td width="30" align="center"><img src="Resimler/KalpKirmiziDaireliBeyaz24x24.png" border="0" style="margin-top: 8px" onClick="$.FavoriyeEkleyemzsin('Uye Girişi Olmadan favorilerine ekleyemezsiniz');"></td>
                                            <?php } ?>
                                            <td width="100"><input class="SepeteEkleButonu" type="submit" value="Sepete Ekle"></td>

                                        </tr>
                                        
                                        
                                        
                                        <?php // --------------------------------------------------- PARA BİRİMİ DÖNÜŞÜMÜ ------------------------------------------------------------------
                                        $OnlineKayitlar           = $UrunDetaySorgusu->num_rows;

                                        $dongusayisi=1;
                                        $StunAdetSayisi=4;


                                        $UrunFiyati     = GeriDöndür($UrunuGetir["UrunFiyati"]);   
                                        $UrunParaBirimi = GeriDöndür($UrunuGetir["ParaBirimi"]);

                                            if($UrunParaBirimi=="USD"){
                                                $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                                            }elseif($UrunParaBirimi=="EUR"){
                                                $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                                            }else{
                                                $UrunFiyatiHesapla = $UrunFiyati;
                                            }


                                        // --------------------------------------------------- PARA BİRİMİ DÖNÜŞÜMÜ ------------------------------------------------------------------
                                        ?>
                                        <tr height="40">
                                            <td colspan="7">
                                              <table width="705" cellpadding="0" cellspacing="0" border="0">
                                                  <tr height="40">
                                                      <td width="500">
                                                              <?php 
                                                                $VaryantQ              = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE TabloAdi= '$GelenTabloAdi' AND UrunID = '$GelenUrunID' AND StokAdedi > 0 ORDER BY VaryanAdi ASC");
                                                                $UrunVaryantiVarMi     = $VaryantQ->num_rows;
                                                                
                                                                if($UrunVaryantiVarMi>0){ ?>
                                                                    
                                                          <select name="varyant" class="SelectAlani">
                                                                  <option value="">Lütfen <?php echo GeriDöndür($UrunuGetir["VaryantBasligi"]); ?> Seçiniz</option>
                                                              
                                                                  <?php         
                                                                    while($urunVaryanlariniYaz = $VaryantQ->fetch_assoc() ){ ?>
                                                              
                                                                  <option value="<?php echo GeriDöndür($urunVaryanlariniYaz["id"]); ?>"><?php echo GeriDöndür($urunVaryanlariniYaz["VaryanAdi"]); ?></option>
                                                              
                                                                <?php }}else{ echo "&nbsp;";} ?>
                                                          </select>
                                                      </td>
                                                      <td width="205" align="right" style="font-size: 24px;"><b><?php echo FiyatBicimlendir($UrunFiyatiHesapla); ?> TL</b></td>
                                                  </tr>
                                              </table>
                                            </td>
                                        </tr>
                                    </table>
                                </form>
                            </td>
                        </tr>
                        <tr> <td> <hr /> </td> </tr> <?php // ------------------------------------------------------------- CİZİK ------------------------------------------------------------- ?>
                        
                        <tr>
                            <td>
                                <table width="705" cellpadding="0" cellspacing="0" border="0">
                                    <tr height="30">
                                        <td><img src="Resimler/SaatEsnetikGri20x20.png" border="0" style="margin-top: 5px"></td>
                                        <td>Siparişiniz en geç <?php echo UcGunSonrasiniBul(); ?> tarihine kargoya verilecektir.</td>
                                    </tr>
                                    <tr height="30">
                                        <td><img src="Resimler/KrediKarti20x20.png" border="0" style="margin-top: 5px"></td>
                                        <td>Tüm bankaların kredi kartları ile tek çekim veya taksitli ödeme yapılabilir.</td>
                                    </tr>
                                    <tr height="30">
                                        <td><img src="Resimler/Banka20x20.png" border="0" style="margin-top: 5px"></td>
                                        <td>Tüm bankalardan havale veya EFT ile ödeme yapılabilir.</td>
                                    </tr>
                                    <tr height="30">
                                        <td colspan="2"><hr /></td>
                                    </tr>
                                    <tr height="30" bgcolor="#FF9844">
                                        <td colspan="2">&nbsp;<b>Ürün Açıklaması</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div style="width: 705px; max-width: 705px; height: 150px; max-height: 150px; overflow-y: scroll;">
                                            &nbsp;<?php echo GeriDöndür($UrunuGetir["UrunAciklamasi"]); ?>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr height="30" bgcolor="#FF9844">
                                        <td colspan="2">&nbsp;<b>Ürün Yorumları</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <div style="width: 705px; max-width: 705px; height: 300px; max-height: 300px; overflow-y: scroll;">
                                            <table width="685" cellpadding="0" cellspacing="0" border="0">
                                                <tr>
                                                    <td width="64" align="center"><b>Yıldız</b></td>
                                                    <td width="10">&nbsp;</td>
                                                    <td width="451" align="left"><b>Yorumu yapan kullanıcı</b></td>
                                                    <td width="10">&nbsp;</td>
                                                    <td width="64" align="center"><b>Tarih</b></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5"><hr /></td>
                                                </tr>
                                              <?php 
                                                $YorumlarQ              = $DataBaseConnection->query("SELECT * FROM yorumlar WHERE TabloAdi= '$GelenTabloAdi' AND UrunID = '$GelenUrunID' ORDER BY YorumTarihi DESC");
                                                $UrunYorumuVarMi        = $YorumlarQ->num_rows;

                                                if($UrunYorumuVarMi>0){ 
                                                    while($UrunHakkindaYorumlar = $YorumlarQ->fetch_assoc() ){
                                                        
                                                        $UrunPuaniHesapla = GeriDöndür($UrunHakkindaYorumlar["Puan"]);
                                                        if($UrunPuaniHesapla==1){
                                                            $PuaninResmi = "YildizBirDolu.png";
                                                        }elseif($UrunPuaniHesapla==2){
                                                            $PuaninResmi = "YildizIkiDolu.png";
                                                        }elseif($UrunPuaniHesapla==3){
                                                            $PuaninResmi = "YildizUcDolu.png";
                                                        }elseif($UrunPuaniHesapla==4){
                                                            $PuaninResmi = "YildizDortDolu.png";
                                                        }elseif($UrunPuaniHesapla==5){
                                                            $PuaninResmi = "YildizBesDolu.png";
                                                        } 
                                                $yorumYapanUyeid         = GeriDöndür($UrunHakkindaYorumlar["UyeID"]);      
                                                $YorumYapanUyeyiBul      = $DataBaseConnection->query("SELECT isimSoyisim FROM uyeler WHERE id= $yorumYapanUyeid LIMIT 1");
                                                $YorumYapaninAdi         = $YorumYapanUyeyiBul->fetch_assoc();        

                                                
                                                ?>
                                                <tr>
                                                    <td width="64" align="center" valign="top">&nbsp;<img src="Resimler/<?php echo $PuaninResmi ?>"></td>
                                                    <td width="10">&nbsp;</td>
                                                    <td width="451" align="left" valign="top"><?php echo GeriDöndür($YorumYapaninAdi["isimSoyisim"]); ?></td>
                                                    <td width="10">&nbsp;</td>
                                                    <td width="64" align="center" valign="top"><?php echo TarihBul(GeriDöndür($UrunHakkindaYorumlar["YorumTarihi"])); ?></td>
                                                </tr>
                                                <tr>
                                                    <td colspan="5" style="border-bottom: 1px dashed #CCCCCC" align="left"><b>Yorumu :</b> <?php echo GeriDöndür($UrunHakkindaYorumlar["Yorum"]); ?></td>
                                                </tr>
                                                <?php } }else{ ?>
                                                <tr>
                                                    <td colspan="5" style="border-bottom: 1px dashed #CCCCCC">Ürün hakkında henüz yorum yapılmamış.</td>
                                                </tr>
                                                <?php    
                                                } ?>
                                                </table>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>                        
                    </table>
                </td>
                 <?php //<!-- ------------------------------------------------------------------------------------------------ SAĞDAKİ KISIM BİTİŞ ------------------------------------------------------------------------------------------------ -->?>
    </tr>
</table>

<?php }                             //while kapatmsı
 }else{                             //$UrunAktifMi kapatmsı
    header("Location:index.php");
    exit();
}
    }else{              //çerezden tablo adı ve uid gelmezse
    header("Location:index.php");
    exit();
}
?>