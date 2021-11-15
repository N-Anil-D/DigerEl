<?php 
if(isset($_SESSION["Yonetici"])){

    if(isset($_GET["UrunID"])){
        $UrunID = SadeceSayilar($_GET["UrunID"]);
    }else{
        $UrunID = "";
    }
/*------------------------------------------------------- */
    if(isset($_GET["TA"])){
        $TA = GuvenlikFiltresi($_GET["TA"]);
    }else{
        $TA = "";
    }

    if($UrunID != "" and $TA != ""){

        $KayitCek = $DataBaseConnection->query("SELECT * FROM $TA WHERE id = $UrunID LIMIT 1");
        if($KayitCek->num_rows){
            $X = "Kayitli";
        }
        if($X == "Kayitli"){
            $DurumunuGuncelle   = 1;
            $AktiveEt = $DataBaseConnection->prepare("UPDATE $TA SET Durumu = ? WHERE id = ? LIMIT 1");
            $AktiveEt->bind_param("ii", $DurumunuGuncelle,$UrunID);
            $AktiveEt->execute();
            $KayitSayisi = $DataBaseConnection->affected_rows;

            if($KayitSayisi){
                header("Location:index.php?SKI=3");
                exit();
            }else{
                header("Location:index.php?SKI=95"); //hata
                exit();
            }
         }else{
            header("Location:index.php?SKI=95"); //hata
            exit();
         }
    }else{
        header("Location:index.php?SKI=95"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
}


?>