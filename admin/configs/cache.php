<?php
//缓存配置
$_config['cache'] =  array (
	'file' => array (
		'handler'   => 'file',
		'suffix'    => '.cache',
	),
	'memcache' => array (
		'handler'   => 'memcache',
		'host'      => '127.0.0.1',
		'port'      => 11211,
	),
	'redis' => array(
		'handler' => 'redis',
		'host' => '127.0.0.1',
		'port' => '6379',
		'timeout' => '3',
		
	),
);
?>