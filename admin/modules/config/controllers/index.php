<?php
/**
 * index.php 后台配置模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Config_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
    }

    public function index()
    {
        $this->tpl->display('config');
    }
}
