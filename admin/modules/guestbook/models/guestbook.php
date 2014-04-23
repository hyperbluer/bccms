<?php
/**
 * guestbook.php 后台留言板模型类
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-16 16:42:36
 */

defined('IN_BC') or exit("Access Denied!");

class Model_guestbook extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'guestbooks';
    }
}