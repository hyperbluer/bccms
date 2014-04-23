<?php
/**
 * __MODULE__.php 后台__CONFIG_NAME__模型类
 *
 *
 * @author          __CONFIG_TEAM__
 * @version         __CONFIG_VERSION__
 * @copyright       (C) 2013- *
 * @license	        __CONFIG_WEBSITE__
 * @lastmodify	    __CONFIG_ADD_TIME__
 */

defined('IN_BC') or exit("Access Denied!");

class Model___UCFIRST_MODULE__ extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
        $this->tableName = '__MODULE__';
    }
}