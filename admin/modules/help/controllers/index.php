<?php
/**
 * index.php 后台帮助模块控制器
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    1376362943
 */
 
class Controller_help_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_help = $this->loader->model('help');
    }

    public function index()
    {
        $this->tpl->display('help/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $data = $this->request->post->get('info');
            
            $result = $this->Model_help->insert($data);
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
            $this->tpl->display('help/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $data = $this->request->post->get('info');

            $where = array('help_id' => $id);
            $result = $this->Model_help->update($data, $where);
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
            $where = array('help_id' => $id);
            $result = $this->Model_help->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('help/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('help_id' => $id);
        if ($id && $this->Model_help->delete($where))
        {
            $this->message('', _url('help/index'), 1);
        }
        else
        {
            $this->message('', _url('help/index'), 0);
        }
    }
}
