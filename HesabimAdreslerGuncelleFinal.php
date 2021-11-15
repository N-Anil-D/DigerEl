<?php 
if(isset($_SESSION["Kullanici"])){ 
    
    if(isset($_GET["AdresID"])){
        $UyeAdresid = SadeceSayilar($_GET["AdresID"]);
    }else{
        $UyeAdresid = "";
    }
//-------------------------------------------------------------------------------------
    if(isset($_POST["AdresIsimSoyisim"])){
        $UyeGelenAdresIsimSoyisim = GuvenlikFiltresi($_POST["AdresIsimSoyisim"]);
    }else{
        $UyeGelenAdresIsimSoyisim = "";
    }
//-------------------------------------------------------------------------------------
    if(isset($_POST["AdresIl"])){
        $UyeGelenAdresIl = GuvenlikFiltresi($_POST["AdresIl"]);
    }else{
        $UyeGelenAdresIl = "";
    }
//-------------------------------------------------------------------------------------
    if(isset($_POST["AdresIlce"])){
        $UyeGelenAdresIlce = GuvenlikFiltresi($_POST["AdresIlce"]);
    }else{
        $UyeGelenAdresIlce = "";
    }
//-------------------------------------------------------------------------------------
    if(isset($_POST["AdresTelefon"])){
        $UyeGelenAdresTelefon = GuvenlikFiltresi($_POST["AdresTelefon"]);
    }else{
        $UyeGelenAdresTelefon = "";
    }
//-------------------------------------------------------------------------------------
    if(isset($_POST["AdresinKendisi"])){
        $UyeGelenAdresinKendisi = GuvenlikFiltresi($_POST["AdresinKendisi"]);
    }else{
        $UyeGelenAdresinKendisi = "";
    }
//-------------------------------------------------------------------------------------

    
    if(($UyeGelenAdresIsimSoyisim != "") and ($UyeGelenAdresIl != "") and ($UyeGelenAdresIlce != "") and ($UyeGelenAdresTelefon != "") and ($UyeGelenAdresinKendisi != "") and ($UyeAdresid != "")){
        
        
            $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE adresler SET AdiSoyadi = ?, il = ?, ilce = ?, Telefon = ?, Adres = ? WHERE id = ? AND UyeID = ? LIMIT 1");
            $KayitGuncellemeQuery->bind_param("sssssii", $UyeGelenAdresIsimSoyisim, $UyeGelenAdresIl, $UyeGelenAdresIlce ,$UyeGelenAdresTelefon, $UyeGelenAdresinKendisi, $UyeAdresid, $Uyeid);
            $KayitGuncellemeQuery->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

        if($etkilenenKayitSayisi>0){
            header("Location:Adreslerim");//tamam
            exit();
        }else{
            header("Location:AdresGuncelleFBasarisiz");//hata
            exit();
        }
    }else{    
        header("Location:AdresGuncelleFEksikVeri");//eksik bilgi
        exit();
    }
}else{    
    header("Location:AnaSayfa");
    exit();
}
?>