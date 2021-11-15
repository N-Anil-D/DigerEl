<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td>
        <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">

            <?php 
            $BannerQuery  = $DataBaseConnection->query("SELECT * FROM banner WHERE BannerAlani = 'Ana Sayfa' ORDER BY GösterimSayisi ASC LIMIT 1");
            $BannerSayisi = $BannerQuery->num_rows;


            if($BannerSayisi){
                $BannerCek = $BannerQuery->fetch_assoc()
                  ?>
                <tr height="100">
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
    
    <tr height="30"><td></td></tr>
    
    <tr height="50">
      <td bgcolor="#9E49DF" style="color:white;">&nbsp;&nbsp;EN SON EKLENEN ÜRÜNLER</td>      
    </tr>
    
    <tr height="30"><td></td></tr>

    <tr>
        <td>
          <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
          <?php

          $AracQ        = $DataBaseConnection->query("SELECT * FROM arac WHERE Durumu = 1 ORDER BY id DESC LIMIT 3");
          $KonutQ       = $DataBaseConnection->query("SELECT * FROM konut WHERE Durumu = 1 ORDER BY id DESC LIMIT 3");
          $GiyimQ       = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1 ORDER BY id DESC LIMIT 3");
          $TeknolojiQ   = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE Durumu = 1 ORDER BY id DESC LIMIT 3");
              
          $dongusayisi  =1;
          $StunAdetSayisi=1;

              
              while(($AracKayitlariYaz = $AracQ->fetch_assoc()) and ($KonutKayitlariYaz = $KonutQ->fetch_assoc()) and ($GiyimKayitlariYaz = $GiyimQ->fetch_assoc()) and ($TeknolojiKayitlariYaz = $TeknolojiQ->fetch_assoc())){

                  $Aracid           = GeriDöndür($AracKayitlariYaz["id"]);
                  $AracResim        = GeriDöndür($AracKayitlariYaz["UrunResmiBIR"]);
                  $AracAdi          = GeriDöndür($AracKayitlariYaz["UrunAdi"]);
                  $AracFiyati       = GeriDöndür($AracKayitlariYaz["UrunFiyati"]);   
                  $AracParaBirimi   = GeriDöndür($AracKayitlariYaz["ParaBirimi"]);

                  if($AracParaBirimi=="USD"){
                      $AracFiyatiHesapla = $AracFiyati * $DolarKuru;
                  }elseif($AracParaBirimi=="EUR"){
                      $AracFiyatiHesapla = $AracFiyati * $EuroKuru;
                  }else{
                      $AracFiyatiHesapla = $AracFiyati;
                  }
                  
                  
                  $Konutid           = GeriDöndür($KonutKayitlariYaz["id"]);
                  $KonutResim        = GeriDöndür($KonutKayitlariYaz["UrunResmiBIR"]);
                  $KonutAdi          = GeriDöndür($KonutKayitlariYaz["UrunAdi"]);
                  $KonutFiyati       = GeriDöndür($KonutKayitlariYaz["UrunFiyati"]);   
                  $KonutParaBirimi   = GeriDöndür($KonutKayitlariYaz["ParaBirimi"]);

                  if($KonutParaBirimi=="USD"){
                      $KonutFiyatiHesapla = $KonutFiyati * $DolarKuru;
                  }elseif($KonutParaBirimi=="EUR"){
                      $KonutFiyatiHesapla = $KonutFiyati * $EuroKuru;
                  }else{
                      $KonutFiyatiHesapla = $KonutFiyati;
                  }
                  
                  
                  $Giyimid           = GeriDöndür($GiyimKayitlariYaz["id"]);
                  $GiyimResim        = GeriDöndür($GiyimKayitlariYaz["UrunResmiBIR"]);
                  $GiyimAdi          = GeriDöndür($GiyimKayitlariYaz["UrunAdi"]);
                  $GiyimFiyati       = GeriDöndür($GiyimKayitlariYaz["UrunFiyati"]);   
                  $GiyimParaBirimi   = GeriDöndür($GiyimKayitlariYaz["ParaBirimi"]);

                  if($GiyimParaBirimi=="USD"){
                      $GiyimFiyatiHesapla = $GiyimFiyati * $DolarKuru;
                  }elseif($GiyimParaBirimi=="EUR"){
                      $GiyimFiyatiHesapla = $GiyimFiyati * $EuroKuru;
                  }else{
                      $GiyimFiyatiHesapla = $GiyimFiyati;
                  }
                  
                  
                  $Teknolojiid           = GeriDöndür($TeknolojiKayitlariYaz["id"]);
                  $TeknolojiResim        = GeriDöndür($TeknolojiKayitlariYaz["UrunResmiBIR"]);
                  $TeknolojiAdi          = GeriDöndür($TeknolojiKayitlariYaz["UrunAdi"]);
                  $TeknolojiFiyati       = GeriDöndür($TeknolojiKayitlariYaz["UrunFiyati"]);   
                  $TeknolojiParaBirimi   = GeriDöndür($TeknolojiKayitlariYaz["ParaBirimi"]);

                  if($TeknolojiParaBirimi=="USD"){
                      $TeknolojiFiyatiHesapla = $TeknolojiFiyati * $DolarKuru;
                  }elseif($TeknolojiParaBirimi=="EUR"){
                      $TeknolojiFiyatiHesapla = $TeknolojiFiyati * $EuroKuru;
                  }else{
                      $TeknolojiFiyatiHesapla = $TeknolojiFiyati;
                  }
          ?>
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">
                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/". $Aracid; ?>"><img src="<?php echo $AracResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/". $Aracid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $AracAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/". $Aracid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($AracFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>
              
          <td width="10">&nbsp;</td>              
              
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">
                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/". $Konutid; ?>"><img src="<?php echo $KonutResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/". $Konutid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $KonutAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/". $Konutid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($KonutFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>
              
          <td width="10">&nbsp;</td>
              
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">
                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/konut/". $Giyimid; ?>"><img src="<?php echo $GiyimResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/konut/". $Giyimid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $GiyimAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/konut/". $Giyimid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($GiyimFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>
              
          <td width="10">&nbsp;</td>
              
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">
                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/konut/". $Teknolojiid; ?>"><img src="<?php echo $TeknolojiResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/konut/". $Teknolojiid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $TeknolojiAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/konut/". $Teknolojiid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($TeknolojiFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>

          <?php 

              $dongusayisi++;
              if($dongusayisi > $StunAdetSayisi){
                  echo "</tr><tr>";
                  $dongusayisi = 1;
              }

          }//while kapatması 
          ?>
        </td>
    </tr>              
  </table></td>
</tr>
    
    <tr height="30"><td></td></tr>
    
    <tr height="50">
      <td bgcolor="#9E49DF" style="color:white;">&nbsp;&nbsp;EN GÖZDE ÜRÜNLER</td>      
    </tr>
    
    <tr height="30"><td></td></tr>

    <tr>
        <td>
          <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
          <?php

          $AracQ        = $DataBaseConnection->query("SELECT * FROM arac WHERE Durumu = 1 ORDER BY GoruntulenmeSayisi DESC LIMIT 3");
          $KonutQ       = $DataBaseConnection->query("SELECT * FROM konut WHERE Durumu = 1 ORDER BY GoruntulenmeSayisi DESC LIMIT 3");
          $GiyimQ       = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1 ORDER BY GoruntulenmeSayisi DESC LIMIT 3");
          $TeknolojiQ   = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE Durumu = 1 ORDER BY GoruntulenmeSayisi DESC LIMIT 3");
              
          $dongusayisi  =1;
          $StunAdetSayisi=1;

              
              while(($AracKayitlariYaz = $AracQ->fetch_assoc()) and ($KonutKayitlariYaz = $KonutQ->fetch_assoc()) and ($GiyimKayitlariYaz = $GiyimQ->fetch_assoc()) and ($TeknolojiKayitlariYaz = $TeknolojiQ->fetch_assoc())){

                  $Aracid           = GeriDöndür($AracKayitlariYaz["id"]);
                  $AracResim        = GeriDöndür($AracKayitlariYaz["UrunResmiBIR"]);
                  $AracAdi          = GeriDöndür($AracKayitlariYaz["UrunAdi"]);
                  $AracFiyati       = GeriDöndür($AracKayitlariYaz["UrunFiyati"]);   
                  $AracParaBirimi   = GeriDöndür($AracKayitlariYaz["ParaBirimi"]);

                  if($AracParaBirimi=="USD"){
                      $AracFiyatiHesapla = $AracFiyati * $DolarKuru;
                  }elseif($AracParaBirimi=="EUR"){
                      $AracFiyatiHesapla = $AracFiyati * $EuroKuru;
                  }else{
                      $AracFiyatiHesapla = $AracFiyati;
                  }
                  
                  
                  $Konutid           = GeriDöndür($KonutKayitlariYaz["id"]);
                  $KonutResim        = GeriDöndür($KonutKayitlariYaz["UrunResmiBIR"]);
                  $KonutAdi          = GeriDöndür($KonutKayitlariYaz["UrunAdi"]);
                  $KonutFiyati       = GeriDöndür($KonutKayitlariYaz["UrunFiyati"]);   
                  $KonutParaBirimi   = GeriDöndür($KonutKayitlariYaz["ParaBirimi"]);

                  if($KonutParaBirimi=="USD"){
                      $KonutFiyatiHesapla = $KonutFiyati * $DolarKuru;
                  }elseif($KonutParaBirimi=="EUR"){
                      $KonutFiyatiHesapla = $KonutFiyati * $EuroKuru;
                  }else{
                      $KonutFiyatiHesapla = $KonutFiyati;
                  }
                  
                  
                  $Giyimid           = GeriDöndür($GiyimKayitlariYaz["id"]);
                  $GiyimResim        = GeriDöndür($GiyimKayitlariYaz["UrunResmiBIR"]);
                  $GiyimAdi          = GeriDöndür($GiyimKayitlariYaz["UrunAdi"]);
                  $GiyimFiyati       = GeriDöndür($GiyimKayitlariYaz["UrunFiyati"]);   
                  $GiyimParaBirimi   = GeriDöndür($GiyimKayitlariYaz["ParaBirimi"]);

                  if($GiyimParaBirimi=="USD"){
                      $GiyimFiyatiHesapla = $GiyimFiyati * $DolarKuru;
                  }elseif($GiyimParaBirimi=="EUR"){
                      $GiyimFiyatiHesapla = $GiyimFiyati * $EuroKuru;
                  }else{
                      $GiyimFiyatiHesapla = $GiyimFiyati;
                  }
                  
                  
                  $Teknolojiid           = GeriDöndür($TeknolojiKayitlariYaz["id"]);
                  $TeknolojiResim        = GeriDöndür($TeknolojiKayitlariYaz["UrunResmiBIR"]);
                  $TeknolojiAdi          = GeriDöndür($TeknolojiKayitlariYaz["UrunAdi"]);
                  $TeknolojiFiyati       = GeriDöndür($TeknolojiKayitlariYaz["UrunFiyati"]);   
                  $TeknolojiParaBirimi   = GeriDöndür($TeknolojiKayitlariYaz["ParaBirimi"]);

                  if($TeknolojiParaBirimi=="USD"){
                      $TeknolojiFiyatiHesapla = $TeknolojiFiyati * $DolarKuru;
                  }elseif($TeknolojiParaBirimi=="EUR"){
                      $TeknolojiFiyatiHesapla = $TeknolojiFiyati * $EuroKuru;
                  }else{
                      $TeknolojiFiyatiHesapla = $TeknolojiFiyati;
                  }
          ?>
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/". $Aracid; ?>"><img src="<?php echo $AracResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/". $Aracid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $AracAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($AracAdi)."/arac/". $Aracid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($AracFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>
              
          <td width="10">&nbsp;</td>              
              
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/". $Konutid; ?>"><img src="<?php echo $KonutResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/". $Konutid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $KonutAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($KonutAdi)."/konut/". $Konutid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($KonutFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>
              
          <td width="10">&nbsp;</td>
              
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/konut/". $Giyimid; ?>"><img src="<?php echo $GiyimResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/konut/". $Giyimid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $GiyimAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($GiyimAdi)."/konut/". $Giyimid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($GiyimFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>
              
          <td width="10">&nbsp;</td>
              
          <td width="258">
            <table width="255" align="center" border="0" cellpadding="0" cellspacing="0" style="border-bottom: dashed 1px #C500BE; margin-bottom: 10px;">                <tr>
                    <td valign="top" align="center"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/konut/". $Teknolojiid; ?>"><img src="<?php echo $TeknolojiResim; ?>" width="191" height="247"></a></td>
                </tr>
                <tr height="30">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/konut/". $Teknolojiid; ?>" style="color: #C500BE; text-decoration: none;"><div style="width: 191px; max-width: 191px; height: 20px; overflow: hidden; line-height: 20px"><?php echo $TeknolojiAdi; ?></div></a></td>
                </tr>
                <tr height="25">
                    <td width="191" align="center" style="font-size: 12px;"><a href="UrunDetaylari/<?php echo SEO($TeknolojiAdi)."/konut/". $Teknolojiid; ?>" style="color: #9370DB; text-decoration: none;"><b><?php echo FiyatBicimlendir($TeknolojiFiyatiHesapla); ?> TL</b></a></td>
                </tr>

            </table>
          </td>

          <?php 

              $dongusayisi++;
              if($dongusayisi > $StunAdetSayisi){
                  echo "</tr><tr>";
                  $dongusayisi = 1;
              }

          }//while kapatması 
          ?>
        </td>
    </tr>
  </table></td>
</tr>
  
<tr>
    <td>
      <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
          <tr>
              <td>
                  <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                        <tr>
                            <td width="258">
                              <table width="258" align="center" border="0" cellpadding="0" cellspacing="0">
                                  <tr><td width="230" align="center"><img src="Resimler/HizliTeslimat.png"></td></tr>
                                  <tr><td width="230" align="center"><b>Bugün Teslimat</b></td></tr>
                                  <tr><td width="230" align="center">Aynı şehir içinde 14:00 a kadar olan siparişler aynı gün teslim edilir.</td></tr>
                              </table>
                            </td>
                            <td width="258">
                              <table width="258" align="center" border="0" cellpadding="0" cellspacing="0">
                                  <tr><td width="230" align="center"><img src="Resimler/GuvenliAlisveris.png"></td>
                                  <tr><td width="230" align="center"><b>Tek Tıkla Güvenli Alışveriş</b></td>
                                  <tr><td width="230" align="center">Alıcı ve satıcılarımıza hızlı destek imkanı.</td>
                                  </tr>
                              </table>
                            </td>
                            <td width="258">
                              <table width="258" align="center" border="0" cellpadding="0" cellspacing="0">
                                  <tr><td width="230" align="center"><img src="Resimler/MobilErisim.png"></td>
                                  <tr><td width="230" align="center"><b>Mobil Erişim</b></td>
                                  <tr><td width="230" align="center">Tüm cihazlardan sistemimize erişebilir ve alışveriş yapabilirsiniz.</td></tr>
                              </table>
                            </td>
                            <td width="258">
                              <table width="258" align="center" border="0" cellpadding="0" cellspacing="0">
                                  <tr><td width="230" align="center"><img src="Resimler/IadeGarantisi.png"></td>
                                  <tr><td width="230" align="center"><b>Kolay İade</b></td>
                                  <tr><td width="230" align="center">Aldığınız herhangi bir ürünü kolaylıkla iptal/iade işlemi yapabilirsiniz.</td></tr>
                              </table>
                            </td>
                        </tr>
                  </table>

              </td>
          </tr>
      </table>
    </td>
</tr>


    
</table>