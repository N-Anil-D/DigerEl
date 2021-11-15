<?php
if(isset($_GET["UID"]) and isset($_GET["TA"])){
    $GelenUrunID   = GuvenlikFiltresi($_GET["UID"]);
    $GelenTabloAdi = GuvenlikFiltresi($_GET["TA"]);
//--------------------------------------------
$SatirRengi     = 0;    
$Limit          = 1;      
$UrunHitGuncelle    = $DataBaseConnection->prepare("UPDATE $GelenTabloAdi SET GoruntulenmeSayisi=GoruntulenmeSayisi+1 WHERE id = ? LIMIT ?");
$UrunHitGuncelle->bind_param("ii", $GelenUrunID,$Limit);
$UrunHitGuncelle->execute();    

$UrunDetaySorgusu   = $DataBaseConnection->query("SELECT * FROM $GelenTabloAdi WHERE id = $GelenUrunID AND Durumu = 1 LIMIT 1");
$UrunAktifMi        = $UrunDetaySorgusu->num_rows;

 if($UrunAktifMi>0){
     
     while($UrunuGetir = $UrunDetaySorgusu->fetch_assoc()){
?>
<table width="1065" align="center" cellpadding="0" cellspacing="0" border="0">
    <tr>
 <?php //------------------------------------------------------------------------------------------------ SOLDAKİ KISIM ------------------------------------------------------------------------------------------------ ?>
        <td width="350" valign="top">
            <table width="350" align="center" cellpadding="0" cellspacing="0" border="0">
                <tr valign="top">
                    <td><img id="BuyukResim" src="<?php echo $UrunuGetir["UrunResmiBIR"]; ?>" border="0" width="350" height="440"></td>
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
                    }
                    ?>                    
                </tr> <?php //------------------------------------------------------------------------------------------------ REKLAM BİTİŞ ------------------------------------------------------------------------------------------------ ?>
                
            </table>
                </td>
                 <?php //------------------------------------------------------------------------------------------------ SOLDAKİ KISIM BİTİŞ ------------------------------------------------------------------------------------------------ ?>
                <td width="10">&nbsp;</td>

        
                 <?php //------------------------------------------------------------------------------------------------ SEPETE EKLE KISIMI ------------------------------------------------------------------------------------------------ ?>
                <td width="705" valign="top">
                    <table width="705" cellpadding="0" cellspacing="0" border="0">
                        <tr height="50" bgcolor="F1F1F1"><td style="text-align: left; font-size: 18px; font-weight: bold;">&nbsp;<?php echo GeriDöndür($UrunuGetir["UrunAdi"]); ?></td></tr>
                        <tr>
                            <td>
                                <form action="SepeteEkle" method="post">
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
                                            <td width="30" align="center"><a href="FavorilerimeEkle/<?php echo $GelenTabloAdi."/".$GelenUrunID ?>"><img src="Resimler/KalpKirmiziDaireliBeyaz24x24.png" border="0" style="margin-top: 5px"></a></td>
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


                                        // --------------------------------------------------- PARA BİRİMİ DÖNÜŞÜMÜ - VARYANT ------------------------------------------------------------------
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
                                                                    
                                                          <select name="varyant" class="SelectAlani" required>
                                                                  <option value="">Lütfen <?php echo GeriDöndür($UrunuGetir["VaryantBasligi"]); ?> Seçiniz</option>
                                                              
                                                                  <?php         
                                                                    while($urunVaryanlariniYaz = $VaryantQ->fetch_assoc() ){ ?>
                                                              
                                                                  <option value="<?php echo GeriDöndür($urunVaryanlariniYaz["id"]); ?>"><?php echo GeriDöndür($urunVaryanlariniYaz["VaryanAdi"]) ." (".GeriDöndür($urunVaryanlariniYaz["StokAdedi"])." adet)"; ?></option>
                                                              
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
                                        <td colspan="2"><img src="Resimler/SaatEsnetikGri20x20.png" border="0" style="margin-top: 5px">Siparişiniz en geç <?php echo UcGunSonrasiniBul(); ?> tarihine kargoya verilecektir.</td>
                                    </tr>
                                    <tr height="30">
                                        <td colspan="2"><img src="Resimler/KrediKarti20x20.png" border="0" style="margin-top: 5px">Tüm bankaların kredi kartları ile tek çekim veya taksitli ödeme yapılabilir.</td>
                                    </tr>
                                    <tr height="30">
                                        <td colspan="2"><img src="Resimler/Banka20x20.png" border="0" style="margin-top: 5px">Tüm bankalardan havale veya EFT ile ödeme yapılabilir.</td>
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
                                    
                                    <tr height="15">
                                        <td colspan="2"></td>
                                    </tr>

                                    
                                    <tr height="30" bgcolor="#FF9844">
                                        <td <?php if($UrunuGetir["UrunAdedi"] == ""){ echo ' colspan="2" '; }else{echo ' width="400"';} ?> >&nbsp;<b>Ürün Detayları</b></td>
                                        <?php if($UrunuGetir["UrunAdedi"] != ""){ ?><td align="right">Ürün Adedi :<b> <?php echo GeriDöndür($UrunuGetir["UrunAdedi"]); ?></b>&nbsp;&nbsp;&nbsp;</td><?php } ?>
                                    </tr>
                                    <?php // --------------------------------------------------- -----------------Ürün Detayları-----------------Ürün Detayları-----------------Ürün Detayları-----------------Ürün Detayları-----------------Ürün Detayları
                                    if($GelenTabloAdi=="arac"){
                                    ?>
                                    <tr><td colspan="2">
                                        <table width="705" cellpadding="0" cellspacing="0" border="0" style="border-bottom: double #C500BE; margin:20px 0px 20px 0px;">
                                          <?php if($UrunuGetir["id"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan ID
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["id"])*789547; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["ilanTarihi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan Tarihi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GunAyYil(GeriDöndür($UrunuGetir["ilanTarihi"])); ?>
                                            </td>
                                          </tr><?php } ?>
                                    
                                          <?php if($UrunuGetir["Marka"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marka
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Marka"]); ?>
                                            </td>
                                          </tr><?php } ?>
                        
                                          <?php if($UrunuGetir["Seri"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Araç Serisi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Seri"]); ?>
                                            </td>
                                          </tr><?php } ?>
    
                                          <?php if($UrunuGetir["Model"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Model"]); ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["Yil"] != "" and $UrunuGetir["Yil"] != "0"){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yıl
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Yil"]); ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["KM"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;KM
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["KM"]); ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["Renk"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Renk
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Renk"]); ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["VitesTipi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Vites Tipi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["VitesTipi"])." Vites"; ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["MotorHacmi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Motor Hacmi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["MotorHacmi"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                          <?php if($UrunuGetir["MotorGucu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Motor Gücü
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["MotorGucu"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                          <?php if($UrunuGetir["MotorHacmi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Motor Hacmi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["MotorHacmi"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                          <?php if($UrunuGetir["Takas"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Takas
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;<?php if($UrunuGetir["Takas"]){echo "color:#00ff00;";}else{echo "color:#ff0000;";}?>">
                                                <?php if($UrunuGetir["Takas"]){$TakasVarMi_ = "Takas Teklifine Açık";}else{$TakasVarMi_ = "Takas Teklifine Kapalı";} echo $TakasVarMi_; ?>
                                            </td>
                                          </tr><?php } ?>
                                          <?php if($UrunuGetir["BoyaDegisen"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Boya veya Değişen Parça
                                            </td>
                                            <td width="285" align="center" style="<?php $orjinalse = GeriDöndür($UrunuGetir["BoyaDegisen"]); if($orjinalse == "Tamamı Orjinal"){echo "color:#00ff00;";}?>">
                                                <?php echo GeriDöndür($UrunuGetir["BoyaDegisen"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                        </table></td>
                                    </tr>
                                    <?php //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                    }elseif($GelenTabloAdi=="konut"){
                                    ?>
                                    <tr><td colspan="2">
                                        <table width="705" cellpadding="0" cellspacing="0" border="0" style="border-bottom: double #C500BE; margin:20px 0px 20px 0px;">
                                          <?php if($UrunuGetir["id"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan ID
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["id"])*789547; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["ilanTarihi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan Tarihi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GunAyYil(GeriDöndür($UrunuGetir["ilanTarihi"])); ?>
                                            </td>
                                          </tr><?php } ?>
                                    
                                          <?php if($UrunuGetir["Konumu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Konumu
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Konumu"]); ?>
                                            </td>
                                          </tr><?php } ?>
                        
                                          <?php if($UrunuGetir["odasayisi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Oda Sayısı
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo EksidenArtiya(GeriDöndür($UrunuGetir["odasayisi"])); ?>
                                            </td>
                                          </tr><?php } ?>
    
                                          <?php if($UrunuGetir["Brutm2"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bürüt m<sup>2</sup>
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Brutm2"])." m<sup>2</sup>"; ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["Netm2"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Net m<sup>2</sup>
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Netm2"])." m<sup>2</sup>"; ?>
                                            </td>
                                          </tr><?php } ?>
    
                                          <?php if($UrunuGetir["isinmaTipi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Isınma Tipi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["isinmaTipi"]); ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["Balkon"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Balkon
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php if($UrunuGetir["Balkon"]){$Balkon_ = "Balkonlu";}else{$Balkon_ = "Balkonsuz";} echo $Balkon_; ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["BanyoSayisi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Banyo Sayısı
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["BanyoSayisi"])." Adet"; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["BoyaliMi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Boyası Var Mı ?
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;<?php if($UrunuGetir["BoyaliMi"]){echo "color:#00ff00;";}else{echo "color:#ff0000;";}?>">
                                                <?php if($UrunuGetir["BoyaliMi"]){$KrediyeUygunMu_ = "Var";}else{$KrediyeUygunMu_ = "Yok";} echo $KrediyeUygunMu_; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["BinaYasi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Yaşı
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["BinaYasi"])." Yaşında";?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["BinadakiToplamKat"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Bina Kaç Katlı
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["BinadakiToplamKat"])." Katlı"; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Kat"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kaçıncı Katta ?
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Kat"])." Katta"; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["KrediyeUygunMu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Krediye Uygun Mu ?
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;<?php if($UrunuGetir["KrediyeUygunMu"]){echo "color:#00ff00;";}else{echo "color:#ff0000;";}?>">
                                                <?php if($UrunuGetir["KrediyeUygunMu"]){$KrediyeUygunMu_ = "Krediye Uygun";}else{$KrediyeUygunMu_ = "Krediye Uygun Değil";} echo $KrediyeUygunMu_; ?>
                                            </td>
                                          </tr><?php } ?>                                            
                                            
                                          <?php if($UrunuGetir["MobilyaliMi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobilyali Mı ?
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;<?php if($UrunuGetir["MobilyaliMi"]){echo "color:#00ff00;";}else{echo "color:#ff0000;";}?>">
                                                <?php if($UrunuGetir["MobilyaliMi"]){$MobilyaliMi_ = "Mobilyalı";}else{$MobilyaliMi_ = "Mobilyalı Değil";} echo $MobilyaliMi_; ?>
                                            </td>
                                          </tr><?php } ?>                                            
                                            
                                          <?php if($UrunuGetir["SuAnkiKullanimDurumu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Şu Anki Kullanım Durumu ?
                                            </td>
                                            <td width="285" align="center" style="<?php if($UrunuGetir["SuAnkiKullanimDurumu"]){echo "color:#ff0000;";}else{echo "color:#00ff00;";}?>">
                                                <?php if($UrunuGetir["SuAnkiKullanimDurumu"]){$SuAnkiKullanimDurumu_ = "Kullanımda";}else{$SuAnkiKullanimDurumu_ = "Boş";} echo $SuAnkiKullanimDurumu_; ?>
                                            </td>
                                          </tr><?php } ?>                                            
                                        </table></td>
                                    </tr>
                                    <?php //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                    }elseif($GelenTabloAdi=="giyim"){
                                    ?>
                                    <tr><td colspan="2">
                                        <table width="705" cellpadding="0" cellspacing="0" border="0" style="border-bottom: double #C500BE; margin:20px 0px 20px 0px;">
                                          <?php if($UrunuGetir["id"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan ID
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["id"])*789547; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["ilanTarihi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan Tarihi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GunAyYil(GeriDöndür($UrunuGetir["ilanTarihi"])); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Kullanilabilirlik"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kullanılabilirlik Durumu ?
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;<?php $SayiAnlami = SadeceSayilar($UrunuGetir["Kullanilabilirlik"]);
                                                if($SayiAnlami==5){$Kullanilabilirlik = "Etiketi Üzerinde (Hiç Kullanılmamış)";}
                                                elseif($SayiAnlami==4){$Kullanilabilirlik = "Hasarsız / Az Kullanılmış";}
                                                elseif($SayiAnlami==3){$Kullanilabilirlik = "Hasarsız / Kullanılmış";}
                                                elseif($SayiAnlami==2){$Kullanilabilirlik = "Kullanılmış";}?>">
                                                <?php echo $Kullanilabilirlik; ?>
                                            </td>
                                          </tr><?php } ?>
                                    
                                          <?php if($UrunuGetir["Marka"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marka
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Marka"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Beden"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Beden
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Beden"])." Beden"; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Renk"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Renk
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Renk"]); ?>
                                            </td>
                                          </tr><?php } ?>

                                          <?php if($UrunuGetir["Desen"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Desen
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Desen"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                        </table></td>
                                    </tr>
                                    <?php
                                    }elseif($GelenTabloAdi=="teknoloji"){
                                    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                                    ?>                                        
                                    <tr><td colspan="2">
                                        <table width="705" cellpadding="0" cellspacing="0" border="0" style="border-bottom: double #C500BE; margin:20px 0px 20px 0px;">
                                          <?php if($UrunuGetir["id"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan ID
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["id"])*789547; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["ilanTarihi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İlan Tarihi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GunAyYil(GeriDöndür($UrunuGetir["ilanTarihi"])); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Konumu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Konumu
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Konumu"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Marka"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marka
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Marka"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Model"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Model
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Model"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["Renk"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Renk
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Renk"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["UrunSerisi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">
                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ürün Serisi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["UrunSerisi"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["isletimSistemi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İşletim Sistemi
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["isletimSistemi"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                                                                        
                                          <?php if($UrunuGetir["RAM"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;RAM
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["RAM"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                                                                        
                                          <?php if($UrunuGetir["EkranBoyutu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;EkranBoyutu
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["EkranBoyutu"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                                                                        
                                          <?php if($UrunuGetir["Cozunurluluk"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Çözünürlülük
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Cozunurluluk"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                                                                        
                                          <?php if($UrunuGetir["CPU"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;İçindeki CPU
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["CPU"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                                                                        
                                          <?php if($UrunuGetir["CPUhizi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPU Hızı
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["CPUhizi"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                                                                        
                                          <?php if($UrunuGetir["GPU"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GPU
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["GPU"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["DiskTuru"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disk Türü
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["DiskTuru"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["DiskBoyutu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Disk Boyutu
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["DiskBoyutu"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["OnKamera"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ön Kamera
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["OnKamera"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                          <?php if($UrunuGetir["ArkaKamera"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Arka Kamera
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["ArkaKamera"]); ?>
                                            </td>
                                          </tr><?php } ?>

                                            <?php if($UrunuGetir["KargoUcreti"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kargo Ücreti
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["KargoUcreti"])." TL"; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                            <?php if($UrunuGetir["Kimden"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kimden ?
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE;">
                                                <?php echo GeriDöndür($UrunuGetir["Kimden"]); ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                            <?php if($UrunuGetir["SifirMi"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left" style="border-bottom: solid 1px #C500BE;">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sıfır Mı ?
                                            </td>
                                            <td width="285" align="center" style="border-bottom: solid 1px #C500BE; <?php if($UrunuGetir["SifirMi"]){echo "color:#00ff00;";}?>">
                                                <?php if($UrunuGetir["SifirMi"]){$TamirGorduMu_ = "Sıfır/Kullanılmamış";}else{$TamirGorduMu_ = "2. El";} echo $TamirGorduMu_; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                            <?php if($UrunuGetir["TamirGorduMu"] != ""){ ?><tr <?php if($SatirRengi%2==0){echo 'bgcolor="#FFFFB3"';$SatirRengi++;}else{$SatirRengi++;} ?> >
                                            <td width="420" align="left">

                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tamir Gördü Mü ?
                                            </td>
                                            <td width="285" align="center" style="<?php if($UrunuGetir["TamirGorduMu"]){echo "color:#ff0000;";}else{echo "color:#00ff00;";}?>">
                                                <?php if($UrunuGetir["TamirGorduMu"]){$TamirGorduMu_ = "Tamir Gördü";}else{$TamirGorduMu_ = "Tamir Görmedi";} echo $TamirGorduMu_; ?>
                                            </td>
                                          </tr><?php } ?>
                                            
                                        </table></td>
                                    </tr>
                                        
                                    <?php } ?>
                                    
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
                                                <?php } //while kapatması
                                                }else{ ?>
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
    header("Location:AnaSayfa");
    exit();
}
}else{                             //get gelmezse
    header("Location:AnaSayfa");
    exit();
}
?>