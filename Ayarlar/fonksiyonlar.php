<?php 
$IPAdresi   = $_SERVER["REMOTE_ADDR"];
$zaman      = time();
$tarih      = date("d.m.Y H:i:s",$zaman);

$SiteKokDizini = $_SERVER["DOCUMENT_ROOT"];
$ResimDosyalari= "/NADproje/Resimler/";
$VerotIcinKlasorYolu = $SiteKokDizini.$ResimDosyalari;

function TarihBul($degisken){
$ZamaniOku      = date("d.m.Y H:i:s",$degisken);
return $ZamaniOku;
}

function GunAyYil($degisken){
$ZamaniOku      = date("d.m.Y",$degisken);
return $ZamaniOku;
}

function UcGunSonrasiniBul(){
global $zaman;
$BirGunSaniye   = 86400;
$ArtiUcGun      = $zaman+(3*$BirGunSaniye);
$ZamaniOku      = date("d.m.Y",$ArtiUcGun);
return $ZamaniOku;
}

function FiyatBicimlendir($degisken){
    $Bicimlendir        = number_format($degisken, "2", ",", ".");
    return $Bicimlendir;
}
function FiyatGuncelle($degisken){
    $Bicimlendir        = number_format($degisken, "2", ".", " ");
    return $Bicimlendir;
}

function GeriDöndür($degisken){
    $ComeBackTags       =htmlspecialchars_decode($degisken,ENT_QUOTES);
    return $ComeBackTags;
}

function BosluklariSil($degisken){
    $bosluksuzyaz       = preg_replace("/\s|&nbsp;/", "", $degisken);
    return $bosluksuzyaz;
}

function GuvenlikFiltresi($degisken){
    $deletespace        = trim($degisken);
    $notag              = strip_tags($deletespace);
    $nopecialcharacter  = htmlspecialchars($notag, ENT_QUOTES);
    $DisaAktar          = $nopecialcharacter;
    return $DisaAktar;
}

function SadeceSayilariTut($degisken){
    $KillLettersAndSymbols        = preg_replace("/[^0-9]/","",$degisken);
    return $KillLettersAndSymbols;
}

function SadeceSayilar($degisken){
    $deletespace        = trim($degisken);
    $notag              = strip_tags($deletespace);
    $nopecialcharacter  = htmlspecialchars($notag);
    $cllear             = SadeceSayilariTut($nopecialcharacter);
    return $cllear;
}

function SayiNokta($degisken){
    $ifade    =   GuvenlikFiltresi($degisken);
    $Degistir = preg_replace("/[^0-9\.]/", "", $ifade);
	$Islem    =	str_replace(".", "X", $Degistir, $Sayi);
    if($Sayi>1){
        $Degistir  = preg_replace("/[^0-9]/", "", $ifade);
    }
    return $Degistir;
}      

function ibanBicimlendir($degisken){
    $BoslukSilici       = BosluklariSil($degisken);
    $blok1              = substr($BoslukSilici,0,4);
    $blok2              = substr($BoslukSilici,4,4);
    $blok3              = substr($BoslukSilici,8,4);
    $blok4              = substr($BoslukSilici,12,4);
    $blok5              = substr($BoslukSilici,16,4);
    $blok6              = substr($BoslukSilici,20,4);
    $blok7              = substr($BoslukSilici,24,2);
    $yaz                = $blok1 . " " . $blok2 . " " . $blok3 . " " . $blok4 . " " . $blok5 . " " . $blok6 . " " . $blok7;
    return $yaz;
}

function AktivasyonKoduUret(){
    $IlkBesli               = rand(10000,99999);
    $IKinciBesli            = rand(10000,99999);
    $UcuncuBesli            = rand(10000,99999);
    $AKyaz                  = $IlkBesli . "-" . $IKinciBesli . "-" . $UcuncuBesli; 
    return $AKyaz;
}

function EksidenArtiya($degisken){
    $MinusToPlus        = preg_replace("/-/"," + ",$degisken);
    return $MinusToPlus;
}

function isimOlustur(){
    $newName        = substr(md5(uniqid(time())),0,25);
    return $newName;
}

function CokluisimOlustur($degisken){
    $newName        = substr(md5(uniqid($degisken)),0,25);
    return $newName;
}

function BasHarfiBuyukYap($Icerik){
	$Metin			= mb_convert_case($Icerik, MB_CASE_TITLE, "UTF-8");
    return $Metin;
}

function NeKadar($ParaBirimi,$Fiyat){
    global $DolarKuru;
    global $EuroKuru;
    
    if($ParaBirimi=="USD"){
        $FiyatHesapla = $Fiyat * $DolarKuru;
    }elseif($ParaBirimi=="EUR"){
        $FiyatHesapla = $Fiyat * $EuroKuru;
    }else{
        $FiyatHesapla = $Fiyat;
    }
    $BicimliFiyat = FiyatBicimlendir($FiyatHesapla)." TL";
    return $BicimliFiyat;
}

	function HerKelimeninIlkHarfiniBuyukHarfYap($Deger){
		$Parcala						=	explode(" ", $Deger);
		$KelimeSayisi					=	count($Parcala);
		$KucukHarfler             		=	array("a", "b", "c", "ç", "d", "e", "f", "g", "ğ", "h", "ı", "i", "j", "k", "l", "m", "n", "o", "ö", "p", "r", "s", "ş", "t", "u", "ü", "v", "y", "z", "q", "w", "x");
		$BuyukHarfler             		=	array("A", "B", "C", "Ç", "D", "E", "F", "G", "Ğ", "H", "I", "İ", "J", "K", "L", "M", "N", "O", "Ö", "P", "R", "S", "Ş", "T", "U", "Ü", "V", "Y", "Z", "Q", "W", "X");
		$Sayi							=	1;
		$Duzenle						=	"";
		$Sonuc							=	"";
		
		foreach($Parcala as $Kelime){
			$TemizKelime			=	trim($Kelime);
			$Uzunluk				=	strlen($TemizKelime);
			$IlkHarfiBul			=	mb_substr($TemizKelime, 0, 1, "UTF-8");
			$KalanIcerigiBul		=	mb_substr($TemizKelime, 1, $Uzunluk, "UTF-8");
			$IlkHarfiDuzenle		=	str_replace($KucukHarfler, $BuyukHarfler, $IlkHarfiBul);
			$KalanIcerigiDuzenle	=	str_replace($BuyukHarfler, $KucukHarfler, $KalanIcerigiBul);
			$Duzenle				.=	$IlkHarfiDuzenle . $KalanIcerigiDuzenle . " ";
			if($Sayi==$KelimeSayisi){
				$Sonuc				.=	$Duzenle;
				return $Sonuc;
			}
			
			$Sayi++;
		}
	}

	function SEO($Deger){
		$Icerik			=	trim($Deger);
		$Degisecekler	=	array("ç", "Ç", "ğ", "Ğ", "ı", "İ", "ö", "Ö", "ş", "Ş", "ü", "Ü");
		$Degisenler		=	array("c", "c", "g", "g", "i", "i", "o", "o", "s", "s", "u", "u");
		$Icerik			=	str_replace($Degisecekler, $Degisenler, $Icerik);
		$Icerik			=	mb_strtolower($Icerik, "UTF-8");
		$Icerik			=	preg_replace("/[^a-z0-9.]/", "-", $Icerik);
		$Icerik			=	preg_replace("/-+/", "-", $Icerik);
		$Icerik			=	trim($Icerik, "-");
		return $Icerik;
	}


?>