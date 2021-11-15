<?php
if($_REQUEST["MenuID"]!=""){
    $GelenMenuID = GuvenlikFiltresi($_REQUEST["MenuID"]);
    $MenuKosulu  = " AND MenuAdi = '" . $GelenMenuID . "'";
    $SYFileMenu  = "/" .$GelenMenuID;
}else{
    $GelenMenuID = "";
    $MenuKosulu  = "";
    $SYFileMenu  = "/";
}
//--------------------------------------------
if(isset($_REQUEST["ArananKelime"])){
    $GelenAramaIcerigi = GuvenlikFiltresi($_REQUEST["ArananKelime"]);
    $AramaKosulu       = " AND UrunAdi LIKE '%" . $GelenAramaIcerigi . "%'";
    $SYFileMenu       .= "&ArananKelime=" .$GelenAramaIcerigi;
}else{
    $AramaKosulu       = "";
    $SYFileMenu       .= "";
}
//--------------------------------------------
$SYFSagSolButonSayisi               = 2;
$SYFBasinaGosterilenKayitSayisi     = 8;


$ToplamKayitSayisiQuery             = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1 $MenuKosulu $AramaKosulu");
$KacTaneAracVar                     = $ToplamKayitSayisiQuery->num_rows;
    
$SayfalamayaBaslanacakKayitSayisi   = ($Sayfalama*$SYFBasinaGosterilenKayitSayisi) - $SYFBasinaGosterilenKayitSayisi;
$KacSayfaVar                        = ceil($KacTaneAracVar/$SYFBasinaGosterilenKayitSayisi);


$UrunSayisiBulmaQ        = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1");
$KacTanesiOnline    = $UrunSayisiBulmaQ->num_rows;

    
?>

<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="100">
      <td width="250" align="left" valign="top">
      <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td>
                  <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr height="50">
                          <td style="font-weight: bold; color: #D90003" bgcolor="#F1F1F1">&nbsp;MENÜLER</td>
                      </tr>
                      <tr>
                          <td>
                              &nbsp;&nbsp;<a href="Kiyafet/1/" style="text-decoration: none;<?php if($GelenMenuID == ""){ ?> color: #FF7300; <?php }else{ ?>color: #9932CC;<?php } ?> font-weight: bold;">Tüm Menüler (<?php echo $KacTanesiOnline ?>)</a>
                          </td>
                      </tr>
                      <?php 
	function MenuYaz($MenuUstIdDegeri=0, $BoslukDegeri=0){
		global $DataBaseConnection;
        global $GelenMenuID;
        
		$MenuSorgusu			=	$DataBaseConnection->query("SELECT * FROM menuler WHERE TabloAdi = 'giyim' AND ustID = $MenuUstIdDegeri");
		$MenuSorugusuSayi		=	$MenuSorgusu->num_rows;
        
    
		if($MenuSorugusuSayi>0){
			while($MenuAdlari = $MenuSorgusu->fetch_assoc()){
				$MenuId			= GeriDöndür($MenuAdlari["id"]);
				$MenuUstId		= GeriDöndür($MenuAdlari["ustID"]);
				$MenuMenuAdi	= GeriDöndür($MenuAdlari["MenuAdi"]);
                $UrunSayisi     = GeriDöndür($MenuAdlari["UrunSayisi"]);
                
                
                if($GelenMenuID == $MenuAdlari["MenuAdi"]){$renk = "color: #FF7300;";}else{$renk = "color: #9932CC;";} 
                echo '<tr height="25">';
                
                    if($MenuUstId==0){
				echo '<td style="color: #8B008B; font-weight: bold;">' . str_repeat("&nbsp;", $BoslukDegeri). $MenuMenuAdi . ' (' . $UrunSayisi . ')';
                    }else{
				echo '<td><div><a href="Kiyafet/1/' . $MenuAdlari["MenuAdi"] . '" style="text-decoration: none;' . $renk . 'font-weight: bold;">' . str_repeat("&nbsp;", $BoslukDegeri). $MenuMenuAdi . ' (' . $UrunSayisi . ')</a></div>';
                    }
                
				MenuYaz($MenuId, $BoslukDegeri+3);
                echo '</td></tr>';
			}
		}
	}                      
                      
                       MenuYaz();                     
                      ?>

                  </table>
              </td>
          </tr>
          <tr>
              <td>&nbsp;</td>
          </tr>
          <tr>
              <td>
                  <table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr height="50">
                          <td style="font-weight: bold; color: #D90003" bgcolor="#F1F1F1">&nbsp;REKLAMLAR</td>
                      </tr>

                      <?php 
                      $BannerQuery  = $DataBaseConnection->query("SELECT * FROM banner WHERE BannerAlani = 'Menü Altı' ORDER BY GösterimSayisi ASC LIMIT 1");
                      $BannerSayisi = $BannerQuery->num_rows;
                      
                      
                      if($BannerSayisi){
                          $BannerCek = $BannerQuery->fetch_assoc()
                            ?>
                          <tr height="250">
                              <td>
                                  <img src="<?php echo $BannerCek["BannerResmi"] ?>">
                              </td>
                          </tr>
                          <?php
                          $BannerinIDsi = $BannerCek["id"];
                          $BannerGosterimSayisiARTTIR  = $DataBaseConnection->query("UPDATE banner SET GösterimSayisi=GösterimSayisi+1 WHERE id= '$BannerinIDsi' LIMIT 1");
                      }
                      ?>
                  </table>
</td>
          </tr>
      </table>
      </td>
      
      
      <td width="20">&nbsp;</td>
      
      
      <td align="left" valign="top" width="795">
          <table width="795" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                  <td>
                      <div class="AramaAlaniGenelDiv">
                          <form action="Kiyafet/1/" method="post">
                              <?php if($GelenMenuID!=""){?>
                              <input type="hidden" name="MenuID" value="<?php echo $GelenMenuID; ?>">
                              <?php } ?>
                              <div class="AramaAlaniButonDiv"><input type="submit" value="" class="AramaAlaniBUTON"></div>
                              <div class="AramaAlaniYaziDiv"><input type="text" name="ArananKelime" class="AramaAlaniYAZI" placeholder="Ürün Adı"></div>
                          </form>
                      </div>
                  </td>
              </tr>
              
              
              <tr>
                  <td>&nbsp;</td>
              </tr>          
          
              <tr>
                  <td>
                    <table width="795" align="center" border="0" cellpadding="0" cellspacing="0">
                        <?php
                    $AracSayfasiQ             = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1 $MenuKosulu $AramaKosulu ORDER BY id DESC LIMIT $SayfalamayaBaslanacakKayitSayisi, $SYFBasinaGosterilenKayitSayisi");
                    $OnlineKayitlar           = $AracSayfasiQ->num_rows;

                    $dongusayisi=1;
                    $StunAdetSayisi=4;

                    while($tumkayitlariyaz = $AracSayfasiQ->fetch_assoc()){
                                                
                    $UrunID         = GeriDöndür($tumkayitlariyaz["id"]);   
                    $UrunAdi        = SEO(GeriDöndür($tumkayitlariyaz["UrunAdi"]));
                    $UrunFiyati     = GeriDöndür($tumkayitlariyaz["UrunFiyati"]);   
                    $UrunParaBirimi = GeriDöndür($tumkayitlariyaz["ParaBirimi"]);
                    $UrunResmiBIR   = GeriDöndür($tumkayitlariyaz["UrunResmiBIR"]);
                        
                        if($UrunParaBirimi=="USD"){
                            $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
                        }elseif($UrunParaBirimi=="EUR"){
                            $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
                        }else{
                            $UrunFiyatiHesapla = $UrunFiyati;
                        }
                        
                    $YapilanYorumSayisi = GeriDöndür($tumkayitlariyaz["YorumSayisi"]);
                    $YorumPuani        = GeriDöndür($tumkayitlariyaz["ToplamYorumPuani"]);
                        if($YapilanYorumSayisi!=0){
                    $UrunPuaniHesapla        = number_format($YorumPuani/$YapilanYorumSayisi, 2, ".",  "");
                            }else{$UrunPuaniHesapla=0;}
                        
                    if($UrunPuaniHesapla==0){
                        $PuaninResmi = "YildizCizgiliBos.png";
                    }elseif(($UrunPuaniHesapla>0) and ($UrunPuaniHesapla<=1.5)){
                        $PuaninResmi = "YildizCizgiliBirDolu.png";
                    }elseif(($UrunPuaniHesapla>1.5) and ($UrunPuaniHesapla<=2)){
                        $PuaninResmi = "YildizCizgiliIkiDolu.png";
                    }elseif(($UrunPuaniHesapla>2) and ($UrunPuaniHesapla<=3.5)){
                        $PuaninResmi = "YildizCizgiliUcDolu.png";
                    }elseif(($UrunPuaniHesapla>3.5) and ($UrunPuaniHesapla<=4.2)){
                        $PuaninResmi = "YildizCizgiliDortDolu.png";
                    }elseif($UrunPuaniHesapla>4.2){
                        $PuaninResmi = "YildizCizgiliBesDolu.png";
                    }
                    ?>
                    <td width="191">
                        <table width="191" align="center" border="0" cellpadding="0" cellspacing="0" style=" border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">
                            <tr>
                                <td valign="top" align="center"><a href="UrunDetaylari/<?php echo $UrunAdi; ?>/<?php echo "giyim"; ?>/<?php echo $UrunID; ?>"><img src="<?php echo $UrunResmiBIR; ?>" width="191" height="247"></a></td>
                            </tr>
                            <tr height="30">
                                <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo $UrunAdi; ?>/<?php echo "giyim"; ?>/<?php echo $UrunID; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo GeriDöndür($tumkayitlariyaz["UrunAdi"]); ?></div></a></td>
                            </tr>
                            <tr height="25">
                                <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo $UrunAdi; ?>/<?php echo "giyim"; ?>/<?php echo $UrunID; ?>"><img src="Resimler/<?php echo $PuaninResmi ?>"></a></td>
                            </tr>

                            <tr height="25">
                                <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo $UrunAdi; ?>/<?php echo "giyim"; ?>/<?php echo $UrunID; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($UrunFiyatiHesapla); ?> TL</b></a></td>
                            </tr>

                        </table>
                    </td>

                      <?php if($dongusayisi<$StunAdetSayisi)
                    {?>
                    <td width="10">&nbsp;</td>
                    <?php }

                        $dongusayisi++;
                        if($dongusayisi > $StunAdetSayisi){
                            echo "</tr><tr>";
                            $dongusayisi = 1;
                        }

                    }
                    ?>
                  </td>
              </tr>          

                  </table>
          
              <tr>
                  <td>&nbsp;</td>
              </tr>          
          
          
              <tr>
                <td>
                    <?php
                    if($KacSayfaVar>1){
                        ?>
                      <tr height="50">
                          <td align="center">

                              <div class="SayfalamaAlani">
                                  <div class="SayfalamaAlaniIciMetinAlani">
                                      Toplam <?php echo $KacSayfaVar; ?> sayfada, <?php echo $KacTaneAracVar; ?> adet Kayıt var.
                                  </div>
                                      <div class="SayfalamaAlaniIciNumaraAlani">
                                          <?php 
                                                if($Sayfalama > 1){
                                                echo "<span class='SayfalamaLinkiPasif'><a href='Kiyafet/1" . $SYFileMenu . "'> << </a></span>";
                                                $sayfalamaEKSIbir = $Sayfalama - 1;
                                                echo "<span class='SayfalamaLinkiPasif'><a href='Kiyafet/" . $sayfalamaEKSIbir . $SYFileMenu . "'> < </a></span>";
                                                }

                                                for($SYFicinSayfaIndexDegeri = $Sayfalama-$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri<=$Sayfalama+$SYFSagSolButonSayisi; $SYFicinSayfaIndexDegeri++){
                                                    if(($SYFicinSayfaIndexDegeri>0) and ($SYFicinSayfaIndexDegeri<=$KacSayfaVar)){
                                                        if($Sayfalama == $SYFicinSayfaIndexDegeri){
                                                            echo "<span class='SayfalamaLinkiAktif'>" . $SYFicinSayfaIndexDegeri . "</span>";
                                                        }else{
                                                            echo "<span class='SayfalamaLinkiPasif'><a href='Kiyafet/" . $SYFicinSayfaIndexDegeri . $SYFileMenu . "'>" . $SYFicinSayfaIndexDegeri . "</a></span>";
                                                        }
                                                    }
                                                }


                                                if($Sayfalama != $KacSayfaVar){
                                                $sayfalamaARTIbir = $Sayfalama + 1;
                                                echo "<span class='SayfalamaLinkiPasif'><a href='Kiyafet/" . $sayfalamaARTIbir . $SYFileMenu . "'> > </a></span>";
                                                echo "<span class='SayfalamaLinkiPasif'><a href='Kiyafet/" . $KacSayfaVar . $SYFileMenu . "'> >> </a></span>";
                                                }
                                          ?>
                                      </div>
                              </div>
                            </td>
                      </tr>

            <?php } ?>
                  </td>
                </tr>
          
          
          
          </table>
      </td>
 </tr>
</table>