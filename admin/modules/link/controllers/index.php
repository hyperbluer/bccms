<?php
/**
 * index.php 后台友情链接模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-16 14:10:37
 */
 
class Controller_link_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Link = $this->loader->model('link');

    }

    public function index()
    {
		$where = array('site_id' => $this->session->get('site_id'));
		$dataList = $this->Model_Link->getAll($where, array('sort_order' => 'asc', 'link_id' => 'asc'));
        $this->tpl->assign('dataList', $dataList);
		
        $this->tpl->display('link/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
			$defaultData = array(
				'sitename' => '',
                'website' => '',
                'logo' => '',
                'email' => '',
                'description' => '',
                'sort_order' => 0,
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;
            $data['add_time'] = BC_SYS_TIME;
            $data['type_id'] = 0;
			$data['site_id'] = $this->session->get('site_id');
			
			//上传图片
			if (isset($_FILES['file']['name']['logo']))
			{
				$uploadClass = new Upload();
				$uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
				$uploadClass->uploadFiles = $_FILES['file'];
				$uploadClass->upload();
				$uploadInfos = $uploadClass->getSaveInfo();
				if (is_array($uploadInfos))
				{
					isset($uploadInfos['logo']['newFilename']) && $data['logo'] = $uploadInfos['logo']['newFilename'];
					
					//TODO 将上传文件写入attachment表
				}
				else
				{
					$this->message($uploadInfos, '', 0);
				}
			}
			
            $result = $this->Model_Link->insert($data);
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
            $this->tpl->display('link/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
			$defaultData = array(
				'sitename' => '',
                'website' => '',
                'logo' => '',
                'email' => '',
                'description' => '',
                'sort_order' => 0,
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;
			
			//上传图片
			if (isset($_FILES['file']['name']['logo']))
			{
				$uploadClass = new Upload();
				$uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
				$uploadClass->uploadFiles = $_FILES['file'];
				$uploadClass->upload();
				$uploadInfos = $uploadClass->getSaveInfo();
				if (is_array($uploadInfos))
				{
					isset($uploadInfos['logo']['newFilename']) && $data['logo'] = $uploadInfos['logo']['newFilename'];
					
					//TODO 将上传文件写入attachment表
				}
				else
				{
					$this->message($uploadInfos, '', 0);
				}
			}

            $where = array('link_id' => $id, 'site_id' => $this->session->get('site_id'));
            $result = $this->Model_Link->update($data, $where);
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
            $where = array('link_id' => $id, 'site_id' => $this->session->get('site_id'));
            $result = $this->Model_Link->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('link/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('link_id' => $id, 'site_id' => $this->session->get('site_id'));
        if ($id && $this->Model_Link->delete($where))
        {
            $this->message('', _url('link/index'), 1);
        }
        else
        {
            $this->message('', _url('link/index'), 0);
        }
    }
}
