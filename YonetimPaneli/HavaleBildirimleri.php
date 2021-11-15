<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>HAVALE BİLDİRİMLERİ</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="left" bgcolor="#33cc33"><a href="index.php?SKI=79" style="font-size: 17px; color: #000000; text-decoration: none;">&nbsp;&nbsp;&nbsp;ONAYLANMIŞ ÖDEMELER</a></td>
    </tr>
    <tr height="25">
        <td align="right" bgcolor="#ff0000"><a href="index.php?SKI=80" style="font-size: 17px; color: #000000; text-decoration: none;">İADE EDİLMİŞ ÖDEMELER&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <tr>
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <tr>
        <td>
            <div class="AramaAlaniGenelDiv">
                <form action="index.php?SKI=74" method="post">
                    <div class="AramaAlaniButonDiv"><input type="submit" value="" class="AramaAlaniBUTON"></div>
                    <div class="AramaAlaniYaziDiv"><input type="text" name="AramadaArananKelime" class="AramaAlaniYAZI" placeholder="Sadece Email ile arama yapınız"></div>
                </form>
            </div>
        </td>
    </tr>
    <tr>
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <?php    

    if(isset($_REQUEST["AramadaArananKelime"])){
        $GelenAramaIcerigi = GuvenlikFiltresi($_REQUEST["AramadaArananKelime"]);
        $AramaKosulu       = " AND EmailAdresi LIKE '%" . $GelenAramaIcerigi . "%'";
        $SYFileMenu        = "&AramadaArananKelime=" .$GelenAramaIcerigi;
    }else{
        $AramaKosulu       = "";
        $SYFileMenu        = "";
    }
    //--------------------------------------------
    $SYFSagSolButonSayisi               = 2;
    $SYFBasinaGosterilenKayitSayisi     = 5;


    $ToplamKayitSayisiQuery             = $DataBaseConnection->query("SELECT * FROM havalebildirimleri WHERE durum = 'Beklemede' $AramaKosulu");
    $KacTaneHB_Var                      = $ToplamKayitSayisiQuery->num_rows;

    $SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
    $KacSayfaVar                        = ceil($KacTaneHB_Var/$SYFBasinaGosterilenKayitSayisi);

    
    if($KacTaneHB_Var>$SYFBasinaGosterilenKayitSayisi){
    ?>

      <tr height="50">
          <td align="center">

              <div class="SayfalamaAlani">
                  <div class="SayfalamaAlaniIciMetinAlani">
                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacTaneHB_Var; ?> adet Kayıt var.
                  </div>
                      <div class="SayfalamaAlaniIciNumaraAlani">
                          <?php 
                                if($Sayfalama > 1){
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=74" . $SYFileMenu . "&SYF=1'> << </a></span>";
                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=74" . $SYFileMenu . "&SYF=" . $sayfalamaEKSIbir . "'> < </a></span>";
                                }

                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                        }else{
                                            echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=74" . $SYFileMenu . "&SYF=" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                        }
                                    }
                                }


                                if($Sayfalama != $KacSayfaVar){
                                $sayfalamaARTIbir = $Sayfalama + 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=74" . $SYFileMenu . "&SYF=" . $sayfalamaARTIbir . "'> > </a></span>";
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=74" . $SYFileMenu . "&SYF=" . $KacSayfaVar . "'> >> </a></span>";
                                }
                          ?>
                      </div>
              </div>
            </td>
      </tr>
    <?php   } ?>    
    
        
    
    <?php 

    $HB_Query             = $DataBaseConnection->query("SELECT * FROM havalebildirimleri WHERE durum = 'Beklemede' $AramaKosulu ORDER BY islemTarihi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $HB_Kayitsayisi        = $HB_Query->num_rows;

    if($HB_Kayitsayisi){
        while($HB_KayitlariniYaz = $HB_Query->fetch_assoc()){
            $HB_ID          = GeriDöndür($HB_KayitlariniYaz["id"]);
            $HB_BankaAdi    = GeriDöndür($HB_KayitlariniYaz["BankaAdi"]);
            $HB_AdiSoyadi   = GeriDöndür($HB_KayitlariniYaz["AdiSoyadi"]);
            $HB_EmailAdresi = GeriDöndür($HB_KayitlariniYaz["EmailAdresi"]);
            $HB_TelefonNum  = GeriDöndür($HB_KayitlariniYaz["TelefonNum"]);
            $HB_Aciklama    = GeriDöndür($HB_KayitlariniYaz["Aciklama"]);
            $HB_islemTarihi = GeriDöndür($HB_KayitlariniYaz["islemTarihi"]);
            $HB_durum       = GeriDöndür($HB_KayitlariniYaz["durum"]);
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100%">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="#e6ffe6">
                                <td><b>Banka Adı : </b><?php echo $HB_BankaAdi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td><b>Gönderen Kişi : </b><?php echo $HB_AdiSoyadi; ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td><b>Gönderen Kişi Email : </b><?php echo $HB_EmailAdresi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td><b>Gönderen Kişi Telefon Numarası : </b><?php echo $HB_TelefonNum; ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td><b>Açıklama : </b><?php echo $HB_Aciklama; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td><b>Üye Kayıt Tarihi : </b><?php echo GunAyYil($HB_islemTarihi); ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td><b>Durum : </b><b style="color: #FF6E00;"><?php echo $HB_durum; ?></b></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=77&HBID=<?php echo $HB_ID; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>İADE ET</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/delete_icon.png" border="0"></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                    <td width="80" align="center" bgcolor="#33cc33">
                        <a href="index.php?SKI=75&HBID=<?php echo $HB_ID; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>ONAYLA</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/Onayla.png" border="0"></td>
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
    }else{ ?>
    <tr>
        <td align="center">Beklemede Olan Havale Bildirimi bulunamadı.</td>
    </tr>
    <?php    } ?>
</table>

<?php
    }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>