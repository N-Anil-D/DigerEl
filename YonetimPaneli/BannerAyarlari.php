<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>BANNER AYARLARI</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <tr height="25">
        <td align="right" bgcolor="#000000"><a href="index.php?SKI=31" style="color: #00ff00; text-decoration: none;">+ Yeni Banner Ekle&nbsp;&nbsp;&nbsp;</a></td>
    </tr>
    <tr height="20">
        <td>&nbsp;</td>
    </tr>
    <?php 
    $Bannerquuery             = $DataBaseConnection->query("SELECT * FROM banner ORDER BY BannerAlani ASC");
    $Bannerkayitsayisi        = $Bannerquuery->num_rows;

    if($Bannerkayitsayisi){
    while($BannerKayitlariniYaz = $Bannerquuery->fetch_assoc()){
    $_B_BannerID        = GeriDöndür($BannerKayitlariniYaz["id"]);
    $_B_BannerAlani     = GeriDöndür($BannerKayitlariniYaz["BannerAlani"]);
    $_B_BannerAdi       = GeriDöndür($BannerKayitlariniYaz["BannerAdi"]);
    $_B_BannerResmi     = GeriDöndür($BannerKayitlariniYaz["BannerResmi"]);
    $_B_GosterimSayisi  = GeriDöndür($BannerKayitlariniYaz["GösterimSayisi"]);
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr height="50">
                    <td width="550" align="center"><img src="<?php echo "../".$_B_BannerResmi; ?>" border="0" height="50"></td>
                    <td width="40">&nbsp;</td>
                    <td>
                        <table width="800" align="right" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="e6ffe6">
                                <td>Banner adı : <?php echo $_B_BannerAdi; ?></td>
                            </tr>
                            <tr bgcolor="ffe6ff">
                                <td>Banner Alanı : <?php echo $_B_BannerAlani; ?></td>
                            </tr>
                            <tr bgcolor="e6ffe6">
                                <td>Gösterim Sayısı : <?php echo $_B_GosterimSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="80" align="center" bgcolor="#ff8080">
                        <a href="index.php?SKI=34&BanID=<?php echo $_B_BannerID; ?>" style="text-decoration:none; color:#000000;">
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
                        <a href="index.php?SKI=28&BanID=<?php echo $_B_BannerID; ?>" style="text-decoration:none; color:#000000;">
                          <table width="80" height="147" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr height="60">
                                  <td width="80" height="60" align="center" style="font-size: 14px;"><b>GÜNCELLE</b></td>
                              </tr>
                              <tr height="87">
                                  <td width="80" height="87" align="center"><img src="../Resimler/update_icon.png" border="0"></td>
                              </tr>
                          </table>
                        </a>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="40">
        <td width="10">&nbsp;</td>
    </tr>
    <?php 
    } /* while Kapatması */
    }else{ ?>
    <tr>
        <td align="center">Kayıtlı Banner bulunamadı.</td>
    </tr>
    <?php    
    }
    ?>
</table>

<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>