<?php
require_once("Ayarlar/ayar.php");
require_once("Ayarlar/fonksiyonlar.php");
require_once("Ayarlar/sitesayfalari.php");

if(isset($_REQUEST["SK"])){
    $SayfaKoduDegeri    =   SadeceSayilar($_REQUEST["SK"]);
}else{
    $SayfaKoduDegeri    =   0;
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
<link image="image/png" rel="icon" href="Resimler/Favicon.png">
<title><?php echo GeriDöndür($SiteTitle) ?></title>
<meta name="Description" content="<?php echo GeriDöndür($SiteDescription); ?>">
<meta name="Keywords" content="<?php echo GeriDöndür($SiteKeywords) ?>">
<script type="text/javascript" src="Frameworks/JQuery/jquery-3.6.0.min.js" language="javascript"></script>
<link type="text/css" rel="stylesheet" href="Ayarlar/stil.css">
<script type="text/javascript" src="Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>

<form action="deneme.php" method="get">
<input type="text" name="girdi" required>    
<input type="submit" value="XXX">  
</form>    
    
    
<?php
if(isset($_GET["girdi"])){
    $girdi    =   GuvenlikFiltresi($_GET["girdi"]);
}else{
    $girdi    =   111000555.32512412;
}

echo strlen("000000000000000000000000")."<br />";
      
echo str_repeat("X",10);    
    
    
    
    
?>

    
    
    
</html>