<?php 
if(isset($_SESSION["Yonetici"])){
      
    if(isset($_GET["Mid"])){
        $MenuID = SadeceSayilar($_GET["Mid"]);
    }else{
        $MenuID = "";
    }
//--------------------------------------------

if($MenuID != ""){
    
    $KayitCek = $DataBaseConnection->query("SELECT * FROM menuler WHERE id = $MenuID LIMIT 1");
    while($MenuKayitlari = $KayitCek->fetch_assoc()){
        $Menuid         =    GeriDöndür($MenuKayitlari["id"]);
        $MenuTabloAdi	=	 GeriDöndür($MenuKayitlari["TabloAdi"]);
        $MenuUrunTuru	=	 GeriDöndür($MenuKayitlari["UrunTuru"]);
        $MenuAdi	    =	 GeriDöndür($MenuKayitlari["MenuAdi"]);
        $MenuUstId		=	 GeriDöndür($MenuKayitlari["ustID"]);
        $MenuUrunSayisi	=	 GeriDöndür($MenuKayitlari["UrunSayisi"]);

    }
    if($KayitCek->num_rows){
        
		$UstIDicin_MenuSorgusu			=	$DataBaseConnection->query("SELECT * FROM menuler WHERE TabloAdi = '$MenuTabloAdi'");
		$UstIDicin_MenuSorugusuSayi		=	$UstIDicin_MenuSorgusu->num_rows;
        
		$UstID_Adi			= $DataBaseConnection->query("SELECT * FROM menuler WHERE id = $MenuUstId");
        $UstID_AdiKayitlari = $UstID_Adi->fetch_assoc();
        $UstID_MenuAdi      = $UstID_AdiKayitlari["MenuAdi"];
    ?>
<form action="index.php?SKD=0&SKI=49" method="post">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>MENÜLER</h1></td>
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
                    <td width="200">&nbsp;&nbsp;&nbsp;Tablo Adı</td>
                    <td width="10">:</td>
                    <td><?php $TA = BasHarfiBuyukYap($MenuTabloAdi); echo $TA; ?></td>

                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Ürün Türü</td>
                    <td width="10">:</td>
                    <td><input type="text" name="UrunTuru" class="InputAlanlariTEKLI" value="<?php echo $MenuUrunTuru; ?>"></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Menü Adı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="MenuAdi" class="InputAlanlariTEKLI" value="<?php echo $MenuAdi; ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Bağlı olduğu üst menü</td>
                    <td width="10">:</td>
                    <td><select name="UstID" class="BannerSelectAlani" required>
                        <option value="<?php echo $MenuUstId; ?>"><?php echo $UstID_MenuAdi; ?></option>
                        <?php
                        if($UstIDicin_MenuSorugusuSayi>0){
                            while($UstIDicin_Kayitlar = $UstIDicin_MenuSorgusu->fetch_assoc()){
                                $UstIDicin_MenuId       =   GeriDöndür($UstIDicin_Kayitlar["id"]);
                                $UstIDicin_MenuMenuAdi  =   GeriDöndür($UstIDicin_Kayitlar["MenuAdi"]);
                                $UstIDicin_MenuUstId    =   GeriDöndür($UstIDicin_Kayitlar["ustID"]);
                                if($Menuid != $UstIDicin_MenuId and $UstIDicin_MenuMenuAdi != $UstID_MenuAdi){
                                ?>
                                <option value="<?php echo $UstIDicin_MenuId; ?>"><?php echo $UstIDicin_MenuMenuAdi; ?></option>
                                <?php }
                            }
                        }
                        ?>
                        </select>
                    </td>

                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Menüdeki ürün sayısı</td>
                    <td width="10">:</td>
                    <td><input type="text" name="UrunSay" class="InputAlanlariTEKLI" value="<?php echo $MenuUrunSayisi; ?>" required></td>
                </tr>
                <input type="hidden" name="TA" value="<?php echo $MenuTabloAdi; ?>">
                <input type="hidden" name="MenuKayitID" value="<?php echo $Menuid; ?>">
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Soru & Cevap Güncelle" class="KirmiziButon"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>    

<?php
        }
    }else{
        header("Location:index.php?SKI=50"); //hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>