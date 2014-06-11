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
 
class Controller_Content_Form extends App_Controller_Admin
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
		
		$this->Model_Content->dataTable = $this->Model_Model->getContentModelTableName($this->categoryResult['model']);
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $defaultData = array(
                'title' => '',
                'original_img' => '',
                'keywords' => '',
                'description' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $extra = $this->request->post->get('extra');
            (isset($info['status']) && $info['status'] == 'on') && $info['status'] = 1;
            $data = array_intersect_key($info,$defaultData);
            $data['site_id'] = $this->session->get('site_id');
			$data['category_id'] = $this->categoryId;
            $data['add_time'] = $info['add_time'] ? strtotime($info['add_time']) : BC_SYS_TIME;

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

            $result = $this->Model_Content->insert($data);
            if ($result[0])
            {
				foreach ($extra as $k => $v)
				{
					is_array($v) && $extra[$k] = implode(',', $v);
				}
                if (count($_FILES['extra']['name']))
                {
                    $uploadClass = new Upload();
                    $uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
                    $uploadClass->uploadFiles = $_FILES['extra'];
                    $uploadClass->upload();
                    $uploadInfos = $uploadClass->getSaveInfo();
                    if (is_array($uploadInfos))
                    {
                        foreach ($uploadInfos as $k => $v)
                        {
                            isset($uploadInfos[$k]['newFilename']) && $extra[$k] = $uploadInfos[$k]['newFilename'];
                        }
                        
                        //TODO 将上传文件写入attachment表
                    }
                }
				
				$extra['content_id'] = $result[0];
				$this->Model_Content->tableName = $this->Model_Content->dataTable;
                $this->Model_Content->insert($extra);
				
				$this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            //获取扩展字段列表
            $fields = $this->Model_Model->getExtraColumns($this->categoryResult['model']);

            $this->tpl->assign('extraFieldList', $fields);
            $this->tpl->display('content/form/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'title' => '',
                'original_img' => '',
                'keywords' => '',
                'description' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $extra = $this->request->post->get('extra');
            (isset($info['status']) && $info['status'] == 'on') && $info['status'] = 1;
            $data = array_intersect_key($info,$defaultData);
			$info['add_time'] && $data['add_time'] = strtotime($info['add_time']);

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

            $where = array('content_id' => $id, 'site_id' => $this->session->get('site_id'));
            $result = $this->Model_Content->update($data, $where);
            if ($result)
            {
				foreach ($extra as $k => $v)
				{
					is_array($v) && $extra[$k] = implode(',', $v);
				}
                if (count($_FILES['extra']['name']))
                {
                    $uploadClass = new Upload();
                    $uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
                    $uploadClass->uploadFiles = $_FILES['extra'];
                    $uploadClass->upload();
                    $uploadInfos = $uploadClass->getSaveInfo();
                    if (is_array($uploadInfos))
                    {
                        foreach ($uploadInfos as $k => $v)
                        {
                            isset($uploadInfos[$k]['newFilename']) && $extra[$k] = $uploadInfos[$k]['newFilename'];
                        }
                        
                        //TODO 将上传文件写入attachment表
                    }
                }

				$where = array('content_id' => $id);
				$this->Model_Content->tableName = $this->Model_Content->dataTable;
                $this->Model_Content->update($extra, $where);
				
                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            //获取扩展字段列表
            $fields = $this->Model_Model->getExtraColumns($this->categoryResult['model']);
            //获取内容信息
            $result = $this->Model_Content->getOneByModel($id);
            $result['content'] = stripslashes($result['content']);
            
            $this->tpl->assign('extraFieldList', $fields);
            $this->tpl->assign('item', $result);
            $this->tpl->display('content/form/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('content_id' => $id, 'site_id' => $this->session->get('site_id'));
        if ($id && $this->Model_Content->delete($where))
        {
			$this->Model_Content->tableName = $this->Model_Content->dataTable;
			$where = array('content_id' => $id);
			$this->Model_Content->delete($where);
            $this->message('', _url('content/list'), 1);
        }
        else
        {
            $this->message('', _url('content/list'), 0);
        }
    }
}
