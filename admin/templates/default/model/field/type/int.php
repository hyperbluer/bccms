<?
$type = isset($item['type']) ? $item['type'] : 'int';
?>
<div class="control-group">
    <label class="control-label">字段类型</label>
    <div class="controls">
        <select name="attr[type]" class="m-wrap">
          <option value="tinyint" <?php if ($type == 'tinyint') echo 'selected="selected"';?>>TINYINT(3)</option>
          <option value="smallint" <?php if ($type == 'smallint') echo 'selected="selected"';?>>SMALLINT(5)</option>
          <option value="mediumint" <?php if ($type == 'mediumint') echo 'selected="selected"';?>>MEDIUMINT(8)</option>
          <option value="int" <?php if ($type == 'int') echo 'selected="selected"';?>>INT(10)</option>
        </select>
        <span class="help-inline"></span>
    </div>
</div>
<link href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    App.init(); // initlayout and core plugins
});
</script>