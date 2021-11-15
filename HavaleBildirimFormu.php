<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td width="520" valign="top">
          <form action="hbff" method="post">
              <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
                  <tr height="50">
                      <td style="color: #FF9900"><h3>Havale Bildirim Formu</h3></td>
                  </tr>

                  <tr height="40">
                      <td valign="top" style="border-bottom: 1px dashed #A7A7A7">Tamamlanmış olan ödeme işleminizi aşağıdaki gibi iletiniz<br />&nbsp;* ile işaretli alanlar doldurulması sorunlu alanlardır</td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">İsim Soyisim (*)</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="IsimSoyisim" class="InputAlanlari" placeholder="İsim Soyisim" required></td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">E-Mail Adresi (*)</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="email" name="Email" class="InputAlanlari" placeholder="mail.domain.xxx" required></td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Telefon Numarası (*)</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="number" name="telefonNum" maxlength="11" class="InputAlanlari" placeholder="0(5xx) xxx xx xx" required></td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Ödeme Yapılan Banka (*)</td>
                  </tr>
                  <tr height="30">
                      <td valign="top" align="left">
                          <select name="BankaSecimi" class="SelectAlani" required>

                              <option value="">&nbsp;</option>

                              <?php
                              $quueryBankaKayitlari         = $DataBaseConnection->query("SELECT * FROM bankahesaplarimiz ORDER BY BankaAdi ASC");

                              while($BankaKayitVerileri = $quueryBankaKayitlari->fetch_assoc()){
                                  ?><option value="<?php echo GeriDöndür($BankaKayitVerileri["BankaAdi"]); ?>"><?php echo GeriDöndür($BankaKayitVerileri["BankaAdi"]) ; ?></option>
                              <?php } ?>


                          </select>
                      </td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Açıklama</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="Aciklama" class="TextAlanlari" placeholder="Eklemek istediğiniz detaylar."></td>
                  </tr>

                  <tr height="30">
                      <td align="center"><input type="submit" value="Bildirimi Gönder" class="YesiButon" style="margin-top: 20px"></td>
                  </tr>
                  <tr height="20">
                      <td>&nbsp;</td>
                  </tr>              

              </table>
          </form>
      </td>
      
      <td width="25">&nbsp;</td>
      
      
      <td width="520" valign="top">
          <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="50">
                  <td colspan="2" style="color: #FF9900"><h3>İşleyiş</h3></td>
              </tr>
              
              <tr height="40">
                  <td colspan="2" align="left" valign="top" style="border-bottom: 1px dashed #A7A7A7">Havale / EFT İşlemlerinin Kontrolü</td>
              </tr>
              
              
              
              <tr height="40">
                  <td align="center" width="30"><img src="Resimler/Banka20x20.png" border="0" style="margin-top: 6px;"></td>
                  <td align="left">Havale / EFT İşlemleri</td>
              </tr>

              <tr>
                  <td colspan="2" align="left">Müşteri tarafından öncelikle banka hesaplarımız sayfasında bulunan herhangi bir hesaba ödeme işlemi gerçekleştirilir.</td>
              </tr>
              
              <tr>
                  <td>&nbsp;</td>
              </tr>

      
              <tr height="40">
                  <td align="center" width="30"><img src="Resimler/DokumanKirmiziKalemli20x20.png" border="0" style="margin-top: 6px;"></td>
                  <td align="left">Bildirim İşlemi</td>
              </tr>

              <tr>
                  <td colspan="2" align="left">Ödeme işleminizi tamamladıktan sonra "Havale Bildirim Formu" sayfasından müşteri yapmış olduğu ödeme için bildirim formunu doldurakrak online olarak gönderir.</td>
              </tr>
              
              <tr>
                  <td>&nbsp;</td>
              </tr>

      
              <tr height="40">
                  <td align="center" width="30"><img src="Resimler/CarklarSiyah20x20.png" border="0" style="margin-top: 6px;"></td>
                  <td align="left">Kontroller</td>
              </tr>

              <tr>
                  <td colspan="2" align="left">"Havale Bildirim Formu" 'nuz tarafımıza ulaştığı anda ilgili departman tarafından yapmış olduğunuz Havale / EFT işlemi ilgili banka üzerinden kontrol edilir.</td>
              </tr>
              
              <tr>
                  <td>&nbsp;</td>
              </tr>

      
              <tr height="40">
                  <td align="center" width="30"><img src="Resimler/InsanlarSiyah20x20.png" border="0" style="margin-top: 6px;"></td>
                  <td align="left">Onay / Red</td>
              </tr>

              <tr>
                  <td colspan="2" align="left">Havale Bildirimi geçerli ise, yönetici ilgili ödeme onayını vererek siparişiniz teslimat birimine iletilir.</td>
              </tr>
              
              <tr>
                  <td>&nbsp;</td>
              </tr>

      
              <tr height="40">
                  <td align="center" width="30"><img src="Resimler/SaatEsnetikGri20x20.png" border="0" style="margin-top: 6px;"></td>
                  <td align="left">Sipariş Hazırlama &amp; Teslimat</td>
              </tr>

              <tr>
                  <td colspan="2" align="left">"Yönetici ödeme onayından sonra sayfamız üzerinden vermiş olduğunuz sipariş en kısa sürede hazırlanarak kargoya teslim edilir.</td>
              </tr>
         </table>
      </td>
    </tr>
</table>