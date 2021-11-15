<table width="1065" align="center" border="0" cellpadding="0" cellspacing="0">
  <tr height="80" bgcolor="#B9B651">
      <td align="left"><h2 style="color: #8F0D0F">&nbsp;SIKÇA SORULAN SORULAR</h2></td>
  </tr>
  
  <tr height="50">
      <td align="left" align="left" style="border-bottom: 2px dashed #8F0D0F"><br>&nbsp;Aklınıza gelebilecek sorular</td>
  </tr>

  <tr height="30">
      <td>&nbsp;</td>
  </tr>

  <tr>
      <td><?php
              $quuerySoru         = $DataBaseConnection->query("SELECT * FROM sss");
              $kayitsayisi        = $quuerySoru->num_rows;
          
          while($icerikSoru = $quuerySoru->fetch_assoc()){
              ?>
          <div>
              <div id="<?php echo $icerikSoru["id"] ?>" class="SSS-sorular" onClick="$.SoruIcerigiGoster(<?php echo $icerikSoru["id"] ?>)"> <?php echo $icerikSoru["soru"] ?></div>
              <div class="SSScevapAlani" style="display: none">&nbsp;<?php echo $icerikSoru["cevap"] ?></div>
          </div>
           <?php } ?>
      </td>
  </tr>
</table>