<?php if(isset($_SESSION["Yonetici"])){ 

    if(isset($_GET["SiparisNum"])){
        $SiparisNum = SadeceSayilar($_GET["SiparisNum"]);
    }else{
        $SiparisNum = "";
    }
    //--------------------------------------------
?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>SİPARİŞ DETAYLARI</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    <tr height="25">
        <td>&nbsp;</td>
    </tr>
    <?php 
    $SiparisKontrol       = $DataBaseConnection->query("SELECT * FROM siparisler WHERE SiparisNumarasi = $SiparisNum");
    $SiparisKontrolInfo   = $SiparisKontrol->fetch_assoc();
    $OnayliMi = $SiparisKontrolInfo["OnayDurumu"];
    if($OnayliMi==0){
    ?>
    <tr height="25">
        <td align="left" bgcolor="#000000"><a href="index.php?SKI=96" style="color: #ffff99; text-decoration: none; font-weight: bold;">&nbsp;&nbsp;&nbsp;SİPARİŞLER (BEKLEYEN)</a></td>
    </tr>
    <?php }else{ ?>
    <tr height="25">
        <td align="left" bgcolor="#000000"><a href="index.php?SKI=97" style="color: #00ff00; text-decoration: none; font-weight: bold;">&nbsp;&nbsp;&nbsp;SİPARİŞLER (TAMAMLANAN)</a></td>
    </tr>
    <?php }
    $SiparisNumaralari           = $DataBaseConnection->query("SELECT * FROM siparisler WHERE SiparisNumarasi = $SiparisNum");
    $KayitliSiparisNumarasiVarsa = $SiparisNumaralari->num_rows;

    if($KayitliSiparisNumarasiVarsa>0){
        while($SiparisDetaylari = $SiparisNumaralari->fetch_assoc()){
            $Sip_TabloAdi           = GeriDöndür($SiparisDetaylari["TabloAdi"]);
            $Sip_UrunID             = GeriDöndür($SiparisDetaylari["UrunID"]);
            $Sip_UrunResmiBIR       = GeriDöndür($SiparisDetaylari["UrunResmiBIR"]);
            $Sip_UyeID              = GeriDöndür($SiparisDetaylari["UyeID"]);
            $Sip_UrunAdi            = GeriDöndür($SiparisDetaylari["UrunAdi"]);
            $Sip_UrunAdedi          = GeriDöndür($SiparisDetaylari["UrunAdedi"]);
            $Sip_UrunFiyati         = GeriDöndür($SiparisDetaylari["UrunFiyati"]);
            $Sip_ParaBirimi         = GeriDöndür($SiparisDetaylari["ParaBirimi"]);
            $Sip_ToplamUrunFiyati   = GeriDöndür($SiparisDetaylari["ToplamUrunFiyati"]);
            $Sip_KargoUcreti        = GeriDöndür($SiparisDetaylari["KargoUcreti"]);
            $Sip_KargoFirmasiSecimi = GeriDöndür($SiparisDetaylari["KargoFirmasiSecimi"]);
            $Sip_VaryantBasligi     = GeriDöndür($SiparisDetaylari["VaryantBasligi"]);
            $Sip_VaryantSecimi      = GeriDöndür($SiparisDetaylari["VaryantSecimi"]);
            $Sip_AdresAdiSoyadi     = GeriDöndür($SiparisDetaylari["AdresAdiSoyadi"]);
            $Sip_AdresDetay         = GeriDöndür($SiparisDetaylari["AdresDetay"]);
            $Sip_AdresTelefon       = GeriDöndür($SiparisDetaylari["AdresTelefon"]);
            $Sip_OdemeSecimi        = GeriDöndür($SiparisDetaylari["OdemeSecimi"]);
            $Sip_TaksitSecimi       = GeriDöndür($SiparisDetaylari["TaksitSecimi"]);
            $Sip_SiparisTarihi      = GeriDöndür($SiparisDetaylari["SiparisTarihi"]);
            $Sip_SiparisIPadresi    = GeriDöndür($SiparisDetaylari["SiparisIPadresi"]);
            $Sip_OnayDurumu         = GeriDöndür($SiparisDetaylari["OnayDurumu"]);
            
            $SiparisUyeler          = $DataBaseConnection->query("SELECT * FROM uyeler WHERE id = $Sip_UyeID LIMIT 1");
            $UyeBilgileri           = $SiparisUyeler->fetch_assoc();
            $SatinAlanUye           = $UyeBilgileri["isimSoyisim"];
            
            if($Sip_VaryantBasligi!= "" and $Sip_VaryantSecimi!= ""){
                $SiparisVaryant     = $DataBaseConnection->query("SELECT * FROM urunvaryantlari WHERE id = $Sip_VaryantSecimi LIMIT 1");
                $VaryantBilgileri   = $SiparisVaryant->fetch_assoc();
                $VaryanAdi          = $VaryantBilgileri["VaryanAdi"];
            }
            $SiparisKargo           = $DataBaseConnection->query("SELECT * FROM kargofirmalari WHERE id = $Sip_KargoFirmasiSecimi LIMIT 1");
            $KargoBilgileri         = $SiparisKargo->fetch_assoc();
            $KargoFirmasi           = $KargoBilgileri["KargoFirmasiAdi"];
    ?>
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td width="250" height="210" align="center"><img src="../<?php echo $Sip_UrunResmiBIR; ?>" width="250" height="210"></td>
                    <td>
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="#e6ffe6">
                                <td width="200">&nbsp;<b>Satın Alan Üye</b></td>
                                <td>:</td>
                                <td><?php echo $SatinAlanUye; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td width="200">&nbsp;<b>Ürün Adı</b></td>
                                <td>:</td>
                                <td><?php echo $Sip_UrunAdi."( ".$Sip_UrunAdedi." adet)"; if($Sip_VaryantBasligi!= "" and $Sip_VaryantSecimi!= ""){echo " ( ".$VaryanAdi." )";} ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td width="200">&nbsp;<b>Ürün Fiyatı</b></td>
                                <td>:</td>
                                <td><?php echo FiyatBicimlendir($Sip_UrunFiyati)." TL X (".$Sip_UrunAdedi." adet) =".FiyatBicimlendir($Sip_ToplamUrunFiyati); ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td width="200">&nbsp;<b>Ödeme Seçimi</b></td>
                                <td>:</td>
                                <td><?php echo $Sip_OdemeSecimi; if($Sip_OdemeSecimi!= "" and $Sip_VaryantSecimi!= "BANKA HAVALESİ"){echo " ( ".$Sip_TaksitSecimi." Taksit )";} ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td width="200">&nbsp;<b>Kargo Firması Seçimi</b></td>
                                <td>:</td>
                                <td><?php echo $KargoFirmasi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td width="200">&nbsp;<b>Kargo Ücreti</b></td>
                                <td>:</td>
                                <td><?php echo FiyatBicimlendir($Sip_KargoUcreti); ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td width="200">&nbsp;<b>Adresteki İsim Soyisim</b></td>
                                <td>:</td>
                                <td><?php echo $Sip_AdresAdiSoyadi; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td width="200">&nbsp;<b>Açık Adres</b></td>
                                <td>:</td>
                                <td><?php echo $Sip_AdresDetay; ?></td>
                            </tr>
                            <tr bgcolor="#e6ffe6">
                                <td width="200">&nbsp;<b>Adres Telefon Numarası</b></td>
                                <td>:</td>
                                <td><?php echo $Sip_AdresTelefon; ?></td>
                            </tr>
                            <tr bgcolor="#ffe6ff">
                                <td width="200">&nbsp;<b>Tarih</b></td>
                                <td>:</td>
                                <td><?php echo TarihBul($Sip_SiparisTarihi); ?></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>

<?php 
        } /* while Kapatması */ 
        ?>
    <tr height="15"><td></td></tr>
    <?php
        if($OnayliMi==0){
    ?>

    <form action="index.php?SKI=99" method="post">
    <tr>
        <td align="center">
            <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
                <tr>
                    <td>
                        <table width="100%" align="left" border="0" cellpadding="0" cellspacing="0" style="color: black;">
                            <tr bgcolor="#ccfff5">
                                <td width="200">&nbsp;<b>Kargo Kodu</b></td>
                                <td>:</td>
                                <td><input type="text" name="Kargo" class="InputAlanlariTEKLI"></td>
                            </tr>
                            <input type="hidden" name="SiparisNo" value="<?php echo $SiparisNum; ?>">
                            <tr>
                                <td colspan="3" align="center"><input type="submit" value="Siparişi Onayla" class="YesilButon"></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </td>
    </tr>    
    </form>
    <?php }
    }else{
        header("Location:index.php?SKD=1");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} ?>
        </table>
