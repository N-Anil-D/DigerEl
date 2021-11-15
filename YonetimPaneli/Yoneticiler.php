<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>YÖNETİCİLER</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="right" bgcolor="#000000"><a href="index.php?SKI=54" style="color: #00ff00; text-decoration: none;">+ Yeni Yonetici Ekle&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <?php 
    $Yoneticilerquuery             = $DataBaseConnection->query("SELECT * FROM yoneticiler ORDER BY id ASC");
    $Yoneticilerkayitsayisi        = $Yoneticilerquuery->num_rows;

    if($Yoneticilerkayitsayisi){
    while($YoneticilerKayitlariniYaz = $Yoneticilerquuery->fetch_assoc()){
    $YoneticilerID     = GeriDöndür($YoneticilerKayitlariniYaz["id"]);
    $YoneticilerKimlik = GeriDöndür($YoneticilerKayitlariniYaz["YoneticiKimligi"]);
    $YoneticilerIsim   = GeriDöndür($YoneticilerKayitlariniYaz["isimSoyisim"]);
    $YoneticilerMail   = GeriDöndür($YoneticilerKayitlariniYaz["EmailAdresi"]);
    $YoneticilerTel    = GeriDöndür($YoneticilerKayitlariniYaz["TelNum"]);
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table height="200" width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="e6ffe6">
                                <td>&nbsp;<b>Yönetici Kimliği :</b> <?php echo $YoneticilerKimlik; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>&nbsp;<b>Adı Soyadı :</b> <?php echo $YoneticilerIsim; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td>&nbsp;<b>Email Adresi :</b> <?php echo $YoneticilerMail; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>&nbsp;<b>Telefon Numarası :</b> <?php echo $YoneticilerTel; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=60&YID=<?php echo $YoneticilerID; ?>" style="text-decoration:none; color:#000000;">
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
                        <a href="index.php?SKI=57&YID=<?php echo $YoneticilerID; ?>" style="text-decoration:none; color:#000000;">
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