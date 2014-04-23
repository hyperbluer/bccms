<?
$format = isset($item['format']) ? $item['format'] : '';
?>
<div class="control-group">
    <label class="control-label">格式</label>
    <div class="controls">
        <input type="text" name="attr[format]" id="input_attr_value" value="<?php echo $format;?>" class="m-wrap">
        <select class="m-warp" onchange="$('#input_attr_value').val(this.value)">
            <option value="">常用格式</option>
            <option value="Y-m-d">日期（2013-01-01）</option>
            <option value="Y-m-d H:i:s">日期时间（2013-01-01 00:00:00）</option>
            <option value="H:i:s">时间（00:00:00）</option>
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