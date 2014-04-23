<?php
/**
 * category.php 后台内容模型类
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-30
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Content extends App_Model
{
	public $dataTable;
	public $pages;
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'contents';
    }
	
	
	public function getOneByModel($contentId = 0, $categoryId = 0)
	{
		$tablePrefix = $this->db->getPrefix();
		$sql = 'SELECT c.*,d.* FROM '.$this->getTableName().' AS c LEFT JOIN '.
				$tablePrefix. $this->dataTable. ' AS d On c.content_id = d.content_id '.
				'WHERE c.site_id = '.$this->session->get('site_id');
		$contentId && $sql .= ' AND c.content_id = '.$contentId;
		$categoryId && $sql .= ' AND c.category_id = '.$categoryId;

		$result = $this->db->query($sql);
		$rows = $result->getOne();
		
		return $rows;
	}
	
	public function getListByPage($where = array(), $order = array(), $page, $limit = 10)
	{
		$page = max($page, 1);
		$offset = ($page-1)*$limit;
		$dataList = $this->getList($where, $order, $limit, $offset);

        $pagination = new Pagination();
		$pagination->htmlTpl = '<ul>{first}{prev}{pages}{next}{last}</ul>';
        $pagination->totalResult = count($this->getAll($where, $order, array('content_id')));
        $pagination->limit = $limit;
        $pagination->page = $page;
		$this->pages = $pagination->show();
		
		return $dataList;
	}
    
}