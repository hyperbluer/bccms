<?php
$_config = array(
	'site_name' => 'BCCMS',
    'www' => 'http://127.0.0.1',
	'root_path' => '/github/bccms/admin/',
	'assets_path' => '/github/bccms/',
	'tpl' => 'default',
	'tpl_suffix' => 'php',
	'cache_handler' => 'redis',
	'charset' => 'utf-8',
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
    'cookie_path' => 'admin',
    'cookie_domain' => '',
    'storage' => '',
);

$_config['session'] = array(
    'name' => 'admin',
    'handler' => 'default', //default/cache
    'storage' => 'files', //files/memcache/Database/...
    'gc_probability' => 1,
    'gc_divisor' => 100,
    'gc_maxlifetime' => 1440,
);

$_config['autoload'] = array(
	'global' => array(
		'library' => array(
			'functions/extend',
            'classes/form',
			'controller/admin',
			'model/admin',
		),
	)
);
?>