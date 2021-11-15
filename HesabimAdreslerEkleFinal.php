<?php 
if(isset($_SESSION["Kullanici"])){ 
    

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
        $UyeGelenAdresTelefon = SadeceSayilar($_POST["AdresTelefon"]);
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

    
    if(($UyeGelenAdresIsimSoyisim != "") and ($UyeGelenAdresIl != "") and ($UyeGelenAdresIlce != "") and ($UyeGelenAdresTelefon != "") and ($UyeGelenAdresinKendisi != "")){
        
        
            $AdresEkleQuery = $DataBaseConnection->prepare("INSERT INTO adresler (UyeID, AdiSoyadi, il, ilce, Telefon, Adres) VALUES(?, ?, ?, ?, ?, ?) ");
            $AdresEkleQuery->bind_param("isssss", $Uyeid, $UyeGelenAdresIsimSoyisim, $UyeGelenAdresIl ,$UyeGelenAdresIlce, $UyeGelenAdresTelefon, $UyeGelenAdresinKendisi);
            $AdresEkleQuery->execute();
            $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

        if($etkilenenKayitSayisi>0){
            header("Location:Adreslerim");//tamam
            exit();
        }else{
            header("Location:AdresEkleFBasarisiz");//hata
            exit();
        }
    }else{    
        header("Location:AdresEkleFEksikVeri");//eksik bilgi
        exit();
    }
}else{    
    header("Location:AnaSayfa");
    exit();
}
?>