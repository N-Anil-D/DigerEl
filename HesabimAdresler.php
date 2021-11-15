<?php 
if(isset($_SESSION["Kullanici"])){ ?>
    
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    
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
                      <td colspan="5" style="color: #FF9900"><h3>Adres Bilgilerim</h3></td>
                  </tr>

                  <tr height="40">
                      <td colspan="5" valign="top">Tüm adreslerimi Göster ve Yönet</td>
                  </tr>
                                    
                  <tr height="30" style="background: #FFD1FE;">
                      <td colspan="1" width="50" align="left">&nbsp;Adresler</td>
                      <td colspan="1" align="center"><a href="AdresEkle"><img src="Resimler/ArttirDaireli20x20.png" border="0" style="margin-top: 5px"></a></td>
                      <td colspan="3" align="center" style="font-weight: bold"><a href="AdresEkle"  style="text-decoration: none; color: #C500BE;">Adres Ekle&nbsp;</a></td>

                  </tr>
                  <?php


            $AdresCekmeQuery     = $DataBaseConnection->query("SELECT * FROM adresler WHERE UyeID = '$Uyeid'");
            $KayitliAdresSayisi  = $AdresCekmeQuery->num_rows;
    
            $bgRengi1            = "#F5F9B1";
            $bgRengi2            = "#D6D896";
            $RenkAyarSayisi      = 1;

            if($KayitliAdresSayisi>0){
                while($AdresYazdir = $AdresCekmeQuery->fetch_assoc()){ 
                    if($RenkAyarSayisi % 2){
                        $BGcolor    = $bgRengi1;
                    }else{
                        $BGcolor    = $bgRengi2;

                    }                
                          ?>
                  <tr height="50" bgcolor="<?php echo $BGcolor; ?>">
                      <td width="920" align="left" class="SiyahLinksizYazi"><?php echo "<b>Kayıtlı adres sahibinin ismi:</b> " . $AdresYazdir["AdiSoyadi"] . " <br /> <b>İl - İlçe:</b> " . $AdresYazdir["il"] . " - " . $AdresYazdir["ilce"] . "<br /><b>Adres:</b> " . $AdresYazdir["Adres"]; ?></td>
                      <td width="25"><a href="AdresGuncelle/<?php echo $AdresYazdir["id"]; ?>"><img src="Resimler/Guncelleme20x20.png" border="0" style="margin-top: 7px"></a></td>
                      <td width="70"><a href="AdresGuncelle/<?php echo $AdresYazdir["id"]; ?>" style="color: #C500BE; text-decoration: none">Güncelle</a></td>
                      <td width="25"><a href="AdresSil/<?php echo $AdresYazdir["id"]; ?>"><img src="Resimler/Sil20x20.png" border="0" style="margin-top: 5px"></a></td>
                      <td width="25"><a href="AdresSil/<?php echo $AdresYazdir["id"]; ?>" style="color: #C500BE; text-decoration: none">Sil</a></td>
                  </tr>
                <?php 
                $RenkAyarSayisi++;
                }
            }else{
                ?>
                  <tr height="50">
                      <td colspan="5" align="left">Sisteme kayıtlı adresiniz bulunmamaktadır</td>
                  </tr>
            <?php
            } ?>
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