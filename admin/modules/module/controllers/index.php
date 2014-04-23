<?php
/**
 * index.php 后台模块管理控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */
 
class Controller_Module_Index extends App_Controller_Admin
{

    public function __construct()
    {
		parent::__construct();
        $this->Model_Module = $this->loader->model('module');

        $this->sysModuleList = $this->Model_Module->getSysModules();

    }

    public function index()
    {
        $moduleList = $this->Model_Module->getConfig();

        $this->tpl->assign('sysModuleList', $this->sysModuleList);
        $this->tpl->assign('dataList', $moduleList);
        $this->tpl->display('module/index');
    }

    public function create()
    {
        if ($this->request->isPost())
        {
            $module = $this->request->post->get('module');
            //验证目录名是否合法
            if (!preg_match('/^[a-z]+$/',$module))
            {
                $this->message('请输入正确的模块目录','', 0);
            }
            //验证模块是否已经存在
            if (File::isDir(APP_MOD_PATH.$module))
            {
                $this->message('模块已存在，无法创建','', 0);
            }

            $defaultData = array(
                'status' => 1,
                'name' => '',
                'alias' => '',
                'version' => '',
                'team' => '',
                'email' => '',
                'website' => '',
                'description' => '',
                'content' => '',
            );
            $info = $this->request->post->get('info');
            (isset($info['status']) && $info['status'] == 'on') && $info['status'] = 1;
            $data = array_intersect_key($info,$defaultData);
            $data['add_time'] = BC_SYS_TIME;
            $data['update_time'] = '';

            //生成对应模块文件夹及初始文件
            if ($this->Model_Module->create($module, $data))
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
            $this->tpl->display('module/create');
        }
    }

    public function status()
    {
        $module = $this->request->get->get('module');
        $status = $this->request->get->get('status');
        $data = array(
            'status' => $status
        );

        if ($this->Model_Module->saveConfig($module, $data))
        {
            $this->message('', '', 1);
        }
        else
        {
            $this->message('', '', 0);
        }

    }

    public function uninstall()
    {
        $module = $this->request->get->get('module');

        if (in_array($module, $this->sysModuleList))
        {
            $this->message('系统核心模块无法删除', _url('module/index'), 0);
        }

        if ($module && File::rmDir(APP_MOD_PATH.$module))
        {
            $moduleTplPath = APP_TPL_PATH.BC::config('tpl').DS.$module.DS;
            File::rmDir($moduleTplPath);
            $this->message('', _url('module/index'), 1);
        }
        else
        {
            $this->message('', _url('module/index'), 0);
        }
    }
}
