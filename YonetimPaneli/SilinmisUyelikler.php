<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>ÜYELERİ YÖNET</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="left" bgcolor="#e67300"><a href="index.php?SKI=65" style="font-size: 17px; color: #000000; text-decoration: none;">&nbsp;&nbsp;&nbsp;Aktive Edilmemiş Üyelikler</a></td>
    </tr>
    <tr height="25">
        <td align="right" bgcolor="#00ff00"><a href="index.php?SKI=62" style="font-size: 17px; color: #000000; text-decoration: none;">Aktif Üyelikler&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <tr height="50">
        <td align="center" bgcolor="#b3ffff" style="font-size: 20px; color: #000000;">Silinmiş Üyelikler</td>
    </tr>
    <tr height="50">
        <td>
            <div class="AramaAlaniGenelDiv">
                <form action="index.php?SKI=66" method="post">
                    <div class="AramaAlaniButonDiv"><input type="submit" value="" class="AramaAlaniBUTON"></div>
                    <div class="AramaAlaniYaziDiv"><input type="text" name="AramadaArananKelime" class="AramaAlaniYAZI" placeholder="Sadece Email ile arama yapınız"></div>
                </form>
            </div>
        </td>
    </tr>

    <?php 
    if(isset($_REQUEST["AramadaArananKelime"])){
        $GelenAramaIcerigi = GuvenlikFiltresi($_REQUEST["AramadaArananKelime"]);
        $AramaKosulu       = " AND Email LIKE '%" . $GelenAramaIcerigi . "%'";
        $SYFileMenu        = "&AramadaArananKelime=" .$GelenAramaIcerigi;
    }else{
        $AramaKosulu       = "";
        $SYFileMenu        = "";
    }
    //--------------------------------------------
    $SYFSagSolButonSayisi               = 2;
    $SYFBasinaGosterilenKayitSayisi     = 10;


    $ToplamKayitSayisiQuery             = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Durumu = 'Silindi' $AramaKosulu");
    $KacTaneUyeVar                      = $ToplamKayitSayisiQuery->num_rows;

    $SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
    $KacSayfaVar                        = ceil($KacTaneUyeVar/$SYFBasinaGosterilenKayitSayisi);

    $Uyequuery             = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Durumu = 'Silindi' $AramaKosulu ORDER BY KayitTarihi DESC, isimSoyisim ASC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $Uyekayitsayisi        = $Uyequuery->num_rows;

    if($Uyekayitsayisi){
        while($UyeKayitlariniYaz = $Uyequuery->fetch_assoc()){
            $UyeID              = GeriDöndür($UyeKayitlariniYaz["id"]);
            $UyeisimSoyisim     = GeriDöndür($UyeKayitlariniYaz["isimSoyisim"]);
            $UyeKullaniciAdi    = GeriDöndür($UyeKayitlariniYaz["KullaniciAdi"]);
            $UyeEmail           = GeriDöndür($UyeKayitlariniYaz["Email"]);
            $UyeSifre           = GeriDöndür($UyeKayitlariniYaz["Sifre"]);
            $UyeTelefonNum      = GeriDöndür($UyeKayitlariniYaz["TelefonNum"]);
            $UyeDurumu          = GeriDöndür($UyeKayitlariniYaz["Durumu"]);
            $UyeKayitTarihi     = GeriDöndür($UyeKayitlariniYaz["KayitTarihi"]);
            $UyeIP              = GeriDöndür($UyeKayitlariniYaz["KayitIPadresi"]);
            $UyeAktivasyon      = GeriDöndür($UyeKayitlariniYaz["AktivasyonKodu"]);   
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="100%">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="e6ffe6">
                                <td><b>Üyenin Adı Soyadı : </b><?php echo $UyeisimSoyisim; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td><b>Üyenin Kullanıcı Adı : </b><?php echo $UyeKullaniciAdi; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td><b>Üye Email : </b><?php echo $UyeEmail; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td><b>Üye Telefon Numarası : </b><?php echo $UyeTelefonNum; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td><b>Üyenin Hesap Durumu : </b><b style="color: #ff0000;"><?php echo $UyeDurumu; ?></b></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td><b>Üye Kayıt Tarihi : </b><?php echo TarihBul($UyeKayitTarihi); ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td><b>Üyenin Kayıt Olduğu IP Adresi : </b><?php echo $UyeIP; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ffb380">
                        <a href="index.php?SKI=67&UID=<?php echo $UyeID; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>AKTİVE ET</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/update_icon.png" border="0"></td>
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
        <td align="center">Kayıtlı Uye bulunamadı.</td>
    </tr>
    <?php    
    }
    if($KacTaneUyeVar>=1){
    ?>
    
      <tr height="50">
          <td align="center">

              <div class="SayfalamaAlani">
                  <div class="SayfalamaAlaniIciMetinAlani">
                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacTaneUyeVar; ?> adet Kayıt var.
                  </div>
                      <div class="SayfalamaAlaniIciNumaraAlani">
                          <?php 
                                if($Sayfalama > 1){
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=66" . $SYFileMenu . "&SYF=1'> << </a></span>";
                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=66" . $SYFileMenu . "&SYF=" . $sayfalamaEKSIbir . "'> < </a></span>";
                                }

                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                        }else{
                                            echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=66" . $SYFileMenu . "&SYF=" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                        }
                                    }
                                }


                                if($Sayfalama != $KacSayfaVar){
                                $sayfalamaARTIbir = $Sayfalama + 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=66" . $SYFileMenu . "&SYF=" . $sayfalamaARTIbir . "'> > </a></span>";
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=66" . $SYFileMenu . "&SYF=" . $KacSayfaVar . "'> >> </a></span>";
                                }
                          ?>
                      </div>
              </div>
            </td>
      </tr>
    <?php } ?>
</table>

<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>