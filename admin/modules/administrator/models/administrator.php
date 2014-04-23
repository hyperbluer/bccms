<?php
/**
 * administrator.php 后台管理员模型类
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-16
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Administrator extends App_Model_Admin
{
    protected $pwdKey = 'BC';
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'admin_users';
    }

    public function login($userInfo)
    {
        $userInfo['password'] = $this->setPassword($userInfo['password']);
        $item = $this->getOne($userInfo);

        if (isset($item['user_id']))
        {
            //管理员状态检测
            if ($item['status'] == 0) return false;

            $Model_Admin_Role = $this->loader->model('role/role');
            $roleItem = $Model_Admin_Role->getOne(array('role_id' => $item['role_id']));
            !empty($roleItem['sites']) && $roleItem['sites'] = explode(',', $roleItem['sites']);

            if (empty($roleItem['sites']) || !is_numeric($roleItem['sites'][0]))
                return false;

            //写入session
            $this->session->set('user_id', $item['user_id']);
            $this->session->set('username', $item['username']);
            $this->session->set('role_id', $item['role_id']);
            $this->session->set('site_id', $roleItem['sites'][0]);
            $this->session->set('sites', $roleItem['sites']);

            return true;
        }
        else
        {
            return false;
        }

    }

    public function setPassword($password)
    {
        if ($password == '') return NULL;
        
        return md5($password);
    }

    public function getPassword($password)
    {
        if ($password == '') return NULL;

        return $password;
    }
}