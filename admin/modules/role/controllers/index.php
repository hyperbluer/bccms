<?php
/**
 * index.php 后台角色模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Role_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Admin_Role = $this->loader->model('role');
        $this->Model_Module = $this->loader->model('module/module');
    }

    public function index()
    {
        $dataList = $this->Model_Admin_Role->getAll();

        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('role/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'sites' => '',
                'purview' => '',
                'status' => 0
            );
            $info = $this->request->post->get('info');
            (isset($info['status']) && $info['status'] == 'on') && $info['status'] = 1;
            $data = array_intersect_key($info,$defaultData);
            $data['sites'] = implode(',', $data['sites']);
            $data['purview'] = serialize($data['purview']);

            $result = $this->Model_Admin_Role->insert($data);
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
            $actionList = $this->Model_Module->getActionList();

            $this->tpl->assign('actionList', $actionList);
            $this->tpl->display('role/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'sites' => '',
                'purview' => '',
                'status' => 0
            );
            $info = $this->request->post->get('info');
            (isset($info['status']) && $info['status'] == 'on') && $info['status'] = 1;
            $data = array_intersect_key($info,$defaultData);
            $data['sites'] = implode(',', $data['sites']);
            $data['purview'] = serialize($data['purview']);

            $where = array('role_id' => $id);
            $result = $this->Model_Admin_Role->update($data, $where);
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
            $where = array('role_id' => $id);
            $result = $this->Model_Admin_Role->getOne($where);
            $result['sites'] = explode(',', $result['sites']);
            $result['purview'] = unserialize($result['purview']);
            $actionList = $this->Model_Module->getActionList();

            $this->tpl->assign('actionList', $actionList);
            $this->tpl->assign('item', $result);
            $this->tpl->display('role/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('role_id' => $id);
        if ($id && $this->Model_Admin_Role->delete($where))
        {
            $this->message('', _url('role/index'), 1);
        }
        else
        {
            $this->message('', _url('role/index'), 0);
        }
    }
}
