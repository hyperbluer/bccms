<?
$type = isset($item['type']) ? $item['type'] : '';
$options = isset($item['options']) ? $item['options'] : '';
$fieldtype = isset($item['fieldtype']) ? $item['fieldtype'] : '';
?>
<div class="control-group">
    <label class="control-label">选项类型</label>
    <div class="controls">
        <label class="radio">
            <input type="radio" name="attr[type]" value="radio" <?php if ($type == 'radio') echo 'checked="checked"';?>> 单选按钮
        </label>
        <label class="radio">
            <input type="radio" name="attr[type]" value="checkbox" <?php if ($type == 'checkbox') echo 'checked="checked"';?>> 复选框
        </label>
        <label class="radio">
            <input type="radio" name="attr[type]" value="select" <?php if ($type == 'select') echo 'checked="checked"';?>> 下拉框
        </label>
        <label class="radio">
            <input type="radio" name="attr[type]" value="multiple" <?php if ($type == 'multiple') echo 'checked="checked"';?>> 多选列表框
        </label>
    </div>
</div>
<div class="control-group">
    <label class="control-label">选项列表</label>
    <div class="controls">
        <textarea name="attr[options]" class="large m-wrap" rows="3" placeholder="选项名称1|选项值1" ><?php echo $options;?></textarea>
        <span class="help-inline"></span>
    </div>
</div>
<div class="control-group">
    <label class="control-label">字段类型</label>
    <div class="controls">
        <select name="attr[fieldtype]" class="m-wrap">
          <option value="varchar" <?php if ($fieldtype == 'varchar') echo 'selected="selected"';?>>字符 VARCHAR</option>
          <option value="tinyint" <?php if ($fieldtype == 'tinyint') echo 'selected="selected"';?>>整数 TINYINT(3)</option>
          <option value="smallint" <?php if ($fieldtype == 'smallint') echo 'selected="selected"';?>>整数 SMALLINT(5)</option>
          <option value="mediumint" <?php if ($fieldtype == 'mediumint') echo 'selected="selected"';?>>整数 MEDIUMINT(8)</option>
          <option value="int" <?php if ($fieldtype == 'int') echo 'selected="selected"';?>>整数 INT(10)</option>
        </select>
        <span class="help-inline">选项类型为复选框、多选列表框时，字段类型必须为字符</span>
    </div>
</div>
<link href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    App.init(); // initlayout and core plugins
});
</script>