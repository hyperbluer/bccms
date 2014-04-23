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
  <link href="<?php echo ASSETS_PATH;?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
  <link href="<?php echo ASSETS_PATH;?>plugins/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="<?php echo ASSETS_ADMIN_PATH;?>css/style_metro.css" rel="stylesheet" />
  <link href="<?php echo ASSETS_ADMIN_PATH;?>css/style.css" rel="stylesheet" />
  <link href="<?php echo ASSETS_ADMIN_PATH;?>css/style_responsive.css" rel="stylesheet" />
  <link href="<?php echo ASSETS_ADMIN_PATH;?>css/iblue.css" rel="stylesheet" id="style_color" />
  <link href="<?php echo ASSETS_ADMIN_PATH;?>css/login.css" rel="stylesheet" id="style_color" />
  <link rel="stylesheet" type="text/css" href="<?php echo ASSETS_PATH;?>plugins/uniform/css/uniform.default.css" />
  <link rel="shortcut icon" href="<?php echo ROOT_PATH;?>favicon.ico" />
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
  <div id="loginbox">            
            <form id="loginform" class="form-vertical login-form" action="#" method="post">
				<div class="control-group normal_text"> <h3><img src="<?php echo ASSETS_ADMIN_PATH;?>img/logo.png" alt="Logo" /></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on btn green"><i class="icon-user"></i></span><input type="text" placeholder="用户名" name="username"/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on btn yellow"><i class="icon-lock"></i></span><input type="password" placeholder="密码" name="password"/>
                        </div>
                    </div>
                </div>
                <div class="alert alert-error hide">
                    <button class="close" data-dismiss="alert"></button>
                    <span>请输入正确的账号及密码.</span>
                  </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn blue" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right"><button type="submit" class="btn green" /> 登录</button></span>
                </div>
                <input type="hidden" name="remember" value="0"/>
            </form>
            <form id="recoverform" action="#" class="form-vertical forget-form">
				<p class="normal_text">提交您的邮箱地址给管理员找回密码</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on btn yellow"><i class="icon-envelope"></i></span><input type="text" placeholder="邮箱地址" name="email" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn green" id="to-login">&laquo; 返回登录页</a></span>
                    <span class="pull-right"><a class="btn blue"/>找回</a></span>
                </div>
            </form>
        </div>
  <!-- BEGIN JAVASCRIPTS -->
  <script src="<?php echo ASSETS_PATH;?>plugins/jquery-1.10.1.min.js" type="text/javascript" ></script>
  <script src="<?php echo ASSETS_PATH;?>plugins/jquery-migrate-1.2.1.min.js" type="text/javascript"></script>
  <script src="<?php echo ASSETS_PATH;?>plugins/bootstrap/js/bootstrap.min.js" type="text/javascript" ></script>
  <script src="<?php echo ASSETS_PATH;?>plugins/uniform/jquery.uniform.min.js" type="text/javascript" ></script>
  <script src="<?php echo ASSETS_PATH;?>plugins/jquery.blockui.js" type="text/javascript" ></script>
  <script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/dist/jquery.validate.min.js" type="text/javascript" ></script>
  <script src="<?php echo ASSETS_PATH;?>plugins/jquery-validation/localization/messages_zh.js" type="text/javascript" ></script>
  <script src="<?php echo ASSETS_ADMIN_PATH;?>js/app.js" type="text/javascript" ></script>
  <script src="<?php echo ASSETS_ADMIN_PATH;?>js/login.js" type="text/javascript" ></script>
  <script>
    jQuery(document).ready(function() {
      App.init();
	  Login.init();
    });
  </script>
  <!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>