<?php 
if(isset($_SESSION["Yonetici"])){
      
if(isset($_GET["SID"])){
    $SSS_ID = SadeceSayilar($_GET["SID"]);
}else{
    $SSS_ID = "";
}
//--------------------------------------------

if($SSS_ID != ""){
    
    $KayitCek = $DataBaseConnection->query("SELECT * FROM sss WHERE id = $SSS_ID LIMIT 1");
    while($SSS_Kayitlari = $KayitCek->fetch_assoc()){
        

        
        $SSS_id     = $SSS_Kayitlari["id"];
        $SSS_Soru   = $SSS_Kayitlari["soru"];
        $SSS_Cevap  = $SSS_Kayitlari["cevap"];
    }
    if($KayitCek->num_rows){
    ?>
<form action="index.php?SKD=0&SKI=41" method="post">
<table width="100%" height="100%" align="center" border="0" cellpadding="0" cellspacing="0">
    
    <tr height="120">
        <td align="center" valign="middle" bgcolor="#b3ffff" style="color: #8c66ff"><h1>SIK SORULAN SORULAR VE DESTEK</h1></td>
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
                    <td width="200">&nbsp;&nbsp;&nbsp;Soru</td>
                    <td width="10">:</td>
                    <td><input type="text" name="soru" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($SSS_Soru); ?>" required></td>
                </tr>
                <tr height="50">
                    <td width="200">&nbsp;&nbsp;&nbsp;Cevap</td>
                    <td width="10">:</td>
                    <td><input type="text" name="cevap" class="InputAlanlariTEKLI" value="<?php echo GeriDöndür($SSS_Cevap); ?>" required></td>
                </tr>
                <input type="hidden" name="SSS_KayitID" value="<?php echo GeriDöndür($SSS_id); ?>">
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
        header("Location:index.php?SKI=42"); //hata
        exit();
    }
}else{
    header("Location:index.php?SKD=1");
    exit();
} 
?>