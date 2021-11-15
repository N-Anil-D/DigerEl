<?php 
if(isset($_POST["KargoTakipNo"])){
    $KargoTakipNo = SadeceSayilariTut($_POST["KargoTakipNo"]);
}else{
    $KargoTakipNo = "";
}
//--------------------------------------------
    
    if($KargoTakipNo!=""){
        header("Location:https://www.yurticikargo.com/tr/online-servisler/gonderi-sorgula?code=" . $KargoTakipNo);
        exit();        
    }else{
        header("Location:index.php?SK=14");
        exit();
    }
?>