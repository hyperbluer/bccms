<?php
/**
 * index.php 倒计时等待页面控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-08-13
 */
 
class Controller_Home_Waiting extends BC_Controller
{

    public function __construct()
    {
		parent::__construct();
		
		$this->tpl->tplPath = APP_TPL_PATH.'cn'.DS;
    }

    public function index()
    {
		$this->tpl->display('home/waiting');
    }
}
