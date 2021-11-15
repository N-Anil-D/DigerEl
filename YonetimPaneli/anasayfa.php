<?php if(isset($_SESSION["Yonetici"])){ ?>
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="100%">
        <td width="30" align="center" valign="top" bgcolor="#660000"><table width="30" align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0"></table></td>
        <td width="300" align="center" valign="top" bgcolor="#660000">
            <table width="300"align="center" bgcolor="" border="0" cellpadding="0" cellspacing="0">
                <tr height="120">
                    <td align="center" style="padding-right: 50px;"><a href="index.php?SKD=0&SKI=0"><img src="../Resimler/Logo.png" border="0" height="100" width="74"></a></td>
                </tr>
                <tr height="2">
                    <td align="center" bgcolor="#000000" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
                </tr>
                <?php 
                $HB_Query       = $DataBaseConnection->query("SELECT * FROM havalebildirimleri WHERE durum = 'Beklemede' ");
                $HB_Beklemede   = $HB_Query->num_rows;
                                       
                $BekleyenSiparisArama    = $DataBaseConnection->query("SELECT DISTINCT SiparisNumarasi FROM siparisler WHERE KargoDurumu = 0 AND OnayDurumu = 0");
                $BekleyenSiparisSayisi   = $BekleyenSiparisArama->num_rows;
                ?>
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=96" style="color: #FFFFFF;">&nbsp;SİPARİŞLER (<?php if($BekleyenSiparisSayisi>0){echo '<b style="color: #00ff00;">';} echo $BekleyenSiparisSayisi; if($BekleyenSiparisSayisi>0){echo '</b>';}else{echo "0";} ?>)</a></td>
                </tr>
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=74" style="color: #FFFFFF;">&nbsp;HAVALE BİLDİRİMLERİ (<?php if($HB_Beklemede>0){echo '<b style="color: #00ff00;">';} echo $HB_Beklemede; if($HB_Beklemede>0){echo '</b>';}else{echo "0";} ?>)</a></td>
                </tr>
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=83" style="color: #FFFFFF;">&nbsp;ÜRÜNLER</a></td>
                </tr>
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=62" style="color: #FFFFFF;">&nbsp;ÜYELER</a></td>
                </tr>
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=68" style="color: #FFFFFF;">&nbsp;YORUMLAR</a></td>
                </tr>
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=1" style="color: #FFFFFF;">&nbsp;SİTE AYARLARI</a></td>
                </tr>

                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=45" style="color: #FFFFFF;">&nbsp;MENÜLER</a></td>
                </tr>
                               
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=8" style="color: #FFFFFF;">&nbsp;BANKA HESAP AYARLARI</a></td>
                </tr>  
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=5" style="color: #FFFFFF;">&nbsp;SÖZLEŞMELER VE METİNLER</a></td>
                </tr>

                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=18" style="color: #FFFFFF;">&nbsp;KARGO FİRMALARI</a></td>
                </tr>
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=27" style="color: #FFFFFF;">&nbsp;BANNERLAR</a></td>
                </tr>
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=36" style="color: #FFFFFF;">&nbsp;SIK SORULAN SORULAR / DESTEK</a></td>
                </tr>
                
                <tr height="50">
                    <td align="left" class="AnaMenu" style="border-bottom: 1px solid #000000;"><a href="index.php?SKD=0&SKI=53" style="color: #FFFFFF;">&nbsp;YÖNETİCİLER</a></td>
                </tr>
                
                <tr height="50">
                    <td align="center"></td>
                </tr>
                
                
                <tr height="50">
                    <td align="center" class="AnaMenu" style="padding-right: 50px;"><a href="index.php?SKD=4" style="color: #FFFFFF;">ÇIKIŞ</a></td>
                </tr>
                
            </table>
        </td>
        <td width="3" align="center" valign="top" bgcolor="#000000">&nbsp;</td>
        <td width="100%-333" align="center" valign="top">
        
                        <?php
            if((!$IcSayfaKoduDegeri) or ($IcSayfaKoduDegeri=="") or ($IcSayfaKoduDegeri==0)){
                include($SayfaIC[0]);
                
            }else{
                include($SayfaIC[$IcSayfaKoduDegeri]);
            }
            ?>

        
        </td>
    </tr>
</table>
    
<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>