<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';

if(isset($_POST["IsimSoyisim"])){
    $UyeGelenIsim = GuvenlikFiltresi($_POST["IsimSoyisim"]);
}else{
    $UyeGelenIsim = "";
}
//--------------------------------------------
if(isset($_POST["KullaniciAdi"])){
    $UyeGelenKullaniciAdi = GuvenlikFiltresi($_POST["KullaniciAdi"]);
}else{
    $UyeGelenKullaniciAdi = "";
}
//--------------------------------------------

if(isset($_POST["Email"])){
    $UyeGelenMail = GuvenlikFiltresi($_POST["Email"]);
}else{
    $UyeGelenMail = "";
}
//--------------------------------------------
if(isset($_POST["sifre"])){
    $UyeGelensifre = GuvenlikFiltresi($_POST["sifre"]);
}else{
    $UyeGelensifre = "";
}
//--------------------------------------------

if(isset($_POST["sifre2"])){
    $UyeGelensifre2 = GuvenlikFiltresi($_POST["sifre2"]);
}else{
    $UyeGelensifre2 = "";
}
//--------------------------------------------
if(isset($_POST["telefonNum"])){
    $UyeGelenTelefon = SadeceSayilar($_POST["telefonNum"]);
}else{
    $UyeGelenTelefon = "";
}
//--------------------------------------------
if(isset($_POST["SozlesmeOnay"])){
    $UyeGelenOnay = SadeceSayilar($_POST["SozlesmeOnay"]);
}else{
    $UyeGelenOnay = "";
}
//--------------------------------------------
$UyeninAktivasyonKodu   = AktivasyonKoduUret();
if($UyeGelensifre == $UyeGelensifre2){
    $MD5liSifre             = md5($UyeGelensifre);
}
    
if($UyeGelensifre == $UyeGelensifre2 and $UyeGelenOnay == 1){
    
    if(($UyeGelenIsim != "") and ($UyeGelenMail != "") and ($UyeGelensifre != "") and ($UyeGelenTelefon != "") and ($UyeGelenKullaniciAdi != "")){
        $BuKayitVarMiYokMi      = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenMail' ");
        $BuMailVarmi            = $BuKayitVarMiYokMi->num_rows;
        
        if($BuMailVarmi>0){
            header("Location:ZatenKayitli");
            exit();
        }else{
            $Durum = "Pasif";
            $UyeKayitQuery =$DataBaseConnection->prepare("INSERT INTO uyeler (isimSoyisim, KullaniciAdi, Email, Sifre, TelefonNum, Durumu, KayitTarihi, KayitIPadresi, AktivasyonKodu) 
            VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");

            $UyeKayitQuery->bind_param("ssssssiss", $UyeGelenIsim, $UyeGelenKullaniciAdi, $UyeGelenMail ,$MD5liSifre, $UyeGelenTelefon, $Durum, $zaman, $IPAdresi, $UyeninAktivasyonKodu);
            $UyeKayitQuery->execute();
            $etkilenenKayitSayisi   = $DataBaseConnection->affected_rows;

                  if($etkilenenKayitSayisi>0){
                      $AktivasyonIcerigi = "Merhaba Sayın " . $UyeGelenIsim . "<br /><br /> Sitemize Yapmış olduğunuz Üyelik Kaydını tamamlamak için <a href='".$SiteLinki."/AktiveEt/AktivasyonKodu=" . $UyeninAktivasyonKodu . "/Email=" . $UyeGelenMail . " '>BURAYA TIKLAYINIZ</a>";

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
                        $mail->addAddress(GeriDöndür($UyeGelenMail), $UyeGelenKullaniciAdi);     //Add a recipient
                        //$mail->addReplyTo(GeriDöndür($IletisimGelenEmail), GeriDöndür($IletisimGelenIsim));

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = GeriDöndür($SiteAdi) . 'Yeni üyelik Aktivasyonu';
                        $mail->MsgHTML($AktivasyonIcerigi);

                        $mail->send();

                        header("Location:YeniUyeOlFBasarili");
                        exit();        
                        }catch(Exception $e){
                              header("Location:YeniUyeOlFBasarisiz");
                              exit();
                        }
                  }else{
                      header("Location:YeniUyeOlFBasarisiz");
                      exit();
                  }
          }
    }else{
        header("Location:YeniUyeOlFEksikVeri");
        exit();
    }
}else{
    header("Location:YeniUyeOlFBasarisiz");
    exit();
}
?>