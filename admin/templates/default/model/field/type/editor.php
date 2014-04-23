<?
$toolbar = isset($item['toolbar']) ? $item['toolbar'] : 'basic';
$remote_image = isset($item['remote_image']) ? $item['remote_image'] : 0;
?>
<div class="control-group">
    <label class="control-label">编辑器样式</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" name="attr[toolbar]" value="basic" <?php if ($toolbar == 'basic') echo 'checked="checked"';?>> 简洁型
        </label>
        <label class="radio">
            <input type="radio" name="attr[toolbar]" value="full" <?php if ($toolbar == 'full') echo 'checked="checked"';?>> 标准型
        </label>
    </div>
</div>
<div class="control-group">
    <label class="control-label">是否保存远程图片</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" name="attr[remote_image]" value="1" <?php if ($remote_image == 1) echo 'checked="checked"';?>> 是
        </label>
        <label class="radio">
            <input type="radio" name="attr[remote_image]" value="0"  <?php if ($remote_image == 0) echo 'checked="checked"';?>> 否
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