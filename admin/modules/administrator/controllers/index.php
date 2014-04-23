<?php
/**
 * index.php 管理员管理控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-16
 */
 
class Controller_Administrator_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Administrator = $this->loader->model('administrator');
        $this->Model_Admin_Role = $this->loader->model('role/role');

        $roleList = $this->Model_Admin_Role->getAll();
        $roleList = ArrayConvert::resetArrayKey($roleList, 'role_id');
        $this->tpl->assign('roleList', $roleList);
    }

    public function index()
    {
        $userList = $this->Model_Administrator->getAll();

        $this->tpl->assign('userList', $userList);
        $this->tpl->display('administrator/index');
    }

    public function add()
    {
        if ($this->request->isPost())
        {
            //TODO 检测用户名、Email是否已存在

            //TODO 检测执行添加操作的管理员是否拥有相应组权限

            $defaultData = array(
                'username' => '',
                'nickname' => '',
                'password' => '',
                'email' => '',
                'role_id' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
            $data['password'] = $this->Model_Administrator->setPassword($data['password']);
            $data['add_time'] = BC_SYS_TIME;

            $result = $this->Model_Administrator->insert($data);
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
            $this->tpl->display('administrator/add');
        }
    }

    public function edit()
    {
        $id = $this->request->get->get('id');
        if ($this->request->isPost())
        {
            $defaultData = array(
                'nickname' => '',
                'email' => '',
                'role_id' => 0,
                'status' => 0
            );
            $info = $this->request->post->get('info');
            $data = array_intersect_key($info,$defaultData);
            if (isset($info['password']) && Validator::password($info['password']))
                $data['password'] = $this->Model_Administrator->setPassword($info['password']);

            $where = array('user_id' => $id);
            //print_r($data);exit;
            $result = $this->Model_Administrator->update($data, $where);
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
            $where = array('user_id' => $id);
            $result = $this->Model_Administrator->getOne($where);

            $this->tpl->assign('item', $result);
            $this->tpl->display('administrator/edit');
        }
    }

    public function delete()
    {
        $id = $this->request->get->get('id');

        $where = array('user_id' => $id);
        if ($id && $this->Model_Administrator->delete($where))
        {
            $this->message('', _url('administrator'), 1);
        }
        else
        {
            $this->message('', _url('administrator'), 0);
        }
    }
}
