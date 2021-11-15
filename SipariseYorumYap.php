<script type="text/javascript">
function PuanKontrol() {
    var Puan = document.getElementsByName("Puan");
    
    if(Puan[0].checked){
		
    }else if(Puan[1].checked){
		
    }else if(Puan[2].checked){

    }else if(Puan[3].checked){

    }else if(Puan[4].checked){

    }else{
        alert("Puanlama alanı boş bırakılamaz!");
        window.history.back();
    }   
}
</script>
<!--                     //--------------------------------------------   -->
<?php if(isset($_SESSION["Kullanici"])){ 
//--------------------------------------------

if(isset($_GET["TA"])){
    $AlinanUrunYorumYapTablo = GuvenlikFiltresi($_GET["TA"]);
}else{
    $AlinanUrunYorumYapTablo = "";
}
//--------------------------------------------

if(isset($_GET["UID"])){
    $AlinanUrunYorumYapUrunID = SadeceSayilar($_GET["UID"]);
}else{
    $AlinanUrunYorumYapUrunID = "";
}
    

if(($AlinanUrunYorumYapTablo != "") and ($AlinanUrunYorumYapUrunID != "")){
?>
<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr>
      <td width="520" valign="top">
          <form action="SipariseYorumYapF" method="post">
              <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
                  <tr height="50">
                      <td style="color: #FF9900"><h3>Yorumlarım</h3></td>
                  </tr>

                  <tr height="40">
                      <td valign="top" style="border-bottom: 1px dashed #A7A7A7">Fikirleriniz bizim için değerli.</td>
                  </tr>

                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Puanlama (*)</td>
                  </tr>
                  
                  <tr>
                      <td valign="bottom" align="left">
                          <table width="370" align="center" border="0" cellpadding="0" cellspacing="0">
                              <tr>
                              <td width="66" align="center"><input id="bes" type="radio" name="Puan" value="5"></td>
                              <td width="10">&nbsp;</td>
                              <td width="66" align="center"><input id="dord" type="radio" name="Puan" value="4"></td>
                              <td width="10">&nbsp;</td>
                              <td width="66" align="center"><input id="uc" type="radio" name="Puan" value="3"></td>
                              <td width="10">&nbsp;</td>
                              <td width="66" align="center"><input id="iki" type="radio" name="Puan" value="2"></td>
                              <td width="10">&nbsp;</td>
                              <td width="66" align="center"><input id="bir" type="radio" name="Puan" value="1"></td>
                              </tr>                          
                              <tr>
                              <td width="66"><label for="bes"><img src="Resimler/YildizBesDolu.png"></label></td>
                              <td width="10">&nbsp;</td>
                              <td width="66"><label for="dord"><img src="Resimler/YildizDortDolu.png"></td>
                              <td width="10">&nbsp;</td>
                              <td width="66"><label for="uc"><img src="Resimler/YildizUcDolu.png"></label></td>
                              <td width="10">&nbsp;</td>
                              <td width="66"><label for="iki"><img src="Resimler/YildizIkiDolu.png"></label></td>
                              <td width="10">&nbsp;</td>
                              <td width="66"><label for="bir"><img src="Resimler/YildizBirDolu.png"></label></td>
                              </tr>
                          </table></td>
                  </tr>
                  
                  <tr height="30">
                      <td valign="bottom" align="left" style="color: #000000">Yorum Metni</td>
                  </tr>
                  <tr height="30">
                      <td valign="top"><textarea name="yorum" class="TextAlanlari" placeholder="Ürün vaya satıcı hakkındaki fikir &amp; görüşlerinizi buradan paylaşabilirsiniz"></textarea></td>
                  </tr>
                  <input type="hidden" name="TA" value="<?php echo $AlinanUrunYorumYapTablo; ?>">
                  <input type="hidden" name="UID" value="<?php echo $AlinanUrunYorumYapUrunID; ?>">
                  <tr height="80">
                      <td align="center"><input type="submit" value="Yorum Yap" onclick="PuanKontrol()" class="YesiButon"></td>
                  </tr>
              </table>
          </form>
      </td>
      
      <td width="25">&nbsp;</td>
      
      
      <td width="520" valign="top">
          <table width="520" align="center" border="0" cellpadding="0" cellspacing="0">
              <tr height="50">
                  <td style="color: #FF9900"><h3>Reklamlar</h3></td>
              </tr>
              
              <tr height="40">
                  <td><img src="Resimler/ReklamVer.png"></td>
              </tr>
              
              <tr height="30">
                  <td>&nbsp;</td>
              </tr>
         </table>
      </td>
    </tr>
</table>
<?php
    }else{
          header("Location:Siparislerim/1");
          exit();
      }
}else{
    header("Location:AnaSayfa");
    exit();
}
?>