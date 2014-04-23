<?php
/**
 * index.php 后台栏目树模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Category_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
		$this->Model_Module = $this->loader->model('module/module');
        $this->Model_Category = $this->loader->model('category');
		
		$this->tpl->assign('modelList', $this->Model_Category->getModelList());
		
		//获取配置文件中target项所有可选值
		$this->moduleConfig = $this->Model_Module->getConfig('category');
		$this->targetList = isset($this->moduleConfig['category']['_setting']['targetList']) ? $this->moduleConfig['category']['_setting']['targetList'] : array();

		$this->tpl->assign('targetList', $this->targetList);
    }

    public function index()
    {
        $categoryTree = $this->Model_Category->getTree(array('site_id' => $this->session->get('site_id')), array('sort_order' => 'asc', 'category_id' => 'asc'));
        $this->tpl->assign('categoryTree', $categoryTree->children);
        //var_dump($categoryTree->children);exit;
        $this->tpl->display('category/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $defaultData = array(
                'parent_id' => 0,
                'module_id' => 0,
                'model' => '',
                'template_id' => 0,
                'name' => '',
                'alias' => '',
                'original_img' => '',
                'keywords' => '',
                'description' => '',
                'link' => '',
				'target' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            (isset($info['status']) && $info['status'] == 'on') && $info['status'] = 1;
            $data = array_intersect_key($info,$defaultData);
            $data['site_id'] = $this->session->get('site_id');
            $data['add_time'] = BC_SYS_TIME;
			$data['model'] == 'plugin' && $data['link'] = $info['plugin'];
			
			//上传图片
			if (isset($_FILES['file']['name']['original_img']))
			{
				$uploadClass = new Upload();
				$uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
				$uploadClass->uploadFiles = $_FILES['file'];
				$uploadClass->upload();
				$uploadInfos = $uploadClass->getSaveInfo();
				if (is_array($uploadInfos))
				{
					isset($uploadInfos['original_img']['newFilename']) && $data['original_img'] = $uploadInfos['original_img']['newFilename'];
					
					//TODO 将上传文件写入attachment表
				}
				else
				{
					$this->message($uploadInfos, '', 0);
				}
			}

            $result = $this->Model_Category->insert($data);
            if ($result[0])
            {
                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            $selectTree = $this->Model_Category->getSelectTree(array('site_id' => $this->session->get('site_id')));
            $this->tpl->assign('selectTree', $selectTree);
            $this->tpl->display('category/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'parent_id' => 0,
                'module_id' => 0,
                'model' => '',
                'template_id' => 0,
                'name' => '',
                'alias' => '',
                'original_img' => '',
				'keywords' => '',
                'description' => '',
                'link' => '',
                'target' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            (isset($info['status']) && $info['status'] == 'on') && $info['status'] = 1;
            $data = array_intersect_key($info,$defaultData);
			$data['model'] == 'plugin' && $data['link'] = $info['plugin'];
			
			//上传图片
			if (isset($_FILES['file']['name']['original_img']))
			{
				$uploadClass = new Upload();
				$uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
				$uploadClass->uploadFiles = $_FILES['file'];
				$uploadClass->upload();
				$uploadInfos = $uploadClass->getSaveInfo();
				if (is_array($uploadInfos))
				{
					isset($uploadInfos['original_img']['newFilename']) && $data['original_img'] = $uploadInfos['original_img']['newFilename'];
					
					//TODO 将上传文件写入attachment表
				}
				else
				{
					$this->message($uploadInfos, '', 0);
				}
			}

            $where = array('category_id' => $id, 'site_id' => $this->session->get('site_id'));
            //print_r($data);exit;
            $result = $this->Model_Category->update($data, $where);
            if ($result)
            {
                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            $where = array('category_id' => $id, 'site_id' => $this->session->get('site_id'));
            $result = $this->Model_Category->getOne($where);

            $selectTree = $this->Model_Category->getSelectTree(array('site_id' => $this->session->get('site_id')));
            $this->tpl->assign('selectTree', $selectTree);

            $this->tpl->assign('item', $result);
            $this->tpl->display('category/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('category_id' => $id, 'site_id' => $this->session->get('site_id'));
        if ($id && $this->Model_Category->delete($where))
        {
            $this->message('', _url('category/index'), 1);
        }
        else
        {
            $this->message('', _url('category/index'), 0);
        }
    }
}
