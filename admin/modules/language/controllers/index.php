<?php
/**
 * index.php 后台语言版本模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Language_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Language = $this->loader->model('language');
    }

    public function index()
    {
        $dataList = $this->Model_Language->getAll(array(), array('sort_order' => 'asc', 'language_id' => 'asc'));

        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('language/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'code' => '',
                'locale' => '',
                'image' => '',
                //'directory' => '',
                //'filename' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
            
            $result = $this->Model_Language->insert($data);
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
            $this->tpl->display('language/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'code' => '',
                'locale' => '',
                'image' => '',
                //'directory' => '',
                //'filename' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);

            $where = array('language_id' => $id);
            //print_r($data);exit;
            $result = $this->Model_Language->update($data, $where);
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
            $where = array('language_id' => $id);
            $result = $this->Model_Language->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('language/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('language_id' => $id);
        if ($id && $this->Model_Language->delete($where))
        {
            $this->message('', _url('language/index'), 1);
        }
        else
        {
            $this->message('', _url('language/index'), 0);
        }
    }
}
