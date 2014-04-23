<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue tabbable">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>编辑内容</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?php echo _url('content/form/edit', array('id'=>$item['content_id'], 'category_id'=>$_categoryId));?>" id="form_edit" class="form-horizontal form-bordered form-row-stripped" method="post" enctype="multipart/form-data">
                    <div class="tabbable portlet-tabs">
						<ul class="nav nav-tabs">
							<li><a href="#portlet_tab_3" data-toggle="tab">附加信息</a></li>
                            <li><a href="#portlet_tab_2" data-toggle="tab">扩展信息</a></li>
							<li class="active"><a href="#portlet_tab_1" data-toggle="tab">基本信息</a></li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="portlet_tab_1">
								<div class="control-group">
									<label class="control-label" for="input_title">标题 <span class="required">*</span></label>
									<div class="controls">
										<input name="info[title]" id="input_title" value="<?php echo $item['title'];?>" type="text" placeholder="" class="large m-wrap" />
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input_content_editor">内容 <span class="required">*</span></label>
									<div class="controls">
										<textarea name="extra[content]" id="input_content_editor" placeholder="" class="span12 editor m-wrap" ><?php echo $item['content'];?></textarea>
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
                            <div class="tab-pane" id="portlet_tab_2">
                                <?php foreach($extraFieldList as $v):
                                if ($v['status'] != 1) continue;
                                isset($item[$v['alias']]) && $v['value'] = $item[$v['alias']];
                                ?>
                                <div class="control-group">
									<label class="control-label" for="input_<?php echo $v['alias'];?>"><?php echo $v['name'];?> <?php if ($v['required']):?><span class="required">*</span><?php endif;?></label>
									<div class="controls">
                                        <?php echo Form::getContentModelFiledHtml($v);?>
										<span class="help-inline"><?php echo $v['tips'];?></span>
									</div>
								</div>
                                <?php endforeach;?>
							</div>
							<div class="tab-pane " id="portlet_tab_3">
								<div class="control-group">
									<label class="control-label" for="input_keywords">关键字</label>
									<div class="controls">
										<input name="info[keywords]" id="input_keywords" value="<?php echo $item['keywords'];?>" type="text" placeholder="" class="large m-wrap"/>
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input_description">描述</label>
									<div class="controls">
										<textarea name="info[description]" id="input_description" placeholder="" class="large m-wrap"><?php echo $item['description'];?></textarea>
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input_original_img">图片</label>
									<div class="controls">
										<input name="info[original_img]" id="input_original_img" value="<?php echo $item['original_img'];?>" type="text" placeholder="" class="m-wrap"/>
										<span class="help-inline"></span>
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
									<label class="control-label" for="input_add_time">发布时间</label>
									<div class="controls">
										<div class="input-append date form_advance_datetime" data-date-language="zh-CN">
											<input size="16" name="info[add_time]" id="input_add_time" value="<?php echo Date::format(null,$item['add_time']);?>" type="text" readonly class="m-wrap">
											<span class="add-on"><i class="icon-calendar"></i></span>
										</div>
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
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-datetimepicker/css/datetimepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.zh-CN.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/ueditor/ueditor.all.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_ADMIN_PATH?>js/form-components.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    FormComponents.init();

    var ajax_handler = false,
        $modal = $('#ajax-modal'),
        $form = $('#form_edit');

    $form.validate({
        errorElement: 'span', //default input error message container
        errorClass: 'help-inline', // default input error message class
        focusInvalid: false, // do not focus the last invalid input
        ignore: "",
        rules: {
            'info[title]': {
                minlength: 2,
                required: true
            },
            'extra[content]': {
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