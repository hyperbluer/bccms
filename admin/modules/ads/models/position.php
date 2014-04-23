<?php
/**
 * ads.php 后台广告模型类
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-21 10:26:41
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Position extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = 'ads_positions';
    }
}