<?php 
if(isset($_SESSION["Kullanici"])){
    
    if(isset($_GET["TA"])){
        $GelenTabloAdi = GuvenlikFiltresi($_GET["TA"]);
    }else{
        $GelenTabloAdi = "";
    }

    //--------------------------------------------
    
    $sehir=array(34=>"İstanbul", 6=>"Ankara", 35=>"İzmir", 1=>"Adana", 2=>"Adıyaman", 3=>"Afyon", 4=>"Ağrı", 68=>"Aksaray", 5=>"Amasya", 7=>"Antalya", 75=>"Ardahan", 8=>"Artvin", 9=>"Aydın", 10=>"Balıkesir", 74=>"Bartın", 72=>"Batman", 69=>"Bayburt", 11=>"Bilecik",  12=>"Bingöl", 13=>"Bitlis", 14=>"Bolu", 15=>"Burdur", 16=>"Bursa", 17=>"Çanakkale", 18=>"Çankırı", 19=>"Çorum", 20=>"Denizli", 21=>"Diyarbakır", 81=>"Düzce", 22=>"Edirne", 23=>"Elazığ", 24=>"Erzincan", 25=>"Erzurum", 26=>"Eskişehir", 27=>"Gaziantep",  28=>"Giresun", 29=>"Gümüşhane", 30=>"Hakkari", 31=>"Hatay", 76=>"Iğdır", 32=>"Isparta", 33=>"İçel", 78=>"Karabük", 70=>"Karaman", 36=>"Kars", 37=>"Kastamonu", 38=>"Kayseri", 71=>"Kırıkkale", 39=>"Kırklareli", 40=>"Kırşehir", 79=>"Kilis", 41=>"Kocaeli", 42=>"Konya",  43=>"Kütahya", 44=>"Malatya", 45=>"Manisa", 46=>"Maraş", 47=>"Mardin", 48=>"Muğla", 49=>"Muş", 50=>"Nevşehir", 51=>"Niğde", 52=>"Ordu", 80=>"Osmaniye", 53=>"Rize", 54=>"Sakarya", 55=>"Samsun", 56=>"Siirt", 57=>"Sinop", 58=>"Sivas", 73=>"Şırnak", 59=>"Tekirdağ", 60=>"Tokat", 61=>"Trabzon", 62=>"Tunceli", 63=>"Şanlıurfa", 64=>"Uşak", 65=>"Van", 77=>"Yalova", 66=>"Yozgat",  67=>"Zonguldak");

?>
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
        <form action="UrunEkleF" method="post" enctype="multipart/form-data">
        <table width="1065" height="100%" align="left" border="0" cellpadding="0" cellspacing="0">
            <tr height="50">
                <td style="color: #FF9900"><h3>Ürün Ekle</h3></td>
            </tr>
            
            <tr>
                <td align="center">
                    <table width="1065" height="100%" align="center">
                        <tr>
                            <td width="260">
                                  <table width="260" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                      <tr>
                                          <td align="center"><input class="HesabimButonlari" type="button" onclick="location.href='UrunEkle/Arac';" value="Arac Ekle"></td>
                                      </tr>
                                  </table>
                            </td>
                            <td width="260">
                                  <table width="260" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                      <tr>
                                          <td align="center"><input class="HesabimButonlari" type="button" onclick="location.href='UrunEkle/Konut';" value="Konut Ekle"></td>
                                      </tr>
                                  </table>
                            </td>
                            <td width="260">
                                <table width="260" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                      <tr>
                                          <td align="center"><input class="HesabimButonlari" type="button" onclick="location.href='UrunEkle/Giyim';" value="Giyim Ürünü Ekle"></td>
                                      </tr>
                                  </table>
                            </td>
                            <td width="260">
                                  <table width="260" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                      <tr>
                                          <td align="center"><input class="HesabimButonlari" type="button" onclick="location.href='UrunEkle/Teknoloji';" value="Teknoloji Ürünü Ekle"></td>
                                      </tr>
                                  </table>
                            </td>
                        </tr>
                        <input type="hidden" name="Tablosu" value="<?php echo $GelenTabloAdi; ?>">
                        <tr height="15"><td colspan="4" style="line-height: 15px;">&nbsp;</td></tr>
                        
                                    <?php if($GelenTabloAdi != ""){ ?>
                        <tr>
                            <td width="1025" colspan="4">
                                  <table width="1025" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#ff6666" style="color: white">
                                      <tr>
                                          <td align="center"><b style="font-size: 22px;">Ürün eklemede dikkat edilecekler</b></td>
                                      </tr>
                                      <tr>
                                          <td align="left">&nbsp;1: (*) işaretli kısımlar boş bırakılmamalıdır.</td>
                                      </tr>
                                      <tr>
                                          <td align="left">&nbsp;2: Ürün bilgileri girerken birim<b style="font-size: 11px;">(TL,GB,GHz,KM,Adet)</b> kullanmayınız birimler sistemimiz tarafından eklenecektir.</td>
                                      </tr>
                                      <tr>
                                          <td align="left">&nbsp;3: Fiyat veya ondalığı olan bir değer girerken ayırmak için (.)(nokta) kullanınız (100200300 > doğru) (100 200 300.98 > doğru) (100.200.300.98 > yanlış) (100.200.300 > yanlış) (100,200,300.98 > yanlış). Eğer bu şarta uyulmazsa değeriniz istediğiniz gibi olmayabilir</td>
                                      </tr>
                                      <tr>
                                          <td align="left">&nbsp;4: Adet, yıl veya benzer tam sayı olması gereken değerleri nokta ile ayırmayınız.</td>
                                      </tr>
                                      <tr>
                                          <td align="left">&nbsp;5: Eklediğiniz ürün en az bir resime sahip olmalıdır.Eğer tek resim yüklemek istiyorsanız Resim 1 e yüleyiniz.</td>
                                      </tr>
                                      <tr>
                                          <td align="left">&nbsp;6: <b>Varyant</b> : aynı ürünün farklı rengini girmenizi sağlar böylelikle ürününüzü birden fazla defa yüklemek zorunda kalmazsınız ve müşteri farklı seçenekleri olduğunu görebilir.</td>
                                      </tr>
                                      <tr>
                                          <td align="left">&nbsp;</td>
                                      </tr>
                                  </table>
                            </td>
                        </tr>

                                    <?php } ?>                        
                        
                        
    <tr height="30"><td width="1065" colspan="4">&nbsp;</td></tr>

    <?php // --------------------------------------------------- -----------------Ürün Detayları-----------------Ürün Detayları-----------------Ürün Detayları-----------------Ürün Detayları-----------------Ürün Detayları
    
    if($GelenTabloAdi == "Arac"){
    ?>
                
    <tr>
        <td width="1050" colspan="4">
            <table width="1050" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="UrunAdi" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td><input type="number" title="Sadece Sayı Giriniz" name="UrunAdedi" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Sehir (*)</td>
                    <td width="10">:</td>
                    <td><select name="Sehir" class="UrunEkleSelectAlani" required><option value="">Şehir Seçiniz</option><?php foreach($sehir as $key => $val){ ?><option value="<?php echo $val; ?>"><?php echo $val; ?></option><?php } ?></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Konumu (*)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Konumu" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="UrunFiyati" title="text" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>

                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Kargo Ücreti</td>
                    <td width="10">:</td>
                    <td><input type="number" title="Sadece Sayı Giriniz" name="KargoUcreti" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Kimden (*)</td>
                    <td width="10">:</td>
                    <td><select name="Kimden" class="UrunEkleSelectAlani" required><option value="Sahibinden">Sahibinden</option><option value="Yetkili Bayiden">Yetkili Bayiden</option><option value="Galeriden">Galeriden</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Marka (*)</td>
                    <td width="10">:</td>
                    <td><select name="Marka" class="UrunEkleSelectAlani" required><option value=""></option><option value="Mercedes - Benz">Mercedes - Benz</option><option value="Opel">Opel</option><option value="Volkswagen">Volkswagen</option><option value="Yamaha">Yamaha</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Seri</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Seri" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Model</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Model" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Yıl</td>
                    <td width="10">:</td>
                    <td><input type="number" name="Yil" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Yakit Tipi (*)</td>
                    <td width="10">:</td>
                    <td><select name="YakitTipi" class="UrunEkleSelectAlani" required><option value="Benzin">Benzin</option><option value="Dizel">Dizel</option><option value="LPG">LPG</option><option value="LPG & Benzin">LPG &amp; Benzin</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Vites Tipi</td>
                    <td width="10">:</td>
                    <td><select name="VitesTipi" class="UrunEkleSelectAlani"><option value=""></option><option value="Otomatik">Otomatik</option><option value="Yarı Otomatik">Yarı Otomatik</option><option value="Düz">Düz</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Motor Hacmi (cc)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="MotorHacmi" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Motor Gücü (HP)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="MotorGucu" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;KM (*)</td>
                    <td width="10">:</td>
                    <td><input type="number" name="KM" title="Sadece Sayı Giriniz(Noktalama işareti kullanmayınız.)" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Renk</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Renk" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Takas (*)</td>
                    <td width="10">:</td>
                    <td><select name="Takas" class="UrunEkleSelectAlani"><option value="0">Takas Yapılmaz</option><option value="1">Takas Yapılır</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Boya veya Değişen Parça</td>
                    <td width="10">:</td>
                    <td><select name="DegisenParca" class="UrunEkleSelectAlani"><option value=""></option><option value="Tamamı Orjinal">Tamamı Orjinal</option><option value="1 Parça">1 Parça</option><option value="2 Parça">2 Parça</option><option value="3 Parça">3 Parça</option><option value="4 Parça">4 Parça</option><option value="5 Parça">5 Parça</option><option value="6 Parça">6 Parça</option><option value="7 Parça">7 Parça</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td><textarea name="UrunAciklamasi" class="TextAlanlari"></textarea></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 1 (*)</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiBIR" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiIKI"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiUC"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiDORT"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Varyant</td>
                    <td width="10">:</td>
                    <td>
                        <table>
                            <tr>
                                <td width="160">
                                      <label for="Var0"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">Varyantı Yok</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var0" name="VaryantSayisi" onClick="$.Var0();" value="Var0" checked="checked"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var2"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">2 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var2" name="VaryantSayisi" onClick="$.Var2();" value="Var2"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var3"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">3 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var3" name="VaryantSayisi" onclick="$.Var3();" value="Var3"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                    <label for="Var4"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">4 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var4" name="VaryantSayisi" onclick="$.Var4();" value="Var4"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var5"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">5 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var5" name="VaryantSayisi" onclick="$.Var5();" value="Var5"></td>
                                          </tr>
                                      </table></label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td colspan="3"><table class="Var2" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;Varyant Başlığı</td>
                            <td width="10">:</td>
                            <td width="790" colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value=""></option><option value="Renk">Renk</option></select></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;1. Varyant</td>
                            <td width="10">:</td>
                            <td><input type="text" name="VaryantIcerigi1" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td><input type="number" name="VaryantMiktari1" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;2. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi2" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari2" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var3" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;3. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi3" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari3" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var4" style="display: none;">
                        <tr height="50" class="Var4" style="display: none;">
                            <td width="220">&nbsp;&nbsp;4. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi4" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari4" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var5" style="display: none;">
                        <tr height="50" class="Var5" style="display: none;">
                            <td width="220">&nbsp;&nbsp;5. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi5" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari5" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                <tr height="50">
                    <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Listele" class="YesiButon"></td>
                </tr>
            </table>
        </td>
    </tr>
                
                
    <?php

    }elseif($GelenTabloAdi== "Konut"){
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ?>
    <tr>
        <td width="1050" colspan="4">
            <table width="1050" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="text" name="UrunAdi" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="number" name="UrunAdedi" title="Sadece Sayı Giriniz" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Sehir (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="Sehir" class="UrunEkleSelectAlani" required><option value="">Şehir Seçiniz</option><?php foreach($sehir as $key => $val){ ?><option value="<?php echo $val; ?>"><?php echo $val; ?></option><?php } ?></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Konumu (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="text" name="Konumu" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="text" name="UrunFiyati" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Odaları (*) :</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="Odasayisi" class="UrunEkleSelectAlani" style="width: 400px;" required><option value="">Oda Sayısı</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>+
                    <select name="Salonsayisi" class="UrunEkleSelectAlani" style="width: 400px;" required><option value="">Salon Sayısı</option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Brutm2 (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="number" name="Brutm2" title="Sadece Sayı Giriniz" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Netm2 (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="number" name="Netm2" title="Sadece Sayı Giriniz" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Isınma Tipi (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="IsinmaTipi" class="UrunEkleSelectAlani" required><option value="">Lütfen Seçiniz</option><option value="Merkezi">Merkezi</option><option value="Kombi">Kombi</option><option value="Elektrikli">Elektrikli</option><option value="Klima">Klima</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Mobilyalı Mı  (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="MobilyaliMi" class="UrunEkleSelectAlani" required><option value="1">Mobilyalı</option><option value="0">Mobilyasız</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Balkon (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="Balkon" class="UrunEkleSelectAlani" required><option value="0">Balkonu Yok</option><option value="1">Balkonu Var</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Banyo Sayısı (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="BanyoSayisi" class="UrunEkleSelectAlani" required><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Boyalı Mı</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="BoyaliMi" class="UrunEkleSelectAlani"><option value="9"></option><option value="1">Boyalı</option><option value="0">Boyasız</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Bina Yaşı</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="number" name="BinaYasi" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Kaçıncı Katta</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="number" name="Kat" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Binadaki Toplam Kat Sayısı</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="number" name="BinadakiToplamKat" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;KrediyeUygunMu</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="KrediyeUygunMu" class="UrunEkleSelectAlani"><option value="9"></option><option value="1">Krediye Uygun</option><option value="0">Krediye Uygun Değil</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Şu Anki Kullanım Durumu (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="SuAnkiKullanimDurumu" class="UrunEkleSelectAlani" required><option value="0">Boş</option><option value="1">Kullanımda</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><textarea name="UrunAciklamasi" class="TextAlanlari"></textarea></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 1 (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="file" name="UrunResmiBIR" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="file" name="UrunResmiIKI"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="file" name="UrunResmiUC"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="file" name="UrunResmiDORT"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Varyant</td>
                    <td width="10">:</td>
                    <td>
                        <table>
                            <tr>
                                <td width="160">
                                      <label for="Var0"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">Varyantı Yok</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var0" name="VaryantSayisi" onClick="$.Var0();" value="Var0" checked="checked"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var2"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">2 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var2" name="VaryantSayisi" onClick="$.Var2();" value="Var2"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var3"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">3 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var3" name="VaryantSayisi" onclick="$.Var3();" value="Var3"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                    <label for="Var4"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">4 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var4" name="VaryantSayisi" onclick="$.Var4();" value="Var4"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var5"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">5 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var5" name="VaryantSayisi" onclick="$.Var5();" value="Var5"></td>
                                          </tr>
                                      </table></label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td colspan="3"><table class="Var2" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;Varyant Başlığı</td>
                            <td width="10">:</td>
                            <td width="790" colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value=""></option><option value="Renk">Renk</option></select></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;1. Varyant</td>
                            <td width="10">:</td>
                            <td><input type="text" name="VaryantIcerigi1" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td><input type="number" name="VaryantMiktari1" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;2. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi2" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari2" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var3" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;3. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi3" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari3" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var4" style="display: none;">
                        <tr height="50" class="Var4" style="display: none;">
                            <td width="220">&nbsp;&nbsp;4. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi4" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari4" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var5" style="display: none;">
                        <tr height="50" class="Var5" style="display: none;">
                            <td width="220">&nbsp;&nbsp;5. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi5" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari5" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                <tr height="50">
                    <td colspan="4" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Listele" class="YesilButon"></td>
                </tr>


            </table>
        </td>
    </tr>
    <?php
    }elseif($GelenTabloAdi== "Giyim"){
        
        //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    //------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    ?>
    <tr>
        <td width="1050" colspan="4">
            <table width="1050" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td width="820"><input type="text" name="UrunAdi" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td width="820"><input type="number" name="UrunAdedi" title="Sadece Sayı Giriniz" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Marka (*)</td>
                    <td width="10">:</td>
                    <td width="820"><select name="Marka" class="UrunEkleSelectAlani" required><option value="Diğer">Diğer</option><option value="Adidas">Adidas</option><option value="Bershka">Bershka</option><option value="Coccinelle">Coccinelle</option><option value="Stradivarius">Stradivarius</option><option value="Tasarımcıdan">Tasarımcıdan</option><option value="Zara">Zara</option><option value="Diğer">Diğer</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp; Ürün Durumu (*)</td>
                    <td width="10">:</td>
                    <td width="820"><select name="Kullanilabilirlik" class="UrunEkleSelectAlani" required><option></option><option value="5">Etiketi Üzerinde (Hiç Kullanılmamış)</option><option value="4">Hasarsız / Az Kullanılmış</option><option value="3">Hasarsız / Kullanılmış</option><option value="2">Kullanılmış</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Beden</td>
                    <td width="10">:</td>
                    <td width="820"><input type="text" name="Beden" class="InputAlanlari"></td>
                </tr>

                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Renk (*)</td>
                    <td width="10">:</td>
                    <td width="820"><input type="text" name="Renk" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Desen</td>
                    <td width="10">:</td>
                    <td width="820"><input type="text" name="Desen" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Türü (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="MenuAdi" class="UrunEkleSelectAlani" required><option value="">Türünü Seçiniz</option><option value="Elbise">Elbise</option><option value="Şort">Şort</option><option value="Takı">Takı</option><option value="Yelek">Yelek</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><input type="text" name="UrunFiyati" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td width="820" colspan="2"><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;KargoUcreti</td>
                    <td width="10">:</td>
                    <td width="820"><input type="number" name="KargoUcreti" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td width="820"><textarea name="UrunAciklamasi" class="TextAlanlari"></textarea></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 1 (*)</td>
                    <td width="10">:</td>
                    <td width="820"><input type="file" name="UrunResmiBIR" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td width="820"><input type="file" name="UrunResmiIKI"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td width="820"><input type="file" name="UrunResmiUC"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td width="820"><input type="file" name="UrunResmiDORT"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Varyant Başlığı</td>
                    <td width="10">:</td>
                    <td width="820">
                        <table>
                            <tr>
                                <td width="160">
                                      <label for="Var0"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">Varyantı Yok</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var0" name="VaryantSayisi" onClick="$.Var0();" value="Var0" checked="checked"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var2"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">2 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var2" name="VaryantSayisi" onClick="$.Var2();" value="Var2"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var3"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">3 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var3" name="VaryantSayisi" onclick="$.Var3();" value="Var3"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                    <label for="Var4"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">4 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var4" name="VaryantSayisi" onclick="$.Var4();" value="Var4"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var5"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">5 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var5" name="VaryantSayisi" onclick="$.Var5();" value="Var5"></td>
                                          </tr>
                                      </table></label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td colspan="3"><table class="Var2" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;Varyant Başlığı</td>
                            <td width="10">:</td>
                            <td width="820" colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value=""></option><option value="Renk">Renk</option></select></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;1. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi1" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari1" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;2. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi2" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari2" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var3" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;3. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi3" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari3" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var4" style="display: none;">
                        <tr height="50" class="Var4" style="display: none;">
                            <td width="220">&nbsp;&nbsp;4. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi4" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari4" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var5" style="display: none;">
                        <tr height="50" class="Var5" style="display: none;">
                            <td width="220">&nbsp;&nbsp;5. Varyant</td>
                            <td width="10">:</td>
                            <td width="410"><input type="text" name="VaryantIcerigi5" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td width="410"><input type="number" name="VaryantMiktari5" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>

                <tr height="50">
                    <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Listele" class="YesilButon"></td>
                </tr>
            </table>
        </td>
    </tr>
    <?php 
    }elseif($GelenTabloAdi== "Teknoloji"){
        
    ?>
    <tr>
        <td width="1050" colspan="4">
            <table width="1050" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="UrunAdi" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td><input type="number" name="UrunAdedi" title="Sadece Sayı Giriniz" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunFiyati" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Türü (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="MenuAdi" class="UrunEkleSelectAlani" required><option value="">Türünü Seçiniz</option><option value="Akıllı Telefon">Akıllı Telefon</option><option value="Tuşlu Telefon">Tuşlu Telefon</option><option value="DizÜstü Bilgisayar">Dizüstü Bilgisayar</option><option value="Masaüstü Bilgisayar">Masaüstü Bilgisayar</option><option value="Tablet">Tablet</option><option value="">Türünü Seçiniz</option><option value="Ekran Kartı">Ekran Kartı</option><option value="Hafıza">Hafıza</option><option value="İşlemci">İşlemci</option><option value="Soğutucu">Soğutucu</option><option value="HDD">HDD</option><option value="SSD">SSD</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Sehir (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Sehir" class="UrunEkleSelectAlani" required><option value="">Şehir Seçiniz</option><?php foreach($sehir as $key => $val){ ?><option value="<?php echo $val; ?>"><?php echo $val; ?></option><?php } ?></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Konumu (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Konumu" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Kimden (*)</td>
                    <td width="10">:</td>
                    <td><select name="Kimden" class="UrunEkleSelectAlani" required><option value="Sahibinden">Sahibinden</option><option value="Mağazadan">Mağazadan</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Marka (*)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Marka" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Model (*)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Model" class="InputAlanlari" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Serisi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="UrunSerisi" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;İşletim Sistemi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="isletimSistemi" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;RAM</td>
                    <td width="10">:</td>
                    <td><select name="RAM" class="UrunEkleSelectAlani"><option value=""></option><option value="1&lsaquo; GB">1&lsaquo; GB RAM</option><option value="1 GB">1 GB RAM</option><option value="2 GB">2 GB RAM</option><option value="3 GB">3 GB RAM</option><option value="4 GB">4 GB RAM</option><option value="5 GB">5 GB RAM</option><option value="6 GB">6 GB RAM</option><option value="7 GB">7 GB RAM</option><option value="8 GB">8 GB RAM</option><option value="12 GB">12 GB RAM</option><option value="16 GB">16 GB RAM</option><option value="24 GB">24 GB RAM</option><option value="32 GB">32 GB RAM</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ekran Boyutu</td>
                    <td width="10">:</td>
                    <td><input type="text" name="EkranBoyutu" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Çözünürlülük</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Cozunurluluk" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;CPU Modeli</td>
                    <td width="10">:</td>
                    <td><input type="text" name="CPU" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;CPU Hızı (GHz)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="CPUhizi" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;GPU (Marka ve Model)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="GPU" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;DiskTuru</td>
                    <td width="10">:</td>
                    <td><select name="DiskTuru" class="UrunEkleSelectAlani"><option value=""></option><option value="SSD">SSD</option><option value="HDD">HDD</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Disk Boyutu</td>
                    <td width="10">:</td>
                    <td><input type="number" name="DiskBoyutu" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Renk</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Renk" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;OnKamera (MP)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="OnKamera" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;ArkaKamera (MP)</td>
                    <td width="10">:</td>
                    <td><input type="text" name="ArkaKamera" title="Sadece Sayı Giriniz" class="InputAlanlari"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Kargo Ücreti</td>
                    <td width="10">:</td>
                    <td><input type="number" name="KargoUcreti" class="InputAlanlari" title="Sadece Sayı Giriniz"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Sıfır Mı?</td>
                    <td width="10">:</td>
                    <td><select name="SifirMi" class="UrunEkleSelectAlani"><option value="9"></option><option value="0">Hayır</option><option value="1">Evet</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Tamir Gördü Mü?</td>
                    <td width="10">:</td>
                    <td><select name="TamirGorduMu" class="UrunEkleSelectAlani"><option value="9"></option><option value="0">Hayır</option><option value="1">Evet</option></select></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td><textarea name="UrunAciklamasi" class="TextAlanlari"></textarea></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 1 (*)</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiBIR" required></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiIKI"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiUC"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td><input type="file" name="UrunResmiDORT"></td>
                </tr>
                <tr height="50">
                    <td width="220">&nbsp;&nbsp;&nbsp;Varyant</td>
                    <td width="10">:</td>
                    <td>
                        <table>
                            <tr>
                                <td width="160">
                                      <label for="Var0"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">Varyantı Yok</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var0" name="VaryantSayisi" onClick="$.Var0();" value="Var0" checked="checked"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var2"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">2 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var2" name="VaryantSayisi" onClick="$.Var2();" value="Var2"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var3"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">3 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var3" name="VaryantSayisi" onclick="$.Var3();" value="Var3"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                    <label for="Var4"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">4 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var4" name="VaryantSayisi" onclick="$.Var4();" value="Var4"></td>
                                          </tr>
                                      </table></label>
                                </td>
                                <td width="160">
                                      <label for="Var5"><table width="160" height="40" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                                          <tr>
                                              <td align="center">5 Farklı Varyant Ekle</td>
                                          </tr>
                                          <tr>
                                              <td align="center"><input type="radio" id="Var5" name="VaryantSayisi" onclick="$.Var5();" value="Var5"></td>
                                          </tr>
                                      </table></label>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr><td colspan="3"><table class="Var2" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;Varyant Başlığı</td>
                            <td width="10">:</td>
                            <td colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value=""></option><option value="Renk">Renk</option></select></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;1. Varyant</td>
                            <td width="10">:</td>
                            <td><input type="text" name="VaryantIcerigi1" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td><input type="number" name="VaryantMiktari1" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;2. Varyant</td>
                            <td width="10">:</td>
                            <td><input type="text" name="VaryantIcerigi2" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td><input type="number" name="VaryantMiktari2" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var3" style="display: none;">
                        <tr height="50">
                            <td width="220">&nbsp;&nbsp;3. Varyant</td>
                            <td width="10">:</td>
                            <td><input type="text" name="VaryantIcerigi3" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td><input type="number" name="VaryantMiktari3" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var4" style="display: none;">
                        <tr height="50" class="Var4" style="display: none;">
                            <td width="220">&nbsp;&nbsp;4. Varyant</td>
                            <td width="10">:</td>
                            <td><input type="text" name="VaryantIcerigi4" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td><input type="number" name="VaryantMiktari4" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>
                
                <tr><td colspan="3"><table class="Var5" style="display: none;">
                        <tr height="50" class="Var5" style="display: none;">
                            <td width="220">&nbsp;&nbsp;5. Varyant</td>
                            <td width="10">:</td>
                            <td><input type="text" name="VaryantIcerigi5" class="InputAlanlari" placeholder="Varyant Adı"></td>
                            <td><input type="number" name="VaryantMiktari5" class="InputAlanlari" placeholder="Varyant Adedi"></td>
                        </tr>
                </table></td></tr>

                <tr height="50">
                    <td colspan="3" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Listele" class="YesilButon"></td>
                </tr>
            </table>
        </td>
    </tr>
<?php } ?>                
                    </table>
                </td>
            </tr>
      </td>
    </tr>
</table>
</form>
<?php    
}else{
    header("Location:AnaSayfa");
    exit();
}
?>