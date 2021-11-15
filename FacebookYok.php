<?php
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php"); 
?>
<html lang="tr-TR">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Content-Language" content="tr">
<meta charset="utf-8">
<meta name="Robots" content="index, follow">
<meta name="googlebot" content="index, follow">
<meta name="revisit-after" content="7 Days">
<link image="image/png" rel="icon" href="Resimler/Favicon.png">
<title><?php echo GeriDöndür($SiteTitle) ?></title>
<meta name="Description" content="<?php echo GeriDöndür($SiteDescription); ?>">
<meta name="Keywords" content="<?php echo GeriDöndür($SiteKeywords) ?>">
<script type="text/javascript" src="Frameworks/JQuery/jquery-3.6.0.min.js" language="javascript"></script>
<link type="text/css" rel="stylesheet" href="Ayarlar/stil.css">
<script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>
  
<body>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="50">
      <td>&nbsp;</td>
  </tr>

  <tr height="150">
      <td align="center"><img src="Resimler/Hata.png"></td>
  </tr>

  <tr>
      <td align="center"><b>Üzgünüz</b></td>
  </tr>

  <tr height="80">
      <td align="center">Sitemize ait herhangi bir facebook sayfası yoktur</td>
  </tr>

  <tr height="40">
      <td class="SonucSayfalari" align="center">Ana sayfaya dönmek için >>><a href="index.php"><b>Ana Sayfa</b></a></td>
  </tr>
<?php 
@$GelinenSayfa = htmlspecialchars($_SERVER['HTTP_REFERER']);  // hangi sayfadan gelindigi degerini verir.
if($GelinenSayfa!="" or $GelinenSayfa=0){
?>        
  <tr height="40">
      <td class="SonucSayfalari" align="center"><b>Ürünün</b> sayfasına geri dönmek için >>><a href="<?php echo $GelinenSayfa; ?>" class="SonucSayfalari"><b>Ürüne geri dön</b></a></td>
  </tr>
</table>
<?php }elseif(isset($_COOKIE["83CerezLinki"])){
          header("Location:" . $_COOKIE["83CerezLinki"]);
          exit();
    }else{    
      header("Location:index.php");
      exit();
} ?>
</body>
</html>