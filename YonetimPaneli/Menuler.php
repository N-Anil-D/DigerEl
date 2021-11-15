<?php if(isset($_SESSION["Yonetici"])){ 

if(isset($_GET["TA"])){
    $GelenTabloAdi = GuvenlikFiltresi($_GET["TA"]);
}else{
    $GelenTabloAdi = "";
}

//--------------------------------------------

?>
<table width="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>MENÜLER</h1></td>
    </tr>
    <tr height="2">
        <td align="center" bgcolor="#9900ff" style="line-height: 2px; font-size: 2px;">&nbsp;</td>
    </tr>
    
    
    <?php
    if($GelenTabloAdi == ""){
      ?>  
    <tr height="50">
        <td align="center" valign="middle" bgcolor="#cc5200" style="color: #ffff00; font-size: 20px; font-weight: bold;">Lütfen Önce Menü Seçiniz</td>
    </tr>
    <?php } ?>
    <tr height="10"><td>&nbsp;</td></tr> 
    
    <tr height="50">
        <td align="center">
            <table>
                <tr>
                    <td width="350">
                          <table width="350" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                              <tr>
                                  <td align="center"><input class="MenuButonlari" type="button" onclick="location.href='index.php?SKI=45&TA=arac';" value="Arac Menüleri" /></td>
                              </tr>
                          </table>
                    </td>
                    <td width="350">
                          <table width="350" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                              <tr>
                                  <td align="center"><input class="MenuButonlari" type="button" onclick="location.href='index.php?SKI=45&TA=konut';" value="Konut Menüleri" /></td>
                              </tr>
                          </table>
                    </td>
                    <td width="350">
                        <table width="350" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                              <tr>
                                  <td align="center"><input class="MenuButonlari" type="button" onclick="location.href='index.php?SKI=45&TA=giyim';" value="Giyim Menüleri" /></td>
                              </tr>
                          </table>
                    </td>
                    <td width="350">
                          <table width="350" height="46" align="center" border="0" cellpadding="0" cellspacing="0" style="border: 1px solid #0066ff;">
                              <tr>
                                  <td align="center"><input class="MenuButonlari" type="button" onclick="location.href='index.php?SKI=45&TA=teknoloji';" value="Teknoloji Menüleri" /></td>
                              </tr>
                          </table>
                    </td>
                </tr>
                <tr height="50"><td>&nbsp;</td></tr>
            </table>
        </td>
    </tr>
</table>
	<?php
	function AcilirListeIcinMenuYaz($MenuUstIdDegeri=0, $BoslukDegeri=0){
		global $DataBaseConnection;
		global $GelenTabloAdi;
		
		$MenuSorgusu			=	$DataBaseConnection->query("SELECT * FROM menuler WHERE ustID = $MenuUstIdDegeri AND TabloAdi = '$GelenTabloAdi'");
		$MenuSorugusuSayi		=	$MenuSorgusu->num_rows;
        
		if($MenuSorugusuSayi>0){
			while($Kayitlar = $MenuSorgusu->fetch_assoc()){
				$MenuId			=	 GeriDöndür($Kayitlar["id"]);
				$MenuTabloAdi	=	 GeriDöndür($Kayitlar["TabloAdi"]);
				$MenuUrunTuru	=	 GeriDöndür($Kayitlar["UrunTuru"]);
				$MenuMenuAdi	=	 GeriDöndür($Kayitlar["MenuAdi"]);
				$MenuUstId		=	 GeriDöndür($Kayitlar["ustID"]);
				$MenuUrunSayisi	=	 GeriDöndür($Kayitlar["UrunSayisi"]);
				
				echo "<option value='" . $MenuId . "'>" . str_repeat("&nbsp;", $BoslukDegeri) . $MenuMenuAdi . "</option>";
				AcilirListeIcinMenuYaz($MenuId, $BoslukDegeri+5);
			}
		}
	}
	
	function MenuYaz($MenuUstIdDegeri=0, $BoslukDegeri=0){
		global $DataBaseConnection;
		global $GelenTabloAdi;
		
		$MenuSorgusu			=	$DataBaseConnection->query("SELECT * FROM menuler WHERE ustID = $MenuUstIdDegeri AND TabloAdi = '$GelenTabloAdi'");
		$MenuSorugusuSayi		=	$MenuSorgusu->num_rows;
		
		if($MenuSorugusuSayi>0){
			while($Kayitlar = $MenuSorgusu->fetch_assoc()){
				$MenuId			=	 GeriDöndür($Kayitlar["id"]);
				$MenuTabloAdi	=	 GeriDöndür($Kayitlar["TabloAdi"]);
				$MenuUrunTuru	=	 GeriDöndür($Kayitlar["UrunTuru"]);
				$MenuMenuAdi	=	 GeriDöndür($Kayitlar["MenuAdi"]);
				$MenuUstId		=	 GeriDöndür($Kayitlar["ustID"]);
				$MenuUrunSayisi	=	 GeriDöndür($Kayitlar["UrunSayisi"]);
                echo "<tr><td>";
				echo str_repeat("&nbsp;", $BoslukDegeri). $MenuMenuAdi. " (".$MenuUrunSayisi.") <a href='index.php?SKI=48&Mid=" . $MenuId . "'  style='text-decoration: none; color: #006600'>[Güncelle]</a>
                &nbsp;<a href='index.php?SKI=51&Mid=" . $MenuId . "' style='text-decoration: none; color: #ff0000'>[Sil]</a><br />";
				MenuYaz($MenuId, $BoslukDegeri+10);
                echo "</td></tr>";
			}
		}
	}
	
	// Yeni Menü Ekleme
	?>
	<br />
	<form action="index.php?SKI=46" method="post">
        <table width="300" align="center">
            <tr><td align="center">Menü Ekleme Formu</td></tr>
            <tr><td align="center">Üst Menü : <select name="UstMenuSecimi" class="MenuSelectAlani">
                    <option value="0">Ana Menü Ekle</option>
                    <?php AcilirListeIcinMenuYaz(); ?>
                </select></td>
            </tr>
            <tr><td align="center">Menü Adı : <input type="text" name="MenuAdi"></td></tr>
            <input type="hidden" name="TabloAdi" value="<?php echo $GelenTabloAdi; ?>">
            <tr><td align="center"><input type="submit" value="Menü Ekle" class="YesilButon"></td></tr>
	</table></form>
	
    
    
    <table>
        <tr height="10"><td>&nbsp;</td></tr>
    <?php
    // Menüleri Listeleme
    MenuYaz();
    ?>
    </table>
    
<?php }else{
    header("Location:index.php?SKD=1");
    exit();
} ?>