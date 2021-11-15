<?php 
if(isset($_SESSION["Yonetici"])){
      
    if(isset($_GET["UrunID"])){
        $UrunID = SadeceSayilar($_GET["UrunID"]);
    }else{
        $UrunID = "";
    }
    //--------------------------------------------
    if(isset($_GET["TA"])){
        $UrunTablosu = GuvenlikFiltresi($_GET["TA"]);
    }else{
        $UrunTablosu = "";
    }
    //--------------------------------------------
    $sehir=array(34=>"İstanbul", 6=>"Ankara", 35=>"İzmir", 1=>"Adana", 2=>"Adıyaman", 3=>"Afyon", 4=>"Ağrı", 68=>"Aksaray", 5=>"Amasya", 7=>"Antalya", 75=>"Ardahan", 8=>"Artvin", 9=>"Aydın", 10=>"Balıkesir", 74=>"Bartın", 72=>"Batman", 69=>"Bayburt", 11=>"Bilecik",  12=>"Bingöl", 13=>"Bitlis", 14=>"Bolu", 15=>"Burdur", 16=>"Bursa", 17=>"Çanakkale", 18=>"Çankırı", 19=>"Çorum", 20=>"Denizli", 21=>"Diyarbakır", 81=>"Düzce", 22=>"Edirne", 23=>"Elazığ", 24=>"Erzincan", 25=>"Erzurum", 26=>"Eskişehir", 27=>"Gaziantep",  28=>"Giresun", 29=>"Gümüşhane", 30=>"Hakkari", 31=>"Hatay", 76=>"Iğdır", 32=>"Isparta", 33=>"İçel", 78=>"Karabük", 70=>"Karaman", 36=>"Kars", 37=>"Kastamonu", 38=>"Kayseri", 71=>"Kırıkkale", 39=>"Kırklareli", 40=>"Kırşehir", 79=>"Kilis", 41=>"Kocaeli", 42=>"Konya",  43=>"Kütahya", 44=>"Malatya", 45=>"Manisa", 46=>"Maraş", 47=>"Mardin", 48=>"Muğla", 49=>"Muş", 50=>"Nevşehir", 51=>"Niğde", 52=>"Ordu", 80=>"Osmaniye", 53=>"Rize", 54=>"Sakarya", 55=>"Samsun", 56=>"Siirt", 57=>"Sinop", 58=>"Sivas", 73=>"Şırnak", 59=>"Tekirdağ", 60=>"Tokat", 61=>"Trabzon", 62=>"Tunceli", 63=>"Şanlıurfa", 64=>"Uşak", 65=>"Van", 77=>"Yalova", 66=>"Yozgat",  67=>"Zonguldak");
    
    function Sehir($adres){
        $Desen		=	"/\//";
        $Sonuc		=	preg_split($Desen, $adres);
        return $Sonuc[0];
    } 
    function KalanAdres($adres){
        $Desen		=	"/\//";
        $Sonuc		=	preg_split($Desen, $adres);
        $HarfSayisi =   mb_strlen($Sonuc[0], "UTF-8");
        $Kalan      =   substr($adres,$HarfSayisi+2);
        return $Kalan;
    } 
    
    if(($UrunTablosu != "") and ($UrunID != "")){

        $KayitCek = $DataBaseConnection->query("SELECT * FROM $UrunTablosu WHERE id = $UrunID LIMIT 1");

        if($UrunTablosu == "arac"){
            while($KayitlariYaz = $KayitCek->fetch_assoc()){
                $UrunId             = GeriDöndür($KayitlariYaz["id"]);
                $UrunAdi            = GeriDöndür($KayitlariYaz["UrunAdi"]);
                $UrunAdedi          = GeriDöndür($KayitlariYaz["UrunAdedi"]);
                $UrunKonumu         = GeriDöndür($KayitlariYaz["Konumu"]);
                $UrunKargoUcreti    = GeriDöndür($KayitlariYaz["KargoUcreti"]);
                $UrunFiyati         = GeriDöndür($KayitlariYaz["UrunFiyati"]);   
                $UrunParaBirimi     = GeriDöndür($KayitlariYaz["ParaBirimi"]);
                $UrunKimden         = GeriDöndür($KayitlariYaz["Kimden"]);
                $UrunMarka          = GeriDöndür($KayitlariYaz["Marka"]);             
                $UrunSeri           = GeriDöndür($KayitlariYaz["Seri"]);
                $UrunModel          = GeriDöndür($KayitlariYaz["Model"]);   
                $UrunYil            = GeriDöndür($KayitlariYaz["Yil"]);
                $UrunYakitTipi      = GeriDöndür($KayitlariYaz["YakitTipi"]);
                $UrunVitesTipi      = GeriDöndür($KayitlariYaz["VitesTipi"]);  
                $UrunMotorHacmi     = GeriDöndür($KayitlariYaz["MotorHacmi"]);   
                $UrunMotorGucu      = GeriDöndür($KayitlariYaz["MotorGucu"]); 
                $UrunKM             = GeriDöndür($KayitlariYaz["KM"]);
                $UrunRenk           = GeriDöndür($KayitlariYaz["Renk"]);
                $UrunTakas          = GeriDöndür($KayitlariYaz["Takas"]);
                $UrunBoyaDegisen    = GeriDöndür($KayitlariYaz["BoyaDegisen"]);
                $UrunAciklamasi     = GeriDöndür($KayitlariYaz["UrunAciklamasi"]);
                $UrunResmiBIR       = GeriDöndür($KayitlariYaz["UrunResmiBIR"]);
                $UrunResmiIKI       = GeriDöndür($KayitlariYaz["UrunResmiIKI"]);
                $UrunResmiUC        = GeriDöndür($KayitlariYaz["UrunResmiUC"]);
                $UrunResmiDORT      = GeriDöndür($KayitlariYaz["UrunResmiDORT"]);
                $UrunVaryantBasligi = GeriDöndür($KayitlariYaz["VaryantBasligi"]);
                $UrunMenuAdi        = GeriDöndür($KayitlariYaz["MenuAdi"]);
            }

        }elseif($UrunTablosu == "konut"){
            function SalonVeOda($degisken){
                $Desen		=	"/-/";
                $Sonuc		=	preg_split($Desen, $degisken);
                 return $Sonuc;
            } 
            while($KayitlariYaz = $KayitCek->fetch_assoc()){
                $UrunId             = GeriDöndür($KayitlariYaz["id"]);
                $UrunAdi            = GeriDöndür($KayitlariYaz["UrunAdi"]);
                $UrunAdedi          = GeriDöndür($KayitlariYaz["UrunAdedi"]);
                $UrunKonumu         = GeriDöndür($KayitlariYaz["Konumu"]);
                $UrunFiyati         = GeriDöndür($KayitlariYaz["UrunFiyati"]);   
                $UrunParaBirimi     = GeriDöndür($KayitlariYaz["ParaBirimi"]);
                $Urunodasayisi      = GeriDöndür($KayitlariYaz["odasayisi"]);
                $UrunBrutm2         = GeriDöndür($KayitlariYaz["Brutm2"]);
                $UrunNetm2          = GeriDöndür($KayitlariYaz["Netm2"]);
                $UrunisinmaTipi     = GeriDöndür($KayitlariYaz["isinmaTipi"]);
                $UrunMobilyaliMi    = GeriDöndür($KayitlariYaz["MobilyaliMi"]);
                $UrunBalkon         = GeriDöndür($KayitlariYaz["Balkon"]);
                $UrunBanyoSayisi    = GeriDöndür($KayitlariYaz["BanyoSayisi"]);
                $UrunBoyaliMi       = GeriDöndür($KayitlariYaz["BoyaliMi"]);
                $UrunBinaYasi       = GeriDöndür($KayitlariYaz["BinaYasi"]);
                $UrunKat            = GeriDöndür($KayitlariYaz["Kat"]);
                $UrunToplamKat      = GeriDöndür($KayitlariYaz["BinadakiToplamKat"]);
                $UrunKrediyeUygunMu = GeriDöndür($KayitlariYaz["KrediyeUygunMu"]);
                $UrunKullanimDurumu = GeriDöndür($KayitlariYaz["SuAnkiKullanimDurumu"]);  
                $UrunAciklamasi     = GeriDöndür($KayitlariYaz["UrunAciklamasi"]);
                $UrunResmiBIR       = GeriDöndür($KayitlariYaz["UrunResmiBIR"]);
                $UrunResmiIKI       = GeriDöndür($KayitlariYaz["UrunResmiIKI"]);
                $UrunResmiUC        = GeriDöndür($KayitlariYaz["UrunResmiUC"]);
                $UrunResmiDORT      = GeriDöndür($KayitlariYaz["UrunResmiDORT"]);
                $UrunVaryantBasligi = GeriDöndür($KayitlariYaz["VaryantBasligi"]);
                $UrunMenuAdi        = GeriDöndür($KayitlariYaz["MenuAdi"]);
                $UrunVaryantBasligi = GeriDöndür($KayitlariYaz["VaryantBasligi"]);
            }

        }elseif($UrunTablosu == "giyim"){
            while($KayitlariYaz = $KayitCek->fetch_assoc()){
                $UrunId                 = GeriDöndür($KayitlariYaz["id"]);
                $UrunAdi                = GeriDöndür($KayitlariYaz["UrunAdi"]);
                $UrunAdedi              = GeriDöndür($KayitlariYaz["UrunAdedi"]);
                $UrunKargoUcreti        = GeriDöndür($KayitlariYaz["KargoUcreti"]);
                $UrunFiyati             = GeriDöndür($KayitlariYaz["UrunFiyati"]);
                $UrunParaBirimi         = GeriDöndür($KayitlariYaz["ParaBirimi"]);
                $UrunMarka              = GeriDöndür($KayitlariYaz["Marka"]);
                $UrunKullanilabilirlik  = GeriDöndür($KayitlariYaz["Kullanilabilirlik"]);
                $UrunBeden              = GeriDöndür($KayitlariYaz["Beden"]);
                $UrunRenk               = GeriDöndür($KayitlariYaz["Renk"]);
                $UrunDesen              = GeriDöndür($KayitlariYaz["Desen"]);
                $UrunAciklamasi         = GeriDöndür($KayitlariYaz["UrunAciklamasi"]);
                $UrunResmiBIR           = GeriDöndür($KayitlariYaz["UrunResmiBIR"]);
                $UrunResmiIKI           = GeriDöndür($KayitlariYaz["UrunResmiIKI"]);
                $UrunResmiUC            = GeriDöndür($KayitlariYaz["UrunResmiUC"]);
                $UrunResmiDORT          = GeriDöndür($KayitlariYaz["UrunResmiDORT"]);
                $UrunVaryantBasligi     = GeriDöndür($KayitlariYaz["VaryantBasligi"]);
                $UrunMenuAdi            = GeriDöndür($KayitlariYaz["MenuAdi"]);
                $UrunVaryantBasligi     = GeriDöndür($KayitlariYaz["VaryantBasligi"]);
            }
            
        }elseif($UrunTablosu == "teknoloji"){
            while($KayitlariYaz = $KayitCek->fetch_assoc()){
                $UrunId             = GeriDöndür($KayitlariYaz["id"]);
                $UrunAdi            = GeriDöndür($KayitlariYaz["UrunAdi"]);
                $UrunAdedi          = GeriDöndür($KayitlariYaz["UrunAdedi"]);
                $UrunKonumu         = GeriDöndür($KayitlariYaz["Konumu"]);
                $UrunKargoUcreti    = GeriDöndür($KayitlariYaz["KargoUcreti"]);
                $UrunFiyati         = GeriDöndür($KayitlariYaz["UrunFiyati"]);   
                $UrunParaBirimi     = GeriDöndür($KayitlariYaz["ParaBirimi"]);
                $UrunMarka          = GeriDöndür($KayitlariYaz["Marka"]);
                $UrunModel          = GeriDöndür($KayitlariYaz["Model"]);
                $UrunSerisi         = GeriDöndür($KayitlariYaz["UrunSerisi"]);
                $UrunisletimSistemi = GeriDöndür($KayitlariYaz["isletimSistemi"]);
                $UrunRAM            = GeriDöndür($KayitlariYaz["RAM"]);
                $UrunEkranBoyutu    = GeriDöndür($KayitlariYaz["EkranBoyutu"]);
                $UrunCozunurluluk   = GeriDöndür($KayitlariYaz["Cozunurluluk"]);
                $UrunCPU            = GeriDöndür($KayitlariYaz["CPU"]);
                $UrunCPUhizi        = GeriDöndür($KayitlariYaz["CPUhizi"]);
                $UrunGPU            = GeriDöndür($KayitlariYaz["GPU"]);
                $UrunDiskTuru       = GeriDöndür($KayitlariYaz["DiskTuru"]);
                $UrunDiskBoyutu     = GeriDöndür($KayitlariYaz["DiskBoyutu"]);
                $UrunRenk           = GeriDöndür($KayitlariYaz["Renk"]);
                $UrunOnKamera       = GeriDöndür($KayitlariYaz["OnKamera"]);
                $UrunArkaKamera     = GeriDöndür($KayitlariYaz["ArkaKamera"]);
                $UrunKimden         = GeriDöndür($KayitlariYaz["Kimden"]);
                $UrunSifirMi        = GeriDöndür($KayitlariYaz["SifirMi"]);
                $UrunTamirGorduMu   = GeriDöndür($KayitlariYaz["TamirGorduMu"]);
                $UrunAciklamasi     = GeriDöndür($KayitlariYaz["UrunAciklamasi"]);
                $UrunResmiBIR       = GeriDöndür($KayitlariYaz["UrunResmiBIR"]);
                $UrunResmiIKI       = GeriDöndür($KayitlariYaz["UrunResmiIKI"]);
                $UrunResmiUC        = GeriDöndür($KayitlariYaz["UrunResmiUC"]);
                $UrunResmiDORT      = GeriDöndür($KayitlariYaz["UrunResmiDORT"]);
                $UrunVaryantBasligi = GeriDöndür($KayitlariYaz["VaryantBasligi"]);
                $UrunMenuAdi        = GeriDöndür($KayitlariYaz["MenuAdi"]);
            }
        }else{
            header("Location:index.php?SKI=89");
            exit();
        }    
    
    if($KayitCek->num_rows){
    ?>
<form action="index.php?SKD=0&SKI=88" method="post" enctype="multipart/form-data">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>ÜRÜN GÜNCELLE</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="20">
        <td>&nbsp;</td>
    </tr>
    <?php
        if($UrunTablosu == "arac"){ ?>
    <tr>
        <td width="1500">
            <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunAdi" class="InputAlanlari" value="<?php echo $UrunAdi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" title="Sadece Sayı Giriniz" name="UrunAdedi" class="InputAlanlari" value="<?php echo $UrunAdedi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Sehir (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Sehir" class="UrunEkleSelectAlani"  required><option value="<?php echo Sehir($UrunKonumu); ?>"><?php echo Sehir($UrunKonumu); ?></option><?php foreach($sehir as $key => $val){ ?><option value="<?php echo $val; ?>"><?php echo $val; ?></option><?php } ?></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Konumu (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Konumu" class="InputAlanlari" value="<?php echo KalanAdres($UrunKonumu); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunFiyati" class="InputAlanlari" value="<?php echo FiyatGuncelle($UrunFiyati); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunParaBirimi; ?>"><?php echo $UrunParaBirimi; ?></option><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Kargo Ücreti</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" title="Sadece Sayı Giriniz" name="KargoUcreti" class="InputAlanlari" value="<?php echo $UrunKargoUcreti; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Kimden (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Kimden" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunKimden; ?>"><?php echo $UrunKimden; ?></option><option value="Sahibinden">Sahibinden</option><option value="Yetkili Bayiden">Yetkili Bayiden</option><option value="Galeriden">Galeriden</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Marka (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Marka" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunMarka; ?>"><?php echo $UrunMarka; ?></option><option value="Mercedes - Benz">Mercedes - Benz</option><option value="Opel">Opel</option><option value="Volkswagen">Volkswagen</option><option value="Yamaha">Yamaha</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Seri</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Seri" class="InputAlanlari" value="<?php echo $UrunSeri; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Model</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Model" class="InputAlanlari" value="<?php echo $UrunModel; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Yıl</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="Yil" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunYil; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Yakit Tipi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="YakitTipi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunYakitTipi; ?>"><?php echo $UrunYakitTipi; ?></option><option value="Benzin">Benzin</option><option value="Dizel">Dizel</option><option value="LPG">LPG</option><option value="LPG & Benzin">LPG &amp; Benzin</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Vites Tipi</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="VitesTipi" class="UrunEkleSelectAlani"><option value="<?php echo $UrunVitesTipi; ?>"><?php echo $UrunVitesTipi; ?></option><option value="Otomatik">Otomatik</option><option value="Yarı Otomatik">Yarı Otomatik</option><option value="Düz">Düz</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Motor Hacmi (cc)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="MotorHacmi" class="InputAlanlari" value="<?php echo $UrunMotorHacmi; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Motor Gücü (HP)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="MotorGucu" class="InputAlanlari" value="<?php echo $UrunMotorGucu; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;KM</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="KM" title="Sadece Sayı Giriniz(Noktalama işareti kullanmayınız.)" class="InputAlanlari" value="<?php echo SadeceSayilariTut($UrunKM); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Renk</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Renk" class="InputAlanlari" value="<?php echo $UrunRenk; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Takas (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Takas" class="UrunEkleSelectAlani"><option value="<?php echo $UrunTakas; ?>"><?php if($UrunTakas){$takas = "Takas Yapılır";}else{$takas = "Takas Yapılmaz";} echo $takas; ?></option><option value="1">Takas Yapılır</option><option value="0">Takas Yapılmaz</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Boya veya Değişen Parça</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="DegisenParca" class="UrunEkleSelectAlani"><option value="<?php echo $UrunBoyaDegisen; ?>"><?php echo $UrunBoyaDegisen; ?></option><option value="Tamamı Orjinal">Tamamı Orjinal</option><option value="1 Parça">1 Parça</option><option value="2 Parça">2 Parça</option><option value="3 Parça">3 Parça</option><option value="4 Parça">4 Parça</option><option value="5 Parça">5 Parça</option><option value="6 Parça">6 Parça</option><option value="7 Parça">7 Parça</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td colspan="2"><textarea name="UrunAciklamasi" class="TextAlanlari"><?php echo $UrunAciklamasi; ?></textarea></td>
                </tr>
                <tr><td colspan="4"><table width="100%">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 1</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiBIR"></td>
                    <td height="50"><img src="../<?php echo $UrunResmiBIR; ?>" height="50"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiIKI"></td>
                    <td height="50"><?php if($UrunResmiIKI != ""){ ?><img src="../<?php echo $UrunResmiIKI; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiUC"></td>
                    <td height="50"><?php if($UrunResmiUC != ""){ ?><img src="../<?php echo $UrunResmiUC; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiDORT"></td>
                    <td height="50"><?php if($UrunResmiDORT != ""){ ?><img src="../<?php echo $UrunResmiDORT; ?>" height="50"><?php } ?></td>
                </tr>
                </table></td></tr>
                <?php 
            if($UrunVaryantBasligi != ""){
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;Varyant Başlığı</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value="<?php echo $UrunVaryantBasligi; ?>"><?php echo $UrunVaryantBasligi; ?></option><option value="Renk">Renk</option></select></td>
                </tr>
                <?php 
                $VaryantCek = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE TabloAdi = '$UrunTablosu' AND UrunID = $UrunID");
                if($VaryantCek->num_rows){
                    $AdIcinSayi    = 1;
                    while($VaryanlariYaz = $VaryantCek->fetch_assoc()){
                        $EskiVaryantID = GeriDöndür($VaryanlariYaz["id"]);
                        $VaryantAdi    = GeriDöndür($VaryanlariYaz["VaryanAdi"]);
                        $VaryantAdedi  = GeriDöndür($VaryanlariYaz["StokAdedi"]);
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;<?php echo $AdIcinSayi; ?>. Varyant</td>
                    <td width="10">:</td>
                    <td width="645"><input type="text" name="VaryantIcerigi<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdi; ?>"></td>
                    <td width="645"><input type="number" name="VaryantMiktari<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdedi; ?>"></td>
                </tr>
                <input type="hidden" name="EskiVaryantID<?php echo $AdIcinSayi; ?>" value="<?php echo $EskiVaryantID; ?>">
    <?php 
                        $AdIcinSayi++;
                    }/* while kapatması */
                }/* num_rows if kapatması */
            }/* varyant if kapatması */
?>    
                <input type="hidden" name="Tablosu" value="<?php echo BasHarfiBuyukYap($UrunTablosu); ?>">
                <input type="hidden" name="UrunID" value="<?php echo $UrunID; ?>">
                <tr height="50">
                    <td colspan="4" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Güncelle" class="YesilButon"></td>
                </tr>
            </table>
        </td>
    </tr>
        <?php
        }elseif($UrunTablosu == "konut"){
         ?>
    <tr>
        <td width="1500">
            <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunAdi" class="InputAlanlari" value="<?php echo $UrunAdi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="UrunAdedi" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunAdedi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Sehir (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Sehir" class="UrunEkleSelectAlani"  required><option value="<?php echo Sehir($UrunKonumu); ?>"><?php echo Sehir($UrunKonumu); ?></option><?php foreach($sehir as $key => $val){ ?><option value="<?php echo $val; ?>"><?php echo $val; ?></option><?php } ?></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Konumu (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Konumu" class="InputAlanlari" value="<?php echo KalanAdres($UrunKonumu); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunFiyati" class="InputAlanlari" value="<?php echo FiyatGuncelle($UrunFiyati); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunParaBirimi; ?>"><?php echo $UrunParaBirimi; ?></option><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>
                <tr height="50">
                    <td width="210">&nbsp;&nbsp;&nbsp;Odaları (*) :</td>
                    <td width="10">:</td>
                    <td width="645"><select name="Odasayisi" class="UrunEkleSelectAlani" required><option value="<?php echo SalonVeOda($Urunodasayisi)[0]; ?>"><?php echo SalonVeOda($Urunodasayisi)[0]; ?></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select>+</td>
                    <td width="645"><select name="Salonsayisi" class="UrunEkleSelectAlani" required><option value="<?php echo SalonVeOda($Urunodasayisi)[1]; ?>"><?php echo SalonVeOda($Urunodasayisi)[1]; ?></option><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Brutm2 (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="Brutm2" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunBrutm2; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Netm2 (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="Netm2" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunNetm2; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Isınma Tipi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="IsinmaTipi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunisinmaTipi; ?>"><?php echo $UrunisinmaTipi; ?></option><option value="Merkezi">Merkezi</option><option value="Kombi">Kombi</option><option value="Elektrikli">Elektrikli</option><option value="Klima">Klima</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Mobilyalı Mı  (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="MobilyaliMi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunMobilyaliMi; ?>"><?php if($UrunMobilyaliMi=="0"){$Esya="Mobilyasız";}else{$Esya="Mobilyalı";} echo $Esya; ?></option><option value="1">Mobilyalı</option><option value="0">Mobilyasız</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Balkon (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Balkon" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunBalkon; ?>"><?php if($UrunBalkon=="0"){$Balkon="Balkonu Yok";}else{$Balkon="Balkonu Var";} echo $Balkon; ?></option><option value="0">Balkonu Yok</option><option value="1">Balkonu Var</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banyo Sayısı (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="BanyoSayisi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunBanyoSayisi; ?>"><?php echo $UrunBanyoSayisi; ?></option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Boyalı Mı</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="BoyaliMi" class="UrunEkleSelectAlani"><option value="<?php echo $UrunBoyaliMi; ?>"><?php if($UrunBoyaliMi=="0"){$BoyaliMi="Boyasız";}elseif($UrunBoyaliMi=="1"){$BoyaliMi="Boyalı";}else{$BoyaliMi = "";} echo $BoyaliMi; ?></option><option value="1">Boyalı</option><option value="0">Boyasız</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Bina Yaşı</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="BinaYasi" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php if($UrunBinaYasi=="999"){$UrunBinaYasi = "";} echo $UrunBinaYasi; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Kaçıncı Katta</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="Kat" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php if($UrunKat=="99"){$UrunKat = "";} echo $UrunKat; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Binadaki Toplam Kat Sayısı</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="BinadakiToplamKat" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php if($UrunToplamKat=="999"){$UrunToplamKat = "";} echo $UrunToplamKat; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;KrediyeUygunMu</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="KrediyeUygunMu" class="UrunEkleSelectAlani"><option value="<?php echo $UrunKrediyeUygunMu; ?>"><?php if($UrunKrediyeUygunMu=="0"){$Kredi="Krediye Uygun Değil";}elseif($UrunKrediyeUygunMu=="1"){$Kredi="Krediye Uygun";}else{$Kredi = "";} echo $Kredi; ?></option><option value="1">Krediye Uygun</option><option value="0">Krediye Uygun Değil</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Şu Anki Kullanım Durumu (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="SuAnkiKullanimDurumu" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunKullanimDurumu; ?>"><?php if($UrunKullanimDurumu=="0"){$Kullanim="Boş";}else{$Kullanim="Kullanımda";} echo $Kullanim; ?></option><option value="0">Boş</option><option value="1">Kullanımda</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td colspan="2"><textarea name="UrunAciklamasi" class="TextAlanlari"><?php echo $UrunAciklamasi; ?></textarea></td>
                </tr>
                <tr><td colspan="4"><table>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 1</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiBIR"></td>
                    <td height="50"><img src="../<?php echo $UrunResmiBIR; ?>" height="50"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiIKI"></td>
                    <td height="50"><?php if($UrunResmiIKI != ""){ ?><img src="../<?php echo $UrunResmiIKI; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiUC"></td>
                    <td height="50"><?php if($UrunResmiUC != ""){ ?><img src="../<?php echo $UrunResmiUC; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiDORT"></td>
                    <td height="50"><?php if($UrunResmiDORT != ""){ ?><img src="../<?php echo $UrunResmiDORT; ?>" height="50"><?php } ?></td>
                </tr>
                </table></td></tr>
                <?php 
            if($UrunVaryantBasligi != ""){
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;Varyant Başlığı</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value="<?php echo $UrunVaryantBasligi; ?>"><?php echo $UrunVaryantBasligi; ?></option><option value="Renk">Renk</option></select></td>
                </tr>
                <?php 
                $VaryantCek = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE TabloAdi = '$UrunTablosu' AND UrunID = $UrunID");
                if($VaryantCek->num_rows){
                    while($VaryanlariYaz = $VaryantCek->fetch_assoc()){
                        $EskiVaryantID = GeriDöndür($VaryanlariYaz["id"]);
                        $VaryantAdi    = GeriDöndür($VaryanlariYaz["VaryanAdi"]);
                        $VaryantAdedi  = GeriDöndür($VaryanlariYaz["StokAdedi"]);
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;<?php echo $AdIcinSayi; ?>. Varyant</td>
                    <td width="10">:</td>
                    <td width="645"><input type="text" name="VaryantIcerigi<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdi; ?>"></td>
                    <td width="645"><input type="number" name="VaryantMiktari<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdedi; ?>"></td>
                </tr>
                <input type="hidden" name="EskiVaryantID<?php echo $AdIcinSayi; ?>" value="<?php echo $EskiVaryantID; ?>">
    <?php 
                        $AdIcinSayi++;
                    }/* while kapatması */
                }/* num_rows if kapatması */
            }/* varyant if kapatması */
?>    
                <input type="hidden" name="Tablosu" value="<?php echo BasHarfiBuyukYap($UrunTablosu); ?>">
                <input type="hidden" name="UrunID" value="<?php echo $UrunID; ?>">
                <tr height="50">
                    <td colspan="4" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Güncelle" class="YesilButon"></td>
                </tr>
            </table>
        </td>
    </tr>
        <?php
        }elseif($UrunTablosu == "giyim"){
        ?>    
            
    <tr>
        <td width="1500">
            <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunAdi" class="InputAlanlari" value="<?php echo $UrunAdi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="UrunAdedi" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunAdedi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Marka (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Marka" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunMarka; ?>"><?php echo $UrunMarka; ?></option><option value="Diğer">Diğer</option><option value="Adidas">Adidas</option><option value="Bershka">Bershka</option><option value="Coccinelle">Coccinelle</option><option value="Stradivarius">Stradivarius</option><option value="Tasarımcıdan">Tasarımcıdan</option><option value="Zara">Zara</option><option value="Diğer">Diğer</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp; Ürün Durumu (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Kullanilabilirlik" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunKullanilabilirlik; ?>"><?php if($UrunKullanilabilirlik=="5"){$GiyimDurum = "Etiketi Üzerinde (Hiç Kullanılmamış)";}elseif($UrunKullanilabilirlik=="4"){$GiyimDurum = "Hasarsız / Az Kullanılmış";}elseif($UrunKullanilabilirlik=="3"){$GiyimDurum = "Hasarsız / Kullanılmış";}elseif($UrunKullanilabilirlik=="2"){$GiyimDurum = "Kullanılmış";} echo $GiyimDurum; ?></option><option></option><option value="5">Etiketi Üzerinde (Hiç Kullanılmamış)</option><option value="4">Hasarsız / Az Kullanılmış</option><option value="3">Hasarsız / Kullanılmış</option><option value="2">Kullanılmış</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Beden</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Beden" class="InputAlanlari" value="<?php echo $UrunBeden; ?>"></td>
                </tr>

                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Renk (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Renk" class="InputAlanlari" value="<?php echo $UrunRenk; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Desen</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Desen" class="InputAlanlari" value="<?php echo $UrunDesen; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Türü (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="MenuAdi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunMenuAdi; ?>"><?php echo $UrunMenuAdi; ?></option><option value="Elbise">Elbise</option><option value="Şort">Şort</option><option value="Takı">Takı</option><option value="Yelek">Yelek</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunFiyati" class="InputAlanlari" value="<?php echo FiyatGuncelle($UrunFiyati); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunParaBirimi; ?>"><?php echo $UrunParaBirimi; ?></option><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Kargo Ücreti</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" title="Sadece Sayı Giriniz" name="KargoUcreti" class="InputAlanlari" value="<?php echo $UrunKargoUcreti; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td colspan="2"><textarea name="UrunAciklamasi" class="TextAlanlari"><?php echo $UrunAciklamasi; ?></textarea></td>
                </tr>
                <tr><td colspan="4"><table>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 1</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiBIR"></td>
                    <td height="50"><img src="../<?php echo $UrunResmiBIR; ?>" height="50"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiIKI"></td>
                    <td height="50"><?php if($UrunResmiIKI != ""){ ?><img src="../<?php echo $UrunResmiIKI; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiUC"></td>
                    <td height="50"><?php if($UrunResmiUC != ""){ ?><img src="../<?php echo $UrunResmiUC; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiDORT"></td>
                    <td height="50"><?php if($UrunResmiDORT != ""){ ?><img src="../<?php echo $UrunResmiDORT; ?>" height="50"><?php } ?></td>
                </tr>
                </table></td></tr>
                <?php 
            if($UrunVaryantBasligi != ""){
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;Varyant Başlığı</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value="<?php echo $UrunVaryantBasligi; ?>"><?php echo $UrunVaryantBasligi; ?></option><option value="Renk">Renk</option></select></td>
                </tr>
                <?php 
                $VaryantCek = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE TabloAdi = '$UrunTablosu' AND UrunID = $UrunID");
                if($VaryantCek->num_rows){
                    $AdIcinSayi    = 1;
                    while($VaryanlariYaz = $VaryantCek->fetch_assoc()){
                        $EskiVaryantID = GeriDöndür($VaryanlariYaz["id"]);
                        $VaryantAdi    = GeriDöndür($VaryanlariYaz["VaryanAdi"]);
                        $VaryantAdedi  = GeriDöndür($VaryanlariYaz["StokAdedi"]);
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;<?php echo $AdIcinSayi; ?>. Varyant</td>
                    <td width="10">:</td>
                    <td width="645"><input type="text" name="VaryantIcerigi<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdi; ?>"></td>
                    <td width="645"><input type="number" name="VaryantMiktari<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdedi; ?>"></td>
                </tr>
                <input type="hidden" name="EskiVaryantID<?php echo $AdIcinSayi; ?>" value="<?php echo $EskiVaryantID; ?>">
    <?php 
                        $AdIcinSayi++;
                    }/* while kapatması */
                }/* num_rows if kapatması */
            }/* varyant if kapatması */
?>    
                <input type="hidden" name="Tablosu" value="<?php echo BasHarfiBuyukYap($UrunTablosu); ?>">
                <input type="hidden" name="UrunID" value="<?php echo $UrunID; ?>">
                <tr height="50">
                    <td colspan="4" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Güncelle" class="YesilButon"></td>
                </tr>
            </table>
        </td>
    </tr>
        <?php    
        }elseif($UrunTablosu == "teknoloji"){
        ?>
    <tr>
        <td width="1500">
            <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Başlık (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunAdi" class="InputAlanlari" value="<?php echo $UrunAdi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Adedi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="UrunAdedi" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunAdedi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Fiyati (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunFiyati" class="InputAlanlari" value="<?php echo FiyatGuncelle($UrunFiyati); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Para Birimi (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="ParaBirimi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunParaBirimi; ?>"><?php echo $UrunParaBirimi; ?></option><option value="TL">TL</option><option value="USD">USD</option><option value="EUR">EUR</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Türü (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="MenuAdi" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunMenuAdi; ?>"><?php echo $UrunMenuAdi; ?></option><option value="Akıllı Telefon">Akıllı Telefon</option><option value="Tuşlu Telefon">Tuşlu Telefon</option><option value="DizÜstü Bilgisayar">Dizüstü Bilgisayar</option><option value="Masaüstü Bilgisayar">Masaüstü Bilgisayar</option><option value="Tablet">Tablet</option><option value="Ekran Kartı">Ekran Kartı</option><option value="Hafıza">Hafıza</option><option value="İşlemci">İşlemci</option><option value="Soğutucu">Soğutucu</option><option value="HDD">HDD</option><option value="SSD">SSD</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Sehir (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Sehir" class="UrunEkleSelectAlani"  required><option value="<?php echo Sehir($UrunKonumu); ?>"><?php echo Sehir($UrunKonumu); ?></option><?php foreach($sehir as $key => $val){ ?><option value="<?php echo $val; ?>"><?php echo $val; ?></option><?php } ?></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Konumu (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Konumu" class="InputAlanlari" value="<?php echo KalanAdres($UrunKonumu); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Kimden (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="Kimden" class="UrunEkleSelectAlani" required><option value="<?php echo $UrunKimden; ?>"><?php echo $UrunKimden; ?></option><option value="Sahibinden">Sahibinden</option><option value="Mağazadan">Mağazadan</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Marka (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Marka" class="InputAlanlari" value="<?php echo $UrunMarka; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Model (*)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Model" class="InputAlanlari" value="<?php echo $UrunModel; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Serisi</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="UrunSerisi" class="InputAlanlari" value="<?php echo $UrunSerisi; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;İşletim Sistemi</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="isletimSistemi" class="InputAlanlari" value="<?php echo $UrunisletimSistemi; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;RAM</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="RAM" class="UrunEkleSelectAlani"><option value="<?php echo $UrunRAM; ?>"><?php echo $UrunRAM; ?></option><option value=""></option><option value="1&lsaquo; GB">1&lsaquo; GB RAM</option><option value="1 GB">1 GB RAM</option><option value="2 GB">2 GB RAM</option><option value="3 GB">3 GB RAM</option><option value="4 GB">4 GB RAM</option><option value="5 GB">5 GB RAM</option><option value="6 GB">6 GB RAM</option><option value="7 GB">7 GB RAM</option><option value="8 GB">8 GB RAM</option><option value="12 GB">12 GB RAM</option><option value="16 GB">16 GB RAM</option><option value="24 GB">24 GB RAM</option><option value="32 GB">32 GB RAM</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ekran Boyutu</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="EkranBoyutu" class="InputAlanlari" value="<?php echo $UrunEkranBoyutu; ?>" ></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Çözünürlülük</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Cozunurluluk" class="InputAlanlari" value="<?php echo $UrunCozunurluluk; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;CPU Modeli</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="CPU" class="InputAlanlari" value="<?php echo $UrunCPU; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;CPU Hızı (GHz)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="CPUhizi" class="InputAlanlari" value="<?php echo $UrunCPUhizi; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;GPU (Marka ve Model)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="GPU" class="InputAlanlari" value="<?php echo $UrunGPU; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;DiskTuru</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="DiskTuru" class="UrunEkleSelectAlani"><option value="<?php echo $UrunDiskTuru; ?>"><?php echo $UrunDiskTuru; ?></option><option value=""></option><option value="SSD">SSD</option><option value="HDD">HDD</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Disk Boyutu</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" name="DiskBoyutu" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunDiskBoyutu; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Renk</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="Renk" class="InputAlanlari" value="<?php echo $UrunRenk; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;OnKamera (MP)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="OnKamera" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunOnKamera; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;ArkaKamera (MP)</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="text" name="ArkaKamera" title="Sadece Sayı Giriniz" class="InputAlanlari" value="<?php echo $UrunArkaKamera; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Kargo Ücreti</td>
                    <td width="10">:</td>
                    <td colspan="2"><input type="number" title="Sadece Sayı Giriniz" name="KargoUcreti" class="InputAlanlari" value="<?php echo $UrunKargoUcreti; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Sıfır Mı?</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="SifirMi" class="UrunEkleSelectAlani"><option value="<?php echo $UrunSifirMi; ?>"><?php if($UrunSifirMi=="1"){$Temiz = "Evet";}elseif($UrunSifirMi=="0"){$Temiz = "Hayır";}else{$Temiz = "";} echo $Temiz; ?></option><option value=""></option><option value="0">Hayır</option><option value="1">Evet</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Tamir Gördü Mü?</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="TamirGorduMu" class="UrunEkleSelectAlani"><option value="<?php echo $UrunTamirGorduMu; ?>"><?php if($UrunTamirGorduMu=="1"){$Tamir = "Evet";}elseif($UrunTamirGorduMu=="0"){$Tamir = "Hayır";}else{$Tamir = "";} echo $Tamir; ?></option><option  value=""></option><option value="0">Hayır</option><option value="1">Evet</option></select></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Açıklaması</td>
                    <td width="10">:</td>
                    <td colspan="2"><textarea name="UrunAciklamasi" class="TextAlanlari"><?php echo $UrunAciklamasi; ?></textarea></td>
                </tr>
                <tr><td colspan="4"><table>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 1</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiBIR"></td>
                    <td height="50"><img src="../<?php echo $UrunResmiBIR; ?>" height="50"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 2</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiIKI"></td>
                    <td height="50"><?php if($UrunResmiIKI != ""){ ?><img src="../<?php echo $UrunResmiIKI; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 3</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiUC"></td>
                    <td height="50"><?php if($UrunResmiUC != ""){ ?><img src="../<?php echo $UrunResmiUC; ?>" height="50"><?php } ?></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Resim 4</td>
                    <td width="10">:</td>
                    <td width="220"><input type="file" name="UrunResmiDORT"></td>
                    <td height="50"><?php if($UrunResmiDORT != ""){ ?><img src="../<?php echo $UrunResmiDORT; ?>" height="50"><?php } ?></td>
                </tr>
                </table></td></tr>
                <?php 
            if($UrunVaryantBasligi != ""){
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;Varyant Başlığı</td>
                    <td width="10">:</td>
                    <td colspan="2"><select name="VaryantBasligi" class="UrunEkleSelectAlani"><option value="<?php echo $UrunVaryantBasligi; ?>"><?php echo $UrunVaryantBasligi; ?></option><option value="Renk">Renk</option></select></td>
                </tr>
                <?php 
                $VaryantCek = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE TabloAdi = '$UrunTablosu' AND UrunID = $UrunID");
                if($VaryantCek->num_rows){
                    $AdIcinSayi    = 1;
                    while($VaryanlariYaz = $VaryantCek->fetch_assoc()){
                        $EskiVaryantID = GeriDöndür($VaryanlariYaz["id"]);
                        $VaryantAdi    = GeriDöndür($VaryanlariYaz["VaryanAdi"]);
                        $VaryantAdedi  = GeriDöndür($VaryanlariYaz["StokAdedi"]);
                ?>
                <tr height="50">
                    <td width="190">&nbsp;&nbsp;<?php echo $AdIcinSayi; ?>. Varyant</td>
                    <td width="10">:</td>
                    <td width="645"><input type="text" name="VaryantIcerigi<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdi; ?>"></td>
                    <td width="645"><input type="number" name="VaryantMiktari<?php echo $AdIcinSayi; ?>" class="InputAlanlari" value="<?php echo $VaryantAdedi; ?>"></td>
                </tr>
                <input type="hidden" name="EskiVaryantID<?php echo $AdIcinSayi; ?>" value="<?php echo $EskiVaryantID; ?>">
    <?php 
                        $AdIcinSayi++;
                    }/* while kapatması */
                }/* num_rows if kapatması */
            }/* varyant if kapatması */
?>    
                <input type="hidden" name="Tablosu" value="<?php echo BasHarfiBuyukYap($UrunTablosu); ?>">
                <input type="hidden" name="UrunID" value="<?php echo $UrunID; ?>">
                <tr height="50">
                    <td colspan="4" align="center">&nbsp;&nbsp;&nbsp;<input type="submit" value="Ürünü Güncelle" class="YesilButon"></td>
                </tr>
            </table>
        </td>
    </tr>
        <?php    
        }else{
            header("Location:index.php?SKI=89");
            exit();
        }        
    ?>
        
<?php
        }
    }else{
        header("Location:index.php?SKI=4");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>