<?php
/**
 * database.php 后台数据库管理模型类
 *
 *
 * @author          
 * @version         
 * @copyright       (C) 2013- *
 * @license	        
 * @lastmodify	    2013-08-26 09:37:42
 */

defined('IN_BC') or exit("Access Denied!");

class Model_Database extends App_Model_Admin
{
    
    public function __construct()
    {
        parent::__construct();
    }
	
	public function showTables()
	{
		$sql = 'SELECT * FROM INFORMATION_SCHEMA.TABLES WHERE table_schema = "'.$this->config['database'].'"';
		$result = $this->db->query($sql);
		$rows = $result->result();
		
		return $rows;
	}
	
	public function showFields($table)
	{
		$sql = 'SHOW FULL FIELDS FROM '.$table;
		$result = $this->db->query($sql);
		$rows = $result->result();
		
		return $rows;
	}
}