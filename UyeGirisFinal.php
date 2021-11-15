<?php 
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'Frameworks/PHPMailer/src/Exception.php';
require 'Frameworks/PHPMailer/src/PHPMailer.php';
require 'Frameworks/PHPMailer/src/SMTP.php';
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
$MD5liSifre             = md5($UyeGelensifre);

if(($UyeGelenMail != "") and ($UyeGelensifre != "")){
    $BuKayitVarMiYokMi      = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenMail' AND Sifre = '$MD5liSifre' ");
    $BuUyeVarmi             = $BuKayitVarMiYokMi->num_rows;
    if($BuUyeVarmi>0){
        $UyebilgileriniCekmeSorgusu = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Email = '$UyeGelenMail'");
        $KayitliKullanici           = $UyebilgileriniCekmeSorgusu->fetch_assoc();
        if($KayitliKullanici["Durumu"]=="Aktif"){
            $_SESSION["Kullanici"]  =   GeriDöndür($KayitliKullanici["KullaniciAdi"]);
            
            
              if(isset($_COOKIE["83CerezTA"]) and isset($_COOKIE["83CerezUID"])){
                header("Location:" . $_COOKIE["83CerezLinki"]); //geldiği ürünün sayfasına
                exit();        
              }else{
                header("Location:Hesabim");   //Üyelik Bilgilerim sayfasına
                exit();   
              }            

        }else{
          $TekrarAktivasyonIcerigi = "Merhaba Sayın " . GeriDöndür($KayitliKullanici["isimSoyisim"]) . "<br /><br /> Sitemize Yapmış olduğunuz Üyelik Kaydını tamamlamak için <a href='".$SiteLinki."/AktiveEt/AktivasyonKodu=" . $KayitliKullanici["AktivasyonKodu"] . "/Email=" . $UyeGelenMail . " '>BURAYA TIKLAYINIZ</a>";
            
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
            $mail->addAddress(GeriDöndür($UyeGelenMail), GeriDöndür($KayitliKullanici["isimSoyisim"]));     //Add a recipient
            //$mail->addReplyTo(GeriDöndür($IletisimGelenEmail), GeriDöndür($IletisimGelenIsim));

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = GeriDöndür($SiteAdi) . 'Üyelik Aktivasyonu';
            $mail->MsgHTML($TekrarAktivasyonIcerigi);

            $mail->send();
              

            header("Location:AktivasyonGerekli");   //aktivasyonsuz hesap
            exit();   
            }catch(Exception $e){
                  header("Location:GirisFBasarisiz");
                  exit();
            }
        }
        
        
    }else{
        header("Location:UyeBilgileriYanlis");
        exit();
          }
    }else{
        header("Location:UyeBilgileriEksik");
        exit();
    }
?>