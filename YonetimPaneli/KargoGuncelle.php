<?php namespace Verot\Upload;

if(isset($_SESSION["Yonetici"])){
      
if(isset($_GET["KFid"])){
    $KargoFirmasiID = SadeceSayilar($_GET["KFid"]);
}else{
    $KargoFirmasiID = "";
}
//--------------------------------------------

if($KargoFirmasiID != ""){
    
    $KayitCek = $DataBaseConnection->query("SELECT * FROM  kargofirmalari WHERE id = $KargoFirmasiID LIMIT 1");
    while($KargoKayitlari = $KayitCek->fetch_assoc()){
        $Kargo_id       = $KargoKayitlari["id"];
        $Kargo_Logosu   = $KargoKayitlari["KargoFirmasiLogosu"];
        $Kargo_Adi      = $KargoKayitlari["KargoFirmasiAdi"];
    }
    if($KayitCek->num_rows){
    ?>

<form action="index.php?SKD=0&SKI=23" method="post" enctype="multipart/form-data">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>KARGO FİRMALARI</h1></td>
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
                    <td width="200">&nbsp;&nbsp;&nbsp;Kargo Firması Logosu</td>
                    <td width="10">:</td>
                    <td><input type="file" name="KargoFirmasiLogosu"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Kargo Firması Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="KargoFirmasiAdi" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($Kargo_Adi); ?>" required></td>
                </tr>
                <input type="hidden" name="KargoFirmasiKayitID" value="<?php echo GeriDöndür($Kargo_id); ?>">
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Kargo Firması Güncelle" class="KirmiziButon"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>    



<?php
    }    
    }else{
        header("Location:index.php?SKI=24");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>