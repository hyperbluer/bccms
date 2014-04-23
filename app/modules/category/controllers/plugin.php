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
 
class Controller_Category_Plugin extends App_Controller
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
		$params = array();
		$pluginArray = parse_url($this->categoryResult['link']);
		//获取插件名
		$pluginName = $pluginArray['path'];
		//获取插件自定义参数
		$query = $pluginArray['query'];
		parse_str(str_replace('&amp;', '&', $query), $params); //将参数字符串转换成数组
		
		if (!$pluginName)
		{
			$this->message('未知插件', '', 0);
		}
		
		$pluginName = 'app_plugin_'.$pluginName;
		BC_Hook::instance()->doAction($pluginName, $params);
		$returns = BC_Hook::instance()->getReturns($pluginName);
		$output = implode('', $returns);
		
		echo $output;
    }
}
