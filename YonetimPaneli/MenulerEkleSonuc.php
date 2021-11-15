<?php
if(isset($_SESSION["Yonetici"])){
    
    
    if(isset($_POST["UstMenuSecimi"])){
        $GelenUstMenuSecimi = GuvenlikFiltresi($_POST["UstMenuSecimi"]);
    }else{
        $GelenUstMenuSecimi = "";
    }
    //--------------------------------------------
    if(isset($_POST["MenuAdi"])){
        $GelenMenuAdi = GuvenlikFiltresi($_POST["MenuAdi"]);
    }else{
        $GelenMenuAdi = "";
    }
    //-------------------------------------------- 
    if(isset($_POST["TabloAdi"])){
        $GelenTabloAdi = GuvenlikFiltresi($_POST["TabloAdi"]);
    }else{
        $GelenTabloAdi = "";
    }
    //-------------------------------------------- 


    if(($GelenUstMenuSecimi != "") and ($GelenMenuAdi != "") and ($GelenTabloAdi != "")){
    
        $Sifir = 0;
        $UrunTuru = "";

        $Ekle				=	$DataBaseConnection->prepare("INSERT INTO menuler (TabloAdi, UrunTuru, MenuAdi, ustID, UrunSayisi) values (?, ?, ?, ?, ?) LIMIT 1");
        $Ekle->bind_param("sssii",$GelenTabloAdi,$UrunTuru,$GelenMenuAdi,$GelenUstMenuSecimi,$Sifir);
        $Ekle->execute();
        $EkleKontrol       	=	$DataBaseConnection->affected_rows;

        if($EkleKontrol>0){
            header("Location:index.php?SKI=3");
            exit();
        }else{
            header("Location:index.php?SKI=47");
            exit();
        }
    }else{
        header("Location:index.php?SKI=47");
        exit();
    }
}else{
header("Location:index.php?SKD=1");
exit();

}
?>