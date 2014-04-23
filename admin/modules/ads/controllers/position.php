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
 
class Controller_Ads_Position extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Position = $this->loader->model('ads/position');
    }

    public function index()
    {
		$where = array('site_id' => $this->session->get('site_id'));
		$dataList = $this->Model_Position->getAll($where);
		
        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('ads/position/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
			$defaultData = array(
				'name' => '',
                'width' => '',
                'height' => '',
                'description' => '',
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;
            $data['type_id'] = 0;
			$data['site_id'] = $this->session->get('site_id');
			
            $result = $this->Model_Position->insert($data);
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
            $this->tpl->display('ads/position/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
				'name' => '',
                'width' => '',
                'height' => '',
                'description' => '',
                'status' => 0
            );
			
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
			$data['status'] = 0;
			(isset($info['status']) && $info['status'] == 'on') && $data['status'] = 1;

            $where = array('ads_position_id' => $id, 'site_id' => $this->session->get('site_id'));
            $result = $this->Model_Position->update($data, $where);
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
            $where = array('ads_position_id' => $id);
            $result = $this->Model_Position->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('ads/position/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('ads_position_id' => $id, 'site_id' => $this->session->get('site_id'));
        if ($id && $this->Model_Position->delete($where))
        {
            $this->message('', _url('ads/index'), 1);
        }
        else
        {
            $this->message('', _url('ads/index'), 0);
        }
    }
}
