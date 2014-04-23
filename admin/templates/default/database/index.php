<?php echo $_header;?>
				<!-- BEGIN PAGE CONTENT-->
				<div class="row-fluid ">
					<div class="tabbable tabbable-custom boxless">
						<ul class="nav nav-tabs">
							<li class="active"><a href="#config_tab_1" data-toggle="tab">数据库表</a></li>
							<li><a href="#config_tab_2" data-toggle="tab">还原</a></li>
							<li><a href="#config_tab_3" data-toggle="tab">在线SQL</a></li>
							<li class="pull-right"><a href="<?php echo _url('database/index/backup');?>" class="btn green"><i class="icon-download-alt"></i> 备份</a></li>
						 </ul>
						 <div class="tab-content">
							<div class="tab-pane active" id="config_tab_1">
								
								<table class="table table-striped table-bordered table-hover" id="table_managed_2">
									<thead>
										<tr>
											<th>表名</th>
											<th>记录数</th>
											<th>数据大小</th>
											<th>索引大小</th>
											<th>存储引擎</th>
											<th>字符集</th>
											<th>注释</th>
											<th>操作</th>
										</tr>
									</thead>
									<tbody>
                                        <?php foreach($dataList as $k => $item):?>
										<tr class="odd gradeX">
											<td><?php echo $item['TABLE_NAME'];?></td>
											<td><?php echo $item['TABLE_ROWS'];?></td>
											<td class="filesize"><?php echo $item['DATA_LENGTH'];?></td>
											<td class="filesize"><?php echo $item['INDEX_LENGTH'];?></td>
											<td><?php echo $item['ENGINE'];?></td>
											<td><?php echo $item['TABLE_COLLATION'];?></td>
											<td><?php echo $item['TABLE_COMMENT'];?></td>
                                            <td>
                                                <a href="#" class="btn mini yellow" onclick="operate.ajaxModal($(this));" data-url="<?php echo _url('database/index/fieldList', array('table' => $item['TABLE_NAME']));?>"><i class="icon-list"></i> 字段列表</a>
                                            </td>
										</tr>
                                        <?php endforeach;?>
									</tbody>
								</table>
							</div>
								
							<div class="tab-pane" id="config_tab_2">
								
							</div>
							
							<div class="tab-pane" id="config_tab_2">
								
							</div>
							
						</div>								
					</div>
				</div>
				<!-- END PAGE CONTENT-->
				
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
<script type="text/javascript" src="<?php echo ASSETS_PATH;?>plugins/jquery.filesize.js"></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_ADMIN_PATH?>js/form-components.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_ADMIN_PATH;?>js/table-managed.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_ADMIN_PATH;?>js/operate.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    TableManaged.init();
    operate.init();
	
	$('.filesize').fileSize(2);
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->