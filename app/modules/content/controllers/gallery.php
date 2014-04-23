<?php
/**
 * gallery.php 图集模型内容控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-08-15
 */
 
class Controller_Content_Gallery extends App_Controller
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
		$tpl = 'content/'.strtolower(BC::$controller);
		$flag = 0;
		if ($this->categoryResult['alias'])
		{
			$tplFile = $this->tpl->getFilePath($tpl.'/'.$this->categoryResult['alias']);

			if (File::isFile($tplFile))
			{
				$flag = 1;
			}
		}
		$tpl = $flag ? $tpl.'/'.$this->categoryResult['alias'] : $tpl.'/list';

		$this->tpl->display($tpl);
    }
	
	public function detail()
	{
		$contentId = $this->request->get->get('content_id');
		if (!$contentId)
		{
			throw new BC_Exception('您访问的页面不存在或未审核', '404');
		}
		$tpl = 'content/'.strtolower(BC::$controller).'/detail';
		//获取内容
		$result = $this->Model_Content->getOneByModel($contentId, $this->categoryId);

		$this->tpl->assign('item', $result);
		$this->tpl->display($tpl);
	}
}
