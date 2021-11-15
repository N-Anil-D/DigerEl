<?php 
if(isset($_SESSION["Yonetici"])){
      
if(isset($_GET["BID"])){
    $BankaID = SadeceSayilar($_GET["BID"]);
}else{
    $BankaID = "";
}
//--------------------------------------------

if($BankaID != ""){
    
    $KayitCek = $DataBaseConnection->query("SELECT * FROM bankahesaplarimiz WHERE id = $BankaID LIMIT 1");
    while($BankaKayitlari = $KayitCek->fetch_assoc()){
        

        
        $Banka_id           = $BankaKayitlari["id"];
        $Banka_Logosu       = $BankaKayitlari["BankaLogosu"];
        $Banka_Adi          = $BankaKayitlari["BankaAdi"];
        $Banka_Sehir        = $BankaKayitlari["KonumSehir"];
        $Banka_Ulke         = $BankaKayitlari["KonumUlke"];
        $Banka_SubeAdi      = $BankaKayitlari["SubeAdi"];
        $Banka_SubeKodu     = $BankaKayitlari["SubeKodu"];
        $Banka_ParaBirimi   = $BankaKayitlari["ParaBirimi"];
        $Banka_HesapSahibi  = $BankaKayitlari["HesapSahibi"];
        $Banka_HesapNumarasi= $BankaKayitlari["HesapNumarasi"];
        $Banka_ibanNumarasi = $BankaKayitlari["ibanNumarasi"];
        
    }
    if($KayitCek->num_rows){
    ?>
<form action="index.php?SKD=0&SKI=10" method="post" enctype="multipart/form-data">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>BANKA HESAP AYARLARI</h1></td>
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
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka Logosu</td>
                    <td width="10">:</td>
                    <td><input type="file" name="BankaLogosu"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaAdi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_Adi); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka'nın Bağlı Olduğu Ülke</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaUlke" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_Ulke); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka'nın Bağlı Olduğu Şehir</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaSehir" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_Sehir); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka Şube Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaSubeAdi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_SubeAdi); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka Şube Kodu</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaSubeKodu" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_SubeKodu); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Hesap Para Birimi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="ParaBirimi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_ParaBirimi); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Hesap Sahibi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="HesapSahibi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_HesapSahibi); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Hesap Numarası</td>
                    <td width="10">:</td>
                    <td><input type="text" name="HesapNumarasi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_HesapNumarasi); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;iBan Numarası</td>
                    <td width="10">:</td>
                    <td><input type="text" name="iBanNumarasi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Banka_ibanNumarasi); ?>" required></td>
                </tr>
                <input type="hidden" name="BankaKayitID" value="<?php echo GeriDöndür($Banka_id); ?>">
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Banka Hesabı Güncelle" class="KirmiziButon"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>    

<?php
        }
    }else{
        header("Location:index.php?SKI=4");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>