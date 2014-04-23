<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue tabbable">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>编辑栏目</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
                <form action="<?php echo _url('category/index/edit', array('id'=>$item['category_id']));?>" id="form_edit" class="form-horizontal form-bordered form-row-stripped" method="post" enctype="multipart/form-data">
                    <div class="tabbable portlet-tabs">
						<ul class="nav nav-tabs">
							<li><a href="#portlet_tab_2" data-toggle="tab">附加信息</a></li>
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
									<label class="control-label" for="input_alias">别名 <span class="required">*</span></label>
									<div class="controls">
										<input name="info[alias]" id="input_alias" value="<?php echo $item['alias'];?>" type="text" placeholder="" class="m-wrap" />
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input_parent_id">上级菜单 <span class="required">*</span></label>
									<div class="controls">
										<select class="m-wrap" name="info[parent_id]" id="input_parent_id">
											<option value="0">一级菜单</option>
											<?php foreach($selectTree as $k => $node):?>
											<option value="<?php echo  $node->id;?>"
												<?php if ($item['parent_id'] == $node->id):?>selected="selected" <?php endif;?>
												<?php if ($item['category_id'] == $node->id):?> disabled="disabled" <?php endif;?>
											><?php echo $node->name;?></option>
												<?php if (is_array($node->children) && count($node->children)):?>
												<?php foreach ($node->children as $k => $nodeSecond):?>
													<option value="<?php echo $nodeSecond->id;?>"
														<?php if ($item['parent_id'] == $nodeSecond->id):?> selected="selected" <?php endif;?>
														<?php if ($item['category_id'] == $nodeSecond->id):?> disabled="disabled" <?php endif;?>
														<?php if ($item['category_id'] == $node->id):?> disabled="disabled" <?php endif;?>
													>&nbsp;&nbsp;- <?php echo $nodeSecond->name;?></option>
												<?php endforeach;?>
												<?php endif;?>
											<?php endforeach;?>
										</select>
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input_model">内容模型 <span class="required">*</span></label>
									<div class="controls">
										<select class="m-wrap" name="info[model]" id="input_model">
											<?php foreach($modelList as $k => $v):?>
											<option value="<?php echo $v['alias'];?>" <?php if ($v['alias'] == $item['model']) echo 'selected="selected"';?>><?php echo $v['name'];?></option>
											<?php endforeach;?>
										</select>
										<span class="help-inline"></span>
									</div>
								</div>
								<div class="control-group <?php if ($item['model'] != 'link'):?>hide<?php endif;?>" id="input_link_area">
									<label class="control-label" for="input_link">链接地址</label>
									<div class="controls">
										<input name="info[link]" id="input_link" value="<?php echo $item['link'];?>" type="text" placeholder="" class="m-wrap"/>
										<span class="help-inline">外部地址请以http://开头，内部地址格式：模块/控制器/动作</span>
									</div>
								</div>
								<div class="control-group <?php if ($item['model'] != 'plugin'):?>hide<?php endif;?>" id="input_link_area">
									<label class="control-label" for="input_plugin">链接地址</label>
									<div class="controls">
										<input name="info[plugin]" id="input_plugin" value="<?php echo $item['link'];?>" type="text" placeholder="" class="m-wrap"/>
										<span class="help-inline">格式：pluginName?p_1=value_1&p_2=value_2，问号后为自定义参数值，可选。</span>
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
									<label class="control-label" for="input_original_img">缩略图</label>
									<div class="controls">
										<?php if ($item['original_img']):?>
										<div class="fileupload-new thumbnail" style="width: 200px;">
											<img src="<?php echo UPLOAD_PATH.'images/'.$item['original_img'];?>" alt="" style="width: 200px;">
										</div>
										<br /> 
										<?php endif;?>
										<div class="fileupload fileupload-new" data-provides="fileupload">
											<div class="input-append">
												<div class="uneditable-input">
													<i class="icon-file fileupload-exists"></i>
													<span class="fileupload-preview"></span>
												</div>
												<span class="btn btn-file">
												<span class="fileupload-new">选择文件</span>
												<span class="fileupload-exists">更换</span>
													<input type="file" name="file[original_img]" id="input_original_img" class="default" />
												</span>
												<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
											</div>
											<span class="help-inline"></span>
										</div>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="input_description">打开方式</label>
									<div class="controls">
										<select name="info[target]">
											<option value="">请选择</option>
											<?php foreach($targetList as $k => $v):?>
											<option value="<?php echo $k;?>" <?php if ($k == $item['target']) echo 'selected="selected"';?>><?php echo $v;?></option>
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
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-fileupload/bootstrap-fileupload.css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript" ></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/jquery-multi-select/js/jquery.multi-select.js"></script>
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
            'info[name]': {
                minlength: 2,
                required: true
            },
            'info[alias]': {
                minlength: 2,
                required: true
            },
            'info[parent_id]': {
                minlength: 1,
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
	
	$form.find('#input_model').change(function(){
		var _value = $(this).val();
		
		if (_value == 'link') {
			$('#input_link_area').removeClass('hide');
		} else {
			$('#input_link_area').addClass('hide');
		}
	});

});
</script>