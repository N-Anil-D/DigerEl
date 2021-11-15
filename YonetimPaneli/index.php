<?php
require_once("../Ayarlar/ayar.php");
require_once("../Ayarlar/fonksiyonlar.php");
require_once("../Ayarlar/YonetimDISsitesayfalari.php");
require_once("../Ayarlar/YonetimICsitesayfalari.php");
require_once("../Frameworks/Verot/src/class.upload.php");

if(isset($_REQUEST["SKI"])){
    $IcSayfaKoduDegeri    =   SadeceSayilar($_REQUEST["SKI"]);
}else{
    $IcSayfaKoduDegeri    =   0;
}
if(isset($_REQUEST["SKD"])){
    $DisSayfaKoduDegeri    =   SadeceSayilar($_REQUEST["SKD"]);
}else{
    $DisSayfaKoduDegeri    =   0;
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
<meta name="Robots" content="noindex, nofollow, noarchive">
<meta name="googlebot" content="noindex, nofollow, noarchive">
<meta name="revisit-after" content="7 Days">
<link image="image/png" rel="icon" href="../Resimler/Favicon.png">
<title><?php echo GeriDöndür($SiteTitle) ?></title>
<meta name="Description" content="<?php echo GeriDöndür($SiteDescription); ?>">
<meta name="Keywords" content="<?php echo GeriDöndür($SiteKeywords) ?>">
<script type="text/javascript" src="../Frameworks/JQuery/jquery-3.6.0.min.js" language="javascript"></script>
<link type="text/css" rel="stylesheet" href="../Ayarlar/Yonetimstil.css">
<script type="text/javascript" src="../Ayarlar/fonksiyonlar.js" language="javascript"></script>
</head>

<body>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="100%">
        <td align="center">
            <?php
            if(empty($_SESSION["Yonetici"])){
                if((!$DisSayfaKoduDegeri) or ($DisSayfaKoduDegeri=="") or ($DisSayfaKoduDegeri==0)){
                    include($SayfaDis[1]);
                }else{
                    include($SayfaDis[$DisSayfaKoduDegeri]);
                }
                
            }else{
                if((!$DisSayfaKoduDegeri) or ($DisSayfaKoduDegeri=="") or ($DisSayfaKoduDegeri==0)){
                    include($SayfaDis[0]);
                }else{
                    include($SayfaDis[$DisSayfaKoduDegeri]);
                }
            }
            ?>
        </td>
    </tr>
    
    
    
    
</body>
<?php
$DataBaseConnection->close();
ob_end_flush();
?>

</html>