<?php
/**
 * index.php 后台菜单模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Menu_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Admin_Menu = $this->loader->model('menu');
    }

    public function index()
    {
        $menuTree = $this->Model_Admin_Menu->getMenuTree(array(), array('sort_order' => 'asc', 'menu_id' => 'asc'));
        $this->tpl->assign('menuTree', $menuTree->children);
        //var_dump($menuTree->children);exit;
        $this->tpl->display('menu/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'alias' => '',
                'url' => '',
                'parent_id' => 0,
                'params' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
            
            $result = $this->Model_Admin_Menu->insert($data);
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
            $selectTree = $this->Model_Admin_Menu->getSelectTree();
            $this->tpl->assign('selectTree', $selectTree);
            $this->tpl->display('menu/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'name' => '',
                'alias' => '',
                'url' => '',
                'parent_id' => 0,
                'params' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);

            $where = array('menu_id' => $id);
            //print_r($data);exit;
            $result = $this->Model_Admin_Menu->update($data, $where);
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
            $where = array('menu_id' => $id);
            $result = $this->Model_Admin_Menu->getOne($where);

            $selectTree = $this->Model_Admin_Menu->getSelectTree();
            $this->tpl->assign('selectTree', $selectTree);

            $this->tpl->assign('item', $result);
            $this->tpl->display('menu/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('menu_id' => $id);
        if ($id && $this->Model_Admin_Menu->delete($where))
        {
            $this->message('', _url('menu/index'), 1);
        }
        else
        {
            $this->message('', _url('menu/index'), 0);
        }
    }
}
