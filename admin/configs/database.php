<?php
// 数据库配置
$_config['database'] = array(
    'mysql' => array(
        'driver' => 'mysql',
        'hostname' => 'localhost',
        'database' => 'bc_cms_dev',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
        'prefix' => 'bc_'
    ),
    'mongo' => array(
		'driver'   => 'mongo',
		'host'      => 'localhost:27017',
		'database'  => 'test',
        'options'   => array(
            'username'  => '',
		    'password'  => '',
            'connect' => true,
            'timeout' => 0,
        ),
	),
);
?>
