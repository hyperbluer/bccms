<?php
/**
 * article.php 文章模型内容控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-08-15
 */
 
class Controller_Content_Article extends App_Controller
{

    public function __construct()
    {
		parent::__construct();
		$this->Model_Category = $this->loader->model('category/category');
        $this->Model_Content = $this->loader->model('content/content');
		$this->Model_Model = $this->loader->model('content/model');
		
		$where = array('category_id' => $this->categoryId, 'site_id' => $this->session->get('site_id'));
		$this->categoryResult = $this->Model_Category->getOne($where);

		if ($this->categoryResult['status'] == 0 || $this->categoryResult['model'] != strtolower(BC::$controller))
		{
			throw new BC_Exception('您访问的页面不存在或未审核', '404');
		}
		
		$this->Model_Content->dataTable = $this->Model_Model->getContentModelTableName($this->categoryResult['model']);
		
    }

    public function index()
    {
		//获取栏目默认模板，若alias参数有设定，则判断同名模板是否存在
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
		
		//获取文章内容模型内容
		$page = $this->request->get->get('page');
		$where = array('category_id' => $this->categoryId, 'site_id' => $this->session->get('site_id'));
		$order = array('sort_order' => 'asc', 'content_id' => 'asc');
		$dataList = $this->Model_Content->getListByPage($where, $order, $page, 3);
		
		$this->tpl->assign('pages', $this->Model_Content->pages);
		$this->tpl->assign('dataList', $dataList);
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
