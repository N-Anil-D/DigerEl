<?php 
if(empty($_SESSION["Yonetici"])){
if(isset($_POST["YoneticiKullanici"])){
    $YoneticiKullanici = GuvenlikFiltresi($_POST["YoneticiKullanici"]);
}else{
    $YoneticiKullanici = "";
}
//--------------------------------------------
if(isset($_POST["YoneticiSifre"])){
    $YoneticiSifre = GuvenlikFiltresi($_POST["YoneticiSifre"]);
}else{
    $YoneticiSifre = "";
}
//--------------------------------------------
$MD5liSifre             = md5($YoneticiSifre);
    
if(($YoneticiKullanici != "") and ($YoneticiSifre != "")){
    $BuKayitVarMiYokMi      = $DataBaseConnection->query("SELECT * FROM yoneticiler WHERE YoneticiKimligi = '$YoneticiKullanici' AND Sifre = '$MD5liSifre' ");
    $BuUyeVarmi             = $BuKayitVarMiYokMi->num_rows;
    $KayitliYonetici        = $BuKayitVarMiYokMi->fetch_assoc();
    if($BuUyeVarmi>0){
            $_SESSION["Yonetici"]  =   GeriDöndür($KayitliYonetici["YoneticiKimligi"]);
            
            header("Location:index.php?SKD=0&SKI=0"); //yönetici session ı açılınca ana sayfaya sayfa değerleri boş olarak at
            exit();

        
    }else{
        header("Location:index.php?SKD=3"); //bu yonetici yoksa hataya at
        exit();
          }
    }else{
        header("Location:index.php?SKD=1"); //değerler boşsa
        exit();
    }
}else{
    header("Location:index.php?SKD=0"); //yönetici session u varsa
    exit();
}
?>