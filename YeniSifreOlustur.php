<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';

if(isset($_GET["AktivasyonKodu"])){
    $UyeGelenAktivasyonKodu = GuvenlikFiltresi($_GET["AktivasyonKodu"]);
}else{
    $UyeGelenAktivasyonKodu = "";
}
//--------------------------------------------
if(isset($_GET["Email"])){
    $UyeGelenEmail = GuvenlikFiltresi($_GET["Email"]);
}else{
    $UyeGelenEmail = "";
}
//--------------------------------------------
    
if(($UyeGelenEmail != "") and ($UyeGelenAktivasyonKodu != "")){
    $BuKayitVarMiYokMi      = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenEmail' AND AktivasyonKodu = '$UyeGelenAktivasyonKodu' ");
    $BuUyeVarmi             = $BuKayitVarMiYokMi->num_rows;

    if($BuUyeVarmi>0){?>


<script type="text/javascript">
    window.history.forward();
    function noBack() {
        window.history.forward();
    }
</script>


<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td width="520" valign="top">
          <form action="YeniSifreOlusturF" method="post">
              <table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
                  <tr height="50">
                      <td style="color: #FF9900" align="center"><h3>Yeni Şifre Oluştur</h3></td>
                  </tr>

                  <tr height="40">
                      <td valign="top" style="border-bottom: 2px dashed #A7A7A7"></td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="bottom" align="center" style="color: #000000">Şifre</td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="top" align="center"><input type="password" name="sifre" class="InputAlanlariTEKLI" placeholder="Şifre"></td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="center" style="color: #000000">Şifre Tekrarı</td>
                  </tr>
                                                      
                  <tr height="30">
                      <td valign="top" align="center"><input type="password" name="sifre2" class="InputAlanlariTEKLI" placeholder="Şifre"></td>
                  </tr>
                  <input type="hidden" value="<?php echo $UyeGelenEmail ?>" name="UyeMail">
                  <input type="hidden" value="<?php echo $UyeGelenAktivasyonKodu ?>" name="AktivasyonKodu">
                  <tr height="80">
                      <td align="center"><input type="submit" value="Şifremi Güncelle" class="YesiButon"></td>
                  </tr>
                  

              </table>
          </form>
      </td>
  </tr>
</table><?php 
    }else{
        header("Location:AnaSayfa");
        exit();
    }
}else{
    header("Location:AnaSayfa");
    exit();
}


?>