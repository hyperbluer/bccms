<?php echo $_header;?>
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid ">
					<div class="span12 responsive" data-tablet="span12 fix-offset" data-desktop="span12">
						<!-- BEGIN TABLE PORTLET-->
						<div class="portlet box grey">
							<div class="portlet-title">
								<div class="caption"><i class="icon-list"></i>字段列表</div>
								<div class="actions">
									<a href="<?php echo _url('model/field/add', array('model_id' => $modelId));?>" class="btn green"><i class="icon-plus"></i> 添加</a>
								</div>
							</div>
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover" id="table_managed_2">
									<thead>
										<tr>
											<th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#table_managed_2 .checkboxes" /></th>
											<th>名称</th>
											<th>标识</th>
											<th>状态</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($dataList as $k => $item):?>
										<tr class="odd gradeX">
											<td><input type="checkbox" class="checkboxes" value="<?php echo $item['alias'];?>" /></td>
											<td><?php echo $item['name'];?></td>
											<td><?php echo $item['alias'];?></td>
                                            <td><?php if ($item['status']):?>
                                                <span class="label label-success">开启</span>
                                                <?php else:?>
                                                <span class="label label-important">禁用</span>
                                                <?php endif;?>
                                            </td>
                                            <td>
                                                <a href="<?php echo _url('model/field/edit', array('model_id' => $modelId, 'id' => $item['alias']));?>" class="btn mini blue"><i class="icon-edit"></i> 编辑</a>
                                                <?php if (!$item['is_system']):?>
                                                <a href="#" class="btn mini black" onclick="operate.deleteModal($(this));" data-url="<?php echo _url('model/field/delete', array('model_id' => $modelId, 'id' => $item['alias']));?>"><i class="icon-trash"></i> 删除</a>
                                                <?php endif;?>
                                            </td>
										</tr>
                                        <?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
                        <div id="ajax-modal" class="modal hide fade"></div>
                        <div id="modal-delete" class="modal hide fade" tabindex="-1" data-backdrop="static" data-keyboard="false">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h3>信息提示</h3>
                            </div>
                            <div class="modal-body">
                                 <p>您确认删除吗?</p>
                            </div>
                            <div class="modal-footer">
                                <a type="button" class="btn red">确定</a>
                                <button type="button" data-dismiss="modal" class="btn">取消</button>
                            </div>
                        </div>
						<!-- END TABLE PORTLET-->
					</div>
				</div>
				<!-- END PAGE CONTENT-->
<?php echo $_footer;?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/select2/select2_metro.css" />
<link rel="stylesheet" href="<?php echo ASSETS_PATH;?>plugins/data-tables/DT_bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css"/>
<link href="<?php echo ASSETS_PATH;?>plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/select2/select2.min.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH;?>plugins/select2/select2_locale_zh-CN.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH;?>plugins/data-tables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH;?>plugins/data-tables/DT_bootstrap.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_ADMIN_PATH?>js/form-components.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_ADMIN_PATH;?>js/table-managed.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_ADMIN_PATH;?>js/operate.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    TableManaged.init();
    operate.init();
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->