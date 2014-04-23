<?php
$_config = array(
	'site_name' => 'BCCMS',
    'www' => 'http://127.0.0.1',
	'root_path' => '/github/bccms/',
    'assets_path' => '',
	'lang' => 'zh_CN',
	'tpl' => 'default',
	'tpl_suffix' => 'html',
	'cache_handler' => 'redis',
	'cache_refresh' => '0',
	'lock_ex' => 1,
	'rewrite' => 1,
	'charset' => 'utf-8',
	'admin_module' => 'admin',
	'admin_default_theme' => 'default',
    'open_debug' => 1,
    'open_log' => 0,
    'time_zone' => 'Etc/GMT-8',
);

$_config['upload'] = array(
    'saveFilePath' => '',
    'maxFileSize' => '2048000',
    'allowType' => array('gif', 'jpg', 'png', 'zip', 'rar', 'txt', 'doc', 'pdf'),
);

$_config['cookie'] = array(
    'lifetime' => 0,
    'cookie_path' => '',
    'cookie_domain' => '',
    'storage' => '',
);

$_config['session'] = array(
    'name' => 'bc',
    'handler' => 'default', //default/cache
    'storage' => 'files', //files/memcache/Database/...
    'gc_probability' => 1,
    'gc_divisor' => 100,
    'gc_maxlifetime' => 1440,
);

$_config['autoload'] = array(
	'global' => array(
		'library' => array(
			'controller/app',
			'model/app',
		),
	)
);
?>