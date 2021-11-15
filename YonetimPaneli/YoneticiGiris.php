<?php
if(empty($_SESSION["Yonetici"])){
?>
<form action="index.php?SKD=2" method="post">
    <table width="500" align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #000000; padding: 30px;">

        <tr height="40">
            <td align="left" width="150">Yönetici Adi</td>
            <td align="left" width="50">:</td>
            <td align="left" width="300"><input type="text" name="YoneticiKullanici" class="InputAlanlari"></td>
        </tr>

        <tr height="40">
            <td align="left" width="150">Yönetici Şifresi</td>
            <td align="left" width="50">:</td>
            <td align="left" width="300"><input type="password" name="YoneticiSifre" class="InputAlanlari"></td>
        </tr>

        <tr height="40">
            <td align="left" width="150">&nbsp;</td>
            <td align="left" width="50">&nbsp;</td>
            <td align="left" width="300"><input type="submit" value="Yönetici Olarak Giriş Yap" class="KirmiziButon"></td>
        </tr>
    </table>
</form>
<?php } ?>