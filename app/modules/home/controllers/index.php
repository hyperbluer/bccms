<?php
/**
 * index.php 首页控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-08-13
 */
 
class Controller_Home_Index extends App_Controller
{

    public function __construct()
    {
		parent::__construct();
    }

    public function index()
    {
		$this->tpl->display('home/index');
    }
}
