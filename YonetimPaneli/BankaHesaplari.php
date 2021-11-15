<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>BANKA HESAP AYARLARI</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="right" bgcolor="#000000"><a href="index.php?SKI=12" style="color: #00ff00; text-decoration: none;">+ Yeni Banka Hesabı Ekle&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <tr height="20">
        <td>&nbsp;</td>
    </tr>
    <?php 
    $BANKAquuery             = $DataBaseConnection->query("SELECT * FROM bankahesaplarimiz ORDER BY BankaAdi ASC");
    $BANKAkayitsayisi        = $BANKAquuery->num_rows;

    if($BANKAkayitsayisi){
    while($BankaKayitlariniYaz = $BANKAquuery->fetch_assoc()){
    $_B_BankaID         = GeriDöndür($BankaKayitlariniYaz["id"]);
    $_B_BankaLogosu     = GeriDöndür($BankaKayitlariniYaz["BankaLogosu"]);
    $_B_BankaAdi        = GeriDöndür($BankaKayitlariniYaz["BankaAdi"]);
    $_B_KonumSehir      = GeriDöndür($BankaKayitlariniYaz["KonumSehir"]);
    $_B_KonumUlke       = GeriDöndür($BankaKayitlariniYaz["KonumUlke"]);
    $_B_SubeAdi         = GeriDöndür($BankaKayitlariniYaz["SubeAdi"]);
    $_B_SubeKodu        = GeriDöndür($BankaKayitlariniYaz["SubeKodu"]);
    $_B_ParaBirimi      = GeriDöndür($BankaKayitlariniYaz["ParaBirimi"]);
    $_B_HesapSahibi     = GeriDöndür($BankaKayitlariniYaz["HesapSahibi"]);
    $_B_HesapNumarasi   = GeriDöndür($BankaKayitlariniYaz["HesapNumarasi"]);
    $_B_ibanNumarasi    = GeriDöndür($BankaKayitlariniYaz["ibanNumarasi"]);   
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="200" align="center"><img src="<?php echo "../".$_B_BankaLogosu; ?>" border="0"></td>
                    <td width="40">&nbsp;</td>
                    <td width="1150">
                        <table width="1150" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="e6ffe6">
                                <td>Banka adı : <?php echo $_B_BankaAdi; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>Banka Konumu : <?php echo $_B_KonumUlke." / ".$_B_KonumSehir; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td>Şube adı ve kodu : <?php echo $_B_SubeAdi." / ".$_B_SubeKodu; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>Hesap para birimi : <?php echo $_B_ParaBirimi; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td>Hesap Sahibi : <?php echo $_B_HesapSahibi; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>Hesap Numarası : <?php echo $_B_HesapNumarasi; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td>iBan Numarası : <?php echo $_B_ibanNumarasi; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=15&BID=<?php echo $_B_BankaID; ?>" style="text-decoration:none; color:#000000;">
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
                        <a href="index.php?SKI=9&BID=<?php echo $_B_BankaID; ?>" style="text-decoration:none; color:#000000;">
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
        <td align="center">Kayıtlı banka hesabı bulunamadı.</td>
    </tr>
    <?php    
    }
    ?>
</table>

<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>