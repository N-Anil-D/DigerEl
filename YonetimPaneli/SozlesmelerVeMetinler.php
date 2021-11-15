<?php if(isset($_SESSION["Yonetici"])){ ?>
<form action="index.php?SKD=0&SKI=6" method="post">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>SÖZLEŞME VE METİNLER</h1></td>
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
                <tr>
                    <td width="250">&nbsp;&nbsp;&nbsp;Hakkımızda Metni</td>
                    <td width="10">:</td>                
                    <td><textarea name="HakkimizdaMetni" class="TextAlanlari"><?php echo GeriDöndür($HakkimizdaMetni); ?></textarea></td>

                </tr>
                <tr>
                    <td width="250">&nbsp;&nbsp;&nbsp;Üyelik Sözleşmesi Metni</td>
                    <td width="10">:</td>
                    <td><textarea name="UyelikSozlesmesiMetni" class="TextAlanlari"><?php echo GeriDöndür($UyelikSozlesmesiMetni); ?></textarea></td>
                </tr>
                <tr>
                    <td width="250">&nbsp;&nbsp;&nbsp;Kullanım Koşullari Metni</td>
                    <td width="10">:</td>
                    <td><textarea name="KullanimKosullariMetni" class="TextAlanlari"><?php echo GeriDöndür($KullanimKosullariMetni); ?></textarea></td>
                </tr>
                <tr>
                    <td width="250">&nbsp;&nbsp;&nbsp;Gizlilik Sözleşmesi Metni</td>
                    <td width="10">:</td>
                    <td><textarea name="GizlilikSozlesmesiMetni" class="TextAlanlari"><?php echo GeriDöndür($GizlilikSozlesmesiMetni); ?></textarea></td>
                </tr>
                <tr>
                    <td width="250">&nbsp;&nbsp;&nbsp;Mesafeli Satış Sözleşmesi Metni</td>
                    <td width="10">:</td>
                    <td><textarea name="MesafeliSatisSozlesmesiMetni" class="TextAlanlari"><?php echo GeriDöndür($MesafeliSatisSozlesmesiMetni); ?></textarea></td>
                </tr>
                <tr>
                    <td width="250">&nbsp;&nbsp;&nbsp;Teslimat Metni</td>
                    <td width="10">:</td>
                    <td><textarea name="TeslimatMetni" class="TextAlanlari"><?php echo GeriDöndür($TeslimatMetni); ?></textarea></td>
                </tr>
                <tr>
                    <td width="250">&nbsp;&nbsp;&nbsp;İptal İade Değiiim Metni</td>
                    <td width="10">:</td>
                    <td><textarea name="IptalIadeDegisimMetni" class="TextAlanlari"><?php echo GeriDöndür($IptalIadeDegisimMetni); ?></textarea></td>
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