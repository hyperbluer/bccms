<?php
/**
 * index.php 后台日志模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-19 11:03:52
 */
 
class Controller_Log_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Log = $this->loader->model('log');
    }

    public function index()
    {
		$where = array('log_id' => $this->session->get('site_id'));
		$dataList = $this->Model_Log->getAll($where);
		
        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('log/index');
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('log_id' => $id);
        if ($id && $this->Model_Log->delete($where))
        {
            $this->message('', _url('log/index'), 1);
        }
        else
        {
            $this->message('', _url('log/index'), 0);
        }
    }
}
