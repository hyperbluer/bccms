<?php
/**
 * Admin.php 后台父级模型
 *
 *
 * @author          hyperblue
 * @version         0.1
 * @copyright       (C) 2013- *
 * @license	        http://www.bingceng.com
 * @lastmodify	    2013-07-16
 */

defined('IN_BC') or exit("Access Denied!");

class App_Model_Admin extends BC_Model
{
    public $tableName;
    protected static $instances = array(
        'Table' => null,
        'Condition' => null
    );

    public function __construct()
    {
        parent::__construct();

        if (self::$instances['Table'] === null)
        {
            self::$instances['Table'] = new Database_Table();
        }

        if (self::$instances['Condition'] === null)
        {
            self::$instances['Condition'] = new Database_Condition();
        }
    }

    public function getOne(array $where = array(), $order = array(), $selectField = array(), $returnOneField = '')
    {
        $table = self::$instances['Table']->reset()->table($this->tableName)->field($selectField);
        $condition = self::$instances['Condition']->reset()->where($where)->order($order)->offset(0)->limit(1);
        $result = $this->db->select()->table($table)->condition($condition)->query();
		$rows = $result->getOne($returnOneField);

        return $rows;
    }

    public function getList(array $where = array(), $order = array(), $limit = 10, $offset = 0, $selectField = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName)->field($selectField);
        $condition = self::$instances['Condition']->reset()->where($where)->order($order)->offset($offset)->limit($limit);

        $result = $this->db->select()->table($table)->condition($condition)->query();
		$rows = $result->result();

        return $rows;
    }

    public function getAll(array $where = array(), $order = array(), $selectField = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName)->field($selectField);
        $condition = self::$instances['Condition']->reset()->where($where)->order($order);
        
        $result = $this->db->select()->table($table)->condition($condition)->query();
		$rows = $result->result();

        return $rows;
    }

    public function insert(array $data, array $options = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName)->values($data);
        $condition = self::$instances['Condition']->reset()->options($options);
        return $this->db->insert()->table($table)->condition($condition)->query()->result();
    }

    public function update(array $data, array $where = array(), array $options = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName)->values($data);
        $condition = self::$instances['Condition']->reset()->where($where)->options($options);

        return $this->db->update()->table($table)->condition($condition)->query()->result();
    }

    public function delete(array $where = array(), array $options = array())
    {
        $table = self::$instances['Table']->reset()->table($this->tableName);
        $condition = self::$instances['Condition']->reset()->where($where)->options($options);

        return $this->db->delete()->table($table)->condition($condition)->query()->result();
    }

}
