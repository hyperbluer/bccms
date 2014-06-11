<?php
/**
 * index.php 后台广告模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-21 10:26:41
 */
 
class Controller_Ads_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Module = $this->loader->model('module/module');
        $this->Model_Position = $this->loader->model('ads/position');
        $this->Model_Ads = $this->loader->model('ads');
		
		$this->moduleConfig = $this->Model_Module->getConfig('ads');
		$this->typeList = isset($this->moduleConfig['ads']['_setting']['typeList']) ? $this->moduleConfig['ads']['_setting']['typeList'] : array();

		$this->tpl->assign('typeList', $this->typeList);
    }

    public function index()
    {
		$ads_position_id = $this->request->get->get('ads_position_id');
		if (!$ads_position_id)
		{
			_redirect(_url('ads/position'));
		}
		
		$where = array('ads_position_id' => $ads_position_id);
		$dataList = $this->Model_Ads->getAll($where);
		
        $this->tpl->assign('ads_position_id', $ads_position_id);
        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('ads/index');
    }

    public function add()
    {
		$ads_position_id = $this->request->get->get('ads_position_id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'type' => '',
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
			$code = $this->request->post->get('code');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;
            $data['add_time'] = BC_SYS_TIME;
            $data['ads_position_id'] = $ads_position_id;
			
			//上传图片
			if (isset($_FILES['file']['name']['image']))
			{
				$uploadClass = new Upload();
				$uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
				$uploadClass->uploadFiles = $_FILES['file'];
				$uploadClass->upload();
				$uploadInfos = $uploadClass->getSaveInfo();
				if (is_array($uploadInfos))
				{
					isset($uploadInfos['image']['newFilename']) && $code['image'] = $uploadInfos['image']['newFilename'];
					
					//TODO 将上传文件写入attachment表
				}
				else
				{
					$this->message($uploadInfos, '', 0);
				}
			}
			$data['code'] = serialize($code);

            $result = $this->Model_Ads->insert($data);
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
			if (!$ads_position_id)
			{
				$this->message('请先选择广告位','', 0);
			}
			
			$where = array('ads_position_id' => $ads_position_id);
			$positionResult = $this->Model_Position->getOne($where);
			
			$this->tpl->assign('ads_position_id', $ads_position_id);
			$this->tpl->assign('positionItem', $positionResult);
            $this->tpl->display('ads/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        $where = array('ads_id' => $id);
        $result = $this->Model_Ads->getOne($where);
        $code = unserialize($result['code']);
        $code['content'] = stripslashes($code['content']);

        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
				'type' => '',
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
            $newCode = $this->request->post->get('code');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;
			
			//上传图片
			if (isset($_FILES['file']['name']['image']))
			{
				$uploadClass = new Upload();
				$uploadClass->saveFilePath = APP_UPLOAD_PATH.'images'.DS;
				$uploadClass->uploadFiles = $_FILES['file'];
				$uploadClass->upload();
				$uploadInfos = $uploadClass->getSaveInfo();
				if (is_array($uploadInfos))
				{
					isset($uploadInfos['image']['newFilename']) && $newCode['image'] = $uploadInfos['image']['newFilename'];
					
					//TODO 将上传文件写入attachment表
				}
				else
				{
					$this->message($uploadInfos, '', 0);
				}
			}
			$data['code'] = is_array($newCode) ? array_merge($code, $newCode) : $code;
            $data['code'] = serialize($data['code']);

            $where = array('ads_id' => $id);
            $result = $this->Model_Ads->update($data, $where);
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
			$where = array('ads_position_id' => $result['ads_position_id']);
			$positionResult = $this->Model_Position->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->assign('code', $code);
            $this->tpl->assign('positionItem', $positionResult);
            $this->tpl->display('ads/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('ads_id' => $id);
        if ($id && $this->Model_Ads->delete($where))
        {
            $this->message('', _url('ads/index'), 1);
        }
        else
        {
            $this->message('', _url('ads/index'), 0);
        }
    }
}
