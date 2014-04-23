<?php
/**
 * category.php 后台栏目树模型类
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-30
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Category extends App_Model
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'categories';
    }
    

    public function getTree(array $where = array(), array $order = array(), $activeId = 0)
    {
        $data = $this->getAll($where, $order);
		$contentModelList = $this->getContentModelList();
		$contentModelList = ArrayConvert::resetArrayKey($contentModelList, 'alias');
        foreach ($data as $k => $v)
        {
            $data[$k]['id'] = $v['category_id'];
            $data[$k]['parentId'] = $v['parent_id'];
            $data[$k]['url'] = isset($contentModelList[$v['model']]) ? 'content/'. $v['model'] : 'category/'.$v['model'];
            $data[$k]['icon'] = 'icon-folder-open';
            $data[$k]['active'] = $activeId == $v['category_id'] ? 1 : 0;
            unset($data[$k]['menu_id']);
            unset($data[$k]['parent_id']);
        }
        $tree = new Tree($data);
        $menuTree = $tree->getTree();

        return $menuTree;

    }

    public function getSelectTree(array $where = array(), array $order = array())
    {
        $menuTree = $this->getTree($where, $order)->children;

        return $menuTree;

    }
	
	public function getChildrenIds($id, $ids = array())
	{
		$rows = $this->getAll(array('parent_id' => $id), array(), array('category_id', 'parent_id'));
		
		if (count($rows))
		{
			foreach ($rows as $v)
			{
				$ids[] = $v['category_id'];
				$ids = $this->getChildrenIds($v['category_id'], $ids);
			}
		}
		
		return $ids;
	}
	
	public function getBreadcrumb($id)
    {
        static $breadcrumb = array();

        $item = $this->getOne(array('category_id' => $id));
		$item['url'] = 'content/'.$item['model'];

        isset($item['category_id']) && array_unshift($breadcrumb,$item);

        if (isset($item['category_id']) && $item['parent_id'])
        {
            return $this->getBreadcrumb($item['parent_id']);
        }

		$breadcrumb = ArrayConvert::resetArrayKey($breadcrumb, 'category_id');
        
        return $breadcrumb;
    }
	
	public function getModelList()
	{
		$defaultModelList = array(
			array(
				'alias' => 'link',
				'name' => '链接',
			),
			array(
				'alias' => 'plugin',
				'name' => '插件',
			),
		);
		
		$modelList = $this->getContentModelList();
		$modelList = array_merge($modelList, $defaultModelList);
		
		return $modelList;
	}
	
	public function getContentModelList()
	{
		$modelList = $this->loader->model('content/model')->getAll(array('status' => 1), array(), array('name', 'alias'));
		
		return $modelList;
	}
}