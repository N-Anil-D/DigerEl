<?php 
if(isset($_SESSION["Yonetici"])){
      
if(isset($_GET["YID"])){
    $YoneticiID = SadeceSayilar($_GET["YID"]);
}else{
    $YoneticiID = "";
}
//--------------------------------------------

if($YoneticiID != ""){
    
    $KayitCek = $DataBaseConnection->query("SELECT * FROM yoneticiler WHERE id = $YoneticiID LIMIT 1");
    while($YoneticiKayitlari = $KayitCek->fetch_assoc()){
        $YoneticilerID     = GeriDöndür($YoneticiKayitlari["id"]);
        $YoneticilerKimlik = GeriDöndür($YoneticiKayitlari["YoneticiKimligi"]);
        $YoneticilerSifre  = GeriDöndür($YoneticiKayitlari["Sifre"]);
        $YoneticilerIsim   = GeriDöndür($YoneticiKayitlari["isimSoyisim"]);
        $YoneticilerMail   = GeriDöndür($YoneticiKayitlari["EmailAdresi"]);
        $YoneticilerTel    = GeriDöndür($YoneticiKayitlari["TelNum"]);
    }
    if($KayitCek->num_rows){
    ?>
<form action="index.php?SKD=0&SKI=58" method="post">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>YÖNETİCİLER</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="20">
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td align="center">
            <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Yonetici Kimlik Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="YK" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($YoneticilerKimlik); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Şifre</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Sifre" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($YoneticilerSifre); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ad Soyad</td>
                    <td width="10">:</td>
                    <td><input type="text" name="isim" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($YoneticilerIsim); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Email Adresi</td>
                    <td width="10">:</td>
                    <td><input type="email" name="email" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($YoneticilerMail); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Telefon Numarası</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Tel" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($YoneticilerTel); ?>" required></td>
                </tr>
                <input type="hidden" name="YoneticiKayitID" value="<?php echo $YoneticilerID; ?>">
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Yöneticiyi Güncelle" class="KirmiziButon"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>    

<?php
        }
    }else{
        header("Location:index.php?SKI=42"); //hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>