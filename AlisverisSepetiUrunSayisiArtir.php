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
        
        $SepetArttirQuery   = $DataBaseConnection->prepare("UPDATE sepet SET UrunAdedi=UrunAdedi+1 WHERE SepetNumarasi= ? AND UyeID = ? AND TabloAdi = ? AND UrunID = ? LIMIT 1");
        $SepetArttirQuery->bind_param("iisi",$SepetNum,$Uyeid,$TabloAdi,$Urunid);
        $SepetArttirQuery->execute();
        $ArttiMi       = $DataBaseConnection->affected_rows;

        if($ArttiMi>0){
            header("Location:Sepetim");//artti
            exit();
        }else{
            header("Location:Sepetim");//artmadi, Query Fail
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