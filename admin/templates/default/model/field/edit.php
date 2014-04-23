<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>编辑字段</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?php echo _url('model/field/edit', array('model_id' => $modelId, 'id' => $item['alias']))?>" id="form_add" class="form-horizontal form-bordered form-row-stripped" method="post">
                    <div class="control-group">
                        <label class="control-label" for="input_name">名称 <span class="required">*</span></label>
                        <div class="controls">
                            <input name="info[name]" id="input_name" value="<?php echo $item['name'];?>" type="text" placeholder="" class="m-wrap"/>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_alias">别名 <span class="required">*</span></label>
                        <div class="controls">
                            <input name="info[alias]" id="input_alias" value="<?php echo $item['alias'];?>" type="text" placeholder="" <?php if ($item['is_system']):?>readonly="readonly" <?php else:?>class="m-wrap"<?php endif;?> />
                            <span class="help-inline">字段名称，3-20位字母</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_tips">提示</label>
                        <div class="controls">
                            <input name="info[tips]" id="input_tips" value="<?php echo $item['tips'];?>" type="text" placeholder="" class="m-wrap"/>
                            <span class="help-inline">显示在字段别名下方作为表单输入提示</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_type">类型 <span class="required">*</span></label>
                        <div class="controls">
                            <select name="info[type]" id="input_type"  <?php if ($item['is_system']):?>readonly="readonly"<?php else:?>class="m-wrap"<?php endif;?> data-url="<?php echo _url('model/field/showAttrForm')?>">
                                <option value="" selected="">请选择字段类型</option>
                                <option value="int" <?php if ($item['type'] == 'int') echo 'selected="selected"';?>>整型</option>
                                <option value="text" <?php if ($item['type'] == 'text') echo 'selected="selected"';?>>单行文本</option>
                                <option value="textarea" <?php if ($item['type'] == 'textarea') echo 'selected="selected"';?>>多行文本</option>
                                <option value="editor" <?php if ($item['type'] == 'editor') echo 'selected="selected"';?>>编辑器</option>
                                <option value="box" <?php if ($item['type'] == 'box') echo 'selected="selected"';?>>选项</option>
                                <option value="image" <?php if ($item['type'] == 'image') echo 'selected="selected"';?>>图片</option>
                                <option value="number" <?php if ($item['type'] == 'number') echo 'selected="selected"';?>>数字</option>
                                <option value="datetime" <?php if ($item['type'] == 'datetime') echo 'selected="selected"';?>>日期和时间</option>
                                <option value="colorpicker" <?php if ($item['type'] == 'colorpicker') echo 'selected="selected"';?>>颜色选择器</option>
                            </select>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div id="type_attr" class="form-actions hide">
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_value">默认值</label>
                        <div class="controls">
                            <input name="info[value]" value="<?php echo $item['value'];?>" id="input_value" type="text" placeholder="" class="m-wrap"/>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">宽度</label>
                        <div class="controls">
                            <input type="text" name="info[width]" value="<?php echo $item['width'];?>" class="m-wrap">
                            <span class="help-inline">表单控件的显示的宽度,单位为px</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">高度</label>
                        <div class="controls">
                            <input type="text" name="info[height]" value="<?php echo $item['height'];?>" class="m-wrap">
                            <span class="help-inline">表单控件的显示的高度,单位为px</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_pattern">验证规则</label>
                        <div class="controls">
                            <input type="text" name="info[pattern]" value="<?php echo $item['pattern'];?>" id="input_pattern" class="m-wrap">
                            <select class="m-wrap" name="pattern_select" onchange="$('#input_pattern').val(this.value)">
                                <option value="">常用正则</option>
                                <option value="/^[0-9.-]+$/">数字</option>
                                <option value="/^[0-9-]+$/">整数</option>
                                <option value="/^[a-z]+$/i">字母</option>
                                <option value="/^[0-9a-z]+$/i">数字+字母</option>
                                <option value="/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/">E-mail</option>
                                <option value="/^[0-9]{5,20}$/">QQ</option>
                                <option value="/^http:\/\//">超级链接</option>
                                <option value="/^(1)[0-9]{10}$/">手机号码</option>
                                <option value="/^[0-9-]{6,13}$/">电话号码</option>
                                <option value="/^[0-9]{6}$/">邮政编码</option>
                            </select>
                            <span class="help-inline">系统将通过此正则校验表单提交的数据合法性</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_error_tips">错误提示</label>
                        <div class="controls">
                            <input name="info[error_tips]" id="input_error_tips" value="<?php echo $item['error_tips'];?>" type="text" placeholder="" class="m-wrap"/>
                            <span class="help-inline">数据校验未通过的提示信息</span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label" for="input_sort_order">排序</label>
                        <div class="controls">
                            <input name="info[sort_order]" id="input_sort_order" value="<?php echo $item['sort_order'];?>" type="text" placeholder="" class="m-wrap"/>
                            <span class="help-inline"></span>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">是否必填</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="info[required]" value="1" <?php if ($item['required'] == 1):?>checked="checked"<?php endif;?>> 是
                            </label>
                            <label class="radio">
                                <input type="radio" name="info[required]" value="0" <?php if ($item['required'] == 0):?>checked="checked"<?php endif;?>> 否
                            </label>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">状态</label>
                        <div class="controls">
                            <label class="radio">
                                <input type="radio" name="info[status]" value="1" <?php if ($item['status'] == 1):?>checked="checked"<?php endif;?>> 启用
                            </label>
                            <label class="radio">
                                <input type="radio" name="info[status]" value="0" <?php if ($item['status'] == 0):?>checked="checked"<?php endif;?>> 禁用
                            </label>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn green">提交</button>
                        <a href="javascript:window.history.go(-1);" type="button" class="btn">返回</a>
                    </div>
                </form>
                <!-- END FORM-->
		    </div>
		</div>
    </div>
</div>
<!-- END PAGE CONTENT-->
<?php echo $_footer;?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/jquery-multi-select/css/multi-select-metro.css" />

<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_ADMIN_PATH?>js/form-components.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    FormComponents.init();

    $.ajax({
        type: "GET",
        dataType: "html",
        url: $("#input_type").attr('data-url'),
        data: {
            "type": "<?php echo $item['type'];?>",
            "model_id":"<?php echo $modelId;?>",
            "id": "<?php echo $item['alias'];?>",
        },
        success: function(data){
             $('#type_attr').html(data);
             $('#type_attr').removeClass('hide');
        }
    });

    $('#input_type').change(function(){
        var type = $(this).val();
        if (type == '' || type == undefined) {
            $('#type_attr').addClass('hide');
            $('#type_attr').html('');
            return false;
        }
        
        $.ajax({
            type: "GET",
            dataType: "html",
            url: $(this).attr('data-url'),
            data: {
                "type":type
            },
            success: function(data){
                $('#type_attr').html(data);
                $('#type_attr').removeClass('hide');
            }
        })
    });

    var $form = $('#form_add');

    $form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-inline', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            name: {
                minlength: 2,
                required: true
            }
        },
        invalidHandler: function (event, validator) { //display error alert on form submit
			$('.alert-error', $form).show();
		},
		highlight: function (element) { // hightlight error inputs
			$(element).closest('.control-group').addClass('error'); // set error class to the control group
		},
		success: function (label) {
			label.closest('.control-group').removeClass('error');
			label.remove();
		}
    });
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->