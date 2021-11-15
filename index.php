<?php
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php");
require_once("Frameworks/Verot/src/class.upload.php");

if(isset($_REQUEST["SK"])){
    $SayfaKoduDegeri    =   SadeceSayilar($_REQUEST["SK"]);
}else{
    $SayfaKoduDegeri    =   0;
}

if(isset($_GET["UID"]) and isset($_GET["TA"]) and $SayfaKoduDegeri==83){
    $GelenUrunID   = SadeceSayilar($_GET["UID"]);
    $GelenTabloAdi = GuvenlikFiltresi($_GET["TA"]);
    @setcookie("83CerezLinki", "GecmisUrunDetaylari/".$GelenTabloAdi."/".$GelenUrunID, $zaman +(600));
    @setcookie("83CerezTA", $GelenTabloAdi , $zaman +(60));
    @setcookie("83CerezUID", $GelenUrunID , $zaman +(60));
}

if(isset($_REQUEST["SYF"])){
    $Sayfalama    =   SadeceSayilar($_REQUEST["SYF"]);
}else{
    $Sayfalama    =   1;
}
?>

<!doctype html>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<meta name="Robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="revisit-after" content="7 Days">
<base href="/NADproje/">
<link image="image/png" rel="icon" href="Resimler/Favicon.png">
<title><?php echo GeriDöndür($SiteTitle) ?></title>
<meta name="Description" content="<?php echo GeriDöndür($SiteDescription); ?>">
<meta name="Keywords" content="<?php echo GeriDöndür($SiteKeywords) ?>">
<script type="text/javascript" src="Frameworks/JQuery/jquery-3.6.0.min.js" language="javascript"></script>
<link type="text/css" rel="stylesheet" href="Ayarlar/stil.css">
<script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>

<body>
<table width="1065" height="100%" align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="60" bgcolor="#016DF3" valign="bottom">
        <td width="1065" height="60" align="center" valign="bottom"><img src="Resimler/headerBEN.png" border="0"></td>
    </tr>


    <tr height="30">
        <td>
            <table width="1065" height="30" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr bgcolor="#FF7300">
                    <td>&nbsp;</td>
                    <?php
                    if(isset($_SESSION["Kullanici"])){
                        $isimuzunlugu = strlen($UyeisimSoyisim);
                        $isimpixel = ($isimuzunlugu*8);
                    ?>
                    <td width="20"><a href="Hesabim"><img src="Resimler/KullaniciBeyaz16x16.png" border="0" style="margin-top: 5px"></a></td>
                    <td width="<?php echo $isimpixel; ?>" class="TuruncuAlanMenusu"><a href="Hesabim">&nbsp;<?php echo $UyeisimSoyisim; ?></a></td>
                    <td width="20"><a href="cikis"><img src="Resimler/CikisBeyaz16x16.png" border="0" style="margin-top: 5px"></a></td>
                    <td width="62" class="TuruncuAlanMenusu"><a href="cikis">Çkış Yap</a></td>
                    <?php
                    }else{
                    ?>

                    <td width="20"><a href="Giris"><img src="Resimler/KullaniciBeyaz16x16.png" border="0" style="margin-top: 5px"></a></td>
                    <td width="70" class="TuruncuAlanMenusu"><a href="Giris">Giriş Yap</a></td>
                    <td width="20"><a href="YeniUyeOl"><img src="Resimler/KullaniciEkleBeyaz16x16.png" border="0" style="margin-top: 5px"></a></td>
                    <td width="55" class="TuruncuAlanMenusu"><a href="YeniUyeOl">Üye Ol</a></td>
                    <?php
                    }
                    ?>
                    
                    
                    <td width="20"><a href="Sepetim"><img src="Resimler/SepetBeyaz16x16.png" border="0" style="margin-top: 4px"></a></td>
                    <td width="120" class="TuruncuAlanMenusu"><?php if(isset($_SESSION["Kullanici"])){ ?><a href="Sepetim">Alışveriş Sepeti</a> <?php }else{ echo "Alışveriş Sepeti"; } ?></td>
                 </tr>
            </table>
        </td>
    </tr>
    
    <tr height="110" bgcolor="#F9F9F9">
        <td>
            <table width="1065" height="30" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td width="74"><a href="AnaSayfa"><img src="<?php echo GeriDöndür($SiteLogosu); ?>" height="100" width="74"></a></td>
                <td width="847"><?php echo ""; ?></td>
                <td width="48" class="AnaMenu"><a href="Araclar/1/">Araç</a></td>
                <td width="40" class="AnaMenu"><a href="Evler/1/">Konut</a></td>
                <td width="80" align="center" class="AnaMenu"><a href="TeknolojiUrunleri/1/">Teknoloji</a></td>
                <td width="40" class="AnaMenu"><a href="Kiyafet/1/" style="margin-right: 10px">Giyim</a></td>
              </tr>
            </table>
        </td>
    </tr>
        
    
   
    
    
    
    
    <tr>
        <td valign="top">
            <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="10"><td><?php echo ""; ?></td></tr>
                <tr>
                    <td align="center"><?php
                        if((!$SayfaKoduDegeri) or ($SayfaKoduDegeri=="") or ($SayfaKoduDegeri==0)){
                            include($WebPage[0]);
                        }else{
                            include($WebPage[$SayfaKoduDegeri]);
                        }
                        ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
     
    
    
    
    
    
    <tr height="30">
        <td><?php echo ""; ?></td>
    </tr>

    <tr height="210">
        <td>
          <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0" bgcolor="#F9F9F9">
              <tr height="30">
                  <td width="250" style="border-bottom: 1px dashed #A7A7A7"><b>&nbsp;Kurumsal</b></td>
                  <td width="22"><?php echo ""; ?></td>
                  <td width="250" style="border-bottom: 1px dashed #A7A7A7"><b>Üyelik &amp; Hizmetler</b></td>
                  <td width="22"><?php echo ""; ?></td>
                  <td width="250" style="border-bottom: 1px dashed #A7A7A7"><b>Sözleşmeler</b></td>
                  <td width="21"><?php echo ""; ?></td>
                  <td width="250" style="border-bottom: 1px dashed #A7A7A7"><b>Bizi Takip Edin</b></td>
              </tr>

              <tr height="30">
                  <td class="AltMenu"><a href="hakkimizda">&nbsp;Hakkımızda</a></td>
                  <td><?php echo ""; ?></td>
                  <?php
                  if(isset($_SESSION["Kullanici"])){ ?>
                  <td class="AltMenu"><a href="Hesabim">Hesabım</a></td>
                  <?php
                  }else{
                  ?>  
                  <td class="AltMenu"><a href="Giris">Giriş Yap</a></td>
                  <?php } ?>                  
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><a href="UyelikSozlesmesi">Üyelik Sözleşmesi</a></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                          <td width="20"><a href="<?php echo GeriDöndür($SiteFacebook) ?>" target="_blank" rel="noopener noreferrer"><img src="Resimler/Facebook16x16.png" border="0" style="margin-top: 5px"></a></td>
                          <td width="230"><a href="<?php echo GeriDöndür($SiteFacebook) ?>" target="_blank" rel="noopener noreferrer">Facebook</a></td>
                      </tr>
                      </table></td>
              </tr>

              <tr height="30">
                  <td class="AltMenu"><a href="BankaHesaplarimiz">&nbsp;Banka Hesaplarımız</a></td>
                  <td><?php echo ""; ?></td>
                  <?php
                  if(isset($_SESSION["Kullanici"])){ ?>
                  <td class="AltMenu"><a href="cikis">Çıkış Yap</a></td>
                  <?php
                  }else{
                  ?>  
                  <td class="AltMenu"><a href="YeniUyeOl">Yeni Üyel Ol</a></td>
                  <?php } ?>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><a href="SiteKullanimKosullari">Kullanım Koşulları</a></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                          <td width="20"><a href="<?php echo GeriDöndür($SiteTwitter) ?>" target="_blank" rel="noopener noreferrer"><img src="Resimler/Twitter16x16.png" border="0" style="margin-top: 5px"></a></td>
                          <td width="230"><a href="<?php echo GeriDöndür($SiteTwitter) ?>" target="_blank" rel="noopener noreferrer">Twitter</a></td>
                      </tr>
                      </table></td>
              </tr>

              <tr height="30">
                  <td class="AltMenu"><a href="havalebildirimformu">&nbsp;Havale Bildirim Formu</a></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><a href="sss">Sıkça Sorulan Sorular</a></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><a href="GizlilikSozlesmesi">Gizlilik Sözleşmesi</a></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                          <td width="20"><a href="<?php echo GeriDöndür($SiteLinkedIn) ?>" target="_blank" rel="noopener noreferrer"><img src="Resimler/LinkedIn16x16.png" border="0" style="margin-top: 5px"></a></td>
                          <td width="230"><a href="<?php echo GeriDöndür($SiteLinkedIn) ?>" target="_blank" rel="noopener noreferrer">LinkedIn</a></td>
                      </tr>
                      </table></td>          
              </tr>

              <tr height="30">
                  <td class="AltMenu"><a href="KargomNerede">&nbsp;Kargom Nerede?</a></td>
                  <td><?php echo ""; ?></td>
                  <td></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><a href="MesafeliSatisSozlesmesi">Mesafeli Satış Sözleşmesi</a></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                          <td width="20"><a href="<?php echo GeriDöndür($SiteInstagram) ?>" target="_blank" rel="noopener noreferrer"><img src="Resimler/Instagram16x16.png" border="0" style="margin-top: 5px"></a></td>
                          <td width="230"><a href="<?php echo GeriDöndür($SiteInstagram) ?>" target="_blank" rel="noopener noreferrer">Instagram</a></td>
                      </tr>
                      </table></td>
              </tr>

              <tr height="30">
                  <td class="AltMenu"><a href="Iletisim">&nbsp;İletişim</a></td>
                  <td><?php echo ""; ?></td>
                  <td></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><a href="TeslimatMetni">Teslimat</a></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                          <td width="20"><a href="<?php echo GeriDöndür($SitePinteres) ?>" target="_blank" rel="noopener noreferrer"><img src="Resimler/Pinterest16x16.png" border="0" style="margin-top: 5px"></a></td>
                          <td width="230"><a href="<?php echo GeriDöndür($SitePinteres) ?>" target="_blank" rel="noopener noreferrer">Pinterest</a></td>
                      </tr>
                      </table></td>
              </tr>                  

              <tr height="30">
                  <td height="24"></td>
                  <td><?php echo ""; ?></td>
                  <td></td>
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><a href="IptalIadeDegisim">İptal &amp; İade &amp; Değişim</a></td><!-- &amp; = &-->
                  <td><?php echo ""; ?></td>
                  <td class="AltMenu"><table width="250" align="center" border="0" cellpadding="0" cellspacing="0">
                      <tr>
                          <td width="20"><a href="<?php echo GeriDöndür($SiteYoutube) ?>" target="_blank" rel="noopener noreferrer"><img src="Resimler/YouTube16x16.png" border="0" style="margin-top: 5px"></a></td>
                          <td width="230"><a href="<?php echo GeriDöndür($SiteYoutube) ?>" target="_blank" rel="noopener noreferrer">YouTube</a></td>
                      </tr>
                      </table></td>          
              </tr>
              
          </table>
        </td>
    </tr>

    <tr height="30">
        <td>
            <table width="1065" height="30" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr style="color:#33F5FF">
                  <td align="center"><?php echo GeriDöndür($SiteCapyrightMetni) ?></td>
              </tr>
            </table>
        </td>  
    </tr> 
    
        <tr height="30" valign="center">
            <td class="AltMenu">
                <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td align="center">
                        <img src="Resimler/RapidSSL32x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/InternetteGuvenliAlisveris28x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/3DSecure14x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/BonusCard41x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/MaximumCard46x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/WorldCard48x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/CardFinans78x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/AxessCard46x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/OdemeSecimiParafCard.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/VisaCard37x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/MasterCard21x12.png" border="0" style="margin-right: 5px;">
                        <img src="Resimler/AmericanExpiress20x12.png" border="0" style="margin-right: 5px;">
                    </td>
                    </tr>
                </table>
            </td>  
        </tr>                
    
    </table>
<?php
$DataBaseConnection->close();
ob_end_flush();
?>
</body>
</html>