<?php
/**
 * index.php 后台__CONFIG_NAME__模块控制器
 *
 *
 * @author          __CONFIG_TEAM__
 * @version         __CONFIG_VERSION__
 * @copyright       (C) 2013- *
 * @license	        __CONFIG_WEBSITE__
 * @lastmodify	    __CONFIG_ADD_TIME__
 */
 
class Controller___UCFIRST_MODULE___Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model___UCFIRST_MODULE__ = $this->loader->model('__MODULE__');
    }

    public function index()
    {
        $this->tpl->display('__MODULE__/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $data = $this->request->post->get('info');
            
            $result = $this->Model___UCFIRST_MODULE__->insert($data);
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
            $this->tpl->display('__MODULE__/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $data = $this->request->post->get('info');

            $where = array('__MODULE___id' => $id);
            $result = $this->Model___UCFIRST_MODULE__->update($data, $where);
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
            $where = array('__MODULE___id' => $id);
            $result = $this->Model___UCFIRST_MODULE__->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('__MODULE__/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('__MODULE___id' => $id);
        if ($id && $this->Model___UCFIRST_MODULE__->delete($where))
        {
            $this->message('', _url('__MODULE__/index'), 1);
        }
        else
        {
            $this->message('', _url('__MODULE__/index'), 0);
        }
    }
}
