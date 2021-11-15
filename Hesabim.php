<?php 
if(isset($_SESSION["Kullanici"])){ ?>
    
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr>
        <td colspan="3"><hr /></td>
    </tr>
    
    <tr>
        <td colspan="3">
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
        <td colspan="3"><hr /></td>
    </tr>
    
  <tr>
      <td width="520" valign="top">
              <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
                  <tr height="50">
                      <td style="color: #FF9900"><h3>Üyelik Bilgilerim</h3></td>
                  </tr>

                  <tr height="40">
                      <td valign="top" style="border-bottom: 1px dashed #A7A7A7">Üyelik Bilgilerimi Göster / Güncelle</td>
                  </tr>
                                    
                  <tr height="30">
                      <td valign="middle" align="left"><b>İsim Soyisim</b></td>
                  </tr>
                  
                  
                  <tr height="30">
                      <td valign="top" align="left"><?php echo $UyeisimSoyisim; ?></td>
                  </tr>
                        
                  <tr height="30">
                      <td valign="middle" align="left"><b>Kullanıcı Adı</b></td>
                  </tr>
                  
                  
                  <tr height="30">
                      <td valign="top" align="left"><?php echo $UyeKullaniciAdi; ?></td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="middle" align="left"><b>Üye Kayıt No</b></td>
                  </tr>
                  <tr height="30">
                      <td valign="top" align="left"><?php echo $Uyeid; ?></td>
                  </tr>
                  

                  <tr height="30">
                      <td valign="middle" align="left"><b>E-Mail</b></td>
                  </tr>
                  <tr height="30">
                      <td valign="top" align="left"><?php echo $UyeEmail; ?></td>
                  </tr>
                  
              
                  <tr height="30">
                      <td valign="middle" align="left"><b>Telefon Num</b></td>
                  </tr>
                  <tr height="30">
                      <td valign="top" align="left"><?php echo $UyeTelefonNum; ?></td>
                  </tr>
              
              
                  <tr height="30">
                      <td valign="middle" align="left"><b>Kayit Tarihi</b></td>
                  </tr>
                  <tr height="30">
                      <td valign="top" align="left"><?php echo TarihBul($UyeKayitTarihi); ?></td>
                  </tr>
                  
                  
                  <tr height="30">
                      <td valign="top" align="center"><a href="UyelikBilgileriGuncelle" class="HesapBilgisiGuncelle">Hesap Bilgilerni Güncelle</a></td>
                  </tr>
              </table>
      </td>
      
      <td width="25">&nbsp;</td>
      
      
      <td width="520" valign="top">
          <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="50">
                  <td style="color: #FF9900"><h3>Reklamlar</h3></td>
              </tr>
              
              <tr height="40">
                  <td><img src="Resimler/ReklamVer.png"></td>
              </tr>
              
              <tr height="30">
                  <td>&nbsp;</td>
              </tr>
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