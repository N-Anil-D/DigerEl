<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>YORUMLAR</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="5">
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <tr>
        <td>
            <div class="AramaAlaniGenelDiv">
                <form action="index.php?SKI=68" method="post">
                    <div class="AramaAlaniButonDiv"><input type="submit" value="" class="AramaAlaniBUTON"></div>
                    <div class="AramaAlaniYaziDiv"><input type="text" name="AramadaArananKelime" class="AramaAlaniYAZI" placeholder="Sadece yorum metni ile arama yapınız"></div>
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
        $AramaKosulu       = " WHERE Yorum LIKE '%" . $GelenAramaIcerigi . "%'";
        $SYFileMenu        = "&AramadaArananKelime=" .$GelenAramaIcerigi;
    }else{
        $AramaKosulu       = "";
        $SYFileMenu        = "";
    }
    //--------------------------------------------
    $SYFSagSolButonSayisi               = 2;
    $SYFBasinaGosterilenKayitSayisi     = 5;


    $ToplamKayitSayisiQuery             = $DataBaseConnection->query("SELECT * FROM yorumlar $AramaKosulu");
    $KacTaneYorumVar                      = $ToplamKayitSayisiQuery->num_rows;

    $SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
    $KacSayfaVar                        = ceil($KacTaneYorumVar/$SYFBasinaGosterilenKayitSayisi);
    ?>
    
    <?php    
    if($KacTaneYorumVar>$SYFBasinaGosterilenKayitSayisi){
    ?>

      <tr height="50">
          <td align="center">

              <div class="SayfalamaAlani">
                  <div class="SayfalamaAlaniIciMetinAlani">
                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacTaneYorumVar; ?> adet Kayıt var.
                  </div>
                      <div class="SayfalamaAlaniIciNumaraAlani">
                          <?php 
                                if($Sayfalama > 1){
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=68" . $SYFileMenu . "&SYF=1'> << </a></span>";
                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=68" . $SYFileMenu . "&SYF=" . $sayfalamaEKSIbir . "'> < </a></span>";
                                }

                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                        }else{
                                            echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=68" . $SYFileMenu . "&SYF=" . $SYFicinSayfaIndexDegeri . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                        }
                                    }
                                }


                                if($Sayfalama != $KacSayfaVar){
                                $sayfalamaARTIbir = $Sayfalama + 1;
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=68" . $SYFileMenu . "&SYF=" . $sayfalamaARTIbir . "'> > </a></span>";
                                echo "<span class='SayfalamaLinkiPasif'><a href='index.php?SKI=68" . $SYFileMenu . "&SYF=" . $KacSayfaVar . "'> >> </a></span>";
                                }
                          ?>
                      </div>
              </div>
            </td>
      </tr>
    <?php   } ?>    
    
    
    <?php
    
    $YorumQuuery             = $DataBaseConnection->query("SELECT * FROM yorumlar $AramaKosulu ORDER BY YorumTarihi DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
    $Yorumkayitsayisi        = $YorumQuuery->num_rows;

    if($Yorumkayitsayisi){
        while($YorumlariYaz = $YorumQuuery->fetch_assoc()){
            $YorumID            = GeriDöndür($YorumlariYaz["id"]);
            $YorumTabloAdi      = GeriDöndür($YorumlariYaz["TabloAdi"]);
            $YorumUrunid        = GeriDöndür($YorumlariYaz["Urunid"]);
            $YorumUyeID         = GeriDöndür($YorumlariYaz["UyeID"]);
            $YorumPuan          = GeriDöndür($YorumlariYaz["Puan"]);
            $YorumYazisi        = GeriDöndür($YorumlariYaz["Yorum"]);
            $YorumTarihi        = GeriDöndür($YorumlariYaz["YorumTarihi"]);
            $YorumIPadresi      = GeriDöndür($YorumlariYaz["YorumYapaninIPadresi"]);
            

            if($YorumPuan==0){
                $PuaninResmi = "../Resimler/YildizCizgiliBos.png";
            }elseif($YorumPuan==1){
                $PuaninResmi = "../Resimler/YildizCizgiliBirDolu.png";
            }elseif($YorumPuan==2){
                $PuaninResmi = "../Resimler/YildizCizgiliIkiDolu.png";
            }elseif($YorumPuan==3){
                $PuaninResmi = "../Resimler/YildizCizgiliUcDolu.png";
            }elseif($YorumPuan==4){
                $PuaninResmi = "../Resimler/YildizCizgiliDortDolu.png";
            }elseif($YorumPuan==5){
                $PuaninResmi = "../Resimler/YildizCizgiliBesDolu.png";
            }


            $UrunQuery  = $DataBaseConnection->query("SELECT * FROM $YorumTabloAdi WHERE id = $YorumUrunid LIMIT 1");
            $UrunSayisi = $UrunQuery->num_rows;
            if($UrunSayisi){    
                $UrunCek    = $UrunQuery->fetch_assoc();
            }
            $UyeQuery  = $DataBaseConnection->query("SELECT * FROM uyeler WHERE id = $YorumUyeID LIMIT 1");
            $UyeSayisi = $UyeQuery->num_rows;
            if($UyeSayisi){    
                $UyeCek    = $UyeQuery->fetch_assoc();
            }
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="100%">
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <td width="180" align="center"><img src="<?php echo "../".$UrunCek["UrunResmiBIR"]; ?>" border="0" width="180" height="100"></td>
                            <td><table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="e6ffe6">
                                <td>Yorumun Puanı : <img src="<?php echo $PuaninResmi; ?>"></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>Ürün : <?php echo "Tablo Adı : ".$YorumTabloAdi." / Ürün ID : ".$YorumUrunid; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td>Yorum Yapan Üye Email : <?php echo $UyeCek["Email"]; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>Yapılan Yorum : <?php echo $YorumYazisi; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td>Yorum Tarihi : <?php echo GunAyYil($YorumTarihi); ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>Yapılan Yorumun IP Adresi : <?php echo $YorumIPadresi; ?></td>
                            </tr>
                                </table></td>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=72&YorID=<?php echo $YorumID; ?>" style="text-decoration:none; color:#000000;">
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
                        <a href="index.php?SKI=69&YorID=<?php echo $YorumID; ?>" style="text-decoration:none; color:#000000;">
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
    } /* while kapatması */

    }else{ ?>
    <tr>
        <td align="center">Kayıtlı banka hesabı bulunamadı.</td>
    </tr>
    <?php    
    }
    ?>
</table>

<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>