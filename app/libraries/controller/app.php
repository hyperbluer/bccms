<?php
/**
 * App.php 主控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-13
 */

defined('IN_BC') or exit("Access Denied!");

class App_Controller extends BC_Controller
{
    /**
     * 是否开启用户认证，默认开启
     *
     * @var bool
     */
    public $isCheckLogin = false;
    public $isInit = true;
    public $isCheckPurview = true;
	
	public $categoryId = 0;
	protected $_route;

    public function __construct()
    {
		parent::__construct();
		
		$this->_route = $this->getRoute();
		
		$this->checkLogin();
		
		$this->checkSite();

        $this->init();

        //$this->checkModule();

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
		$siteList = $this->getSites();
		if ($site_id = $this->request->get->get('site_id'))
		{
			
			if (isset($siteList[$site_id]))
			{
				$this->session->set('site_id', $site_id);
			}
			else
			{
				$this->message('您切换的站点不存在或权限不足，无法访问', '', 0);
			}
		}
		else if (!$this->session->get('site_id'))
		{
			$firstSite = current($siteList);
			$this->session->set('site_id', $firstSite['site_id']);
		}
		
		$site_id = $this->session->get('site_id');
		
		$this->setTpl($siteList[$site_id]['alias']);
	}

    private function checkModule()
    {
        $config = $this->loader->model('home/module')->getConfig(BC::$module);
        if ($config[BC::$module]['status'] !== 1)
        {
            $this->message('此模块未启用，无法访问', 'module', 0);
        }
    }

    /**
     * 初始化加载头部，顶部，菜单栏、运行时间
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
		
		$languageList = $this->getLanguages();
        $this->tpl->assign('_languageList', $languageList);
		
		$breadcrumb = array();
		$this->categoryId = $this->request->get->get('category_id');
		if ($this->categoryId)
		{
			$breadcrumb = $this->loader->model('category/category')->getBreadcrumb($this->categoryId);
		}
		$menuTree = $this->loader->model('category/category')->getTree(array('status'=> 1, 'site_id' => $this->session->get('site_id')), array('sort_order' => 'asc', 'category_id' => 'asc'), $this->categoryId);
		$_menuTree = $menuTree->children;
		$this->tpl->assign('_categoryId', $this->categoryId);
		$this->tpl->assign('_menuTree', $_menuTree);
	
		$this->setBreadcrumb($breadcrumb);

        $this->tpl->assign('_sidebar', $this->tpl->fetch('common/sidebar'));
		
		$_header = $this->tpl->fetch('common/header');
		$this->tpl->assign('_header', $_header);
        
		$_footer = $this->tpl->fetch('common/footer');
		$this->tpl->assign('_footer', $_footer);

    }

    protected function getSites()
    {
        $siteList = $this->loader->model('home/site')->getAll(array(), array('sort_order' => 'asc', 'site_id' => 'asc'));
        $siteList = ArrayConvert::resetArrayKey($siteList, 'site_id');

        return $siteList;
    }
	
	protected function getLanguages()
    {
        $languageList = $this->loader->model('home/language')->getAll(array(), array('sort_order' => 'asc', 'language_id' => 'asc'));
        $languageList = ArrayConvert::resetArrayKey($languageList, 'language_id');

        return $languageList;
    }

    /**
     * 设置当前页面面包屑
     *
     * @param $breadcrumb
     * @return void
     */
    protected function setBreadcrumb($breadcrumb)
    {
        $this->tpl->assign('_breadcrumbList', $breadcrumb);
		$this->tpl->assign('_breadcrumb', $this->tpl->fetch('common/breadcrumb'));
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
