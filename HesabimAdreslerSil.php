<?php 
if(isset($_SESSION["Kullanici"])){ 
    
    if(isset($_GET["AdresID"])){
        $UyeAdresid = SadeceSayilar($_GET["AdresID"]);
    }else{
        $UyeAdresid = "";
    }
//--------------------------------------------

    if($UyeAdresid != ""){
        $AdresSilQuery   = $DataBaseConnection->query("DELETE FROM adresler WHERE id = '$UyeAdresid' AND UyeID = '$Uyeid' LIMIT 1");
        $SilindiMi       = $DataBaseConnection->affected_rows;
        
        if($SilindiMi>0){
            header("Location:Adreslerim");//silindi
            exit();
        }else{
            header("Location:AdresSilBasarisiz");//Query fail
            exit();
        }
    }else{
        header("Location:AdresSilBasarisiz");//AdresID YOK
        exit();
    }
}else{    
    header("Location:AnaSayfa");//session yok
    exit();
}
?>