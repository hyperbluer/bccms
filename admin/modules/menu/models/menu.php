<?php
/**
 * user.php 后台菜单模型类
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-17
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Menu extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'admin_menus';
    }

    public function getMenuTree(array $where = array(), array $order = array())
    {
        $data = $this->getAll($where, $order);
        foreach ($data as $k => $v)
        {
            $data[$k]['id'] = $data[$k]['menu_id'];
            $data[$k]['parentId'] = $data[$k]['parent_id'];
            unset($data[$k]['menu_id']);
            unset($data[$k]['parent_id']);
        }
        $tree = new Tree($data);
        $menuTree = $tree->getTree();

        return $menuTree;

    }

    public function getSelectTree(array $where = array(), array $order = array())
    {
        $menuTree = $this->getMenuTree($where, $order)->children;

        return $menuTree;

    }

    public function getBreadcrumb($id)
    {
        static $breadcrumb = array();

        $item = $this->getOne(array('menu_id' => $id));

        isset($item['menu_id']) && array_unshift($breadcrumb,$item);

        if (isset($item['menu_id']) && $item['parent_id'])
        {
            return $this->getBreadcrumb($item['parent_id']);
        }

        /*
        $breadcrumb[] = array(
            'menu_id' => 'home',
		    'name' => '首页',
			'url' => 'index',
        );
        */
        $breadcrumb = ArrayConvert::resetArrayKey($breadcrumb, 'menu_id');
        
        return $breadcrumb;
    }
}