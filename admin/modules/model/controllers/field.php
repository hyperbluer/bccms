<?php
/**
 * index.php 后台模型字段管理控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */

class Controller_Model_Field extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Model = $this->loader->model('model');
    }

    public function index()
    {
        $modelId = $this->request->get->get('model_id');
		if (!$modelId)
        {
            $this->message('模型参数不正确', '', 0);
        }
		
        $where = array('model_id' => $modelId);
        $result = $this->Model_Model->getOne($where);
        $dataList = unserialize($result['fields']);
        !is_array($dataList) && $dataList = array();

        $this->tpl->assign('modelId', $modelId);
        $this->tpl->assign('dataList', $dataList);
        $this->tpl->display('model/field/index');
    }

    public function add()
    {
        $modelId = $this->request->get->get('model_id');
        
        if ($this->request->isPost())
        {
            $info = $this->request->post->get('info');
            $attr = $this->request->post->get('attr');
            $info['attr'] = $attr;
            $info['is_system'] = 0;
            if (!$info['alias'])
            {
                $this->message('字段名称不正确', '', 0);
            }

            $where = array('model_id' => $modelId);
            $result = $this->Model_Model->getOne($where);
            $fields = unserialize($result['fields']);
			
			//判断是否存在同名字段
			if (isset($fields[$info['alias']]))
			{
				$this->message('字段已存在', '', 0);
			}
            $fields[$info['alias']] = $info;
            $data = array('fields' => serialize($fields));
			$tableName = $result['alias'];
            //print_r($info);exit;
            $result = $this->Model_Model->update($data, $where);
            if ($result)
            {
                //添加字段
                $this->Model_Model->addColumn($tableName, $info);

                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            $this->tpl->assign('modelId', $modelId);
            $this->tpl->display('model/field/add');
        }
    }

    public function edit()
    {
        $modelId = $this->request->get->get('model_id');
        $id = $this->request->get->get('id');
        
        if ($this->request->isPost())
        {
            $info = $this->request->post->get('info');

            if ($this->request->post->has('attr'))
            {
                $info['attr'] = $this->request->post->get('attr');
            }

            $where = array('model_id' => $modelId);
            $result = $this->Model_Model->getOne($where);
            $fields = unserialize($result['fields']);
            $fields[$info['alias']] = ArrayConvert::mergeArray($fields[$info['alias']], $info);
            $data = array('fields' => serialize($fields));
			$tableName = $result['alias'];

            $result = $this->Model_Model->update($data, $where);
            if ($result)
            {
                //修改字段
				$this->Model_Model->changeColumn($tableName, $info);
                
                $this->message('', '', 1);
            }
            else
            {
                $this->message('', '', 0);
            }
        }
        else
        {
            $where = array('model_id' => $modelId);
            $result = $this->Model_Model->getOne($where);
            $result = unserialize($result['fields']);
            if (!isset($result[$id]))
            {
                $this->message('未知字段', '', 0);
            }
            $item = $result[$id];

            $this->tpl->assign('modelId', $modelId);
            $this->tpl->assign('item', $item);
            $this->tpl->display('model/field/edit');
        }
    }

    public function delete()
    {
        $modelId = $this->request->get->get('model_id');
        $menuId = $this->request->get->get('menu_id');
        $id = $this->request->get->get('id');

        $where = array('model_id' => $modelId);
        $result = $this->Model_Model->getOne($where);
        $fields = unserialize($result['fields']);
        unset($fields[$id]);
        $data = array('fields' => serialize($fields));
        if ($id && $this->Model_Model->update($data, $where))
        {
            //删除表中字段
			$this->Model_Model->dropColumn($result['alias'],$id);

            $this->message('', _url('model/field', array('model_id' => $modelId, 'menu_id' => $menuId)), 1);
        }
        else
        {
            $this->message('', _url('model/field', array('model_id' => $modelId, 'menu_id' => $menuId)), 0);
        }
    }

    public function showAttrForm()
    {
        $type = $this->request->get->get('type');
        if (empty($type)) return;

        $id = $this->request->get->get('id');
        $modelId = $this->request->get->get('model_id');
        $where = array('model_id' => $modelId);
        $result = $this->Model_Model->getOne($where);
        $fields = unserialize($result['fields']);
        $item = $fields[$id]['attr'];
        
        $this->tpl->assign('item', $item);
        $this->tpl->display('model/field/type/'.$type);
    }
}
