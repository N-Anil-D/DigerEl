<?php if(isset($_SESSION["Yonetici"])){ ?>
<form action="index.php?SKD=0&SKI=2" method="post" enctype="multipart/form-data">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>SİTE AYARLARI</h1></td>
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
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteAdi" value="<?php echo GeriDöndür($SiteAdi); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Başlığı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteTitle" value="<?php echo GeriDöndür($SiteTitle); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Açıklaması</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteDescription" value="<?php echo GeriDöndür($SiteDescription); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Sitenin Anahtar Kelimeleri</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteKeywords" value="<?php echo GeriDöndür($SiteKeywords); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Copyright Metni</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteCapyrightMetni" value="<?php echo GeriDöndür($SiteCapyrightMetni); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Logosu</td>
                    <td width="10">:</td>
                    <td><input type="file" name="SiteLogosu"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site E-mail Adresi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteEmailAdresi" value="<?php echo GeriDöndür($SiteEmailAdresi); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site E-mail Şifresi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteEmailSiftesi" value="<?php echo GeriDöndür($SiteEmailSiftesi); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site E-mail Host</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteEmailHost" value="<?php echo GeriDöndür($SiteEmailHost); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Linki</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteLinki" value="<?php echo GeriDöndür($SiteLinki); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Facebook</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteFacebook" value="<?php echo GeriDöndür($SiteFacebook); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Twitter</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteTwitter" value="<?php echo GeriDöndür($SiteTwitter); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site LinkedIn</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteLinkedIn" value="<?php echo GeriDöndür($SiteLinkedIn); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Instagram</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteInstagram" value="<?php echo GeriDöndür($SiteInstagram); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Pinteres</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SitePinteres" value="<?php echo GeriDöndür($SitePinteres); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Site Youtube</td>
                    <td width="10">:</td>
                    <td><input type="text" name="SiteYoutube" value="<?php echo GeriDöndür($SiteYoutube); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Client ID</td>
                    <td width="10">:</td>
                    <td><input type="text" name="ClientID" value="<?php echo GeriDöndür($ClientID); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Store Key</td>
                    <td width="10">:</td>
                    <td><input type="text" name="StoreKey" value="<?php echo GeriDöndür($StoreKey); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Api Kullanıcısı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="ApiKullanicisi" value="<?php echo GeriDöndür($ApiKullanicisi); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Api Şifresi</td>
                    <td width="10">:</td>
                    <td><input type="text" name="ApiSifresi" value="<?php echo GeriDöndür($ApiSifresi); ?>" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Güncelle" class="KirmiziButon"></td>
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