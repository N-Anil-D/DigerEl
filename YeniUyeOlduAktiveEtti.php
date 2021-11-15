<?php
if(isset($_GET["AktivasyonKodu"])){
    $AktivasyonKodu = GuvenlikFiltresi($_GET["AktivasyonKodu"]);
}else{
    $AktivasyonKodu = "";
}
//--------------------------------------------
if(isset($_GET["Email"])){
    $Email = GuvenlikFiltresi($_GET["Email"]);
}else{
    $Email = "";
}
//--------------------------------------------
    if(($AktivasyonKodu != "") and ($Email != "")){
        $Durumu                 = "Aktif";
        $MD5liSifre             = md5($UyeGelensifre);
        $GuncellemeSorgusu      = $DataBaseConnection->prepare("UPDATE uyeler SET Durumu = ? WHERE Email = ? AND AktivasyonKodu = ? LIMIT 1");
        $GuncellemeSorgusu->bind_param("sss", $Durumu, $Email,$AktivasyonKodu);
        $GuncellemeSorgusu->execute();
        $GuncellemeBasarisi     = $DataBaseConnection->affected_rows;

        if($GuncellemeBasarisi>0){
?>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="50">
      <td>&nbsp;</td>
  </tr>

  <tr height="150">
      <td align="center"><img src="Resimler/Tamam.png"></td>
  </tr>

  <tr>
      <td align="center"><b>TEBRİKLER Üyeliğiniz başarıyla tamamlandı.</b></td>
  </tr>

  <tr height="80">
      <td align="center" style="color: #008E37">Üyeliğinizi aktive edildi.<br />Umarım aradığınızı bulabilirsiniz :)</td>
  </tr>
    
    <?php 
    
  if(isset($_COOKIE["83CerezLinki"])){
    ?>
  <tr height="40">
      <td class="SonucSayfalari" align="center" style="font-size: 20px;">En son baktığınız ürüne dönmek için >>><a href="<?php echo $_COOKIE["83CerezLinki"]; ?>" class="SonucSayfalari"><b>SON BAKTIĞIM ÜRÜN</b></a></td>
  </tr>
  <?php } ?>
    
  <tr height="40">
      <td class="SonucSayfalari" align="center">Ana sayfaya dönmek için >>><a href="AnaSayfa" class="SonucSayfalari"><b>Ana Sayfa</b></a></td>
  </tr>
</table>

<?php 

        }else{
            header("Location:YeniUyeOlFBasarisiz");
            exit();
        }

    }else{
        header("Location:YeniUyeOlFBasarisiz");
        exit();
    }
?>