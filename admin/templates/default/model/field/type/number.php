<?
$min = isset($item['min']) ? $item['min'] : 1;
$max = isset($item['max']) ? $item['max'] : '';
$decimaldigits = isset($item['decimaldigits']) ? $item['decimaldigits'] : 0;
?>
<div class="control-group">
    <label class="control-label">取值范围</label>
    <div class="controls">
        <input type="text" name="attr[min]" value="<?php echo $min;?>" class="m-wrap"> -
        <input type="text" name="attr[max]" value="<?php echo $max;?>" class="m-wrap">
    </div>
</div>
<div class="control-group">
    <label class="control-label">小数位数</label>
    <div class="controls">
        <select name="attr[decimaldigits]">
          <option value="-1" <?php if ($decimaldigits == -1) echo 'selected="selected"';?>>自动</option>
          <option value="0" <?php if ($decimaldigits == 0) echo 'selected="selected"';?>>0</option>
          <option value="1" <?php if ($decimaldigits == 1) echo 'selected="selected"';?>>1</option>
          <option value="2" <?php if ($decimaldigits == 2) echo 'selected="selected"';?>>2</option>
          <option value="3" <?php if ($decimaldigits == 3) echo 'selected="selected"';?>>3</option>
          <option value="4" <?php if ($decimaldigits == 4) echo 'selected="selected"';?>>4</option>
          <option value="5" <?php if ($decimaldigits == 5) echo 'selected="selected"';?>>5</option>
	    </select>
    </div>
</div>
<link href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    App.init(); // initlayout and core plugins
});
</script>