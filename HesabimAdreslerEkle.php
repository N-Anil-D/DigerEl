<?php if(isset($_SESSION["Kullanici"])){ 
    
    if(isset($_GET["AdresID"])){
        $UyeAdresid = SadeceSayilar($_GET["AdresID"]);
    }else{
        $UyeAdresid = "";
    }

    $sehir=array(34=>"İstanbul", 6=>"Ankara", 35=>"İzmir", 1=>"Adana", 2=>"Adıyaman", 3=>"Afyon", 4=>"Ağrı", 68=>"Aksaray", 5=>"Amasya", 7=>"Antalya", 75=>"Ardahan", 8=>"Artvin", 9=>"Aydın", 10=>"Balıkesir", 74=>"Bartın", 72=>"Batman", 69=>"Bayburt", 11=>"Bilecik",  12=>"Bingöl", 13=>"Bitlis", 14=>"Bolu", 15=>"Burdur", 16=>"Bursa", 17=>"Çanakkale", 18=>"Çankırı", 19=>"Çorum", 20=>"Denizli", 21=>"Diyarbakır", 81=>"Düzce", 22=>"Edirne", 23=>"Elazığ", 24=>"Erzincan", 25=>"Erzurum", 26=>"Eskişehir", 27=>"Gaziantep",  28=>"Giresun", 29=>"Gümüşhane", 30=>"Hakkari", 31=>"Hatay", 76=>"Iğdır", 32=>"Isparta", 33=>"İçel", 78=>"Karabük", 70=>"Karaman", 36=>"Kars", 37=>"Kastamonu", 38=>"Kayseri", 71=>"Kırıkkale", 39=>"Kırklareli", 40=>"Kırşehir", 79=>"Kilis", 41=>"Kocaeli", 42=>"Konya",  43=>"Kütahya", 44=>"Malatya", 45=>"Manisa", 46=>"Maraş", 47=>"Mardin", 48=>"Muğla", 49=>"Muş", 50=>"Nevşehir", 51=>"Niğde", 52=>"Ordu", 80=>"Osmaniye", 53=>"Rize", 54=>"Sakarya", 55=>"Samsun", 56=>"Siirt", 57=>"Sinop", 58=>"Sivas", 73=>"Şırnak", 59=>"Tekirdağ", 60=>"Tokat", 61=>"Trabzon", 62=>"Tunceli", 63=>"Şanlıurfa", 64=>"Uşak", 65=>"Van", 77=>"Yalova", 66=>"Yozgat",  67=>"Zonguldak");
?>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td width="520" valign="top">
          <form action="AdresEkleF" method="post">
              <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
                  <tr height="50">
                      <td style="color: #FF9900"><h3>Hesabıma Adres Ekle</h3></td>
                  </tr>

                  <tr height="40">
                      <td valign="top" style="border-bottom: 1px dashed #A7A7A7">Adres bilgilerinizi boş alan bırakmadan giriniz</td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">&nbsp;Adrese ait isim soyisim</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="AdresIsimSoyisim" class="InputAlanlari" required></td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">&nbsp;İl</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><select name="AdresIl" class="UrunEkleSelectAlani" required style="width: 100%"><option value=""></option><?php foreach($sehir as $key => $val){ ?><option value="<?php echo $val; ?>"><?php echo $val; ?></option><?php } ?></select></td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">&nbsp;İlçe</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="AdresIlce" class="InputAlanlari" required></td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">&nbsp;Adrese ait telefon Numarası</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="AdresTelefon" class="InputAlanlari" required></td>
                  </tr>
                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">&nbsp;Açık adres</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><input type="text" name="AdresinKendisi" class="InputAlanlari" required></td>
                  </tr>

                  <tr height="80">
                      <td align="center"><input type="submit" value="Adres Ekle" class="YesiButon"></td>
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