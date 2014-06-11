<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!--> <html lang="en" class="no-js"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>BCCMS后台管理系统</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo ASSETS_PATH;?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo ASSETS_ADMIN_PATH;?>css/style_metro.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_ADMIN_PATH;?>css/style.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_ADMIN_PATH;?>css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_ADMIN_PATH;?>css/themes/bc.css" rel="stylesheet" id="style_color" />
	<link href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="<?php echo ROOT_PATH;?>favicon.ico" rel="shortcut icon"/>
    <script type="text/javascript">
    var ROOT_PATH = '<?php echo ROOT_PATH;?>';
    var ASSETS_PATH = '<?php echo ASSETS_PATH;?>';
    var ASSETS_ADMIN_PATH = '<?php echo ASSETS_ADMIN_PATH;?>';
	var UPLOAD_PATH = '<?php echo UPLOAD_PATH;?>';
	var EXT_PATH = '<?php echo ROOT_PATH.'plugins/';?>';
	var UEDITOR_HOME_URL = '<?php echo ASSETS_PATH;?>plugins/ueditor/';
    </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-header-fixed">
	<!-- BEGIN HEADER -->
	<div class="header navbar navbar-inverse navbar-fixed-top">
		<!-- BEGIN TOP NAVIGATION BAR -->
		<div class="navbar-inner">
			<div class="container-fluid">
				<!-- BEGIN LOGO -->
				<a class="brand" href="#">
				<img src="<?php echo ASSETS_ADMIN_PATH;?>img/logo.png" alt="logo" />
				</a>
				<!-- END LOGO -->
                <!-- BEGIN HORIZANTAL MENU -->
                <div class="navbar hor-menu hidden-phone hidden-tablet">
                    <div class="navbar-inner">
                        <ul class="nav">
                            <li>
                                <a data-toggle="dropdown" class="dropdown-toggle" href="javascript:;">
                                <?php echo $_siteList[$_session['site_id']]['name'];?>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <?php foreach($_session['sites'] as $v):
                                    if ($v == $_session['site_id']) continue;
                                    ?>
                                    <li><a href="<?php echo _url('index', array('site_id' =>$v, 'menu_id' => 1));?>"><?php echo $_siteList[$v]['name'];?></a></li>
                                    <?php endforeach;?>
                                </ul>
                                <b class="caret-out"></b>
                            </li>
							<li <?php if ($_route == 'index/index/index') echo 'class="active"';?>><a href="<?php echo _url('index/index',array('menu_id' => 1));?>">控制面板</a><li>
							<li <?php if (BC::$module == 'content') echo 'class="active"';?>><a href="<?php echo _url('content',array('menu_id' => 49));?>">内容管理</a><li>
                        </ul>
                    </div>
                </div>
                <!-- END HORIZANTAL MENU -->
				<!-- BEGIN RESPONSIVE MENU TOGGLER -->
				<a href="javascript:;" class="btn-navbar collapsed" data-toggle="collapse" data-target=".nav-collapse">
				<img src="<?php echo ASSETS_ADMIN_PATH;?>img/menu-toggler.png" alt="" />
				</a>
				<!-- END RESPONSIVE MENU TOGGLER -->
				<!-- BEGIN TOP NAVIGATION MENU -->
				<ul class="nav pull-right">
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar.png" width="29"/>
						<span class="username"><?php echo $_session['username'];?></span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="<?php echo _url('administrator/login/logout');?>"><i class="icon-key"></i> 退出</a></li>
						</ul>
					</li>
					<!-- END USER LOGIN DROPDOWN -->
				</ul>
				<!-- END TOP NAVIGATION MENU -->
			</div>
		</div>
		<!-- END TOP NAVIGATION BAR -->
	</div>
	<!-- END HEADER -->
	<!-- BEGIN CONTAINER -->
	<div class="page-container row-fluid">
        #_SIDEBAR_#
		<!-- BEGIN PAGE -->
		<div class="page-content">
			<!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<div id="portlet-config" class="modal hide" tabindex="-1">
				<div class="modal-header">
					<button data-dismiss="modal" class="close" type="button"></button>
					<h3>组件设置</h3>
				</div>
				<div class="modal-body">
					<p>配置信息</p>
				</div>
			</div>
            <div id="message-modal" class="modal hide fade" tabindex="-2">
                <div class="modal-body">
                    <p>操作成功</p>
                </div>

            </div>
			<!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
			<!-- BEGIN PAGE CONTAINER-->
			<div class="container-fluid">
				<!-- BEGIN PAGE HEADER-->
				<div class="row-fluid">
					<div class="span12">
						<!-- BEGIN STYLE CUSTOMIZER -->
						<!--
						<div class="color-panel hidden-phone">
							<div class="color-mode-icons icon-color"></div>
							<div class="color-mode-icons icon-color-close"></div>
							<div class="color-mode">
								<p>后台风格颜色选择</p>
								<ul class="inline">
									<li class="color-black color-default" data-style="default"></li>
									<li class="color-blue" data-style="blue"></li>
									<li class="color-brown" data-style="brown"></li>
									<li class="color-purple" data-style="purple"></li>
									<li class="color-white color-light" data-style="light"></li>
									<li class="color-bc current " data-style="bc"></li>
								</ul>
								<label>
									<span>样式</span>
									<select class="layout-option m-wrap small">
										<option value="fluid" selected>全屏</option>
										<option value="boxed">边框</option>
									</select>
								</label>
								<label>
									<span>头部</span>
									<select class="header-option m-wrap small">
										<option value="fixed" selected>固定</option>
										<option value="default">默认</option>
									</select>
								</label>
								<label>
									<span>菜单栏</span>
									<select class="sidebar-option m-wrap small">
										<option value="fixed">固定</option>
										<option value="default" selected>默认</option>
									</select>
								</label>
								<label>
									<span>底部</span>
									<select class="footer-option m-wrap small">
										<option value="fixed">固定</option>
										<option value="default" selected>默认</option>
									</select>
								</label>
								
							</div>
						</div>
						-->
						<!-- END BEGIN STYLE CUSTOMIZER -->   	

                        #_BREADCRUMB_#
					</div>
				</div>
				<!-- END PAGE HEADER-->