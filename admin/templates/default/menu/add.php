<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h3>添加菜单</h3>
</div>
<div class="modal-body">
    <div class="alert fade hide">
        <span></span><button type="button" class="close" data-dismiss="alert"></button>
    </div>
    <div class="form">
    <!-- BEGIN FORM-->
	<form action="<?php echo _url('menu/index/add')?>" id="form_add" class="form-horizontal form-bordered form-row-stripped" method="post">
        <div class="control-group">
            <label class="control-label" for="input_name">名称 <span class="required">*</span></label>
            <div class="controls">
                <input name="name" id="input_name" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_alias">别名 <span class="required">*</span></label>
            <div class="controls">
                <input name="alias" id="input_alias" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_parent_id">上级菜单 <span class="required">*</span></label>
            <div class="controls">
                <select class="m-wrap" name="parent_id" id="input_parent_id">
                    <option value="0">一级菜单</option>
                    <?php foreach($selectTree as $k => $node):?>
                    <option value="<?php echo  $node->id;?>"><?php echo $node->name;?></option>
                        <?php if (is_array($node->children) && count($node->children)):?>
                        <?php foreach ($node->children as $k => $nodeSecond):?>
                            <option value="<?php echo $nodeSecond->id;?>">&nbsp;&nbsp;- <?php echo $nodeSecond->name;?></option>
                        <?php endforeach;?>
                        <?php endif;?>
                    <?php endforeach;?>
                </select>
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_url">URL <span class="required">*</span></label>
            <div class="controls">
                <input name="url" id="input_url" type="text" placeholder="" class="m-wrap" value="#"/>
                <span class="help-inline">内部路径格式：module/controller/action，例如：admin/user/index</span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_params">参数</label>
            <div class="controls">
                <input name="params" id="input_params" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline">参数格式：a=value_1&b=value2</span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_sort_order">排序</label>
            <div class="controls">
                <input name="sort_order" id="input_sort_order" type="text" placeholder="" class="m-wrap" value="0"/>
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_status">状态</label>
            <div class="controls">
                <div class="text-toggle-button" data-enabled="显示" data-disabled="不显示">
                    <input type="checkbox" name="status" id="input_status" class="toggle" checked="checked" />
                </div>
            </div>
        </div>
	</form>
	<!-- END FORM-->
    </div>
</div>
<div class="modal-footer">
	<button type="button" data-dismiss="modal" class="btn">关闭</button>
	<button type="button" class="btn green save">提交</button>
</div>
<script>
jQuery(document).ready(function() {
    FormComponents.init();
    
    var ajax_handler = false,
        $modal = $('#ajax-modal'),
        $form = $('#form_add');

    $form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-inline', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            name: {
                minlength: 2,
                required: true
            },
            alias: {
                minlength: 2,
                required: true
            },
            parent_id: {
                minlength: 1,
                required: true
            },
            url: {
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
		},
        submitHandler:function(form){
            return false;
        } 
    });

	$modal.on('click', '.save', function(){
        var _this = $(this);
        _this.attr('disabled', 'disabled');
        if (ajax_handler === true) return false; //判断ajax是否执行完成

        var name = $form.find('input[name=name]').val(),
            alias = $form.find('input[name=alias]').val(),
            parent_id = $form.find('#input_parent_id').val(),
            url = $form.find('input[name=url]').val(),
            params = $form.find('input[name=params]').val(),
            sort_order = $form.find('input[name=sort_order]').val(),
            status = $form.find('input[name=status]').is(':checked') === true ? 1 : 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: $form.attr('action'),
            data: {
                "info[name]":name,
                "info[alias]":alias,
                "info[parent_id]":parent_id,
                "info[url]":url,
                "info[params]":params,
                "info[sort_order]":sort_order,
                "info[status]":status
            },
            success: function(data){
                $modal.find('.modal-body .alert span').text(data.message);
                if (data.statusCode){
                    $modal.bind('click', '.close', function(){
                         window.location.reload();
                    });
                    setTimeout(function(){
                        $modal.modal('loading').find('.modal-body .alert')
                                .removeClass('hide alert-error')
                                .addClass('in alert-success');
                        $modal.find('.modal-body .form').replaceWith('');
                    }, 1000);
                    setTimeout(function(){
                        $(".close").click();
                    }, 4000);
                }else{
                    _this.removeAttr('disabled');
                    setTimeout(function(){
                        $modal.modal('loading').find('.modal-body .alert')
                                .removeClass('hide alert-success')
                                .addClass('in alert-error');
                    }, 1000);
                }

            },
            error: function(e){
                _this.removeAttr('disabled');
                setTimeout(function(){
                    $modal.find('.modal-body .alert span').text('操作失败');
                    $modal.modal('loading').find('.modal-body .alert')
                            .removeClass('hide alert-success alert-info')
                            .addClass('in alert-error');
                }, 1000);
            },
            complete: function(e){
                ajax_handler = false;
            },
            beforeSend: function(e){
                if ($form.validate().form() != true) {
                    _this.removeAttr('disabled');
                    return false;
                }
                ajax_handler = true;
                
                $modal.modal('loading');
            }
        })
	});

});
</script>