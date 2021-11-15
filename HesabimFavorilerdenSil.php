<?php 
if(isset($_SESSION["Kullanici"])){
    
    if(isset($_GET["FavID"])){
        $GelenFavUrunID = SadeceSayilar($_GET["FavID"]);
    }else{
        $GelenFavUrunID = "";
    }
//--------------------------------------------
    if(isset($_GET["FavUrunTablo"])){
        $GelenTablo = GuvenlikFiltresi($_GET["FavUrunTablo"]);
    }else{
        $GelenTablo = "";
    }
    
//--------------------------------------------    
    if($GelenFavUrunID != "" and $GelenTablo != ""){
        
        $FavoriSil       = $DataBaseConnection->prepare("DELETE FROM favoriler WHERE TabloAdi = ? AND Urunid = ? AND UyeID = ? LIMIT 1");
        $FavoriSil->bind_param("sii",$GelenTablo, $GelenFavUrunID, $Uyeid);
        $FavoriSil->execute();
        $SilindiMi       = $DataBaseConnection->affected_rows;

        if($SilindiMi>0){
            header("Location:Favorilerim/1");//silindi
            exit();
        }else{
            header("Location:FavoriSilBasarisiz");//silinemedi
            exit();
        }
    }else{
        header("Location:FavoriSilBasarisiz");//AdresID YOK
        exit();
    }
}else{    
    header("Location:AnaSayfa");//session yok
    exit();
}
?>