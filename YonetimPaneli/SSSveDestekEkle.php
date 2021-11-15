<?php if(isset($_SESSION["Yonetici"])){ ?>
<form action="index.php?SKD=0&SKI=38" method="post">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>SIK SORULAN SORULAR VE DESTEK</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="50">
        <td align="center" bgcolor="#b3ffb3" style="color: #9900ff; font-size: 18px; font-weight: bold;">Yeni SSS Ekle</td>
    </tr>
    <tr>
        <td align="center">
            <table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Soru</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Soru" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Cevap</td>
                    <td width="10">:</td>
                    <td><input type="text" name="Cevap" class="InputAlanlariTEKLI" required></td>
                </tr>
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="SSS Ekle" class="KirmiziButon"></td>
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