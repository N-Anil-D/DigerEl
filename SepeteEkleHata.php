<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="50">
      <td>&nbsp;</td>
  </tr>

  <tr height="150">
      <td align="center"><img src="Resimler/Hata.png"></td>
  </tr>

  <tr>
      <td align="center"><b>HATA Ürün Sepete Eklenemedi. </b><br /><b>Ürünün stoğu yok</b> veya <b>bilinmeyen bir hata oluştu.</b></td>
  </tr>

  <tr height="80">
      <td align="center"><?php echo ""; ?></td>
  </tr>

  <tr height="40">
      <td class="SonucSayfalari" align="center">Ana sayfaya dönmek için >>><a href="AnaSayfa" class="SonucSayfalari"><b>Ana Sayfa</b></a></td>
  </tr>
    
  <tr height="40">
      <td class="SonucSayfalari" align="center"><b>Ürünün</b> sayfasına geri dönmek için >>><a href="javascript:javascript:history.go(-1)" class="SonucSayfalari"><b>Ürüne geri dön</b></a></td>
  </tr>
    
</table>
<?php if(isset($_COOKIE["83CerezLinki"])){
          header("Location:" . $_COOKIE["83CerezLinki"]);
          exit();
    }else{    
      header("Location:AnaSayfa");
      exit();
} ?>