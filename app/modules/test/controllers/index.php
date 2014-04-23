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
 
class Controller_Test_Index extends BC_Controller
{

    public function __construct()
    {
		parent::__construct();
		
    }

    public function index()
    {
        //_redirect(_url('test/index/lang'));
        echo '<p>hello world!</p>';
        echo '<p><a href="'._url('test/index/lang').'">语言包测试：</a></p>';
        echo '<p><a href="'._url('test/index/tpl').'">模板测试：</a></p>';
        echo '<p><a href="'._url('test/index/sql', array('driver' => 'mysql')).'">SQL测试：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/index/cache">缓存测试：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/index/session">Session测试：</a></p>';
        echo '<p><a href="'.BC::config('root_path').'test/class">类库测试：</a></p>';
		echo BC::getRunTime();
    }

    public function lang()
    {
        echo 'Key: home => '.__('home')."<br />";
        echo 'Key: backend_title [path:admin/index] => '.__('admin/index/backend_title')."<br />";
        echo 'Key: unkown => '.__('unkown')."<br />";
    }

    public function tpl()
    {
		$this->tpl->tplPath = APP_TPL_PATH;
        $this->tpl->assign('title', '这是标题');
        $this->tpl->assign('content', '这是内容');
        $this->tpl->display('test/index');
    }

    public function sql()
    {
		$this->Model_Content = BC::loader()->model('content');
        $data = array('key' => 'new 1-1', 'value' => '1-2');
        $Model_Mongo = BC::loader()->model('mongo');
        //print_r($Model_Mongo->insert($data));exit();
        print_r($Model_Mongo->getList());

        $tableObject = new Database_Table();
        //$table = $tableObject->table('content')->field('`key`, `value`');
        $table = $tableObject->table('content')->field(array('key', 'value'));

        $conditionObject = new Database_Condition();
        $condition = $conditionObject->where()->order()->offset(0)->limit(10);

        /*
        $result = $this->Model_Content->db
                ->select()
                ->table($table)
                ->condition($condition)
                ->query();

        //print_r($result->getOne('key'));
        print_r($result->result());
        print_r($result->count());
        */

        $table = $tableObject->table('content')->field(array('key'));
        $sql = $this->Model_Content->db
                ->select()
                ->table($table)
                ->condition($condition)->toSql();
        //print_r($sql);
        $result = $this->Model_Content->db->query($sql);
        print_r($result->result());
        //print_r($result->count());
        //$table = $tableObject->reset()->table('content')->field(array('value', 'key'))->values(array('new 1-2', '1-1'));
        /*
        $table = $tableObject->reset()->table('content')->values(array('value' => 'new 1-2', 'key' => 'new 1-1'));
        $condition = $conditionObject->reset()->where(array('id' => 1));
        $result = $this->Model_Content->db
                ->update()
                ->table($table)
                ->condition($condition)
                ->query();
         print_r($result->result());
        */
        //exit;
    }

    public function cache()
    {
        $redisConfig = BC::config('cache/redis');
        $fileConfig = BC::config('cache/file');
        echo Cache::instance($redisConfig)->get('testkey')."<br />";
        //Cache::instance($fileConfig)->set('test', 'test');
        //Cache::instance($fileConfig)->set('array', array('orange', 'blue', 'red', 'green'));
        //print_r(Cache::$instances);
        //print_r(Cache::instance($fileConfig)->getHandler())."<br />";
        echo Cache::instance($fileConfig)->get('test')."<br />";
        //print_r(Cache::instance($fileConfig)->get('array'));
        print_r(Cache::$instances);
        //Cache::instance($cacheConfig)->delete('test');
        //Cache::instance($cacheConfig)->delete('array');
    }

    public function session()
    {
        $session = BC::loader()->session;
        print_r(Session::$config);
        echo "<br />";
        //$session->set('test', 'test-session-value');
        //echo $session->get('test');
        //echo $session->delete('test');
        //echo $session->destroy();
        echo "<br />";
    }
}
