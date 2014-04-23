 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>系统错误提示</title>
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<meta name="Generator" content="EditPlus"/>
<style>
body{
	font-family: 'Microsoft Yahei', Verdana, arial, sans-serif;
	font-size:14px;
    background-color: #2E363F;
    color:#fff;
}
a{
    text-decoration:none;
    color:#fff;
}
a:hover{
    text-decoration:none;
    color:#FF6600;
}
h2{
	border-bottom:1px solid #51b1e9;
	padding:0 0 8px 0;
    font-size:25px;
    color: #ed4e2a;
}
.title{
	margin:4px 0;
	color:#0d638f;
	font-weight:bold;
}
.message,#trace{
	padding:1em;
	margin:10px 0;
	line-height:150%;
}
.message{
	background:#ed4e2a;
	border:1px solid #ddd;
}
#trace{
	background:#4b8df8;
	border:1px solid #ddd;
    word-wrap: break-word;
}
.notice{
    padding:20px;
    padding-top: 0;
	margin:30px;
    border: 1px solid #ddd;
    -webkit-box-shadow: 0 0 8px #ddd;
}
.red{
	color:#ed4e2a;
	font-weight:bold;
}
.text-right {
    float: right;
    font-size: 12px;
    color: #51b1e9;
    padding-top: 16px;
}
</style>
</head>
<body>
<div class="notice">
<h2><div class="text-right">[ <A HREF="<?php echo($_SERVER['PHP_SELF'])?>">重试</A> ] [ <A HREF="javascript:history.back()">返回</A> ] [ <A HREF="/">回到首页</A> ]</div><?php echo $e['errCodeTip'];?></h2>
<?php if(isset($e['errFile'])) {?>
<p><strong>出错文件：</strong><span class="red"><?php echo $e['errFile'] ;?></span>　错误行：<span class="red"><?php echo $e['errLine'];?></span></p>
<?php }?>
<p class="title">[ 错误信息 ]</p>
<p class="message"><?php echo $e['errStr'];?></p>
<?php if(isset($e['traceInfo'])) {?>
<p class="title">[ TRACE ]</p>
<pre id="trace">
<?php echo $e['traceInfo'];?>
</pre>
<?php }?>
</div>
</div>
</body>
</html>