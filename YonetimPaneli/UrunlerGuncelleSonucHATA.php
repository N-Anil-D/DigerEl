<?php 
if(isset($_GET["eror"])){
    $eror = GuvenlikFiltresi($_GET["eror"]);
}else{
    $eror = "";
}
?>
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="150">
      <td align="center"><img src="../Resimler/Dikkat.png"></td>
  </tr>
<?php if(($eror=="431") or ($eror=="850") or ($eror=="1220") or ($eror=="1664")){ ?>
  <tr height="80">
      <td align="center">Üründe yapmak istediğiniz bir güncelleme tespit edemedik</td>
  </tr>
<?php }else{ ?>
  <tr height="80">
      <td align="center"><b>Bilinmeyen bir HATA oluştu.</b></td>
  </tr>
  <tr height="80">
      <td align="center">UrunlerGuncelleSonuc.php - satır <?php echo $eror; ?> ile yönlendirildi</td>
  </tr>
<?php } ?>
  <tr height="40">
      <td class="SonucSayfalari" align="center">Ana sayfaya dönmek için >>><a href="index.php"><b>Ana Sayfa</b></a></td>
  </tr>
    
  <tr height="40">
      <td class="SonucSayfalari" align="center">
          <a href="javascript:javascript:history.go(-1)" class="SonucSayfalari"><b style="color: #002e4d; background-color: #b3f0ff;">BİR ÖNCEKİ SAYFAYA</b> geri dönmek için >>><b>TIKLAYINIZ</b></a>
      </td>
  </tr>
    
</table>