<?php
/**
 * index.php 后台模型管理控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Model_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Model = $this->loader->model('model');
    }

    public function index()
    {
        $dataList = $this->Model_Model->getAll();

        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('model/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'alias' => '',
                'fields' => '',
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
            $data['fields'] = serialize($this->Model_Model->getDefaultColumns());

            $result = $this->Model_Model->insert($data);
            if ($result[0])
            {
                //创建模型表
                $this->Model_Model->createTable($data['alias']);

                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            $this->tpl->display('model/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);

            $where = array('model_id' => $id);
            //print_r($data);exit;
            $result = $this->Model_Model->update($data, $where);
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
            $where = array('model_id' => $id);
            $result = $this->Model_Model->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('model/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('model_id' => $id);
        $result = $this->Model_Model->getOne($where);
        if ($id && $this->Model_Model->delete($where))
        {
            //删除模型表
            $this->Model_Model->dropTable($result['alias']);

            $this->message('', _url('model/index'), 1);
        }
        else
        {
            $this->message('', _url('model/index'), 0);
        }
    }
}
