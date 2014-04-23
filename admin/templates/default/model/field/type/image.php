<?
$allow_ext = isset($item['allow_ext']) ? $item['allow_ext'] : 'gif|jpg|jpeg';
$watermark = isset($item['watermark']) ? $item['watermark'] : 0;
?>
<div class="control-group">
    <label class="control-label">允许上传的图片类型</label>
    <div class="controls">
        <input type="text" name="attr[allow_ext]" value="<?php echo $allow_ext;?>" class="m-wrap">
    </div>
</div>
<div class="control-group">
    <label class="control-label">水印</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" name="attr[watermark]" value="1" <?php if ($watermark == 1) echo 'checked="checked"';?>> 是
        </label>
        <label class="radio">
            <input type="radio" name="attr[watermark]" value="0" <?php if ($watermark == 0) echo 'checked="checked"';?>> 否
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