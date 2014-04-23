<?php
//预定义
define('DS',            DIRECTORY_SEPARATOR); //文件目录连接符
define('BASE_PATH',     realpath(dirname(__FILE__)).DS.'..'.DS); //系统根路径
define('BC_PATH',       BASE_PATH.'../BC'.DS); //框架核心路径
define('APP_PATH',      BASE_PATH.'admin'.DS); //APP项目路径
define('APP_VAR_PATH',  BASE_PATH.'var'.DS); //临时数据路径

//初始化APP
require_once BC_PATH.'BC.php';
BC::run();
?>
