<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
	<div class="span12">
        <div class="portlet box blue">
		    <div class="portlet-title">
		        <div class="caption"><i class="icon-reorder"></i>编辑广告</div>
		    </div>
		    <div class="portlet-body form">
                <!-- BEGIN FORM-->
				<form action="<?php echo _url('ads/index/edit', array('id' => $item['ads_id']))?>" id="form_add" class="form-horizontal form-bordered form-row-stripped" method="post"  enctype="multipart/form-data">
				<div class="control-group">
					<label class="control-label" for="input_name">所属广告位</label>
					<div class="controls">
						<input type="text" value="<?php echo $positionItem['name'];?>" readonly disabled/>
						<span class="help-inline"></span>
					</div>
				</div>
                <div class="control-group">
					<label class="control-label" for="input_name">名称 <span class="required">*</span></label>
					<div class="controls">
						<input name="info[name]" id="input_name" value="<?php echo $item['name'];?>" type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_type">类型 <span class="required">*</span></label>
					<div class="controls">
						<select class="m-wrap" name="info[type]">
							<option value="">请选择</option>
							<?php foreach($typeList as $k => $v):?>
							<option value="<?php echo $k;?>" <?php if ($k == $item['type']) echo 'selected="selected"';?>><?php echo $v;?></option>
							<?php endforeach;?>
						</select>
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_content">内容</label>
					<div class="controls">
						<textarea name="code[content]" id="input_content" placeholder="" class="large m-wrap" rows="10"><?php echo $code['content'];?></textarea>
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_image">图片</label>
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
									<input type="file" name="file[image]" id="input_logo" class="default" />
								</span>
								<a href="#" class="btn fileupload-exists" data-dismiss="fileupload">移除</a>
							</div>
							<span class="help-inline"></span>
						</div>
                        <?php if ($code['image']):?>
                        <img src="<?php echo UPLOAD_PATH.'images/'.$code['image']; ?>" width="300"/>
                        <?php endif;?>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_code_url">链接地址</label>
					<div class="controls">
						<input name="code[url]" id="input_code_url" value="<?php echo $code['url'];?>"  type="text" placeholder="" class="m-wrap" />
						<span class="help-inline"></span>
					</div>
				</div>
				<div class="control-group">
					<label class="control-label" for="input_code_url_title">链接文字提示</label>
					<div class="controls">
						<input name="code[url_title]" id="input_code_url_title" value="<?php echo $code['url_title'];?>"  type="text" placeholder="" class="m-wrap" />
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
            'info[name]': {
                minlength: 2,
                required: true
            },
			'info[type]': {
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