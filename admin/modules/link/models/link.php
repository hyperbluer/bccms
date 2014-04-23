<?php
/**
 * link.php 后台友情链接模型类
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-16 14:10:37
 */

defined('IN_BC') or exit("Access Denied!");

class Model_link extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'links';
    }
}