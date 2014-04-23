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
							<li <?php if ($_route == 'index/index/index') echo 'class="active"';?>><a href="<?php echo _url('/',array('menu_id' => 1));?>">控制面板</a><li>
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
					<!-- BEGIN NOTIFICATION DROPDOWN -->
					<li class="dropdown" id="header_notification_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-warning-sign"></i>
						<span class="badge">6</span>
						</a>
						<ul class="dropdown-menu extended notification">
							<li>
								<p>您有14条未读通知</p>
							</li>
							<li>
								<a href="javascript:;" onclick="App.onNotificationClick(1)">
								<span class="label label-success"><i class="icon-plus"></i></span>
								新用户注册.
								<span class="time">刚刚</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-important"><i class="icon-bolt"></i></span>
								服务器内存不足.
								<span class="time">15分钟前</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-warning"><i class="icon-bell"></i></span>
								服务器无响应.
								<span class="time">22分钟前</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-info"><i class="icon-bullhorn"></i></span>
								应用错误.
								<span class="time">40分钟前</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-important"><i class="icon-bolt"></i></span>
								数据库使用率达68%.
								<span class="time">2小时前</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="label label-important"><i class="icon-bolt"></i></span>
								禁用2个IP地址.
								<span class="time">5小时前</span>
								</a>
							</li>
							<li class="external">
								<a href="#">查看所有通知 <i class="m-icon-swapright"></i></a>
							</li>
						</ul>
					</li>
					<!-- END NOTIFICATION DROPDOWN -->
					<!-- BEGIN INBOX DROPDOWN -->
					<li class="dropdown" id="header_inbox_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-envelope-alt"></i>
						<span class="badge">5</span>
						</a>
						<ul class="dropdown-menu extended inbox">
							<li>
								<p>您有12条未读短消息</p>
							</li>
							<li>
								<a href="#">
								<span class="photo"><img src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar2.jpg" alt="" /></span>
								<span class="subject">
								<span class="from">张三</span>
								<span class="time">刚刚</span>
								</span>
								<span class="message">
								你好
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="photo"><img src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar3.jpg" alt="" /></span>
								<span class="subject">
								<span class="from">李四</span>
								<span class="time">16分钟前</span>
								</span>
								<span class="message">
								你好
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="photo"><img src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar1.jpg" alt="" /></span>
								<span class="subject">
								<span class="from">王五</span>
								<span class="time">2小时前</span>
								</span>
								<span class="message">
								你好
								</span>
								</a>
							</li>
							<li class="external">
								<a href="#">查看所有短消息 <i class="m-icon-swapright"></i></a>
							</li>
						</ul>
					</li>
					<!-- END INBOX DROPDOWN -->
					<!-- BEGIN TODO DROPDOWN -->
					<li class="dropdown" id="header_task_bar">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<i class="icon-tasks"></i>
						<span class="badge">5</span>
						</a>
						<ul class="dropdown-menu extended tasks">
							<li>
								<p>您有12条待执行任务</p>
							</li>
							<li>
								<a href="#">
								<span class="task">
								<span class="desc">新版本发布进度 v1.2</span>
								<span class="percent">30%</span>
								</span>
								<span class="progress progress-success ">
								<span style="width: 30%;" class="bar"></span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
								<span class="desc">应用开发进度</span>
								<span class="percent">65%</span>
								</span>
								<span class="progress progress-danger progress-striped active">
								<span style="width: 65%;" class="bar"></span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
								<span class="desc">手机APP进度</span>
								<span class="percent">98%</span>
								</span>
								<span class="progress progress-success">
								<span style="width: 98%;" class="bar"></span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
								<span class="desc">数据库迁移进度</span>
								<span class="percent">10%</span>
								</span>
								<span class="progress progress-warning progress-striped">
								<span style="width: 10%;" class="bar"></span>
								</span>
								</a>
							</li>
							<li>
								<a href="#">
								<span class="task">
								<span class="desc">WEB服务器升级进度</span>
								<span class="percent">58%</span>
								</span>
								<span class="progress progress-info">
								<span style="width: 58%;" class="bar"></span>
								</span>
								</a>
							</li>
							<li class="external">
								<a href="#">查看所有任务 <i class="m-icon-swapright"></i></a>
							</li>
						</ul>
					</li>
					<!-- END TODO DROPDOWN -->
					<!-- BEGIN USER LOGIN DROPDOWN -->
					<li class="dropdown user">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
						<img alt="" src="<?php echo ASSETS_ADMIN_PATH;?>img/avatar1_small.jpg" />
						<span class="username"><?php echo $_session['username'];?></span>
						<i class="icon-angle-down"></i>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#"><i class="icon-user"></i> 个人资料</a></li>
							<li><a href="#"><i class="icon-calendar"></i> 我的日历</a></li>
							<li><a href="#"><i class="icon-tasks"></i> 我的任务</a></li>
							<li class="divider"></li>
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