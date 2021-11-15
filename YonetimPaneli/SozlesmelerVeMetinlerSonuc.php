<?php if(isset($_SESSION["Yonetici"])){
                    
    if(isset($_POST["HakkimizdaMetni"])){
        $GelenHakkimizdaMetni = GuvenlikFiltresi($_POST["HakkimizdaMetni"]);
    }else{
        $GelenHakkimizdaMetni = "";
    }
    //--------------------------------------------
    if(isset($_POST["UyelikSozlesmesiMetni"])){
        $GelenUyelikSozlesmesiMetni = GuvenlikFiltresi($_POST["UyelikSozlesmesiMetni"]);
    }else{
        $GelenUyelikSozlesmesiMetni = "";
    }
    //--------------------------------------------
    if(isset($_POST["KullanimKosullariMetni"])){
        $GelenKullanimKosullariMetni = GuvenlikFiltresi($_POST["KullanimKosullariMetni"]);
    }else{
        $GelenKullanimKosullariMetni = "";
    }
    //--------------------------------------------
    if(isset($_POST["GizlilikSozlesmesiMetni"])){
        $GelenGizlilikSozlesmesiMetni = GuvenlikFiltresi($_POST["GizlilikSozlesmesiMetni"]);
    }else{
        $GelenGizlilikSozlesmesiMetni = "";
    }
    //--------------------------------------------
    if(isset($_POST["MesafeliSatisSozlesmesiMetni"])){
        $GelenMesafeliSatisSozlesmesiMetni = GuvenlikFiltresi($_POST["MesafeliSatisSozlesmesiMetni"]);
    }else{
        $GelenMesafeliSatisSozlesmesiMetni = "";
    }
    //--------------------------------------------
    if(isset($_POST["TeslimatMetni"])){
        $GelenTeslimatMetni = GuvenlikFiltresi($_POST["TeslimatMetni"]);
    }else{
        $GelenTeslimatMetni = "";
    }
    //--------------------------------------------
    if(isset($_POST["IptalIadeDegisimMetni"])){
        $GelenIptalIadeDegisimMetni = GuvenlikFiltresi($_POST["IptalIadeDegisimMetni"]);
    }else{
        $GelenIptalIadeDegisimMetni = "";
    }
    //--------------------------------------------

    if(($GelenHakkimizdaMetni != "") and ($GelenUyelikSozlesmesiMetni != "") and ($GelenKullanimKosullariMetni != "") and ($GelenGizlilikSozlesmesiMetni != "") and ($GelenMesafeliSatisSozlesmesiMetni != "") and ($GelenTeslimatMetni != "") and ($GelenIptalIadeDegisimMetni != "")){

        $KayitGuncellemeQuery = $DataBaseConnection->prepare("UPDATE  sozlesmelervemetinler SET HakkimizdaMetni = ?, UyelikSozlesmesiMetni = ?, KullanimKosullariMetni = ?, GizlilikSozlesmesiMetni = ?, MesafeliSatisSozlesmesiMetni = ?, TeslimatMetni = ?, IptalIadeDegisimMetni = ? LIMIT 1");
        $KayitGuncellemeQuery->bind_param("sssssss", $GelenHakkimizdaMetni, $GelenUyelikSozlesmesiMetni, $GelenKullanimKosullariMetni, $GelenGizlilikSozlesmesiMetni, $GelenMesafeliSatisSozlesmesiMetni, $GelenTeslimatMetni, $GelenIptalIadeDegisimMetni);
        $KayitGuncellemeQuery->execute();
        $etkilenenKayitSayisi = $DataBaseConnection->affected_rows;



        if($etkilenenKayitSayisi>0){
            header("Location:index.php?SKI=3"); //başarılı
            exit();
        }else{
            header("Location:index.php?SKI=7"); //hata
            exit();
        }
    }else{
        header("Location:index.php?SKI=7"); // hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>