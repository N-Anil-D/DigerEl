<?php if(isset($_SESSION["Yonetici"])){ ?>
<form action="index.php?SKD=0&SKI=13" method="post" enctype="multipart/form-data">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>BANKA HESAP AYARLARI</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="50">
        <td align="center" bgcolor="#b3ffb3" style="color: #9900ff; font-size: 18px; font-weight: bold;">Yeni Banka Hesabı Ekle</td>
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
                    <td><input type="text" name="BankaAdi" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka'nın Bağlı Olduğu Ülke</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaUlke" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka'nın Bağlı Olduğu Şehir</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaSehir" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka Şube Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaSubeAdi" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Banka Şube Kodu</td>
                    <td width="10">:</td>
                    <td><input type="text" name="BankaSubeKodu" class="InputAlanlariTEKLI" required></td>
                </tr>

                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Hesap Para Birimi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="ParaBirimi" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Hesap Sahibi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="HesapSahibi" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Hesap Numarası</td>
                    <td width="10">:</td>
                    <td><input type="text" name="HesapNumarasi" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;iBan Numarası</td>
                    <td width="10">:</td>
                    <td><input type="text" name="iBanNumarasi" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Banka Hesabı Ekle" class="KirmiziButon"></td>
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