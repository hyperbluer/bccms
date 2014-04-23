<?php
/**
 * language.php 后台语言包模型类
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-17
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Site extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'sites';
    }
}