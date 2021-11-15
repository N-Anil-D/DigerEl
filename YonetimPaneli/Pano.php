<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>PANO</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <?php
    $BekleyenSiparisArama    = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler WHERE KargoDurumu = 0 AND OnayDurumu = 0");
    $BekleyenSiparisSayisi   = $BekleyenSiparisArama->num_rows;
    
    $TamamlananSiparisArama  = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler WHERE KargoDurumu = 1 AND OnayDurumu = 1");
    $TamamlananSiparisSayisi = $TamamlananSiparisArama->num_rows;
    
    $TumSiparisArama         = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler");
    $TumSiparisSayisi        = $TumSiparisArama->num_rows;
    ?>
    <tr>
        <td align="center">
            <table width="1560" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: #cca300;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Bekleyen Siparişler</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $BekleyenSiparisSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: #00b300;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Tamamlanan Siparişler</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $TamamlananSiparisSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Tüm Siparişler</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $TumSiparisSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="15">
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <?php
    $HB_Query       = $DataBaseConnection->query("SELECT * FROM havalebildirimleri WHERE durum = 'Beklemede' ");
    $HB_Beklemede   = $HB_Query->num_rows;
    
    $BankaHesaplari = $DataBaseConnection->query("SELECT * FROM bankahesaplarimiz");
    $BankaSayisi    = $BankaHesaplari->num_rows;
    
    $Menuler       = $DataBaseConnection->query("SELECT * FROM menuler WHERE ustID <>0 ");
    $MenuSayisi    = $Menuler->num_rows;
    ?>
    <tr>
        <td align="center">
            <table width="1560" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: #cca300;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Bekleyen Havale Bildirimleri</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $HB_Beklemede; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Banka Hesapları</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $BankaSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Menü Sayısı</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $MenuSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="15">
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <?php

    $AracQ          = $DataBaseConnection->query("SELECT * FROM arac WHERE Durumu = 1");
    $ToplamArac     = $AracQ->num_rows;
    
    $KonutQ         = $DataBaseConnection->query("SELECT * FROM konut WHERE Durumu = 1");
    $ToplamKonut    = $KonutQ->num_rows;
    
    $GiyimQ         = $DataBaseConnection->query("SELECT * FROM giyim WHERE Durumu = 1");
    $ToplamGiyim    = $GiyimQ->num_rows;
    
    $TeknolojiQ     = $DataBaseConnection->query("SELECT * FROM teknoloji WHERE Durumu = 1");
    $ToplamTeknoloji= $TeknolojiQ->num_rows;
    
    $KacTaneUrunVar = $ToplamArac+$ToplamKonut+$ToplamGiyim+$ToplamTeknoloji;

    $AktifUyeler    = $DataBaseConnection->query("SELECT * FROM uyeler WHERE Durumu = 'Aktif'");
    $KacAktifUyeVar = $AktifUyeler->num_rows;
    
    $Yoneticiler    = $DataBaseConnection->query("SELECT * FROM yoneticiler");
    $YoneticiSayisi = $Yoneticiler->num_rows;
    ?>
    <tr>
        <td align="center">
            <table width="1560" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Akrif Ürünler</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $KacTaneUrunVar; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Aktif Üyelikler</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $KacAktifUyeVar; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Yöneticiler</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $YoneticiSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="15">
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <?php
    $KargoFirmalari = $DataBaseConnection->query("SELECT * FROM kargofirmalari");
    $KacTaneKargoVar= $KargoFirmalari->num_rows;

    $Banner         = $DataBaseConnection->query("SELECT * FROM banner");
    $BannerSayisi   = $Banner->num_rows;
    
    $Yorumlar       = $DataBaseConnection->query("SELECT * FROM yorumlar");
    $YorumlarSayisi = $Yorumlar->num_rows;
    ?>
    <tr>
        <td align="center">
            <table width="1560" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Kargo Firmaları</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $KacTaneKargoVar; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Bannerlar</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $BannerSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                    <td width="30">&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Yorumlar</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $YorumlarSayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr height="15">
        <td style="line-height: 15px; font-size: 15px;">&nbsp;</td>
    </tr>
    <?php
    $SSSquuery             = $DataBaseConnection->query("SELECT * FROM sss");
    $SSSkayitsayisi        = $SSSquuery->num_rows;
    ?>
    <tr>
        <td align="left">
            <table width="500" align="left" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>&nbsp;</td>
                    <td width="500" style="border: 1px solid #CCCCCC">
                        <table height="120" width="500" align="center" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr>
                                <td align="center" style="font-size: 20px;">&nbsp;Destek İçerikleri</td>
                            </tr>
                            <tr>
                                <td align="center" style="font-weight: bold; font-size: 29px;"><?php echo $SSSkayitsayisi; ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    
    
    
</table>
    
<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>