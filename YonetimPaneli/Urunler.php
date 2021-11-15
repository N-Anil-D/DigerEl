<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>ÜRÜNLER</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="right" bgcolor="#000000"><a href="index.php?SKI=84" style="color: #00ff00; text-decoration: none; font-weight: bold;">+ Yeni Ürün Ekle&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <tr height="25">
        <td align="left" bgcolor="#000000"><a href="index.php?SKI=93" style="color: #ff0000; text-decoration: none; font-weight: bold;">Kaldırılan Ürünler&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <tr height="5">
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <tr valign="top" height="50">
        <td>
            <div class="AramaAlaniGenelDiv">
                <form action="index.php?SKI=83" method="post">
                    <div class="AramaAlaniButonDiv"><input type="submit" value="" class="AramaAlaniBUTON"></div>
                    <div class="AramaAlaniYaziDiv"><input type="text" name="AramadaArananKelime" class="AramaAlaniYAZI" placeholder="Sadece Ürün Başlığı ile arama yapınız"></div>
                </form>
            </div>
        </td>
    </tr>
    <tr height="5">
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    
    
    <?php 
    if(isset($_REQUEST["AramadaArananKelime"])){
        $GelenAramaIcerigi = GuvenlikFiltresi($_REQUEST["AramadaArananKelime"]);
        $AramaKosulu       = " AND UrunAdi LIKE '%" . $GelenAramaIcerigi . "%'";
        $SYFileMenu        = "&AramadaArananKelime=" .$GelenAramaIcerigi;
    }else{
        $AramaKosulu       = "";
        $SYFileMenu        = "";
    }
    //--------------------------------------------
    $SYFSagSolButonSayisi               = 2;
    $SYFBasinaGosterilenKayitSayisi     = 3;


    $AracQ          = $DataBaseConnection->query("SELECT * FROM arac WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC");
    $ToplamArac     = $AracQ->num_rows;
    
    $KonutQ         = $DataBaseConnection->query("SELECT * FROM konut WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC");
    $ToplamKonut    = $KonutQ->num_rows;
    
    $GiyimQ         = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC");
    $ToplamGiyim    = $GiyimQ->num_rows;
    
    $TeknolojiQ     = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC");
    $ToplamTeknoloji= $TeknolojiQ->num_rows;
    
    $KacTaneUrunVar = $ToplamArac+$ToplamKonut+$ToplamGiyim+$ToplamTeknoloji;
    
    
    $UrunSayArray   = array($ToplamArac,$ToplamKonut,$ToplamGiyim,$ToplamTeknoloji);
    $EnFazlaUrunSayisi = max($UrunSayArray);

    $SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
    $KacSayfaVar                        = ceil($EnFazlaUrunSayisi/$SYFBasinaGosterilenKayitSayisi);
    ?>
    
    <?php    
    if($KacTaneUrunVar>$SYFBasinaGosterilenKayitSayisi){
    ?>

      <tr height="50">
          <td align="center">

              <div class="SayfalamaAlani">
                  <div class="SayfalamaAlaniIciMetinAlani">
                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacTaneUrunVar; ?> adet Kayıt var.
                  </div>
                      <div class="SayfalamaAlaniIciNumaraAlani">
                          <?php 
                                if($Sayfalama > 1){
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=83" . $SYFileMenu . "&SYF=1'> << </a></span>";
                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=83" . $SYFileMenu . "&SYF=" . $sayfalamaEKSIbir . "'> < </a></span>";
                                }

                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                        }else{
                                            echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=83" . $SYFileMenu . "&SYF=" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                        }
                                    }
                                }


                                if($Sayfalama != $KacSayfaVar){
                                $sayfalamaARTIbir = $Sayfalama + 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=83" . $SYFileMenu . "&SYF=" . $sayfalamaARTIbir . "'> > </a></span>";
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=83" . $SYFileMenu . "&SYF=" . $KacSayfaVar . "'> >> </a></span>";
                                }
                          ?>
                      </div>
              </div>
            </td>
      </tr>
    <?php   } ?>    
    
    
    <!-- ************************************************************************************** ARAC ****************************************************************************************************************** -->
    <?php
    
    $AracQ              = $DataBaseConnection->query("SELECT * FROM arac WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $AracKayitsayisi    = $AracQ->num_rows;
    
    if($AracKayitsayisi){
        while($AracKayitlariYaz = $AracQ->fetch_assoc()){
            $AracId             = GeriDöndür($AracKayitlariYaz["id"]);
            $AracResim          = GeriDöndür($AracKayitlariYaz["UrunResmiBIR"]);
            $AracAdi            = GeriDöndür($AracKayitlariYaz["UrunAdi"]);
            $AracUrunFiyati     = GeriDöndür($AracKayitlariYaz["UrunFiyati"]);   
            $AracParaBirimi     = GeriDöndür($AracKayitlariYaz["ParaBirimi"]);
            $AracFiyati         = NeKadar($AracParaBirimi,$AracUrunFiyati);
            $AracVaryantBasligi = GeriDöndür($AracKayitlariYaz["VaryantBasligi"]);
            $YorumSayisi        = GeriDöndür($AracKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani   = GeriDöndür($AracKayitlariYaz["ToplamYorumPuani"]);
            $GoruntulenmeSayisi = GeriDöndür($AracKayitlariYaz["GoruntulenmeSayisi"]);
            
            
            
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
                    <td width="200" align="center"><img src="<?php echo "../".$AracResim; ?>" border="0" height="100" width="120"></td>
                    <td width="40">&nbsp;</td>
                    <td width="100%">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Başlığı : <?php echo $AracAdi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td>Ürün Fiyatı : <?php echo $AracFiyati; ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Varyantı : <?php echo $AracVaryantBasligi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td><?php echo $YorumSayisi." Adet yorumdan ".$ToplamYorumPuani." Puan aldı.";if($YorumSayisi>0){ echo " Ortalama Puanı : ".number_format(($ToplamYorumPuani/$YorumSayisi), "2"); } ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td><?php echo $GoruntulenmeSayisi." kere görüntülendi"; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=90&TA=arac&UrunID=<?php echo $AracId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>SİL</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/delete_icon.png" border="0"></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                    <td width="80" align="center" bgcolor="#ffb380">
                        <a href="index.php?SKI=87&TA=arac&UrunID=<?php echo $AracId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>GÜNCELLE</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/update_icon.png" border="0" width=""></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="40">
        <td>&nbsp;</td>
    </tr>
    <?php 
    } /* while Kapatması */
    } ?>

    <!-- ************************************************************************************** ARAC ****************************************************************************************************************** -->
    <!-- ************************************************************************************** KONUT ****************************************************************************************************************** -->

    <?php 
    
    $KonutQ              = $DataBaseConnection->query("SELECT * FROM konut WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $KonutKayitsayisi    = $KonutQ->num_rows;
    
    if($KonutKayitsayisi){
        while($KonutKayitlariYaz = $KonutQ->fetch_assoc()){
            $KonutId             = GeriDöndür($KonutKayitlariYaz["id"]);
            $KonutResim          = GeriDöndür($KonutKayitlariYaz["UrunResmiBIR"]);
            $KonutAdi            = GeriDöndür($KonutKayitlariYaz["UrunAdi"]);
            $KonutUrunFiyati     = GeriDöndür($KonutKayitlariYaz["UrunFiyati"]);   
            $KonutParaBirimi     = GeriDöndür($KonutKayitlariYaz["ParaBirimi"]);
            $KonutFiyati         = NeKadar($KonutParaBirimi,$KonutUrunFiyati);
            $KonutVaryantBasligi = GeriDöndür($KonutKayitlariYaz["VaryantBasligi"]);
            $YorumSayisi         = GeriDöndür($KonutKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani    = GeriDöndür($KonutKayitlariYaz["ToplamYorumPuani"]);
            $GoruntulenmeSayisi  = GeriDöndür($KonutKayitlariYaz["GoruntulenmeSayisi"]);
                        
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
                    <td width="200" align="center"><img src="<?php echo "../".$KonutResim; ?>" border="0" height="100" width="120"></td>
                    <td width="40">&nbsp;</td>
                    <td width="100%">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Başlığı : <?php echo $KonutAdi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td>Ürün Fiyatı : <?php echo $KonutFiyati; ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Varyantı : <?php echo $KonutVaryantBasligi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td><?php echo $YorumSayisi." Adet yorumdan ".$ToplamYorumPuani." Puan aldı.";if($YorumSayisi>0){ echo " Ortalama Puanı : ".number_format(($ToplamYorumPuani/$YorumSayisi), "2"); } ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td><?php echo $GoruntulenmeSayisi." kere görüntülendi"; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=90&TA=konut&UrunID=<?php echo $KonutId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>SİL</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/delete_icon.png" border="0"></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                    <td width="80" align="center" bgcolor="#ffb380">
                        <a href="index.php?SKI=87&TA=konut&UrunID=<?php echo $KonutId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>GÜNCELLE</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/update_icon.png" border="0" width=""></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="40">
        <td>&nbsp;</td>
    </tr>
    <?php 
    } /* while Kapatması */
    } ?>
    <!-- ************************************************************************************** KONUT ****************************************************************************************************************** -->
    <!-- ************************************************************************************** GİYİM ****************************************************************************************************************** -->


    <?php 
    
    $GiyimQ              = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $GiyimKayitsayisi    = $GiyimQ->num_rows;
    
    if($GiyimKayitsayisi){
        while($GiyimKayitlariYaz = $GiyimQ->fetch_assoc()){
            $GiyimId            = GeriDöndür($GiyimKayitlariYaz["id"]);
            $GiyimResim         = GeriDöndür($GiyimKayitlariYaz["UrunResmiBIR"]);
            $GiyimAdi           = GeriDöndür($GiyimKayitlariYaz["UrunAdi"]);
            $GiyimUrunFiyati    = GeriDöndür($GiyimKayitlariYaz["UrunFiyati"]);   
            $GiyimParaBirimi    = GeriDöndür($GiyimKayitlariYaz["ParaBirimi"]);
            $GiyimFiyati         = NeKadar($GiyimParaBirimi,$GiyimUrunFiyati);
            $GiyimVaryantBasligi = GeriDöndür($GiyimKayitlariYaz["VaryantBasligi"]);
            $YorumSayisi         = GeriDöndür($GiyimKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani    = GeriDöndür($GiyimKayitlariYaz["ToplamYorumPuani"]);
            $GoruntulenmeSayisi  = GeriDöndür($GiyimKayitlariYaz["GoruntulenmeSayisi"]);
            
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
                    <td width="200" align="center"><img src="<?php echo "../".$GiyimResim; ?>" border="0" height="100" width="120"></td>
                    <td width="40">&nbsp;</td>
                    <td width="100%">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Başlığı : <?php echo $GiyimAdi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td>Ürün Fiyatı : <?php echo $GiyimFiyati; ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Varyantı : <?php echo $GiyimVaryantBasligi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td><?php echo $YorumSayisi." Adet yorumdan ".$ToplamYorumPuani." Puan aldı.";if($YorumSayisi>0){ echo " Ortalama Puanı : ".number_format(($ToplamYorumPuani/$YorumSayisi), "2"); } ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td><?php echo $GoruntulenmeSayisi." kere görüntülendi"; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=90&TA=giyim&UrunID=<?php echo $GiyimId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>SİL</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/delete_icon.png" border="0"></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                    <td width="80" align="center" bgcolor="#ffb380">
                        <a href="index.php?SKI=87&TA=giyim&UrunID=<?php echo $GiyimId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>GÜNCELLE</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/update_icon.png" border="0" width=""></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="40">
        <td>&nbsp;</td>
    </tr>
    <?php 
    } /* while Kapatması */
    } ?>

    <!-- ************************************************************************************** GİYİM ****************************************************************************************************************** -->
    <!-- ************************************************************************************** TEKNOLOJİ ****************************************************************************************************************** -->

    <?php 
    
    $TeknolojiQ              = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE Durumu = 1 $AramaKosulu ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $TeknolojiKayitsayisi    = $TeknolojiQ->num_rows;
    
    if($TeknolojiKayitsayisi){
        while($TeknolojiKayitlariYaz = $TeknolojiQ->fetch_assoc()){
            $TeknolojiId            = GeriDöndür($TeknolojiKayitlariYaz["id"]);
            $TeknolojiResim         = GeriDöndür($TeknolojiKayitlariYaz["UrunResmiBIR"]);
            $TeknolojiAdi           = GeriDöndür($TeknolojiKayitlariYaz["UrunAdi"]);
            $TeknolojiUrunFiyati    = GeriDöndür($TeknolojiKayitlariYaz["UrunFiyati"]);   
            $TeknolojiParaBirimi    = GeriDöndür($TeknolojiKayitlariYaz["ParaBirimi"]);
            $TeknolojiFiyati         = NeKadar($TeknolojiParaBirimi,$TeknolojiUrunFiyati);
            $TeknolojiVaryantBasligi = GeriDöndür($TeknolojiKayitlariYaz["VaryantBasligi"]);
            $YorumSayisi         = GeriDöndür($TeknolojiKayitlariYaz["YorumSayisi"]);
            $ToplamYorumPuani    = GeriDöndür($TeknolojiKayitlariYaz["ToplamYorumPuani"]);
            $GoruntulenmeSayisi  = GeriDöndür($TeknolojiKayitlariYaz["GoruntulenmeSayisi"]);
            
            
            
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
                    <td width="200" align="center"><img src="<?php echo "../".$TeknolojiResim; ?>" border="0" height="100" width="120"></td>
                    <td width="40">&nbsp;</td>
                    <td width="100%">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Başlığı : <?php echo $TeknolojiAdi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td>Ürün Fiyatı : <?php echo $TeknolojiFiyati; ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td>Ürün Varyantı : <?php echo $TeknolojiVaryantBasligi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td><?php echo $YorumSayisi." Adet yorumdan ".$ToplamYorumPuani." Puan aldı.";if($YorumSayisi>0){ echo " Ortalama Puanı : ".number_format(($ToplamYorumPuani/$YorumSayisi), "2"); } ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td><?php echo $GoruntulenmeSayisi." kere görüntülendi"; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=90&TA=teknoloji&UrunID=<?php echo $TeknolojiId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>SİL</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/delete_icon.png" border="0"></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                    <td width="80" align="center" bgcolor="#ffb380">
                        <a href="index.php?SKI=87&TA=teknoloji&UrunID=<?php echo $TeknolojiId; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>GÜNCELLE</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/update_icon.png" border="0" width=""></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="40">
        <td>&nbsp;</td>
    </tr>
    <?php 
    } /* while Kapatması */
    } ?>
</table>

<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>