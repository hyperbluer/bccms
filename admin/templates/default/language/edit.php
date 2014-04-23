<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
	<h3>编辑语言版本</h3>
</div>
<div class="modal-body">
    <div class="alert fade hide">
        <span></span><button type="button" class="close" data-dismiss="alert"></button>
    </div>
    <div class="form">
    <!-- BEGIN FORM-->
	<form action="<?php echo _url('language/index/edit', array('id'=>$item['language_id']));?>" id="form_edit" class="form-horizontal form-bordered form-row-stripped" method="post">
        <div class="control-group">
            <label class="control-label" for="input_name">语言名称 <span class="required">*</span></label>
            <div class="controls">
                <input name="name" id="input_name" value="<?php echo $item['name'];?>" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_code">简码 <span class="required">*</span></label>
            <div class="controls">
                <input name="code" id="input_code" value="<?php echo $item['code'];?>" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_locale">区域</label>
            <div class="controls">
                <input name="locale" id="input_locale" value="<?php echo $item['locale'];?>" type="text" placeholder="" class="m-wrap" />
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_locale">图标 </label>
            <div class="controls">
                <select name="image" id="input_image" class="m-warp select2" style="width:220px;">
                    <option value="">请选择...</option>
                    <option value="cn.png">中华人民共和国</option>
                    <option value="us.png">美国</option>
                    <option value="de.png">德国</option>
                    <option value="fr.png">法国</option>
                    <option value="it.png">意大利</option>
                    <option value="es.png">西班牙</option>
                    <option value="pt.png">葡萄牙</option>
                    <option value="jp.png">日本</option>
                    <option value="kr.png">韩国</option>
                </select>
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_sort_order">排序</label>
            <div class="controls">
                <input name="sort_order" id="input_sort_order" value="<?php echo $item['sort_order'];?>" type="text" placeholder="" class="m-wrap" value="0"/>
                <span class="help-inline"></span>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="input_status">状态</label>
            <div class="controls">
                <div class="text-toggle-button" data-enabled="显示" data-disabled="不显示">
                    <input type="checkbox" name="status" id="input_status" class="toggle" <?php if ($item['status'] == 1):?>checked="checked"<?php endif;?> />
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
<style type="text/css">
.modal-select-drop {
    z-index: 10051;
}
</style>
<script>
jQuery(document).ready(function() {
    FormComponents.init();

    var ajax_handler = false,
        $modal = $('#ajax-modal'),
        $form = $('#form_edit');

    function format(state) {
        if (!state.id) return state.text; // optgroup
        return "<img class='flag' src='<?php echo ASSETS_PATH;?>img/flags/" + state.id.toLowerCase() + "'/>&nbsp;&nbsp;" + state.text;
    }
    $("#input_image").select2({
        allowClear: true,
        formatResult: format,
        formatSelection: format,
        dropdownCssClass: "modal-select-drop",
        escapeMarkup: function (m) {
            return m;
        }
    });
    $("#input_image").select2('val', '<?php echo $item['image'];?>');

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
            code: {
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
            code = $form.find('input[name=code]').val(),
            locale = $form.find('input[name=locale]').val(),
            image = $form.find('#input_image').select2('val'),
            sort_order = $form.find('input[name=sort_order]').val(),
            status = $form.find('input[name=status]').is(':checked') === true ? 1 : 0;
        $.ajax({
            type: "POST",
            dataType: "json",
            url: $form.attr('action'),
            data: {
                "info[name]":name,
                "info[code]":code,
                "info[locale]":locale,
                "info[image]":image,
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