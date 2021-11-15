<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';




if(isset($_POST["IsimSoyisim"])){
    $IletisimGelenIsim = GuvenlikFiltresi($_POST["IsimSoyisim"]);
}else{
    $IletisimGelenIsim = "";
}
//--------------------------------------------
if(isset($_POST["Email"])){
    $IletisimGelenEmail = GuvenlikFiltresi($_POST["Email"]);
}else{
    $IletisimGelenEmail = "";
}
//--------------------------------------------
if(isset($_POST["telefonNum"])){
    $IletisimGelenTelefon = SadeceSayilar($_POST["telefonNum"]);
}else{
    $IletisimGelenTelefon = "";
}
//--------------------------------------------
//--------------------------------------------
if(isset($_POST["Mesaj"])){
    $IletisimGelenMesaj = GuvenlikFiltresi($_POST["Mesaj"]);
}else{
    $IletisimGelenMesaj = "";
}
//--------------------------------------------


if(($IletisimGelenIsim != "") and ($IletisimGelenEmail != "") and ($IletisimGelenTelefon != "") and ($IletisimGelenMesaj != "")){

    $mailicerigi = "İsim Soyisim : " .$IletisimGelenIsim . "<br /> E-mail adresi : " . $IletisimGelenEmail . "<br /> Telefon Numarası : " . $IletisimGelenTelefon . "<br /><br />" . $IletisimGelenMesaj; 


    $mail = new PHPMailer(true);

    try {

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
        $mail->addAddress(GeriDöndür($SiteEmailAdresi), GeriDöndür($SiteAdi));     //Add a recipient
        $mail->addReplyTo(GeriDöndür($IletisimGelenEmail), GeriDöndür($IletisimGelenIsim));

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = GeriDöndür($SiteAdi) . 'İletişim Formu';
        $mail->MsgHTML($mailicerigi);

        $mail->send();

        header("Location:IletisimFBasarili");
        exit();

    } catch (Exception $e) {
          header("Location:IletisimFBasarisiz");
          exit();
    }
}else{
      header("Location:IletisimFEksikVeri");
      exit();    
}
?>