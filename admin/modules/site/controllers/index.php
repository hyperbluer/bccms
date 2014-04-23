<?php
/**
 * index.php 后台站点模块控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Site_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Site = $this->loader->model('site');
        $this->Model_Language = $this->loader->model('language/language');

        $languageList = $this->Model_Language->getAll();
        $languageList = ArrayConvert::resetArrayKey($languageList, 'language_id');
        $this->tpl->assign('languageList', $languageList);
    }

    public function index()
    {
        $dataList = $this->Model_Site->getAll(array(), array('sort_order' => 'asc', 'site_id' => 'asc'));

        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('site/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            $defaultData = array(
                'language_id' => 0,
                'name' => '',
                'alias' => '',
                'keywords' => '',
                'description' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
            
            $result = $this->Model_Site->insert($data);
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
            $this->tpl->display('site/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'language_id' => 0,
                'name' => '',
                'alias' => '',
                'keywords' => '',
                'description' => '',
                'sort_order' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);

            $where = array('site_id' => $id);
            //print_r($data);exit;
            $result = $this->Model_Site->update($data, $where);
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
            $where = array('site_id' => $id);
            $result = $this->Model_Site->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('site/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('site_id' => $id);
        if ($id && $this->Model_Site->delete($where))
        {
            $this->message('', _url('site/index'), 1);
        }
        else
        {
            $this->message('', _url('site/index'), 0);
        }
    }
}
