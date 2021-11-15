<?php 
if(isset($_SESSION["Yonetici"])){
      
if(isset($_GET["BanID"])){
    $BannerID = SadeceSayilar($_GET["BanID"]);
}else{
    $BannerID = "";
}
//--------------------------------------------

if($BannerID != ""){
    
    $KayitCek = $DataBaseConnection->query("SELECT * FROM banner WHERE id = $BannerID LIMIT 1");
    while($BannerKayitlari = $KayitCek->fetch_assoc()){
        

        
        $Banner_id          = $BannerKayitlari["id"];
        $Banner_Alani       = $BannerKayitlari["BannerAlani"];
        $Banner_Adi         = $BannerKayitlari["BannerAdi"];
        $Banner_Resmi       = $BannerKayitlari["BannerResmi"];
        $Banner_Gosterim    = $BannerKayitlari["GösterimSayisi"];
    }
    if($KayitCek->num_rows){
    ?>
<form action="index.php?SKD=0&SKI=29" method="post" enctype="multipart/form-data">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>Banner HESAP AYARLARI</h1></td>
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
                    <td width="200">&nbsp;&nbsp;&nbsp;Banner Resimi</td>
                    <td width="10">:</td>
                    <td><input type="file" name="BannerResim"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banner Alanı</td>
                    <td width="10">:</td>
                    <td><select name="BannerAlani" class="BannerSelectAlani">
                        <option value="<?php echo $Banner_Alani; ?>"><?php echo $Banner_Alani; ?></option>
                        <option value="Ana Sayfa">Ana Sayfa</option>
                        <option value="Menü Altı">Menü Altı</option>
                        <option value="Detay Sayfası Altı">Detay Sayfası Altı</option>
                        </select>
                    </td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banner Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BannerAdi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banner_Adi); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banner Gösterim Sayısı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BannerGS" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banner_Gosterim); ?>" required></td>
                </tr>
                </tr>
                <input type="hidden" name="BannerKayitID" value="<?php echo GeriDöndür($Banner_id); ?>">
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Banner Güncelle" class="KirmiziButon"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>    

<?php
        }
    }else{
        header("Location:index.php?SKI=30");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>