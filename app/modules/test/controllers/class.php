<?php
/**
 * index.php 首页控制器
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-06-20
 */
 
class Controller_Test_Class extends BC_Controller
{

    public function __construct()
    {
		parent::__construct();
		
    }

    public function index()
    {
        echo '<p><a href="'.BC::config('root_path').'test/class/captcha">验证码类：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/class/client">客户端类：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/class/date">日期类：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/class/http">HTTP通讯类：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/class/log">日志类：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/class/pagination">分页类：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/class/tree">资源树类：</a></p>';
    }

    public function captcha()
    {
        $captcha = new Captcha();
        $captcha->create();
    }

    public function client()
    {
        echo '当前访问者IP：'.Client::getIP();
    }

    public function date()
    {
        echo '当前时区：'.Date::getTimeZone();
        echo '<br />';
        echo '当前时间：'.Date::format();
        echo '<br />';
        echo '世界标准世界：'.Date::getUTCDate();
    }

    public function http()
    {
        $http = new Http();
        $url = 'http://www.baidu.com';
        $url = 'http://221.181.41.29:8090/sme/toportal/selectAreaAll.action';
        $url = 'http://111.8.7.153:8080/HunanCity/bjpersonal/result.action?account=13469085622@139.com&city=430000';
        $request = new Http_Request($url);
        $response = $http->request($request);

        print_r($response);
    }

    public function log()
    {
        //echo '写入日志'.Log::write('test');
        echo '读取日志'.Log::read();
        //echo '删除日志'.Log::delete();
    }

    public function pagination()
    {
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $pagination = new Pagination();
        $pagination->totalResult = 20;
        //$pagination->limit = 3;
        //$pagination->page = $page;
        //$pagination->isAjax = true;

        echo $pagination->show();
    }

    public function tree()
    {
        $data = array();
        $data[] = array("id" => 1, "name" => "A", "parentId" => 0);
        $data[] = array("id" => 2, "name" => "B", "parentId" => 1);
        $data[] = array("id" => 3, "name" => "C", "parentId" => 1);
        $data[] = array("id" => 4, "name" => "D", "parentId" => 3);
        $data[] = array("id" => 5, "name" => "E", "parentId" => 3);
        
        $tree = new Tree($data);
        $output = $tree->getTree();
        print_r($output);
    }
}
