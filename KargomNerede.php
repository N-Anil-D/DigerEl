<?php 
if(isset($_POST["KargoTakipNo"])){
    $KargoTakipNo = SadeceSayilar(GuvenlikFiltresi($_POST["KargoTakipNo"]));
}else{
    $KargoTakipNo = "";
}
//--------------------------------------------

  if($KargoTakipNo!=""){
      header("Location:https://www.yurticikargo.com/tr/online-servisler/gonderi-sorgula?code=" . $KargoTakipNo);
      exit();
  }
?>

<form action="KargomNerede" method="post">
    <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
      <tr height="80" bgcolor="#B9B651">
          <td align="left"><h2 style="color: #8F0D0F">&nbsp;KARGOM NEREDE</h2></td>
      </tr>
      <tr height="40">
          <td align="center" style="border-bottom: 1px dashed #A7A7A7"><b>Siparişlerinizi bu ekrandan takip edebilirsiniz</b></td>
      </tr>
      <tr height="100">
          <td align="center"><img src="Resimler/Kargocu.png"></td>
      </tr>
      <tr>
          <td align="center">&nbsp;</td>
      </tr>
      <tr height="40">
          <td align="center"><b>Siparişinizi Takip Edin</b></td>
      </tr>
      <tr>
          <td align="center"><input type="text" placeholder="Kargo Takip Numarası" name="KargoTakipNo" class="KargoTakipInputu"></td>
      </tr>
      <tr height="50">
          <td align="center"><input type="submit" value="Kargo Durumunu Göster" class="KargoTakipButonu"></td>
      </tr>
    </table>
  
</form>