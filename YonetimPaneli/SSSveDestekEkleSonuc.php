<?php if(isset($_SESSION["Yonetici"])){
                    
    if(isset($_POST["Soru"])){
        $GelenSoru = GuvenlikFiltresi($_POST["Soru"]);
    }else{
        $GelenSoru = "";
    }
    //--------------------------------------------
    if(isset($_POST["Cevap"])){
        $GelenCevap = GuvenlikFiltresi($_POST["Cevap"]);
    }else{
        $GelenCevap = "";
    }
    //--------------------------------------------

    if(($GelenSoru != "") and ($GelenCevap != "")){

        $SSS_Ekle = $DataBaseConnection->prepare("INSERT INTO sss (soru,cevap) values(?,?) LIMIT 1");
        $SSS_Ekle->bind_param("ss", $GelenSoru, $GelenCevap);
        $SSS_Ekle->execute();
        $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;



        if($etkilenenKayitSayisi>0){
            header("Location:index.php?SKI=17"); //başarılı
            exit();
        }else{
            header("Location:index.php?SKI=39"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=39"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>