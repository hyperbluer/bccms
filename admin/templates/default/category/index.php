<?php echo $_header;?>
<!-- BEGIN PAGE CONTENT-->
<div class="row-fluid ">
    <div class="span12">
        <div class="portlet box blue">
            <div class="portlet-title">
                <div class="caption"><i class="icon-list"></i>栏目列表</div>
            </div>
            <div class="portlet-body ">
                <div class="clearfix">
				    <div class="btn-group">
                        <a href="<?php echo _url('category/index/add');?>" class="btn green">
                            <i class="icon-plus"></i> 添加
                        </a>
					</div>
					<div class="btn-group pull-right">
					    <div class="margin-bottom-10" id="nestable_list_menu">
                            <button type="button" class="btn" data-action="expand-all">展开</button>
                            <button type="button" class="btn" data-action="collapse-all">收缩</button>
                        </div>
					</div>
                <div class="dd" id="nestable_list_admin_menu">
                    <ol class="dd-list">
                        <?php foreach ($categoryTree as $k => $node):?>
                        <li class="dd-item" data-id="<?php echo $node->id;?>">
                            <div class="dd-handle"><?php echo $node->name;?> <?php if (!$node->status):?><span class="label label-important">不显示</span><?php endif;?>
                                <div class="dd-nodrag btn-group pull-right">
                                    <a href="<?php echo _url('category/index/edit', array('id' => $node->id));?>" class="btn mini blue"><i class="icon-edit"></i> 编辑</a>
                                    <a href="<?php echo _url('category/index/delete', array('id' => $node->id));?>" class="btn mini black"><i class="icon-trash"></i> 删除</a>
                                </div>
                            </div>
                            <?php if (is_array($node->children) && count($node->children)):?>
                            <ol class="dd-list">
                                <?php foreach ($node->children as $k => $nodeSecond):?>
                                <li class="dd-item" data-id="<?php echo $nodeSecond->id;?>">
                                    <div class="dd-handle"><?php echo $nodeSecond->name;?>
                                    <div class="dd-nodrag btn-group pull-right">
                                        <a href="<?php echo _url('category/index/edit', array('id' => $nodeSecond->id));?>" class="btn mini blue"><i class="icon-edit"></i> 编辑</a>
                                        <a href="<?php echo _url('category/index/delete', array('id' => $nodeSecond->id));?>" class="btn mini black"><i class="icon-trash"></i> 删除</a>
                                    </div>
                                    </div>
                                    <?php if (is_array($nodeSecond->children) && count($nodeSecond->children)):?>
                                    <ol class="dd-list">
                                        <?php foreach ($nodeSecond->children as $k => $nodeThree):?>
                                        <li class="dd-item" data-id="<?php echo $nodeThree->id;?>">
                                            <div class="dd-handle"><?php echo $nodeThree->name;?>
                                                <div class="dd-nodrag btn-group pull-right">
                                                    <a href="<?php echo _url('category/index/edit', array('id' => $nodeThree->id));?>" class="btn mini blue"><i class="icon-edit"></i> 编辑</a>
                                                    <a href="<?php echo _url('category/index/delete', array('id' => $nodeThree->id));?>" class="btn mini black"><i class="icon-trash"></i> 删除</a>
                                                </div>
                                            </div>
                                        </li>
                                        <?php endforeach;?>
                                    </ol>
                                    <?php endif;?>
                                </li>
                                <?php endforeach;?>
                            </ol>
                            <?php endif;?>
                        </li>
                        <?php endforeach;?>
                    </ol>
                </div>
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
    </div>
    <textarea id="nestable_list_admin_menu_output" class="m-wrap span12"></textarea>
</div>
				<!-- END PAGE CONTENT-->
<?php echo $_footer;?>
<!-- BEGIN PAGE LEVEL STYLES -->
<link href="<?php echo ASSETS_PATH;?>plugins/bootstrap-modal/css/bootstrap-modal.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/jquery-nestable/jquery.nestable.css" />
<!-- END PAGE LEVEL STYLES -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/additional-methods.min.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap-modal/js/bootstrap-modal.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap-modal/js/bootstrap-modalmanager.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js" type="text/javascript" ></script>
<script src="<?php echo ASSETS_PATH;?>plugins/jquery-nestable/jquery.nestable.js" type="text/javascript" ></script>
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="<?php echo ASSETS_ADMIN_PATH?>js/form-components.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_ADMIN_PATH;?>js/table-managed.js" type="text/javascript"></script>
<script src="<?php echo ASSETS_ADMIN_PATH;?>js/ui-nestable.js"></script>
<script src="<?php echo ASSETS_ADMIN_PATH;?>js/operate.js" type="text/javascript"></script>
<script>
jQuery(document).ready(function() {
    UINestable.init();
    operate.init();
});
</script>
<!-- END PAGE LEVEL SCRIPTS -->