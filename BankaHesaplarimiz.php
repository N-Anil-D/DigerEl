<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="80" bgcolor="#B9B651">
      <td align="left"><h2 style="color: #8F0D0F">&nbsp;Banka Hesaplarımız</h2></td>
  </tr>
  
  <tr height="50">
      <td align="left" align="left" style="border-bottom: 2px dashed #8F0D0F"><br>&nbsp; Ödeme işlemleriniz için çalışmakta olduğumuz tüm banka hesap bilgileri aşağıdadır<br><br></td>
  </tr>

  <tr height="20">
      <td>&nbsp;</td>
  </tr>

  <tr>
      <td>
          <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr><?php
                  $BANKAquuery             = $DataBaseConnection->query("SELECT * FROM bankahesaplarimiz");
                  $BANKAkayitsayisi        = $BANKAquuery->num_rows;
                  
                  $dongusayisi=1;
                  $StunAdetSayisi=3;
                  
                  while($tumkayitlariyaz = $BANKAquuery->fetch_assoc()){
                  ?>
                  <td width="340">
                      <table width="340" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #3A2BFF; margin-bottom: 20px;">
                          <tr height="40">
                              <td colspan="4" align="center"> <img src="<?php echo GeriDöndür($tumkayitlariyaz["BankaLogosu"]); ?>"> </td>
                          </tr>
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td width="80" style="color:#5501B1"><b>Banka Adı</b></td>
                              <td width="10" style="color:#000000"><b>:</b></td>
                              <td width="245"><?php echo GeriDöndür($tumkayitlariyaz["BankaAdi"]); ?></td>
                          </tr>
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td style="color:#5501B1"><b>Konum</b></td>
                              <td style="color:#000000"><b>:</b></td>
                              <td><?php echo GeriDöndür($tumkayitlariyaz["KonumUlke"]) . " / " . GeriDöndür($tumkayitlariyaz["KonumSehir"]); ?></td>
                          </tr>
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td style="color:#5501B1"><b>Şube</b></td>
                              <td style="color:#000000" style="color:#5501B1"><b>:</b></td>
                              <td><?php echo GeriDöndür($tumkayitlariyaz["SubeAdi"]); ?></td>
                          </tr> 
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td style="color:#5501B1"><b>Şube Kodu</b></td>
                              <td style="color:#000000"><b>:</b></td>
                              <td><?php echo GeriDöndür($tumkayitlariyaz["SubeKodu"]); ?></td>
                          </tr>                          
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td style="color:#5501B1"><b>Birim</b></td>
                              <td style="color:#000000"><b>:</b></td>
                              <td><?php echo GeriDöndür($tumkayitlariyaz["ParaBirimi"]); ?></td>
                          </tr>
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td style="color:#5501B1"><b>Hesap Adı</b></td>
                              <td style="color:#000000"><b>:</b></td>
                              <td><?php echo GeriDöndür($tumkayitlariyaz["HesapSahibi"]); ?></td>
                          </tr>
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td style="color:#5501B1"><b>Hesap No</b></td>
                              <td style="color:#000000"><b>:</b></td>
                              <td><?php echo GeriDöndür($tumkayitlariyaz["HesapNumarasi"]); ?></td>
                          </tr>
                          <tr height="25">
                              <td width="5">&nbsp;</td>
                              <td style="color:#5501B1"><b>İBAN No</b></td>
                              <td style="color:#000000"><b>:</b></td>
                              <td><?php echo ibanBicimlendir(GeriDöndür($tumkayitlariyaz["ibanNumarasi"])); ?></td>
                          </tr>
                      </table>
                  </td>

                    <?php if($dongusayisi<$StunAdetSayisi)
                  {?>
                  <td width="20">&nbsp;</td>
                  <?php }
                      
                      $dongusayisi++;
                      if($dongusayisi > $StunAdetSayisi){
                          echo "</tr><tr>";
                          $dongusayisi = 1;
                      }
                      
                  }
                  ?>
              </tr>
          </table>
      </td>
 </tr>
</table>