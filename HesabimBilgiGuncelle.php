<?php if(isset($_SESSION["Kullanici"])){ ?>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td width="520" valign="top">
          <form action="UyelikBilgileriGuncelleF" method="post">
              <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
                  <tr height="50">
                      <td style="color: #FF9900"><h3>Hesap Bilgilerni Güncelle</h3></td>
                  </tr>

                  <tr height="40">
                      <td valign="top" style="border-bottom: 1px dashed #A7A7A7">Güncellemek istediğiniz bilgileri değiştiriniz ve güncellemek <u>istemediğiniz</u> bilgileri lütfen varsayılan halinde bırakınız.</td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">İsim Soyisim</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="IsimSoyisim" class="InputAlanlari" value="<?php echo $UyeisimSoyisim ?>" required></td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Kullanıcı Adı</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="KullaniciAdi" class="InputAlanlari" value="<?php echo $UyeKullaniciAdi ?>" required></td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">E-Mail Adresi</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="email" name="Email" class="InputAlanlari" value="<?php echo $UyeEmail ?>" required></td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Şifre</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="password" name="sifre" class="InputAlanlari" value="EskiSifre" required></td>
                  </tr>
                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Şifre Tekrar</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="password" name="sifre2" class="InputAlanlari" value="EskiSifre" required></td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Telefon Numarası</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="telefonNum" maxlength="15" class="InputAlanlari" value="<?php echo $UyeTelefonNum ?>" required></td>
                  </tr>

                  <tr height="80">
                      <td align="center"><input type="submit" value="Bilgileri Güncelle" class="YesiButon"></td>
                  </tr>
                  

              </table>
          </form>
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
<?php } ?>