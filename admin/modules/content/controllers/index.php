<?php
/**
 * index.php 后台内容模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Content_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Category = $this->loader->model('category/category');
        $this->Model_Content = $this->loader->model('content');
		
		$this->tpl->assign('modelList', $this->Model_Category->getModelList());
    }

    public function index()
    {
        $this->tpl->display('content/index');
    }
}
