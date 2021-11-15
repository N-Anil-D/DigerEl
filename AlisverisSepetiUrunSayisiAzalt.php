<?php 
if(isset($_SESSION["Kullanici"])){ 
    
    if(isset($_GET["TA"])){
        $TabloAdi = GuvenlikFiltresi($_GET["TA"]);
    }else{
        $TabloAdi = "";
    }
//--------------------------------------------
    if(isset($_GET["UID"])){
        $Urunid = SadeceSayilar($_GET["UID"]);
    }else{
        $Urunid = "";
    }
//--------------------------------------------
    if(isset($_GET["SN"])){
        $SepetNum = SadeceSayilar($_GET["SN"]);
    }else{
        $SepetNum = "";
    }
//--------------------------------------------

    if($TabloAdi != "" and $Urunid != "" and $SepetNum != ""){
        
        $SepetAzaltQuery   = $DataBaseConnection->prepare("UPDATE sepet SET UrunAdedi=UrunAdedi-1 WHERE SepetNumarasi= ? AND UyeID = ? AND TabloAdi = ? AND UrunID = ? LIMIT 1");
        $SepetAzaltQuery->bind_param("iisi",$SepetNum,$Uyeid,$TabloAdi,$Urunid);
        $SepetAzaltQuery->execute();
        $AzaldiMi       = $DataBaseConnection->affected_rows;

        if($AzaldiMi>0){
            header("Location:Sepetim");//azalttı
            exit();
        }else{
            header("Location:Sepetim");//azaltamadı, Query Fail
            exit();
        }
    }else{ 
        header("Location:AnaSayfa");//değerler boş
        exit();
    }
}else{    
    header("Location:index.php");//kullanıcı yok
    exit();
}
?>