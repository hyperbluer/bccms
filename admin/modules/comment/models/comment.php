<?php
/**
 * comment.php 后台评论模型类
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-19 09:53:36
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Comment extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'comments';
    }
}