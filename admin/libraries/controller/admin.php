<?php
/**
 * Admin.php 后台主控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */

defined('IN_BC') or exit("Access Denied!");

class App_Controller_Admin extends BC_Controller
{
    /**
     * 是否开启用户认证，默认开启
     *
     * @var bool
     */
    public $isCheckLogin = true;
    public $isInit = true;
    public $isCheckPurview = true;
	protected $_route;

    public function __construct()
    {
		parent::__construct();
		
		$this->_route = $this->getRoute();
		
		$this->checkLogin();
		
		$this->checkSite();

        $this->init();

        $this->checkPurview();

        $this->checkModule();

    }

	/**
     * 验证后台用户登录操作权限
     *
     * @return bool
     */
    private function checkLogin()
    {
        if ($this->isCheckLogin === false) return true;
		
        if (!$this->session->get('username') && !$this->session->get('user_id'))
        {
			_redirect(_url('administrator/login'));
        }

        return true;
    }

	private function checkSite()
	{
		if ($site_id = $this->request->get->get('site_id'))
		{
			$siteList = $this->getSites();
			$userSiteList = $this->session->get('sites');
			if (isset($siteList[$site_id]) && in_array($site_id, $userSiteList))
			{
				$this->session->set('site_id', $site_id);
			}
			else
			{
				$this->message('您切换的站点不存在或权限不足，无法访问', '', 0);
			}
		}

		$this->setTpl(BC::config('tpl'));
	}

    private function checkPurview()
    {
        if ($this->isCheckPurview === false) return true;
        
        $requestAction = $this->_route;
        $purview = $this->loader->model('role/role')->getOne(array('role_id' => $this->session->get('role_id')), array(), array('purview'), 'purview');
        $purview = unserialize($purview);
        if (!in_array($requestAction, $purview) && $this->session->get('role_id') != 1)
        {
            if($this->request->get->get('_json') == 1 || $this->request->isAjax())
            {
                $this->tpl->display('common/permissionAjaxModal');
            }
            else
            {
                $this->tpl->display('common/permission');
            }
            exit();
        }
    }

    private function checkModule()
    {
        $config = $this->loader->model('module/module')->getConfig(BC::$module);
        if ($config[BC::$module]['status'] !== 1)
        {
            $this->message('此模块未启用，无法访问', 'module', 0);
        }
    }

    /**
     * 初始化加载后台头部，顶部，菜单栏、运行时间
     *
     * @return void
     */
    private function init()
    {
        if ($this->isInit === false) return true;
		$this->tpl->assign('_route', $this->_route);

        $session = $this->session->getAll();
        $this->tpl->assign('_session', $session);
        
        $this->tpl->assign('_runTime', BC::getRunTime());

        $siteList = $this->getSites();
        $this->tpl->assign('_siteList', $siteList);

        $_menuId = $this->request->get->has('menu_id') ? $this->request->get->get('menu_id') : 1;
        $this->tpl->assign('_menuId', $_menuId);
		$breadcrumb = $this->loader->model('menu/menu')->getBreadcrumb($_menuId);

		if (BC::$module == 'content')
		{
			$_categoryId = $this->request->get->get('category_id');
			if ($this->request->get->has('category_id'))
			{
				$breadcrumb = $this->loader->model('category/category')->getBreadcrumb($_categoryId);
			}
			$sidebarTree = $this->loader->model('category/category')->getTree(array('status'=> 1, 'site_id' => $this->session->get('site_id')), array('sort_order' => 'asc', 'category_id' => 'asc'), $_categoryId);
			
			$this->tpl->assign('_categoryId', $_categoryId);
		}
		else
		{
			$sidebarTree = $this->loader->model('menu/menu')->getMenuTree(array('status'=> 1), array('sort_order' => 'asc', 'menu_id' => 'asc'));
		}
		$this->setBreadcrumb($breadcrumb);

        $this->tpl->assign('_sidebarTree', $sidebarTree->children);
        $this->tpl->replace('#_SIDEBAR_#', $this->tpl->fetch('common/sidebar'));

        $_header = $this->tpl->fetch('common/header');
		$this->tpl->assign('_header', $_header);
        
		$_footer = $this->tpl->fetch('common/footer');
		$this->tpl->assign('_footer', $_footer);
    }

    protected function getSites()
    {
        $siteList = $this->loader->model('site/site')->getAll(array(), array('sort_order' => 'asc', 'site_id' => 'asc'));
        $siteList = ArrayConvert::resetArrayKey($siteList, 'site_id');

        return $siteList;
    }

    /**
     * 设置当前页面面包屑
     *
     * @param $breadcrumb
     * @return void
     */
    protected function setBreadcrumb($breadcrumb)
    {
        $this->tpl->assign('_breadcrumb', $breadcrumb);
        $this->tpl->replace('#_BREADCRUMB_#', $this->tpl->fetch('common/breadcrumb'));
    }
	
	
	protected function setTpl($dir = '')
	{
		$this->tpl->tplPath = APP_TPL_PATH.$dir.DS;
	}

    /**
     * 页面返回信息
     *
     * @param string $message
     * @param string $referer
     * @param int $status
     * @param string $data
     * @param int $time 单位秒
     * @return void
     */
    protected function message($message = '', $referer = '', $status = 1, $data = '', $time = 3)
    {
        empty($message) && $message = ($status == 1 ? '操作成功' : '操作失败');
        if($this->request->get->get('_json') == 1 || $this->request->isAjax())
		{
			$result = array(
                'message'	    =>	$message,
                'statusCode'	=>	$status,
				'referer'	    =>	$referer,
				'refresh'	    =>	$referer ? true : false,
				'data'		    =>	$data
			);
            
			echo json_encode($result);
		}
        else
        {
            empty($referer) && $referer = $this->request->server->get('HTTP_REFERER');
			$referer = htmlspecialchars_decode($referer, ENT_NOQUOTES);
			
            $this->tpl->assign('message', $message);
            $this->tpl->assign('referer', $referer);
            $this->tpl->assign('status', $status);
            $this->tpl->assign('data', $data);
            $this->tpl->assign('time', $time*1000);
            $this->tpl->display('common/message');

            exit();
		}
    }

}
