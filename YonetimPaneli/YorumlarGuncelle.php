<?php 
if(isset($_SESSION["Yonetici"])){
    
      
if(isset($_GET["YorID"])){
    $YorumID = SadeceSayilar($_GET["YorID"]);
}else{
    $YorumID = "";
}
//--------------------------------------------
if($YorumID != ""){
    
    $KayitCek = $DataBaseConnection->query("SELECT * FROM yorumlar WHERE id = $YorumID LIMIT 1");
    while($YorumlariYaz = $KayitCek->fetch_assoc()){
        
        $YorumID            = GeriDöndür($YorumlariYaz["id"]);
        $YorumTabloAdi      = GeriDöndür($YorumlariYaz["TabloAdi"]);
        $YorumUrunid        = GeriDöndür($YorumlariYaz["Urunid"]);
        $YorumUyeID         = GeriDöndür($YorumlariYaz["UyeID"]);
        $YorumPuan          = GeriDöndür($YorumlariYaz["Puan"]);
        $YorumYazisi        = GeriDöndür($YorumlariYaz["Yorum"]);
        $YorumTarihi        = GeriDöndür($YorumlariYaz["YorumTarihi"]);
        $YorumIPadresi      = GeriDöndür($YorumlariYaz["YorumYapaninIPadresi"]);
        
    }
    if($KayitCek->num_rows){
        

        $UrunQuery  = $DataBaseConnection->query("SELECT * FROM $YorumTabloAdi WHERE id = $YorumUrunid LIMIT 1");
        $UrunSayisi = $UrunQuery->num_rows;
        if($UrunSayisi){    
            $UrunCek    = $UrunQuery->fetch_assoc();
        }
        $UyeQuery  = $DataBaseConnection->query("SELECT * FROM uyeler WHERE id = $YorumUyeID LIMIT 1");
        $UyeSayisi = $UyeQuery->num_rows;
        if($UyeSayisi){    
            $UyeCek    = $UyeQuery->fetch_assoc();
        }

    ?>
<form action="index.php?SKD=0&SKI=70" method="post">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>YORUMLAR</h1></td>
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
                    <td width="10">&nbsp;&nbsp;&nbsp;Yorum Yapılan Ürün Resmi</td>
                    <td width="10">:</td>
                    <td width="180" align="left"><img src="<?php echo "../".$UrunCek["UrunResmiBIR"]; ?>" border="0" width="180" height="100"></td>
                </tr>
                <tr height="50">
                    <td width="10">&nbsp;&nbsp;&nbsp;Yorum</td>
                    <td width="10">:</td>
                    <td><textarea name="Yorum" class="TextAlanlari" required><?php echo $YorumYazisi; ?></textarea></td>
                </tr>
                <input type="hidden" name="YorumKayitID" value="<?php echo GeriDöndür($YorumID); ?>">
                <tr height="50">
                    <td colspan="3" align="left">&nbsp;&nbsp;&nbsp;<input type="submit" value="Yorumu Güncelle" class="KirmiziButon"></td>
                </tr>
            </table>
        </td>
    </tr>
</table>
</form>    

<?php
        }
    }else{
        header("Location:index.php?SKI=4");
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>