<?php
/**
 * index.php 后台帮助模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    1376362943
 */
 
class Controller_Help_Docs extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
    }

    public function index()
    {
        $this->tpl->display('help/docs');
    }
}
