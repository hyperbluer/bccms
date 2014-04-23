<?php
/**
 * link.php 链接模型控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-08-15
 */
 
class Controller_Category_Link extends App_Controller
{

    public function __construct()
    {
		parent::__construct();
		
		$this->categoryResult = $this->loader->model('category/category')->getOne(array('category_id' => $this->categoryId));

		if ($this->categoryResult['status'] == 0 || $this->categoryResult['model'] != strtolower(BC::$controller))
		{
			throw new BC_Exception('您访问的页面不存在或未审核', '404');
		}
		
    }

    public function index()
    {
		_redirect(_url($this->categoryResult['link']));
    }
}
