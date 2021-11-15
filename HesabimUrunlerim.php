<?php 
if(isset($_SESSION["Kullanici"])){ 

    $SYFSagSolButonSayisi               = 2;
    $SYFBasinaGosterilenKayitSayisi     = 2;


    $AracQ          = $DataBaseConnection->query("SELECT * FROM arac WHERE EkleyenUye = $Uyeid");
    $ToplamArac     = $AracQ->num_rows;
    
    $KonutQ         = $DataBaseConnection->query("SELECT * FROM konut WHERE EkleyenUye = $Uyeid");
    $ToplamKonut    = $KonutQ->num_rows;
    
    $GiyimQ         = $DataBaseConnection->query("SELECT * FROM giyim WHERE EkleyenUye = $Uyeid");
    $ToplamGiyim    = $GiyimQ->num_rows;
    
    $TeknolojiQ     = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE EkleyenUye = $Uyeid");
    $ToplamTeknoloji= $TeknolojiQ->num_rows;
    
    $KacTaneUrunVar = $ToplamArac+$ToplamKonut+$ToplamGiyim+$ToplamTeknoloji;
    
    $UrunSayArray   = array($ToplamArac,$ToplamKonut,$ToplamGiyim,$ToplamTeknoloji);
    $EnFazlaUrunSayisi = max($UrunSayArray);
    
$SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
$KacSayfaVar                        = ceil($EnFazlaUrunSayisi/$SYFBasinaGosterilenKayitSayisi);
?>
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
                      <td colspan="5" style="color: #FF9900"><h3>Ürünlerim</h3></td>
                      <td><input type="button" value="Ürün Ekle" onclick="location.href='UrunEkle/ ';" class="LinkButonuYesil"></td>
                  </tr>

                  <tr height="20">
                      <td colspan="6" valign="top" style="line-height: 20"></td>
                  </tr>
                                    
                  <tr height="30" style="background: #FFD1FE;">
                      <td width="123" align="center" style="border: 1px solid #AD0092;">&nbsp;Ürün ID</td>
                      <td width="73" align="center" style="border: 1px solid #AD0092;">&nbsp;Resim</td>
                      <td width="558" align="left" style="border: 1px solid #AD0092;">&nbsp;Adı</td>
                      <td width="53" align="center" style="border: 1px solid #AD0092;">&nbsp;Adet</td>
                      <td width="98" align="center" style="border: 1px solid #AD0092;">&nbsp;Fiyat</td>
                      <td width="148" align="center" style="border: 1px solid #AD0092;">&nbsp;Puanı</td>
                  </tr>
    <?php    
    if($KacTaneUrunVar>$SYFBasinaGosterilenKayitSayisi*4){
    ?>

      <tr height="50">
          <td align="center" colspan="6">

              <div class="SayfalamaAlani">
                  <div class="SayfalamaAlaniIciMetinAlani">
                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacTaneUrunVar; ?> adet Kayıt var.
                  </div>
                      <div class="SayfalamaAlaniIciNumaraAlani">
                          <?php 
                                if($Sayfalama > 1){
                                echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/1'> << </a></span>";
                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $sayfalamaEKSIbir . "'> < </a></span>";
                                }

                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                        }else{
                                            echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                        }
                                    }
                                }


                                if($Sayfalama != $KacSayfaVar){
                                $sayfalamaARTIbir = $Sayfalama + 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $sayfalamaARTIbir . "'> > </a></span>";
                                echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $KacSayfaVar . "'> >> </a></span>";
                                }
                          ?>
                      </div>
              </div>
            </td>
      </tr>
    <?php   }
                  if($KacTaneUrunVar){?>
                  
                  <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
        <td colspan="6" style="line-height: 10px; font-size: 10px;">&nbsp;</td>
    </tr>                  
                  
    <!-- ************************************************************************************** KONUT ****************************************************************************************************************** -->

    <?php 
    
    $KonutQ         = $DataBaseConnection->query("SELECT * FROM konut WHERE EkleyenUye = $Uyeid ORDER BY ilanTarihi DESC, Durumu ASC, MenuAdi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $ToplamKonut    = $KonutQ->num_rows;
    
    if($ToplamKonut){
        while($KonutKayitlariYaz = $KonutQ->fetch_assoc()){
            $KonutId             = GeriDöndür($KonutKayitlariYaz["id"]);
            $KonutResim          = GeriDöndür($KonutKayitlariYaz["UrunResmiBIR"]);
            $KonutAdi            = GeriDöndür($KonutKayitlariYaz["UrunAdi"]);
            $KonutAdedi          = GeriDöndür($KonutKayitlariYaz["UrunAdedi"]);
            $KonutUrunFiyati     = GeriDöndür($KonutKayitlariYaz["UrunFiyati"]);   
            $KonutParaBirimi     = GeriDöndür($KonutKayitlariYaz["ParaBirimi"]);
            $YorumSayisi         = GeriDöndür($KonutKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani    = GeriDöndür($KonutKayitlariYaz["ToplamYorumPuani"]);
            $MenuAdi             = GeriDöndür($KonutKayitlariYaz["MenuAdi"]);
            $Durumu              = GeriDöndür($KonutKayitlariYaz["Durumu"]);
            
            if($YorumSayisi!=0){
                $UrunPuaniHesapla        = number_format($ToplamYorumPuani/$YorumSayisi, 2, ".", "");
            }else{$UrunPuaniHesapla=0;}


            if(($UrunPuaniHesapla>0) and ($UrunPuaniHesapla<=1.5)){
                $PuaninResmi = "Resimler/YildizBirDolu.png";
            }elseif(($UrunPuaniHesapla>1.5) and ($UrunPuaniHesapla<=2.5)){
                $PuaninResmi = "Resimler/YildizIkiDolu.png";
            }elseif(($UrunPuaniHesapla>2.5) and ($UrunPuaniHesapla<=3.5)){
                $PuaninResmi = "Resimler/YildizUcDolu.png";
            }elseif(($UrunPuaniHesapla>3.5) and ($UrunPuaniHesapla<=4.4)){
                $PuaninResmi = "Resimler/YildizDortDolu.png";
            }elseif($UrunPuaniHesapla>4.4){
                $PuaninResmi = "Resimler/YildizBesDolu.png";
            }
                        
    ?>
    <tr height="90" <?php if($Durumu==0){echo "style='background-color: #e6e6e6;'";}else{echo "style='background-color: #ccffcc;'";} ?>>
        <td width="125" align="center">#<?php echo ($KonutId*789547); ?></td>
        <td width="75" align="center"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/".$KonutId; ?>"><img src="<?php echo $KonutResim; ?>" border="0" width="69" height="90" style="padding-left: 6px;"></a></td>
        <td width="560" align="center"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/".$KonutId; ?>" style="color: #C500BE; text-decoration: none;">
            <table width="560" height="90">
                <tr height="60">
                    <td colspan="2" align="center"><?php echo $KonutAdi; ?></td>
                </tr>
                <tr height="20">
                    <td align="left"><a href="UrunGuncelle/<?php echo $KonutId."/konut"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><img style="padding: 10px;" src="Resimler/Guncelle_20x14.png"></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $KonutId."/konut"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><img src="Resimler/delete_icon_15x20.png"></a></td>
                </tr>
                <tr height="10">
                    <td align="left"><a href="UrunGuncelle/<?php echo $KonutId."/konut"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD;">Güncelle</b></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $KonutId."/konut"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD; padding: 1px">Sil</b></a></td>
                </tr>
            </table>
            </a></td>
        <td width="55"  align="center"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/".$KonutId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo $KonutAdedi; ?></a></td>
        <td width="100" align="center"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/".$KonutId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo FiyatBicimlendir($KonutUrunFiyati)." ".$KonutParaBirimi; ?></a></td>
        <td width="150" align="center"><?php if($YorumSayisi!=0){ echo '<a href="UrunDetaylari/'.SEO($AracAdi).'/konut/'.$KonutId.'"><img src="'.$PuaninResmi.'"></a>';}else{ echo "Yorum almamış"; } ?></td>
    </tr>
    <tr><td width="1065" height="2" style="line-height: 2px; font-size: 2px;" colspan="6">&nbsp;</td></tr>                  

    <?php 
    } /* while Kapatması */
    } ?>
    <!-- ************************************************************************************** KONUT ****************************************************************************************************************** -->                  
    <!-- ************************************************************************************** ARAC ****************************************************************************************************************** -->
    <?php
    
    $AracQ              = $DataBaseConnection->query("SELECT * FROM arac WHERE EkleyenUye = $Uyeid ORDER BY ilanTarihi DESC, Durumu ASC, MenuAdi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $AracKayitsayisi    = $AracQ->num_rows;
    
    if($AracKayitsayisi){
        while($AracKayitlariYaz = $AracQ->fetch_assoc()){
            $AracId             = GeriDöndür($AracKayitlariYaz["id"]);
            $AracResim          = GeriDöndür($AracKayitlariYaz["UrunResmiBIR"]);
            $AracAdi            = GeriDöndür($AracKayitlariYaz["UrunAdi"]);
            $AracAdedi          = GeriDöndür($AracKayitlariYaz["UrunAdedi"]);
            $AracUrunFiyati     = GeriDöndür($AracKayitlariYaz["UrunFiyati"]);   
            $AracParaBirimi     = GeriDöndür($AracKayitlariYaz["ParaBirimi"]);
            $YorumSayisi        = GeriDöndür($AracKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani   = GeriDöndür($AracKayitlariYaz["ToplamYorumPuani"]);
            $MenuAdi            = GeriDöndür($AracKayitlariYaz["MenuAdi"]);
            $Durumu             = GeriDöndür($AracKayitlariYaz["Durumu"]);
            
            if($YorumSayisi!=0){
                $UrunPuaniHesapla        = number_format($ToplamYorumPuani/$YorumSayisi, 2, ".", "");
            }else{$UrunPuaniHesapla=0;}


            if(($UrunPuaniHesapla>0) and ($UrunPuaniHesapla<=1.5)){
                $PuaninResmi = "Resimler/YildizBirDolu.png";
            }elseif(($UrunPuaniHesapla>1.5) and ($UrunPuaniHesapla<=2.5)){
                $PuaninResmi = "Resimler/YildizIkiDolu.png";
            }elseif(($UrunPuaniHesapla>2.5) and ($UrunPuaniHesapla<=3.5)){
                $PuaninResmi = "Resimler/YildizUcDolu.png";
            }elseif(($UrunPuaniHesapla>3.5) and ($UrunPuaniHesapla<=4.4)){
                $PuaninResmi = "Resimler/YildizDortDolu.png";
            }elseif($UrunPuaniHesapla>4.4){
                $PuaninResmi = "Resimler/YildizBesDolu.png";
            }
    ?>
    <tr height="90" <?php if($Durumu==0){echo "style='background-color: #e6e6e6;'";}else{echo "style='background-color: #ccffcc;'";} ?>>
        <td width="125" align="center">#<?php echo ($AracId*789547); ?></td>
        <td width="75" align="center"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/".$AracId; ?>"><img src="<?php echo $AracResim; ?>" border="0" width="69" height="90" style="padding-left: 6px;"></a>&nbsp;</td>
        <td width="560" align="center"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/".$AracId; ?>" style="color: #C500BE; text-decoration: none;">
            <table width="560" height="90">
                <tr height="60">
                    <td colspan="2" align="center"><?php echo $AracAdi; ?></td>
                </tr>
                <tr height="20">
                    <td align="left"><a href="UrunGuncelle/<?php echo $AracId."/arac"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><img style="padding: 10px;" src="Resimler/Guncelle_20x14.png"></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $AracId."/arac"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><img src="Resimler/delete_icon_15x20.png"></a></td>
                </tr>
                <tr height="10">
                    <td align="left"><a href="UrunGuncelle/<?php echo $AracId."/arac"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD;">Güncelle</b></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $KonutId."/arac"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD; padding: 1px">Sil</b></a></td>
                </tr>
            </table>
            </a></td>
        <td width="55" align="center"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/".$AracId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo $AracAdedi; ?></a></td>
        <td width="100" align="center"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/".$AracId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo FiyatBicimlendir($AracUrunFiyati)." ".$AracParaBirimi; ?></a></td>
        <td width="150" align="center"><?php if($YorumSayisi!=0){ echo '<a href="UrunDetaylari/'.SEO($AracAdi).'/arac/'.$AracId.'"><img src="'.$PuaninResmi.'"></a>';}else{ echo "Yorum almamış"; } ?></td>
    </tr>
    <tr><td width="1065" height="2" style="line-height: 2px; font-size: 2px;" colspan="6">&nbsp;</td></tr>                  
    <?php 
    } /* while Kapatması */
    } ?>

    <!-- ************************************************************************************** ARAC ****************************************************************************************************************** -->
    <!-- ************************************************************************************** TEKNOLOJİ ****************************************************************************************************************** -->

    <?php 
    
    $TeknolojiQ              = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE EkleyenUye = $Uyeid ORDER BY ilanTarihi DESC, Durumu ASC, MenuAdi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $TeknolojiKayitsayisi    = $TeknolojiQ->num_rows;
    
    if($TeknolojiKayitsayisi){
        while($TeknolojiKayitlariYaz = $TeknolojiQ->fetch_assoc()){
            $TeknolojiId             = GeriDöndür($TeknolojiKayitlariYaz["id"]);
            $TeknolojiResim          = GeriDöndür($TeknolojiKayitlariYaz["UrunResmiBIR"]);
            $TeknolojiAdi            = GeriDöndür($TeknolojiKayitlariYaz["UrunAdi"]);
            $TeknolojiAdedi          = GeriDöndür($TeknolojiKayitlariYaz["UrunAdedi"]);
            $TeknolojiFiyati         = GeriDöndür($TeknolojiKayitlariYaz["UrunFiyati"]);   
            $TeknolojiParaBirimi     = GeriDöndür($TeknolojiKayitlariYaz["ParaBirimi"]);
            $YorumSayisi             = GeriDöndür($TeknolojiKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani        = GeriDöndür($TeknolojiKayitlariYaz["ToplamYorumPuani"]);
            $MenuAdi                 = GeriDöndür($TeknolojiKayitlariYaz["MenuAdi"]);
            $Durumu                  = GeriDöndür($TeknolojiKayitlariYaz["Durumu"]);
            
            if($YorumSayisi!=0){
                $UrunPuaniHesapla        = number_format($ToplamYorumPuani/$YorumSayisi, 2, ".", "");
            }else{$UrunPuaniHesapla=0;}


            if(($UrunPuaniHesapla>0) and ($UrunPuaniHesapla<=1.5)){
                $PuaninResmi = "Resimler/YildizBirDolu.png";
            }elseif(($UrunPuaniHesapla>1.5) and ($UrunPuaniHesapla<=2.5)){
                $PuaninResmi = "Resimler/YildizIkiDolu.png";
            }elseif(($UrunPuaniHesapla>2.5) and ($UrunPuaniHesapla<=3.5)){
                $PuaninResmi = "Resimler/YildizUcDolu.png";
            }elseif(($UrunPuaniHesapla>3.5) and ($UrunPuaniHesapla<=4.4)){
                $PuaninResmi = "Resimler/YildizDortDolu.png";
            }elseif($UrunPuaniHesapla>4.4){
                $PuaninResmi = "Resimler/YildizBesDolu.png";
            }            
    ?>
    <tr height="90" <?php if($Durumu==0){echo "style='background-color: #e6e6e6;'";}else{echo "style='background-color: #ccffcc;'";} ?>>
        <td width="125" align="center">#<?php echo ($TeknolojiId*789547); ?></td>
        <td width="75" align="center"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/teknoloji/".$TeknolojiId; ?>"><img src="<?php echo $TeknolojiResim; ?>" border="0" width="69" height="90" style="padding-left: 6px;"></a></td>
        <td width="560" align="center"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/teknoloji/".$TeknolojiId; ?>" style="color: #C500BE; text-decoration: none;">
            <table width="560" height="90">
                <tr height="60">
                    <td colspan="2" align="center"><?php echo $TeknolojiAdi; ?></td>
                </tr>
                <tr height="20">
                    <td align="left"><a href="UrunGuncelle/<?php echo $TeknolojiId."/teknoloji"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><img style="padding: 10px;" src="Resimler/Guncelle_20x14.png"></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $TeknolojiId."/teknoloji"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><img src="Resimler/delete_icon_15x20.png"></a></td>
                </tr>
                <tr height="10">
                    <td align="left"><a href="UrunGuncelle/<?php echo $TeknolojiId."/teknoloji"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD;">Güncelle</b></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $TeknolojiId."/teknoloji"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD; padding: 1px">Sil</b></a></td>
                </tr>
            </table>
            </a></td>
        <td width="55" align="center"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/teknoloji/".$TeknolojiId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo $TeknolojiAdedi; ?></a></td>
        <td width="100" align="center"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/teknoloji/".$TeknolojiId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo FiyatBicimlendir($TeknolojiFiyati)." ".$TeknolojiParaBirimi; ?></a></td>
        <td width="150" align="center"><?php if($YorumSayisi!=0){ echo '<a href="UrunDetaylari/'.SEO($TeknolojiAdi).'/teknoloji/'.$TeknolojiId.'"><img src="'.$PuaninResmi.'"></a>';}else{ echo "Yorum almamış"; } ?></td>
    </tr> 
    <tr><td width="1065" height="2" style="line-height: 2px; font-size: 2px;" colspan="6">&nbsp;</td></tr>                  
    <?php 
    } /* while Kapatması */
    } ?>                  
    <!-- ************************************************************************************** TEKNOLOJİ ****************************************************************************************************************** -->
    <!-- ************************************************************************************** GİYİM ****************************************************************************************************************** -->


    <?php 
    
    $GiyimQ              = $DataBaseConnection->query("SELECT * FROM giyim WHERE EkleyenUye = $Uyeid ORDER BY ilanTarihi DESC, Durumu ASC, MenuAdi ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $GiyimKayitsayisi    = $GiyimQ->num_rows;
    
    if($GiyimKayitsayisi){
        while($GiyimKayitlariYaz = $GiyimQ->fetch_assoc()){
            $GiyimId             = GeriDöndür($GiyimKayitlariYaz["id"]);
            $GiyimResim          = GeriDöndür($GiyimKayitlariYaz["UrunResmiBIR"]);
            $GiyimAdi            = GeriDöndür($GiyimKayitlariYaz["UrunAdi"]);
            $GiyimAdedi          = GeriDöndür($GiyimKayitlariYaz["UrunAdedi"]);
            $GiyimUrunFiyati     = GeriDöndür($GiyimKayitlariYaz["UrunFiyati"]);   
            $GiyimParaBirimi     = GeriDöndür($GiyimKayitlariYaz["ParaBirimi"]);
            $YorumSayisi        = GeriDöndür($GiyimKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani   = GeriDöndür($GiyimKayitlariYaz["ToplamYorumPuani"]);
            $MenuAdi            = GeriDöndür($GiyimKayitlariYaz["MenuAdi"]);
            $Durumu             = GeriDöndür($GiyimKayitlariYaz["Durumu"]);

            if($YorumSayisi!=0){
                $UrunPuaniHesapla        = number_format($ToplamYorumPuani/$YorumSayisi, 2, ".", "");
            }else{$UrunPuaniHesapla=0;}


            if(($UrunPuaniHesapla>0) and ($UrunPuaniHesapla<=1.5)){
                $PuaninResmi = "Resimler/YildizBirDolu.png";
            }elseif(($UrunPuaniHesapla>1.5) and ($UrunPuaniHesapla<=2.5)){
                $PuaninResmi = "Resimler/YildizIkiDolu.png";
            }elseif(($UrunPuaniHesapla>2.5) and ($UrunPuaniHesapla<=3.5)){
                $PuaninResmi = "Resimler/YildizUcDolu.png";
            }elseif(($UrunPuaniHesapla>3.5) and ($UrunPuaniHesapla<=4.4)){
                $PuaninResmi = "Resimler/YildizDortDolu.png";
            }elseif($UrunPuaniHesapla>4.4){
                $PuaninResmi = "Resimler/YildizBesDolu.png";
            }            
    ?>
    <tr height="90" <?php if($Durumu==0){echo "style='background-color: #e6e6e6;'";}else{echo "style='background-color: #ccffcc;'";} ?>>
        <td width="125" align="center">#<?php echo ($GiyimId*789547); ?></td>
        <td width="75" align="center"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/giyim/".$GiyimId; ?>"><img src="<?php echo $GiyimResim; ?>" border="0" width="69" height="90" style="padding-left: 6px;"></a></td>
        <td width="560" align="center"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/giyim/".$GiyimId; ?>" style="color: #C500BE; text-decoration: none;">
            <table width="560" height="90">
                <tr height="60">
                    <td colspan="2" align="center"><?php echo $GiyimAdi; ?></td>
                </tr>
                <tr height="20">
                    <td align="left"><a href="UrunGuncelle/<?php echo $GiyimId."/giyim"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><img style="padding: 10px;" src="Resimler/Guncelle_20x14.png"></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $GiyimId."/giyim"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><img src="Resimler/delete_icon_15x20.png"></a></td>
                </tr>
                <tr height="10">
                    <td align="left"><a href="UrunGuncelle/<?php echo $GiyimId."/giyim"; ?>" style="font-size: 10px; line-height: 10px; padding: 10px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD;">Güncelle</b></a></td>
                    <td align="right" style="<?php if($Durumu==0){echo "display: none;"; }?>"><a href="UrunuKaldirF/<?php echo $GiyimId."/giyim"; ?>" style="font-size: 10px; line-height: 10px; padding: 50px; text-decoration: none; color: #C500BE;"><b style="background: #CDCDCD; padding: 1px">Sil</b></a></td>
                </tr>
            </table>
            </a></td>
        <td width="55" align="center"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/giyim/".$GiyimId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo $GiyimAdedi; ?></a></td>
        <td width="100" align="center"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/giyim/".$GiyimId; ?>" style="color: #C500BE; text-decoration: none;"><?php echo FiyatBicimlendir($GiyimUrunFiyati)." ".$GiyimParaBirimi; ?></a></td>
        <td width="150" align="center"><?php if($YorumSayisi!=0){ echo '<a href="UrunDetaylari/'.SEO($GiyimAdi).'giyim/'.$GiyimId.'"><img src="'.$PuaninResmi.'"></a>';}else{ echo "Yorum almamış"; } ?></td>
    </tr>   
    <tr><td width="1065" height="2" style="line-height: 2px; font-size: 2px;" colspan="6">&nbsp;</td></tr>                  
    <?php 
    } /* while Kapatması */
    } ?>

    <!-- ************************************************************************************** GİYİM ****************************************************************************************************************** -->
                  
                        <?php
                    ?>
                  <tr><td colspan="7"><hr /></td></tr>
                  <?php                
                if($KacSayfaVar>1){
                ?>
                  
                  <tr height="50">
                      <td colspan="7" align="center">
                      
                          <div class="SayfalamaAlani">
                              <div class="SayfalamaAlaniIciNumaraAlani">
                                  <?php 
                                        if($Sayfalama > 1){
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/1'> << </a></span>";
                                        $sayfalamaEKSIbir = $Sayfalama - 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $sayfalamaEKSIbir . "'> < </a></span>";
                                        }
                
                                        for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                            if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                                if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                                    echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                                }else{
                                                    echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                                }
                                            }
                                        }
                
                
                                        if($Sayfalama != $KacSayfaVar){
                                        $sayfalamaARTIbir = $Sayfalama + 1;
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $sayfalamaARTIbir . "'> > </a></span>";
                                        echo "<span class='SayfalamaLinkiPasif'><a href='Urunlerim/" . $KacSayfaVar . "'> >> </a></span>";
                                        }
                                  ?>
                              </div>
                          </div>
                      </td>
                  </tr>
                  
            <?php } ?>
                      
    <tr>
        <td colspan="6" style="line-height: 20px; font-size: 20px;">&nbsp;</td>
    </tr>                  
            <?php          
            }else{ ?> <tr><td colspan="7">Sisteme tanımlı ürününüz Bulunmamaktadır</td></tr> <?php } ?>
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