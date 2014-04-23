<?php
/**
 * index.php 后台内容列表模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Content_List extends App_Controller_Admin
{
	private $categoryId;
	private $categoryResult;

    public function __construct()
    {
		parent::__construct();
		$this->Model_Category = $this->loader->model('category/category');
        $this->Model_Content = $this->loader->model('content/content');
		$this->Model_Model = $this->loader->model('model/model');
		
		$this->categoryId = $this->request->get->get('category_id');
		if (!$this->categoryId)
		{
			$this->message('请求路径有误，请确认参数是否正确', '', 0);
		}
		
		$where = array('category_id' => $this->categoryId, 'site_id' => $this->session->get('site_id'));
		$this->categoryResult = $this->Model_Category->getOne($where);
		
		$modelList = $this->Model_Model->getAll(array('status' => 1), array(), array('name', 'alias'));
		$modelList = ArrayConvert::resetArrayKey($modelList, 'alias');
		if (!isset($modelList[$this->categoryResult['model']]))
		{
			$this->message('此模型('.$this->categoryResult['model'].')为非内容模型，无法操作', '', 0);
		}
		
		$this->Model_Content->dataTable = $this->Model_Model->getContentModelTableName($this->categoryResult['model']);
		
    }

    public function index()
    {
		if ($this->categoryResult['model'] == 'page') 
		{
			$this->pageIndex();
		}
		else
		{
			$page = $this->request->get->get('page');
			
			$where = array('category_id' => $this->categoryId, 'site_id' => $this->session->get('site_id'));
			$order = array('sort_order' => 'asc', 'content_id' => 'asc');
			$dataList = $this->Model_Content->getListByPage($where, $order, $page);

			$this->tpl->assign('pages', $this->Model_Content->pages);
			$this->tpl->assign('dataList', $dataList);
		   
			$this->tpl->display('content/list');
		}
    }
	
	private function pageIndex()
	{
		$where = array('category_id' => $this->categoryId, 'site_id' => $this->session->get('site_id'));
		$result = $this->Model_Content->getOne($where);
		if (!isset($result['content_id']))
		{
			//若无记录，则新增
			$data = array(
				'category_id' => $this->categoryId,
				'title' => $this->categoryResult['name'],
				'original_img' => '',
                'keywords' => $this->categoryResult['keywords'],
                'description' => $this->categoryResult['description'],
                'add_time' => BC_SYS_TIME,
                'sort_order' => 0,
                'status' => 1
			);
            $data['site_id'] = $this->session->get('site_id');

            $result = $this->Model_Content->insert($data);
			if ($result[0])
            {
				$data = array(
					'content_id	' => $result[0],
					'content' => '',
				);
				$tableName = $this->Model_Content->tableName;
				$this->Model_Content->tableName = $this->Model_Content->dataTable;
				$this->Model_Content->insert($data);
				$this->Model_Content->tableName = $tableName; //重置表名为主表
			}
		}
		//获取扩展字段列表
        $fields = $this->Model_Model->getExtraColumns($this->categoryResult['model']);
		
		$result = $this->Model_Content->getOneByModel(0, $this->categoryId);

        $this->tpl->assign('extraFieldList', $fields);
		$this->tpl->assign('item', $result);
        $this->tpl->display('content/form/edit');
	}
}
