<?php 
if(isset($_SESSION["Kullanici"])){
    
    
$SepeteEklenenUrunler = $DataBaseConnection->query("SELECT * FROM sepet WHERE UyeID = '$Uyeid' ORDER BY id DESC");
$SepetVarMi           = $SepeteEklenenUrunler->num_rows;
if($SepetVarMi>0){
    $SepettekiToplamUrun = 0;
    $SepettekiToplamFiyat = 0;
    $KargoFiyatiHesapla = 0;
    while($SepetiYaz = $SepeteEklenenUrunler->fetch_assoc()){
        $SepettekiUrunTabloAdi        = GeriDöndür($SepetiYaz["TabloAdi"]);
        $SepettekiUrunUrunID          = GeriDöndür($SepetiYaz["UrunID"]);
        $SepettekiUrunUrunAdedi       = GeriDöndür($SepetiYaz["UrunAdedi"]);
        $SepettekiUrunVaryantSecimi   = GeriDöndür($SepetiYaz["VaryantSecimi"]);
        $SepettekiUrunSepetNumarasi   = GeriDöndür($SepetiYaz["SepetNumarasi"]);


        $UruneBaglan  = $DataBaseConnection->query("SELECT * FROM $SepettekiUrunTabloAdi WHERE id = $SepettekiUrunUrunID LIMIT 1 ");
        $UrunVarMi    = $UruneBaglan->num_rows;
        $UrunTablosundakiUrunDegerleri = $UruneBaglan->fetch_assoc();
        $UrunFiyati          = GeriDöndür($UrunTablosundakiUrunDegerleri["UrunFiyati"]);
        $UrunParaBirimi      = GeriDöndür($UrunTablosundakiUrunDegerleri["ParaBirimi"]);
        $UrunVaryantBasligi  = GeriDöndür($UrunTablosundakiUrunDegerleri["VaryantBasligi"]);
        $UrunKargoUcreti     = GeriDöndür($UrunTablosundakiUrunDegerleri["KargoUcreti"]);                            

        $VaryantaBaglan = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = '$SepettekiUrunVaryantSecimi' LIMIT 1 ");
        $VaryantVarMi   = $VaryantaBaglan->num_rows;
        $VaryantTablosundakiUrunDegerleri = $VaryantaBaglan->fetch_assoc();
        @$VaryantAdi       = GeriDöndür($VaryantTablosundakiUrunDegerleri["VaryanAdi"]);
        @$VaryantStokAdedi = GeriDöndür($VaryantTablosundakiUrunDegerleri["StokAdedi"]);

        $SepettekiToplamUrun  += $SepettekiUrunUrunAdedi;

        // ------------------------------------------------------ KUR HESAPLA ------------------------------------------------------
        if($UrunParaBirimi=="USD"){
            $UrunFiyatiHesapla = $UrunFiyati * $DolarKuru;
        }elseif($UrunParaBirimi=="EUR"){
            $UrunFiyatiHesapla = $UrunFiyati * $EuroKuru;
        }else{
            $UrunFiyatiHesapla = $UrunFiyati;
            }
        // ------------------------------------------------------ KUR HESAPLA ------------------------------------------------------

        // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA
        $CokluUrunFiyatiHesapla = ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);

        if($SepettekiUrunUrunAdedi>1){
            $SepettekiToplamFiyat += ($UrunFiyatiHesapla * $SepettekiUrunUrunAdedi);
        }else{
            $SepettekiToplamFiyat += $UrunFiyatiHesapla; 
        }
        // ----------------------------------------------------------------TOPLAM URUN FİYATI HESAPLA

        // -------------------------------- TOPLAM KARGO FİYATI HESAPLA -------------------------------- TOPLAM KARGO FİYATI HESAPLA --------------------------------
        $KargoFiyatiHesapla += ($UrunKargoUcreti * $SepettekiUrunUrunAdedi);
        //$ToplamKargoFiyati      = FiyatBicimlendir($CokluUrunFiyatiHesapla);
        // --------------------------------TOPLAM KARGO FİYATI HESAPLA

    }//while kapatması    
}else{ 
  header("Location:Sepetim");
  exit();
}
    
$clientId		=	GeriDöndür($ClientID);	//	Bankadan Sanal Pos Onaylanınca Bankanın Verdiği İşyeri Numarası
$amount			=	$SepettekiToplamFiyat;	//	Sepet Ücreti yada İşlem Tutarı yada Karttan Çekilecek Tutar
$oid			=	$SepettekiUrunSepetNumarasi;	//	Sipariş Numarası (Tekrarlanmayan Bir Değer) (Örneğin Sepet Tablosundaki IDyi Kullanabilirsiniz) (Her İşlemde Değişmeli ve Asla Tekrarlanmamalı)
$okUrl			=	"http://localhost/NADproje/KrediKartiFBasarili";	//	Ödeme İşlemi Başarıyla Gerçekleşir ise Dönülecek Sayfa
$failUrl		=	"http://localhost/NADproje/KrediKartiFBasarisiz";	//	Ödeme İşlemi Red Olur ise Dönülecek Sayfa
$rnd			=	@microtime();
$storekey		=	GeriDöndür($StoreKey);	// Sanal Pos Onaylandığında Bankanın Size Verdiği Sanal Pos Ekranına Girerek Oluşturulacak Olan İş Yeri Anahtarı
$storetype		=	"3d";	    //	3D Modeli
$hashstr		=	$clientId.$oid.$amount.$okUrl.$failUrl.$rnd.$storekey;	// Bankanın Kendi Ayarladığı Hash Parametresi
$hash			=	@base64_encode(@pack('H*',@sha1($hashstr)));	// Bankanın Kendi Ayarladığı Hash Şifreleme Parametresi
$description	=	"Satış Açıklaması";	//	Extra Bir Açıklama Yazmak İsterseniz Çekim İle İlgili Buraya Yazıyoruz
$xid			=	"";		    //	20 bytelik, 28 Karakterli base64 Olarak Boş Bırılınca Sistem Tarafindan Ototmatik Üretilir. Lütfen Boş Bırakın
$lang			=	"";		    //	Çekim Gösterim Dili Default Türkçedir. Ayarlamak İsterseniz Türkçe (tr), İngilizce (en) Girilmelidir. Boş Bırakılırsa (tr) Kabu Edilmiş Olur.
$email			=	"";	//	İsterseniz Çekimi Yapan Kullanıcınızın E-Mail Adresini Gönderebilirsiniz
$userid			=	"";	//	İsterseniz Çekimi Yapan Kullanıcınızın Idsini Gönderebilirsiniz
?>

    
<!-- <form method="post" action="https://<sunucu_adresi>/<3dgate_path>"> --> <!-- Bu Adres Banka veya EST Firması Tarafından Verilir -->
<form method="post" action="KrediKartiFBasarili"> <!-- Bu Adres Banka veya EST Firması Tarafından Verilir -->
    
    <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr>
          <td width="820" valign="top">
            <table width="820" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="50" bgcolor="#F9F9F9">
                  <td style="color: #FF9900" align="left"><h3>Kredi kartı ile ödeme</h3></td><!-- *********************************************** Ödeme Yöntemi Seçimi *********************************************** -->
              </tr>
              <tr height="20">
                  <td>&nbsp;</td>
              </tr>
	<input type="hidden" name="clientid" value="<?=$clientId?>" />
	<input type="hidden" name="amount" value="<?=$amount?>" />
	<input type="hidden" name="oid" value="<?=$oid?>" />
	<input type="hidden" name="okUrl" value="<?=$okUrl?>" />
	<input type="hidden" name="failUrl" value="<?=$failUrl?>" />
	<input type="hidden" name="rnd" value="<?=$rnd?>" />
	<input type="hidden" name="hash" value="<?=$hash?>" />
	<input type="hidden" name="storetype" value="3d" />	
	<input type="hidden" name="lang" value="tr" />
    
    <table width="820" align="center" border="0" cellpadding="0" cellspacing="0">
        <tr bgcolor="#000000" height="50"><td colspan="2" align="center">Bu sayfa sanal pos'a yönlendirilmediği için bir bilgi girmek veya seçmek zorunda değilsiniz</td></tr>
        <tr>
            <td width="140">Kredi Kart Numarası</td>
            <td width="198"><input type="text" name="pan" size="20" class="InputAlanlariTEKLI" />
        </tr>
        <tr height="50">
            <td>Son Kullanma Tarihi</td>
            <td><select name="Ecom_Payment_Card_ExpDate_Month" class="SelectAlani" style="width: 25%;">
            <option value=""></option>
            <option value="01">01</option>
            <option value="02">02</option>
            <option value="03">03</option>
            <option value="04">04</option>
            <option value="05">05</option>
            <option value="06">06</option>
            <option value="07">07</option>
            <option value="08">08</option>
            <option value="09">09</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            </select> / <select name="Ecom_Payment_Card_ExpDate_Year" class="SelectAlani" style="width: 25%;">
            <option value=""></option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
            <option value="2023">2023</option>
            <option value="2024">2024</option>
            <option value="2025">2025</option>
            <option value="2026">2026</option>
            <option value="2027">2027</option>
            <option value="2028">2028</option>
            <option value="2029">2029</option>
            <option value="2030">2030</option>
            <option value="2031">2031</option>
            </select></td>
        </tr>
        <tr height="30">
            <td>Kart Türü</td>
            <td><input id="KartTipi1" type="radio" value="1" name="cardType"><label for="KartTipi1"> Visa </label> <input id="KartTipi2" type="radio" value="2" name="cardType"><label for="KartTipi2"> MasterCard </label></td>
        </tr>
        <tr height="50">
            <td>Güvenlik Kodu</td>
        	<td><input type="text" name="cv2" size="4" value="" /></td>
        </tr>
        <tr>
            <td align="center">&nbsp;</td>
            <td align="left"><input type="submit" value="Ödeme Yap" class="YesiButon" /></td>
        </tr>
    </table>
</form>
      
      </td>
      <td width="25"><?php echo ""; ?></td>
      <td width="220" valign="top">
          <table width="220" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="40">
                  <td style="color: #FF9900" align="right"><h3>Sipariş Özeti</h3></td>
              </tr>
              
              <tr height="30">
                  <td align="right">Toplam <b style="color: red; font-size:16px;"><?php echo $SepettekiToplamUrun; ?></b> adet ürün var</td>
              </tr>
              <tr height="20">
                  <td><?php echo ""; ?></td>
              </tr>
              <tr>
                  <td align="right">Toplam Ücret</td>
              </tr>
              <tr>
                  <td height="60" align="right"><b style="color: #9639FF; font-size:20px;"><?php echo FiyatBicimlendir($SepettekiToplamFiyat); ?> TL</b>&nbsp;&nbsp;</td>
              </tr>
              <?php if($SepettekiToplamFiyat>=100){$KargoFiyatiHesapla = 0 ;} ?>
              <tr>
                  <td align="right">Toplam Kargo Ücreti</td>
              </tr>
              <tr>
                  <td height="60" align="right"><b style="color: #9639FF; font-size:20px;"><?php echo FiyatBicimlendir($KargoFiyatiHesapla); ?> TL</b>&nbsp;&nbsp;</td>
              </tr>
              
              <tr>
                  <td align="right">Ödenecek Toplam Tutar</td>
              </tr>
              <tr>
                  <td height="60" align="right"><b style="color: #9639FF; font-size:20px; text-decoration: underline;"><?php echo FiyatBicimlendir($KargoFiyatiHesapla + $SepettekiToplamFiyat); ?> TL</b>&nbsp;&nbsp;</td>
              </tr>
         </table>
      </td>
    </tr>
</table></form>    
<?php

}else{//kullanıcı girişi yoksa
  header("Location:AnaSayfa");
  exit();
}
?>