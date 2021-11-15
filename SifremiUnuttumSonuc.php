<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';
//--------------------------------------------

if(isset($_POST["Email"])){
    $UyeGelenMail = GuvenlikFiltresi($_POST["Email"]);
}else{
    $UyeGelenMail = "";
}
//--------------------------------------------
if(($UyeGelenMail != "")){
    $BuKayitVarMiYokMi      = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenMail' LIMIT 1");
    $BuUyeVarmi             = $BuKayitVarMiYokMi->num_rows;

    if($BuUyeVarmi>0){
        $KayitliKullanici           = $BuKayitVarMiYokMi->fetch_assoc();

        $SifreSifirlamaMaili = "Merhaba Sayın ".GeriDöndür($KayitliKullanici["isimSoyisim"])."<br /><br /> DigerEl.com ' daki Hesabınızın şifrenizi sıfırlayıp yeni şifre oluşturmak için lütfen <a href='".$SiteLinki."/YeniSifreOlustur/" . $KayitliKullanici["AktivasyonKodu"] . "/Email=" . $KayitliKullanici["Email"] . " '>BURAYA TIKLAYINIZ</a>
        <br /><br /><br />Mail talebini SİZ OLUŞTURMADIYSANIZ bu mail'e itibar etmeyiniz ve lütfen bize bildirin";
        $mail = new PHPMailer(true);

        try{
          //Server settings
          $mail->SMTPDebug = 0;                                       //Enable verbose debug output
          $mail->isSMTP();                                            //Send using SMTP
          $mail->Host       = GeriDöndür($SiteEmailHost);             //Set the SMTP server to send through
          $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
          $mail->Username   = GeriDöndür($SiteEmailAdresi);           //SMTP username
          $mail->Password   = GeriDöndür($SiteEmailSiftesi);          //SMTP password
          $mail->SMTPSecure = 'tls';                                  //Enable implicit TLS encryption
          $mail->CharSet    = "UTF-8";
          $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
          $mail->SMTPOptions		=	array(
                                                  'ssl' => array(
                                                      'verify_peer' => false,
                                                      'verify_peer_name' => false,
                                                      'allow_self_signed' => true
                                                       )
                                                    );

          //Recipients
          $mail->setFrom(GeriDöndür($SiteEmailAdresi), GeriDöndür($SiteAdi));
          $mail->addAddress(GeriDöndür($KayitliKullanici["Email"]), GeriDöndür($KayitliKullanici["isimSoyisim"]));     //Add a recipient
          $mail->addReplyTo(GeriDöndür($SiteEmailAdresi), GeriDöndür($SiteAdi));

          //Content
          $mail->isHTML(true);                                  //Set email format to HTML
          $mail->Subject = GeriDöndür($SiteAdi) . 'Şifre Sıfırlama';
          $mail->MsgHTML($SifreSifirlamaMaili);

          $mail->send();

          header("Location:SifremiUnuttumBasarili");
          exit();        
          }catch(Exception $e){
                header("Location:SifremiUnuttumBasasrisiz");
                exit();
          }

        
        
    }else{
        header("Location:SifremiUnuttumUyeBilgileriHatali");
        exit();
          }
    }else{
        header("Location:SifremiUnuttumUyeBilgileriEksik");
        exit();
    }
?>