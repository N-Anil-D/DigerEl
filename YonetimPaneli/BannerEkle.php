<?php if(isset($_SESSION["Yonetici"])){ ?>
<form action="index.php?SKD=0&SKI=32" method="post" enctype="multipart/form-data">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>BANNER AYARLARI</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="50">
        <td align="center" bgcolor="#b3ffb3" style="color: #9900ff; font-size: 18px; font-weight: bold;">Yeni Banner Ekle</td>
    </tr>
    <tr>
        <td align="center">
            <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banner Resmi</td>
                    <td width="10">:</td>
                    <td><input type="file" name="BannerResmi"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banner adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BannerAdi" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banner Alanı</td>
                    <td width="10">:</td>
                    <td><select name="BannerAlani" class="BannerSelectAlani">
                        <option value="">Lütfen Seçiniz</option>
                        <option value="Ana Sayfa">Ana Sayfa</option>
                        <option value="Menü Altı">Menü Altı</option>
                        <option value="Detay Sayfası Altı">Detay Sayfası Altı</option>
                        </select>
                    </td>
                </tr>
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Banner Ekle" class="KirmiziButon"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>    

<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>