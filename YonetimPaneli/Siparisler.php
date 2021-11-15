<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>SİPARİŞLER (BEKLEYEN)</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="left" bgcolor="#000000"><a href="index.php?SKI=97" style="color: #00ff00; text-decoration: none; font-weight: bold;">&nbsp;&nbsp;&nbsp;TAMAMLANAN SİPARİŞLER</a></td>
    </tr>
    <tr valign="top" height="50">
        <td>
            <div class="AramaAlaniGenelDiv">
                <form action="index.php?SKI=96" method="post">
                    <div class="AramaAlaniButonDiv"><input type="submit" value="" class="AramaAlaniBUTON"></div>
                    <div class="AramaAlaniYaziDiv"><input type="text" name="AramadaArananKelime" class="AramaAlaniYAZI" placeholder="Sadece Ürün Başlığı ile arama yapınız"></div>
                </form>
            </div>
        </td>
    </tr>
    <tr height="15">
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
    $SYFBasinaGosterilenKayitSayisi     = 10;

    $SiparisArama            = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler WHERE KargoDurumu = 0 AND OnayDurumu = 0 ORDER BY id DESC");
    $TamamlananSiparisSayisi = $SiparisArama->num_rows;

    $SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
    $KacSayfaVar                        = ceil($TamamlananSiparisSayisi/$SYFBasinaGosterilenKayitSayisi);
    ?>
      <tr height="50">
          <td align="center">

              <div class="SayfalamaAlani">
                  <div class="SayfalamaAlaniIciMetinAlani">
                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $TamamlananSiparisSayisi; ?> adet Kayıt var.
                  </div>
                      <div class="SayfalamaAlaniIciNumaraAlani">
                          <?php 
                                if($Sayfalama > 1){
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=1'> << </a></span>";
                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $sayfalamaEKSIbir . "'> < </a></span>";
                                }

                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                        }else{
                                            echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                        }
                                    }
                                }


                                if($Sayfalama != $KacSayfaVar){
                                $sayfalamaARTIbir = $Sayfalama + 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $sayfalamaARTIbir . "'> > </a></span>";
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $KacSayfaVar . "'> >> </a></span>";
                                }
                          ?>
                      </div>
              </div>
            </td>
      </tr>
    
    <?php 
    $SiparisNumaralari           = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler WHERE KargoDurumu = 0 AND OnayDurumu = 0 ORDER BY id ASC");
    $KayitliSiparisNumarasiVarsa = $SiparisNumaralari->num_rows;

    if($KayitliSiparisNumarasiVarsa>0){
        while($SiparisNoKayitlari = $SiparisNumaralari->fetch_assoc()){
            $SiparisNO            = $SiparisNoKayitlari["SiparisNumarasi"];

            $Siparisquuery             = $DataBaseConnection->query("SELECT * FROM siparisler WHERE KargoDurumu = 0 AND SiparisNumarasi = $SiparisNO AND OnayDurumu = 0 ORDER BY id ASC");
            $Sipariskayitsayisi        = $Siparisquuery->num_rows;

            if($Sipariskayitsayisi){
                $SipariseOdenecekTutar = 0;
                while($SiparisKayitlariniYaz = $Siparisquuery->fetch_assoc()){
                    $SiparisToplamUrunFiyati = GeriDöndür($SiparisKayitlariniYaz["ToplamUrunFiyati"]);
                    $SiparisSiparisTarihi    = GeriDöndür($SiparisKayitlariniYaz["SiparisTarihi"]);
                    $SiparisParaBirimi       = GeriDöndür($SiparisKayitlariniYaz["ParaBirimi"]);
                    
                    $SipariseOdenecekTutar   +=$SiparisToplamUrunFiyati;
                }
                    ?>
                    <tr>
                        <td align="center">
                            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                                            <tr bgcolor="#e6ffe6">
                                                <td width="200">&nbsp;<b>Siparis Tarihi</b></td>
                                                <td>:</td>
                                                <td><?php echo TarihBul($SiparisSiparisTarihi); ?></td>
                                            </tr>
                                            <tr bgcolor="#ffe6ff">
                                                <td width="200">&nbsp;<b>Toplam Siparis Fiyatı</b></td>
                                                <td>:</td>
                                                <td><?php echo FiyatBicimlendir($SipariseOdenecekTutar)." ".$SiparisParaBirimi; ?></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td width="80" align="center" bgcolor="#ff8080">
                                        <a href="index.php?SKI=101&SiparisNum=<?php echo $SiparisNO; ?>" style="text-decoration:none; color:#000000;">
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
                                    <td width="80" align="center" bgcolor="#ffff99">
                                        <a href="index.php?SKI=98&SiparisNum=<?php echo $SiparisNO; ?>" style="text-decoration:none; color:#000000;">
                                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                                              <tr height="60">
                                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>DETAYLARI GÖRÜNTÜLE</b></td>
                                              </tr>
                                              <tr height="87">
                                                  <td width="80" height="87" align="center"><img src="../Resimler/detay.png" border="0"></td>
                                              </tr>
                                          </table>
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <?php 
            }else{ 
                header("Location:index.php?SKD=1");
                exit();
            }
            ?>

<?php 
        } /* while Kapatması */ 
    ?>
      <tr height="50">
          <td align="center">

              <div class="SayfalamaAlani">
                  <div class="SayfalamaAlaniIciMetinAlani">
                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $TamamlananSiparisSayisi; ?> adet Kayıt var.
                  </div>
                      <div class="SayfalamaAlaniIciNumaraAlani">
                          <?php 
                                if($Sayfalama > 1){
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=1'> << </a></span>";
                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $sayfalamaEKSIbir . "'> < </a></span>";
                                }

                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                        }else{
                                            echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                        }
                                    }
                                }


                                if($Sayfalama != $KacSayfaVar){
                                $sayfalamaARTIbir = $Sayfalama + 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $sayfalamaARTIbir . "'> > </a></span>";
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=96" . $SYFileMenu . "&SYF=" . $KacSayfaVar . "'> >> </a></span>";
                                }
                          ?>
                      </div>
              </div>
            </td>
      </tr>
        
    <?php
    }else{ ?>
    <tr>
        <td align="center">Kayıtlı yeni sipariş bulunmamaktadır.</td>
    </tr>
    <?php    
    }
        }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>
        </table>
