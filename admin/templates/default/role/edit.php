<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue tabbable">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>编辑角色</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?php echo _url('role/index/edit', array('id' => $item['role_id']))?>" id="form_edit" class="form-horizontal form-bordered form-row-stripped" method="post">
                <div class="tabbable portlet-tabs">
				    <ul class="nav nav-tabs">
					    <li><a href="#portlet_tab_2" data-toggle="tab">权限管理</a></li>
						<li class="active"><a href="#portlet_tab_1" data-toggle="tab">基本信息</a></li>
					</ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="portlet_tab_1">
                            <div class="control-group">
                                <label class="control-label" for="input_name">名称 <span class="required">*</span></label>
                                <div class="controls">
                                    <input name="info[name]" id="input_name" value="<?php echo $item['name'];?>" type="text" placeholder="" class="m-wrap" />
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="multi_select_1">管理站点</label>
                                <div class="controls">
                                    <select multiple="multiple" id="multi_select_1" name="info[sites][]">
                                        <?php foreach($_siteList as $v):?>
                                        <option value="<?php echo $v['site_id'];?>" <?php if (in_array($v['site_id'], $item['sites'])) echo 'selected="selected"';?>><?php echo $v['name'];?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="help-inline"></span>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label" for="input_status">状态</label>
                                <div class="controls">
                                    <div class="text-toggle-button" data-enabled="显示" data-disabled="不显示">
                                        <input type="checkbox" name="info[status]" id="input_status" class="toggle" <?php if ($item['status'] == 1):?>checked="checked"<?php endif;?> />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane " id="portlet_tab_2">
                            <div class="control-group">
                                <label class="control-label" for="multi_select_2">动作列表</label>
                                <div class="controls">
                                    <select multiple="multiple" id="multi_select_2" name="info[purview][]">
                                        <?php foreach($actionList as $module => $controllers):?>
                                        <optgroup label="<?php echo $module;?>">
                                            <?php foreach($controllers as $controller => $actions):?>
                                                <?php foreach($actions as $k => $action):?>
										            <option value="<?php echo $module.'/'.$controller.'/'.$action;?>" <?php if (is_array($item['purview']) && in_array($module.'/'.$controller.'/'.$action,$item['purview'])) echo 'selected="selected"';?>><?php echo $module.'/'.$controller.'/'.$action;?></option>
                                                <?php endforeach;?>
                                            <?php endforeach;?>
										</optgroup>
                                        <?php endforeach;?>
                                    </select>
                                    <span class="help-inline"></span>
                                </div>
                            </div>
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

    var $form = $('#form_edit');

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