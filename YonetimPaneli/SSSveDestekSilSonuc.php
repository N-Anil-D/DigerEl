<?php 
if(isset($_SESSION["Yonetici"])){
                    
if(isset($_GET["SID"])){
    $SSS_ID = SadeceSayilar($_GET["SID"]);
}else{
    $SSS_ID = "";
}

if($SSS_ID != ""){
    
    $KayitCek = $DataBaseConnection->prepare("SELECT * FROM sss WHERE id = ? LIMIT 1");
    $KayitCek->bind_param("i", $SSS_ID);
    $KayitCek->execute();
    $KayitCek->bind_result($SSS_id,$SSS_soru,$SSS_cevap);
    while($KayitCek->fetch()){
        $X = "Kayitli";
    }
    if($X == "Kayitli"){
        
        $KayitSil = $DataBaseConnection->prepare("DELETE FROM sss WHERE id = ? LIMIT 1");
        $KayitSil->bind_param("i", $SSS_ID);
        $KayitSil->execute();
        $SilinenKayitSayisi = $DataBaseConnection->affected_rows;

        if($SilinenKayitSayisi){
                header("Location:index.php?SKI=3"); //Çalıştı
                exit();
            }
        }else{
            header("Location:index.php?SKI=44"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=44"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>