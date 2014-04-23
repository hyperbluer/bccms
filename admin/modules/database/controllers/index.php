<?php
/**
 * index.php 后台数据库管理模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-26 09:37:42
 */
 
class Controller_Database_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Database = $this->loader->model('database');
    }

    public function index()
    {
		$dataList = $this->Model_Database->showTables();
		
        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('database/index');
    }
	
	public function fieldList()
	{
		$table = $this->request->get->get('table');
		if (!$table)
		{
			$this->message('', '', 0);
		}
		
		$dataList = $this->Model_Database->showFields($table);

        $this->tpl->assign('dataList', $dataList);
		$this->tpl->display('database/fieldList');
	}
}
