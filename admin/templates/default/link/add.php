<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>添加链接</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
				<form action="<?php echo _url('link/index/add')?>" id="form_add" class="form-horizontal form-bordered form-row-stripped" method="post"  enctype="multipart/form-data">
                <div class="control-group">
					<label class="control-label" for="input_sitename">站点名称 <span class="required">*</span></label>
					<div class="controls">
						<input name="info[sitename]" id="input_sitename" type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_website">网址</label>
					<div class="controls">
						<input name="info[website]" id="input_website" type="text" placeholder="http://" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_logo">LOGO</label>
					<div class="controls">
						<div class="fileupload fileupload-new" data-provides="fileupload">
							<div class="input-append">
								<div class="uneditable-input">
									<i class="icon-file fileupload-exists"></i>
									<span class="fileupload-preview"></span>
								</div>
								<span class="btn btn-file">
								<span class="fileupload-new">选择文件</span>
								<span class="fileupload-exists">更换</span>
									<input type="file" name="file[logo]" id="input_logo" class="default" />
								</span>
								<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
							</div>
							<span class="help-inline"></span>
						</div>
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
					<label class="control-label" for="input_description">描述</label>
					<div class="controls">
						<textarea name="info[description]" id="input_description" placeholder="" class="large m-wrap"></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_sort_order">排序</label>
					<div class="controls">
						<input name="info[sort_order]" id="input_sort_order" type="text" placeholder="" class="m-wrap" value="0"/>
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
            'info[sitename]': {
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