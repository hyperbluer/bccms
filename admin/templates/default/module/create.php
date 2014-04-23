<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue tabbable">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>创建模块</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?php echo _url('module/index/create');?>" id="form_add" class="form-horizontal form-bordered form-row-stripped" method="post">
                    <div class="tabbable portlet-tabs">
						<ul class="nav nav-tabs">
							<li><a href="#portlet_tab_2" data-toggle="tab">附加信息</a></li>
							<li class="active"><a href="#portlet_tab_1" data-toggle="tab">基本信息</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="portlet_tab_1">
								<div class="control-group">
									<label class="control-label" for="input_name">应用名称 <span class="required">*</span></label>
									<div class="controls">
										<input name="info[name]" id="input_name" type="text" placeholder="" class="m-wrap" />
										<span class="help-inline"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label" for="input_module">应用目录 <span class="required">*</span></label>
									<div class="controls">
										<input name="module" id="input_module" type="text" placeholder="" class="m-wrap" />
										<span class="help-inline"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label" for="input_version">版本</label>
									<div class="controls">
										<input name="info[version]" id="input_version" type="text" placeholder="0.1" class="m-wrap" />
										<span class="help-inline"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label" for="input_team">开发团队</label>
									<div class="controls">
										<input name="info[team]" id="input_team" type="text" placeholder="hyperblue" class="m-wrap" />
										<span class="help-inline"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label" for="input_email">E-mail</label>
									<div class="controls">
										<input name="info[email]" id="input_email" type="text" placeholder="hyperblue@qq.com" class="m-wrap" />
										<span class="help-inline"></span>
									</div>
								</div>
                                <div class="control-group">
									<label class="control-label" for="input_website">网址</label>
									<div class="controls">
										<input name="info[website]" id="input_website" type="text" placeholder="http://www.bingceng.com" class="m-wrap" />
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
									<label class="control-label" for="input_status">状态</label>
									<div class="controls">
										<div class="text-toggle-button" data-enabled="启用" data-disabled="禁用">
											<input type="checkbox" name="info[status]" id="input_status" class="toggle" checked="checked"/>
										</div>
									</div>
								</div>
							</div>
							<div class="tab-pane " id="portlet_tab_2">
							</div>
							<div class="form-actions">
								<button type="submit" class="btn green">提交</button>
								<a href="javascript:window.history.go(-1);" type="button" class="btn">返回</a>
							</div>
						</div>
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
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
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
            'info[name]': {
                minlength: 2,
                required: true
            },
            'module': {
                minlength: 2,
                required: true,
                lettersonly: true
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