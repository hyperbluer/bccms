<?php
class Plugin_test extends BC_Plugin
{
	function __construct()
	{
	
	}
	
	function index()
	{
		return 'Hello, this is test plugin!';
	}
}

BC_Hook::instance()->addAction('app_plugin_test', array('Plugin_test', 'index'));