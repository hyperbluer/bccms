<?php
/**
 * index.php 后台评论模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-19 09:53:36
 */
 
class Controller_Comment_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Comment = $this->loader->model('comment');
    }

    public function index()
    {
		$where = array('site_id' => $this->session->get('site_id'));
		$dataList = $this->Model_Comment->getAll($where);
		
        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('comment/index');
    }

    public function status()
    {
        $id = $this->request->get->get('id');
        $status = $this->request->get->get('status') ? 1 : 0;
		
		$where = array('comment_id' => $id);
		$data = array('status' => $status);
		$result = $this->Model_Comment->update($data, $where);
        
        if ($result)
        {
            $this->message('', '', 1);
        }
        else
        {
            $this->message('', '', 0);
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('comment_id' => $id);
        if ($id && $this->Model_Comment->delete($where))
        {
            $this->message('', _url('comment/index'), 1);
        }
        else
        {
            $this->message('', _url('comment/index'), 0);
        }
    }
}
