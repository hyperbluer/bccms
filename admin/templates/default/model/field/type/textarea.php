<?
$html = isset($item['html']) ? $item['html'] : 0;
?>
<div class="control-group">
    <label class="control-label">是否允许Html</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" name="attr[html]" value="1" <?php if ($html == 1) echo 'checked="checked"';?>> 是
        </label>
        <label class="radio">
            <input type="radio" name="attr[html]" value="0"  <?php if ($html == 0) echo 'checked="checked"';?>> 否
        </label>
    </div>
</div>
<link href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    App.init(); // initlayout and core plugins
});
</script>