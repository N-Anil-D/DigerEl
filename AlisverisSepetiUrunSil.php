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
    echo "TA : " . $TabloAdi . "<br />UID : " . $Urunid . "<br />SepetNum : " . $SepetNum . "<br />";
//--------------------------------------------

    if($TabloAdi != "" and $Urunid != "" and $SepetNum != ""){
        
        $SepetSilQuery   = $DataBaseConnection->prepare("DELETE FROM sepet WHERE SepetNumarasi= ? AND UyeID = ? AND TabloAdi = ? AND UrunID = ? LIMIT 1");
        $SepetSilQuery->bind_param("iisi",$SepetNum,$Uyeid,$TabloAdi,$Urunid);
        $SepetSilQuery->execute();
        $SilindiMi       = $DataBaseConnection->affected_rows;

        if($SilindiMi>0){
            header("Location:Sepetim");//silindi
            exit();
        }else{
            header("Location:Sepetim");//silinmedi, Query Fail
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