<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>SIK SORULAN SORULAR VE DESTEK</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="right" bgcolor="#000000"><a href="index.php?SKI=37" style="color: #00ff00; text-decoration: none;">+ Yeni SSS Ekle&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <tr height="20">
        <td>&nbsp;</td>
    </tr>
    <?php 
    $SSSquuery             = $DataBaseConnection->query("SELECT * FROM sss ORDER BY id ASC");
    $SSSkayitsayisi        = $SSSquuery->num_rows;

    if($SSSkayitsayisi){
    while($SSSKayitlariniYaz = $SSSquuery->fetch_assoc()){
    $SSS_ID     = GeriDöndür($SSSKayitlariniYaz["id"]);
    $SSS_Soru   = GeriDöndür($SSSKayitlariniYaz["soru"]);
    $SSS_Cevap  = GeriDöndür($SSSKayitlariniYaz["cevap"]);
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="40">&nbsp;</td>
                    <td width="1150">
                        <table width="1150" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="e6ffe6">
                                <td>&nbsp;<b>Soru &nbsp;&nbsp;&nbsp;:</b> <?php echo $SSS_Soru; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>&nbsp;<b>Cevap :</b> <?php echo $SSS_Cevap; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=43&SID=<?php echo $SSS_ID; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>SİL</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/delete_icon.png" border="0"></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                    <td width="80" align="center" bgcolor="#ffb380">
                        <a href="index.php?SKI=40&SID=<?php echo $SSS_ID; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>GÜNCELLE</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/update_icon.png" border="0" width=""></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="40">
        <td>&nbsp;</td>
    </tr>
    <?php 
    } /* while Kapatması */
    }else{ ?>
    <tr>
        <td align="center">Kayıtlı Soru bulunamadı.</td>
    </tr>
    <?php    
    }
    ?>
</table>

<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>