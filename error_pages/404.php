 <!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
	<meta charset="utf-8" />
	<title>404 页面未找到 - BCCMS</title>
	<meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="<?php echo ASSETS_PATH;?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>plugins/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="<?php echo ASSETS_PATH;?>css/style_metro.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>css/style.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>css/style_responsive.css" rel="stylesheet" />
	<link href="<?php echo ASSETS_PATH;?>css/themes/bc.css" rel="stylesheet" id="style_color" />
	<link href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
	<!-- END GLOBAL MANDATORY STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link href="<?php echo ASSETS_PATH;?>css/pages/error.css" rel="stylesheet" type="text/css"/>
	<!-- END PAGE LEVEL STYLES -->
	<link rel="shortcut icon" href="favicon.ico" />
	<script type="text/javascript">
    var ASSETS_PATH = '<?php echo ASSETS_PATH;?>';
	var timer = 5;
	setTimeout('window.location.href ="<?php echo ROOT_PATH;?>"', 5000);
	setInterval('timer--; $(".details p strong").text(timer);', 1000);
    </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-404-full-page">
	<div class="container">
				<!-- BEGIN PAGE CONTENT-->          
				<div class="row-fluid">
					<div class="span2"></div>
					<div class="span8 page-404">
						<div class="number">
							404
						</div>
						<div class="details">
							<h4>抱歉，你访问的页面地址有误，或者该页面不存在</h4>
							<p>
								请检查输入的网址是否正确，或者联系客服.
							</p>
							<p>
								<strong>5</strong>秒之后页面自动跳转，你还可以： <br />
								1). <a href="<?php echo ROOT_PATH;?>">返回首页</a><br />
								2). 去其他地方逛逛：<a href="http://www.baidu.com">百度</a> | <a href="http://www.weibo.com">微博</a> | <a href="http://www.tmall.com">天猫</a><br />
							</p>
						</div>
					</div>
					<div class="span2"></div>
				</div>
				<!-- END PAGE CONTENT-->
	</div>
	<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
	<!-- BEGIN CORE PLUGINS -->
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-1.10.1.min.js" type="text/javascript"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>	
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/bootstrap/js/bootstrap.min.js"></script>
	<!--[if lt IE 9]>
	<script src="<?php echo ASSETS_PATH;?>plugins/excanvas.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/respond.js"></script>
	<![endif]-->
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery.blockui.js"></script>
	<script src="<?php echo ASSETS_PATH;?>plugins/jquery.cookie.js"></script>
    <script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<!-- BEGIN PAGE LEVEL SCRIPTS -->
	<script src="<?php echo ASSETS_PATH;?>js/app.js" type="text/javascript"></script>
	<!-- END PAGE LEVEL SCRIPTS --> 
	<script>
		jQuery(document).ready(function() {     
		  App.init();
		});
		 
	</script>
	<!-- END JAVASCRIPTS -->
<!-- END BODY -->
</html>