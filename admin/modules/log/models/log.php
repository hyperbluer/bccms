<?php
/**
 * log.php 后台日志模型类
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-19 11:03:52
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Log extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'logs';
    }
}