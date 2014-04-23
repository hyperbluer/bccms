<?php
/**
 * login.php 后台登陆首页控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Administrator_Login extends App_Controller_Admin
{

    public function __construct()
    {
        $this->isCheckLogin = false;
        $this->isInit = false;
        $this->isCheckPurview = false;
		parent::__construct();
        $this->Model_Administrator = $this->loader->model('administrator');
    }

    public function index()
    {
        if ($this->session->get('username'))
        {
            _redirect(_url('index'));
        }
        elseif ($this->request->isPost())
        {
            $username = $this->request->post->get('username');
            $password = $this->request->post->get('password');

            //验证用户名及密码格式
            if (!Validator::username($username) || !Validator::password($password))
            {
                $this->message('您的账号密码输入有误，请重新输入');
            }

            $userInfo = array(
                'username' => $username,
                'password' => $password
            );
            //登录验证
            if ($this->Model_Administrator->login($userInfo))
            {
                _redirect(_url('index'));
            }
            else
            {
                $this->message('登录失败，您的账号密码不正确或账号被禁用');
            }
        }
        else
        {
            $this->tpl->display('administrator/login');
        }
    }

    public function logOut()
    {
        $this->session->destroy();
        _redirect(_url('administrator/login'));
    }
}
