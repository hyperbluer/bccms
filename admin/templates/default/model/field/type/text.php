<?
$password = isset($item['password']) ? $item['password'] : 0;
?>
<div class="control-group">
    <label class="control-label">是否为密码框</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" name="attr[password]" value="1" <?php if ($password == 1) echo 'checked="checked"';?>> 是
        </label>
        <label class="radio">
            <input type="radio" name="attr[password]" value="0" <?php if ($password == 0) echo 'checked="checked"';?>> 否
        </label>
    </div>
</div>
<div class="control-group">
    <label class="control-label">最大存储字节数</label>
    <div class="controls">
        <input type="text" name="attr[max]" value="" class="m-wrap" min="1">
		<span class="help-inline">取值范围：1-255</span>
    </div>
</div>
<link href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    App.init(); // initlayout and core plugins
});
</script>