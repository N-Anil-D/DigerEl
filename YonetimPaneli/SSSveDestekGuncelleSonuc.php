<?php
if(isset($_SESSION["Yonetici"])){

    if(isset($_POST["SSS_KayitID"])){
        $GelenSSS_KayitID = SadeceSayilar($_POST["SSS_KayitID"]);
    }else{
        $GelenSSS_KayitID = "";
    }
    //--------------------------------------------
    if(isset($_POST["soru"])){
        $Gelensoru = GuvenlikFiltresi($_POST["soru"]);
    }else{
        $Gelensoru = "";
    }
    //--------------------------------------------
    if(isset($_POST["cevap"])){
        $Gelencevap = GuvenlikFiltresi($_POST["cevap"]);
    }else{
        $Gelencevap = "";
    }
//--------------------------------------------


if(($Gelensoru != "") and ($Gelencevap != "")){
    
    
    $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE sss SET soru = ?, cevap = ? WHERE id=$GelenSSS_KayitID");
    $KayitGuncellemeQuery->bind_param("ss", $Gelensoru, $Gelencevap);
    $KayitGuncellemeQuery->execute();
    $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;

    

        if($etkilenenKayitSayisi>0){
            header("Location:index.php?SKI=17"); //Çalıştı
            exit();
        }else{
            header("Location:index.php?SKI=42");
            exit();
        }
    }else{
        header("Location:index.php?SKI=42");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>