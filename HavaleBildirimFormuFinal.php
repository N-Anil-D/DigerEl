<?php 
if(isset($_POST["IsimSoyisim"])){
    $HBFGelenIsim = GuvenlikFiltresi($_POST["IsimSoyisim"]);
}else{
    $HBFGelenIsim = "";
}
//--------------------------------------------
if(isset($_POST["Email"])){
    $HBFGelenEmail = GuvenlikFiltresi($_POST["Email"]);
}else{
    $HBFGelenEmail = "";
}
//--------------------------------------------
if(isset($_POST["telefonNum"])){
    $HBFGelenTelefon = SadeceSayilar($_POST["telefonNum"]);
}else{
    $HBFGelenTelefon = "";
}
//--------------------------------------------
if(isset($_POST["BankaSecimi"])){
    $HBFGelenBankaSecimi = GuvenlikFiltresi($_POST["BankaSecimi"]);
}else{
    $HBFGelenBankaSecimi = "";
}
//--------------------------------------------
if(isset($_POST["Aciklama"])){
    $HBFGelenAciklama = GuvenlikFiltresi($_POST["Aciklama"]);
}else{
    $HBFGelenAciklama = "";
}
//--------------------------------------------

    
if(($HBFGelenIsim != "") and ($HBFGelenEmail != "") and ($HBFGelenTelefon != "") and ($HBFGelenBankaSecimi != "")){
$Durum = "Beklemede";
    
$quueryHBF     =$DataBaseConnection->prepare("INSERT INTO havalebildirimleri(BankaAdi, AdiSoyadi, EmailAdresi, TelefonNum, Aciklama, islemTarihi, durum) VALUES(?, ?, ?, ?, ?, ?, ?)");
$quueryHBF->bind_param("sssisis", $HBFGelenBankaSecimi, $HBFGelenIsim, $HBFGelenEmail, $HBFGelenTelefon, $HBFGelenAciklama, $zaman, $Durum);
$quueryHBF->execute();
$quueryHBF->store_result();
    
    if($DataBaseConnection->affected_rows){
        header("Location:hbffBasarili");
        exit();        
    }else{
        header("Location:hbffBasarisiz");
        exit();
    }
}else{
    header("Location:hbffEksikVeri");
    exit();
}
?>