<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>添加留言</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
				<form action="<?php echo _url('guestbook/index/add')?>" id="form_add" class="form-horizontal form-bordered form-row-stripped" method="post"  enctype="multipart/form-data">
                <div class="control-group">
					<label class="control-label" for="input_guestname">昵称 <span class="required">*</span></label>
					<div class="controls">
						<input name="info[guestname]" id="input_guestname" type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_email">E-mail</label>
					<div class="controls">
						<input name="info[email]" id="input_email" type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_tel">电话</label>
					<div class="controls">
						<input name="info[tel]" id="input_tel" type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_mobile">手机号码</label>
					<div class="controls">
						<input name="info[mobile]" id="input_mobile" type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_address">联系地址</label>
					<div class="controls">
						<input name="info[address]" id="input_address" type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_content">内容 <span class="required">*</span></label>
					<div class="controls">
						<textarea name="info[content]" id="input_content" placeholder="" class="large m-wrap"></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_status">状态</label>
					<div class="controls">
						<div class="text-toggle-button" data-enabled="显示" data-disabled="不显示">
							<input type="checkbox" name="info[status]" id="input_status" class="toggle" checked="checked" />
						</div>
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
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_ADMIN_PATH?>js/form-components.js" type="text/javascript"></script>
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
            'info[guestname]': {
                minlength: 2,
                required: true
            },
			'info[content]': {
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