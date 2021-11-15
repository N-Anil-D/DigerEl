<?php 
if(isset($_SESSION["Yonetici"])){
      
    if(isset($_POST["SiparisNo"])){
        $GelenSiparisNo = SadeceSayilar($_POST["SiparisNo"]);
    }else{
        $GelenSiparisNo = "";
    }
    //--------------------------------------------
    if(isset($_POST["Kargo"])){
        $GelenKargo = GuvenlikFiltresi($_POST["Kargo"]);
    }else{
        $GelenKargo = "";
    }
    //--------------------------------------------

    if(($GelenSiparisNo != "") and ($GelenKargo!= "")){

        $KayitCek = $DataBaseConnection->query("UPDATE siparisler SET KargoDurumu = 1, KargoGonderiKodu = '$GelenKargo', OnayDurumu = 1 WHERE SiparisNumarasi = $GelenSiparisNo ");

        if($KayitCek){
            header("Location:index.php?SKI=97"); //tamamlanan siparişler
            exit();
        }else{
            header("Location:index.php?SKI=100"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=100"); //hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>