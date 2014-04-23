<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h3>添加管理员</h3>
</div>
<div class="modal-body">
    <div class="alert fade hide">
        <span></span><button type="button" class="close" data-dismiss="alert"></button>
    </div>
    <div class="form">
    <!-- BEGIN FORM-->
	<form action="<?php echo _url('administrator/index/add');?>" id="form_add" class="form-horizontal form-bordered form-row-stripped" method="post">
        <div class="control-group">
            <label class="control-label" for="input_username">用户名 <span class="required">*</span></label>
            <div class="controls">
                <input name="username" id="input_username" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_nickname">昵称 <span class="required">*</span></label>
            <div class="controls">
                <input name="nickname" id="input_nickname" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_password">密码 <span class="required">*</span></label>
            <div class="controls">
                <input name="password" id="input_password" type="password" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_password_confirm">确认密码 <span class="required">*</span></label>
            <div class="controls">
                <input name="password_confirm" id="input_password_confirm" type="password" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_email">邮箱 <span class="required">*</span></label>
            <div class="controls">
                <input name="email" id="input_email" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_role_id">用户组 <span class="required">*</span></label>
            <div class="controls">
                <select class="m-wrap" name="role_id" id="input_role_id">
                    <option value="">请选择...</option>
                    <?php foreach($roleList as $k => $v):?>
                    <option value="<?php echo $v['role_id'];?>"><?php echo $v['name'];?></option>
                    <?php endforeach;?>
                </select>
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_status">状态</label>
            <div class="controls">
                <div class="text-toggle-button" data-enabled="正常" data-disabled="禁用">
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
            username: {
                minlength: 2,
                required: true
            },
            nickname: {
                minlength: 2,
                required: true
            },
            password: {
                minlength: 6,
                required: true
            },
            password_confirm: {
                minlength: 6,
                required: true
            },
            email: {
                required: true,
                email: true
            },
            role_id: {
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

        var username = $form.find('input[name=username]').val(),
            nickname = $form.find('input[name=nickname]').val(),
            password = $form.find('input[name=password]').val(),
            email = $form.find('input[name=email]').val(),
            role_id = $form.find('#input_role_id').val(),
            status = $form.find('input[name=status]').is(':checked') === true ? 1 : 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: $form.attr('action'),
            data: {
                "info[username]":username,
                "info[nickname]":nickname,
                "info[password]":password,
                "info[email]":email,
                "info[role_id]":role_id,
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