<?=form_open('index.php/test/update');?>
<table border="0" cellpading="5" > 
<p><input type="hidden" name="id" value="<?php echo $kd?>"></p>    
<p><input type="text" name="txtname" value="<?php echo $nm?>"></p>         
<p><input type="text" name="txttel" value="<?php echo $no?>"></p>            
<p><input type="text" name="txtcity" value="<?php echo $ct?>"></p>            
<p><input type="text" name="txtstate" value="<?php echo $st?>"></p>            
<p></table>
<?=form_submit('btnsubmit','Save');?>
<?=form_close();?>